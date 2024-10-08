<?php

namespace App\Http\Controllers\Admin\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\MellpiproChangeNS;
use App\Models\MellpiproChangeNSTracking;
use App\Models\Province;
use App\Models\Barangay;
use App\Models\Municipal;
use App\Models\City;
use App\Models\lguB2bSummary;
use App\Models\MellpiproLGUB2bSummaryTracking;
use App\Http\Controllers\LocationController;
use Barryvdh\DomPDF\Facade\Pdf;
use Termwind\Components\Raw;

class CMSSummaryB2bController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
        
        $years = range(date('Y'), 1900);

    $rawdata = DB::table('lgubarangayreport')
    ->leftJoin('mplgubrgychangeNS', 'lgubarangayreport.mplgubrgychangeNS_id', '=', 'mplgubrgychangeNS.id')
        ->leftJoin('lguB2bSummarydata', 'lgubarangayreport.mplgubrgyb2bSummary_id', '=', 'lguB2bSummarydata.id')
        ->leftJoin('psgc_municipalities', DB::raw('CAST(lgubarangayreport.municipal_id AS VARCHAR)'), '=', 'psgc_municipalities.citymun_code')
        ->leftJoin('psgc_cities', DB::raw('CAST(lgubarangayreport.municipal_id AS VARCHAR)'), '=', 'psgc_cities.citymun_code')
        ->where(function($query) {
            $query->whereNotNull('psgc_municipalities.citymun_code')
                  ->orWhereNotNull('psgc_cities.citymun_code');
        })
        ->select(
            'lgubarangayreport.*',
            'psgc_municipalities.name as name',
            'psgc_cities.name as name',
            'lguB2bSummarydata.id as b2bSummaryId',
            'lguB2bSummarydata.status as b2bSummaryStatus',
        )
        ->get();
        
        //dd($rawdata);
        return view('BarangayScholar.B2bSummary.index', compact('rawdata','provinces', 'cities_municipalities', 'barangays','years'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createData(Request $request)
    {
        $action = 'edit';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
        
        $years = range(date('Y'), 1900);
         
        $b1Sum = DB::table('lgubarangayreport')->where('id',$request->id)->first();
        

        $row = DB::table('lgubarangayreport')
        ->leftJoin('mplgubrgychangeNS', 'lgubarangayreport.mplgubrgychangeNS_id', '=', 'mplgubrgychangeNS.id')
        ->leftJoin('lguB1bSummarydata', 'lgubarangayreport.mplgubrgyb1bSummary_id', '=', 'lguB1bSummarydata.id')
        ->where('lgubarangayreport.id',$b1Sum->id)
        ->select(
            'mplgubrgychangeNS.*',
        )->first();


        // dd($row);
        return view('BarangayScholar.B2bSummary.create', compact('row','b1Sum','provinces', 'cities_municipalities', 'barangays', 'years','action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $dataExists = DB::table('lgubarangayreport')
        ->where('dateMonitoring', $request->dateMonitoring)
        ->where( 'periodCovereda', $request->periodCovereda,)
        // ->where( 'barangay_id' , $request->barangay_id,) 
        ->exists();

        if ($dataExists) {  


            $rules = [
                'Pd2aCR' => 'required|numeric',
                'Pd2bCR' => 'required|numeric',
                'Pd2cCR' => 'required|numeric',
                'Pd2dCR' => 'required|numeric',
                'Pd2eCR' => 'required|numeric',
                'Pd2fCR' => 'required|numeric',
                'Pd2gCR' => 'required|numeric',
                'Pd2hCR' => 'required|numeric',
                'OverallTCRF' => 'required|numeric',  
                'remarks' => 'nullable|string',
                'barangay_id' =>  'required|string|max:555',
                'municipal_id' => 'required|integer',
                'province_id' => 'numeric',
                'region_id' => 'required|integer',
                'dateMonitoring' => 'required|date|max:255',
                'periodCovereda' => 'required|string |max:255',
                'status' => 'required|string|max:255',
                'user_id' => 'required|integer',
        
            ];
            $message = [ 
                'required' => 'The field is required.',
                'integer' => 'The field is number.',
                'string' => 'The field must be a string.',
                'date' => 'The field must be a valid date.',
                'max' => 'The field may not be greater than :max characters.',
            ]; 
    
            $validator = Validator::make($request->all() , $rules, $message );
    
            if($validator->fails()){

                dd($validator->errors());
                return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
            }else {
                if ($request->formrequest == 'draft') {
              
                    $B2bSummaryBarangay = lguB2bSummary::create([
                        'ch1' =>$request->Pd2aCR,
                        'ch2' =>$request->Pd2bCR,
                        'ch3' =>$request->Pd2cCR,
                        'ch4' =>$request->Pd2dCR,
                        'ch5' =>$request->Pd2eCR,
                        'ch6' =>$request->Pd2gCR,
                        'ch7' =>$request->Pd2gCR,
                        'ch8' =>$request->Pd2hCR,
                        'grandtotal' =>  $request->OverallTCRF,
                        'remarks' =>  $request->remarks,
                        'barangay_id' =>  $request->barangay_id,
                        'municipal_id' =>  $request->municipal_id,
                        'province_id' => isset($request->province_id) ? $request->province_id : null,
                        'region_id' =>  $request->region_id,
                        'dateMonitoring' =>  $request->dateMonitoring,
                        'periodCovereda' =>  $request->periodCovereda,
                        'status' =>  '1',
                        'user_id' =>  $request->user_id,
                    ]);
        
                    MellpiproLGUB2bSummaryTracking::create([
                        'mplgubrgyb2bSummary_id' => $B2bSummaryBarangay->id,
                        'status' => '1',
                        'barangay_id' => auth()->user()->barangay,
                        'municipal_id' => auth()->user()->city_municipal,
                        'user_id' => auth()->user()->id,
                    ]);  
                    
                    DB::table('lgubarangayreport')
                    ->where('dateMonitoring', $request->dateMonitoring) 
                    ->where('periodCovereda', $request->periodCovereda) 
                    ->update([
                        'mplgubrgyb2bSummary_id' => $B2bSummaryBarangay->id, 
                        'mplgubrgyb2bSummaryStatus_id' => '1',  
                        'count' => '1', 
                    ]);
     
      
                    return redirect('BarangayScholar/B2BSummary')->with('success', 'Data stored as Draft!'); 
            
                }else {
      
                    $B2bSummaryBarangay = lguB2bSummary::create([
                        'ch1' =>$request->Pd2aCR,
                        'ch2' =>$request->Pd2bCR,
                        'ch3' =>$request->Pd2cCR,
                        'ch4' =>$request->Pd2dCR,
                        'ch5' =>$request->Pd2eCR,
                        'ch6' =>$request->Pd2gCR,
                        'ch7' =>$request->Pd2gCR,
                        'ch8' =>$request->Pd2hCR,
                        'grandtotal' =>  $request->OverallTCRF,
                        'remarks' =>  $request->remarks,
                        'barangay_id' =>  $request->barangay_id,
                        'municipal_id' =>  $request->municipal_id,
                        'province_id' => isset($request->province_id) ? $request->province_id : null,
                        'region_id' =>  $request->region_id,
                        'dateMonitoring' =>  $request->dateMonitoring,
                        'periodCovereda' =>  $request->periodCovereda,
                        'status' =>  '0',
                        'user_id' =>  $request->user_id,
                    ]);
        
                    MellpiproLGUB2bSummaryTracking::create([
                        'mplgubrgyb2bSummary_id' => $B2bSummaryBarangay->id,
                        'status' => '0',
                        'barangay_id' => auth()->user()->barangay,
                        'municipal_id' => auth()->user()->city_municipal,
                        'user_id' => auth()->user()->id,
                    ]);  
                    
                    
                    DB::table('lgubarangayreport')
                    ->where('dateMonitoring', $request->dateMonitoring) 
                    ->where('periodCovereda', $request->periodCovereda) 
                    ->update([
                        'mplgubrgyb2bSummary_id' => $B2bSummaryBarangay->id, 
                        'mplgubrgyb2bSummaryStatus_id' => '0',  
                        'count' => '1', 
                    ]);
    
                    // return redirect('BarangayScholar/B1BSummary')->with('success', 'Data stored as Draft!'); 
                    return redirect()->route('B2bSummary.index')->with('success', 'Data stored successfully!'); 
                }
            }
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $action = 'show';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
        
        $years = range(date('Y'), 1900);
         
        $b1Sum = DB::table('lgubarangayreport')->where('id',$request->id)->first();
        

        $row = DB::table('lgubarangayreport')
        ->leftJoin('mplgubrgychangeNS', 'lgubarangayreport.mplgubrgychangeNS_id', '=', 'mplgubrgychangeNS.id')
        ->leftJoin('lguB1bSummarydata', 'lgubarangayreport.mplgubrgyb1bSummary_id', '=', 'lguB1bSummarydata.id')
        ->where('lgubarangayreport.id',$b1Sum->id)
        ->select(
            'mplgubrgychangeNS.*',
        )->first();


        // dd($row);
        return view('BarangayScholar.B2bSummary.show', compact('row','b1Sum','provinces', 'cities_municipalities', 'barangays', 'years','action'));
        
    }


    public function downloads(Request $request ) { 
        
        $htmlContent = $request->input('htmlContent');
        //dd($htmlContent);
        // Generate PDF from HTML content
        $htmlheader = '<html><body>';
            
        $htmlfooter = '</body></html>';
        $concat = $htmlheader . $htmlContent . $htmlfooter;
    
        $pdf = Pdf::loadHTML($concat);
        $pdfContent = $pdf->output();
        return response($pdfContent, 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="document.pdf"');
    }

}
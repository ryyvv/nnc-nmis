<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

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
use App\Models\lguB1bSummary;
use App\Models\MellpiproLGUB1bSummaryTracking;
use App\Http\Controllers\LocationController;
use Barryvdh\DomPDF\Facade\Pdf;
use Termwind\Components\Raw;

class SummaryB1bController extends Controller
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
        ->leftJoin('lguprofilebarangay', 'lgubarangayreport.lguprofilebarangay_id', '=', 'lguprofilebarangay.id')
        ->leftJoin('mplgubrgyvisionmissions', 'lgubarangayreport.mplgubrgyvisionmissions_id', '=', 'mplgubrgyvisionmissions.id')
        ->leftJoin('mellpiprobarangaynationalpolicies', 'lgubarangayreport.mellpiprobarangaynationalpolicies_id', '=', 'mellpiprobarangaynationalpolicies.id')
        ->leftJoin('mplgubrgygovernance', 'lgubarangayreport.mplgubrgygovernance_id', '=', 'mplgubrgygovernance.id')
        ->leftJoin('mplgubrgylncmanagement', 'lgubarangayreport.mplgubrgylncmanagement_id', '=', 'mplgubrgylncmanagement.id')
        ->leftJoin('mplgubrgynutritionservice', 'lgubarangayreport.mplgubrgynutritionservice_id', '=', 'mplgubrgynutritionservice.id')
        ->leftJoin('lguB1bSummarydata', 'lgubarangayreport.mplgubrgyb1bSummary_id', '=', 'lguB1bSummarydata.id')
        ->leftJoin('mplgubrgychangeNS', 'lgubarangayreport.mplgubrgychangeNS_id', '=', 'mplgubrgychangeNS.id')
        ->leftJoin('mplgubrgydiscussionquestion', 'lgubarangayreport.mplgubrgydiscussionquestion_id', '=', 'mplgubrgydiscussionquestion.id')
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
            'lguB1bSummarydata.id as b1bSummaryId',
            'lguB1bSummarydata.status as b1bSummaryStatus',
        )
        ->get();
        
        //dd($rawdata);
        return view('BarangayScholar.B1bSummary.index', compact('rawdata','provinces', 'cities_municipalities', 'barangays','years'));
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
        ->leftJoin('lguprofilebarangay', 'lgubarangayreport.lguprofilebarangay_id', '=', 'lguprofilebarangay.id')
        ->leftJoin('mplgubrgyvisionmissions', 'lgubarangayreport.mplgubrgyvisionmissions_id', '=', 'mplgubrgyvisionmissions.id')
        ->leftJoin('mellpiprobarangaynationalpolicies', 'lgubarangayreport.mellpiprobarangaynationalpolicies_id', '=', 'mellpiprobarangaynationalpolicies.id')
        ->leftJoin('mplgubrgygovernance', 'lgubarangayreport.mplgubrgygovernance_id', '=', 'mplgubrgygovernance.id')
        ->leftJoin('mplgubrgylncmanagement', 'lgubarangayreport.mplgubrgylncmanagement_id', '=', 'mplgubrgylncmanagement.id')
        ->leftJoin('mplgubrgynutritionservice', 'lgubarangayreport.mplgubrgynutritionservice_id', '=', 'mplgubrgynutritionservice.id')
        ->leftJoin('lguB1bSummarydata', 'lgubarangayreport.mplgubrgyb1bSummary_id', '=', 'lguB1bSummarydata.id')
        ->leftJoin('mplgubrgychangeNS', 'lgubarangayreport.mplgubrgychangeNS_id', '=', 'mplgubrgychangeNS.id')
        ->leftJoin('mplgubrgydiscussionquestion', 'lgubarangayreport.mplgubrgydiscussionquestion_id', '=', 'mplgubrgydiscussionquestion.id')
        ->where('lgubarangayreport.id',$b1Sum->id)
        ->select(
            // 'lgubarangayreport.lguprofilebarangay_id as lguID',
            // 'lgubarangayreport.mplgubrgyvisionmissions_id as vmID',
            // 'lgubarangayreport.mellpiprobarangaynationalpolicies_id as npID',
            // 'lgubarangayreport.mplgubrgygovernance_id as govID',
            // 'lgubarangayreport.mplgubrgylncmanagement_id as lncID',
            // 'lgubarangayreport.mplgubrgynutritionservice_id as nsID', 

            'lguprofilebarangay.*',
            'mplgubrgyvisionmissions.*',
            'mellpiprobarangaynationalpolicies.*',
            'mplgubrgygovernance.*',
            'mplgubrgylncmanagement.*',
            'mplgubrgynutritionservice.*',
    
            
        )->first();


        //dd($row);
        return view('BarangayScholar.B1bSummary.create', compact('row','b1Sum','provinces', 'cities_municipalities', 'barangays', 'years','action'));
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
                'Pd1T2CR' => 'required|numeric',
                'Pd2T2CR' => 'required|numeric',
                'Pd3T2CR' => 'required|numeric',
                'Pd4T2CR' => 'required|numeric',
                'Pd5T2CR' => 'required|numeric',
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

                //dd($validator->errors());
                return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
            }else {
                if ($request->formrequest == 'draft') {
              
                    $B1bSummaryBarangay = lguB1bSummary::create([
                        'D1' =>$request->Pd1T2CR,
                        'D2' =>$request->Pd2T2CR,
                        'D3' =>$request->Pd3T2CR,
                        'D4' =>$request->Pd4T2CR,
                        'D5' =>$request->Pd5T2CR,
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
        
                    MellpiproLGUB1bSummaryTracking::create([
                        'mplgubrgyb1bSummary_id' => $B1bSummaryBarangay->id,
                        'status' => '1',
                        'barangay_id' => auth()->user()->barangay,
                        'municipal_id' => auth()->user()->city_municipal,
                        'user_id' => auth()->user()->id,
                    ]);  
                    
                    DB::table('lgubarangayreport')
                    ->where('dateMonitoring', $request->dateMonitoring) 
                    ->where('periodCovereda', $request->periodCovereda) 
                    ->update([
                        'mplgubrgyb1bSummary_id' => $B1bSummaryBarangay->id, 
                        'mplgubrgyb1bSummaryStatus_id' => '1',  
                        'count' => '1', 
                    ]);
     
      
                    return redirect('BarangayScholar/B1BSummary')->with('success', 'Data stored as Draft!'); 
            
                }else {
      
                    $B1bSummaryBarangay = lguB1bSummary::create([
                        'D1' =>$request->Pd1T2CR,
                        'D2' =>$request->Pd2T2CR,
                        'D3' =>$request->Pd3T2CR,
                        'D4' =>$request->Pd4T2CR,
                        'D5' =>$request->Pd5T2CR,
                        'grandtotal' =>  $request->OverallTCRF,
                        'remarks' =>  $request->remarks,
                        'barangay_id' =>  $request->barangay_id,
                        'municipal_id' =>  $request->municipal_id,
                        'province_id' => isset($request->province_id) ? $request->province_id : null,
                        'region_id' =>  $request->region_id,
                        'dateMonitoring' =>  $request->dateMonitoring,
                        'periodCovereda' =>  $request->periodCovereda,
                        'status' =>  0,
                        'user_id' =>  $request->user_id,
                    ]);
        
                    MellpiproLGUB1bSummaryTracking::create([
                        'mplgubrgyb1bSummary_id' => $B1bSummaryBarangay->id,
                        'status' => 0,
                        'barangay_id' => auth()->user()->barangay,
                        'municipal_id' => auth()->user()->city_municipal,
                        'user_id' => auth()->user()->id,
                    ]);  
                    
                    DB::table('lgubarangayreport')
                    ->where('dateMonitoring', $request->dateMonitoring) 
                    ->where('periodCovereda', $request->periodCovereda) 
                    ->update([
                        'mplgubrgyb1bSummary_id' => $B1bSummaryBarangay->id, 
                        'mplgubrgyb1bSummaryStatus_id' => 0,  
                        'count' => 2, 
                    ]);
    
                    // return redirect('BarangayScholar/B1BSummary')->with('success', 'Data stored as Draft!'); 
                    return redirect()->route('B1bSummary.index')->with('success', 'Data stored successfully!'); 
                }
            }

  
            // return redirect()->back()->withInput()->with('error', 'A record with the same data already exists.');
        }   

        // if ($request->formrequest == 'draft') {

        //     $B1bSummaryBarangay = lguB1bSummary::create([
        //         'D1' =>  $request->Pd1T2CR,
        //         'D2' =>  $request->Pd2T2CR,
        //         'D3' =>  $request->Pd3T2CR,
        //         'D4' =>  $request->Pd4T2CR,
        //         'D5' =>  $request->Pd5T2CR,
        //         'grandtotal' =>  $request->grandtotal,
        //         'barangay_id' =>  $request->barangay_id,
        //         'municipal_id' =>  $request->municipal_id,
        //         'province_id' =>  $request->province_id,
        //         'region_id' =>  $request->region_id,
        //         'dateMonitoring' =>  $request->dateMonitoring,
        //         'periodCovereda' =>  $request->periodCovereda,
        //         'status' =>  $request->status,
        //         'user_id' =>  $request->user_id,
        //     ]);

        //     // MellpiproLGUB1bSummaryTracking::create([
        //     //     'mplgubrgyb1bSummary_id' => $B1bSummaryBarangay->id,
        //     //     'status' => $request->status,
        //     //     'barangay_id' => auth()->user()->barangay,
        //     //     'municipal_id' => auth()->user()->city_municipal,
        //     //     'user_id' => auth()->user()->id,
        //     // ]);
        
        //     return redirect('BarangayScholar/B1BSummary')->with('success', 'Data stored as Draft!'); 
    
        // }else {
        //     $rules = [
        //         'barangay_id' => 'required|integer',
        //         'municipal_id' => 'required|integer',
        //         'province_id' => 'required|integer',
        //         'region_id' => 'required|integer',
        //         'dateMonitoring' => 'required|date|max:255',
        //         'periodCovereda' => 'required|string |max:255',
                
        //         'D1' => 'required|integer',
        //         'D2' => 'required|integer',
        //         'D3' => 'required|integer',
        //         'D4' => 'required|integer',
        //         'D5' => 'required|integer',
        //         'grandtotal' => 'required|integer',
        //         'dateMonitoring' => 'required|integer',
        //         'periodCovereda' => 'required|integer',
        //         'status' => 'required|string|max:255',
        //         'user_id' => 'required|integer',
    
        //     ];
    
        //     $validator = Validator::make($request->all(), $rules);
    
        //     if ($validator->fails()) {
        //         return redirect()->back()
        //             ->withErrors($validator)
        //             ->withInput()->with('error', 'Something went wrong! Please try again.');
        //     } else {
    
        //         $changeNSBarangay = MellpiproChangeNS::create([
        //             'barangay_id' =>  $request->barangay_id,
        //             'municipal_id' =>  $request->municipal_id,
        //             'province_id' =>  $request->province_id,
        //             'region_id' =>  $request->region_id,
        //             'dateMonitoring' =>  $request->dateMonitoring,
        //             'periodCovereda' =>  $request->periodCovereda,
    
        //             'D1' =>$request->Pd1T2CR,
        //             'D2' =>$request->Pd2T2CR,
        //             'D3' =>$request->Pd3T2CR,
        //             'D4' =>$request->Pd4T2CR,
        //             'D5' =>$request->Pd5T2CR,
        //             'grandtotal' =>$request->OverallTCRF,
        //             'status' =>  $request->status,
        //             'user_id' =>  $request->user_id,
        //         ]);
        //         MellpiproLGUB1bSummaryTracking::create([
        //             'mplgubrgyb1bSummary_id' => $B1bSummaryBarangay->id,
        //             'status' => $request->status,
        //             'barangay_id' => auth()->user()->barangay,
        //             'municipal_id' => auth()->user()->city_municipal,
        //             'user_id' => auth()->user()->id,
        //         ]);

        //         DB::table('lgubarangayreport')->insert([
        //             'mplgubrgyb1bSummary_id' => $changeNSBarangay->id, 
        //             'barangay_id' => $request->barangay_id,
        //             'municipal_id' => $request->municipal_id,   
        //             'dateMonitoring' => $request->dateMonitoring,
        //             'periodCovereda' => $request->periodCovereda,
        //             'status' => $request->status,
        //             'user_id' => $request->user_id,
        //             'count' =>  1,
        //             'created_at' => now(), // Optional
        //             'updated_at' => now(), // Optional
        //         ]);




        //     }
        //     return redirect('BarangayScholar/B1BSummary')->with('success', 'Data stored successfully!');
        // }
        
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
        ->leftJoin('lguprofilebarangay', 'lgubarangayreport.lguprofilebarangay_id', '=', 'lguprofilebarangay.id')
        ->leftJoin('mplgubrgyvisionmissions', 'lgubarangayreport.mplgubrgyvisionmissions_id', '=', 'mplgubrgyvisionmissions.id')
        ->leftJoin('mellpiprobarangaynationalpolicies', 'lgubarangayreport.mellpiprobarangaynationalpolicies_id', '=', 'mellpiprobarangaynationalpolicies.id')
        ->leftJoin('mplgubrgygovernance', 'lgubarangayreport.mplgubrgygovernance_id', '=', 'mplgubrgygovernance.id')
        ->leftJoin('mplgubrgylncmanagement', 'lgubarangayreport.mplgubrgylncmanagement_id', '=', 'mplgubrgylncmanagement.id')
        ->leftJoin('mplgubrgynutritionservice', 'lgubarangayreport.mplgubrgynutritionservice_id', '=', 'mplgubrgynutritionservice.id')
        ->leftJoin('lguB1bSummarydata', 'lgubarangayreport.mplgubrgyb1bSummary_id', '=', 'lguB1bSummarydata.id') 
        ->where('lgubarangayreport.id',$b1Sum->id)
        ->select(
 
            'lguprofilebarangay.*',
            'mplgubrgyvisionmissions.*',
            'mellpiprobarangaynationalpolicies.*',
            'mplgubrgygovernance.*',
            'mplgubrgylncmanagement.*',
            'mplgubrgynutritionservice.*',
    
            
        )->first();

        return view('BarangayScholar.B1bSummary.show', compact('row','b1Sum','provinces', 'cities_municipalities', 'barangays', 'years','action'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ,string $id)
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

        
        $row = DB::table('mplgubrgychangeNS')->where('user_id', auth()->user()->id)->first();
        
       return view('BarangayScholar.ChangeinNS.edit', compact('row', 'provinces', 'cities_municipalities', 'barangays', 'years', 'action'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->formrequest == 'draft') {

            $changeNSBarangay  = MellpiproChangeNS::find($request->id);

            $changeNSBarangay->update([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,

                'rating6a' => $request->rating6a,
                'rating6b' => $request->rating6b,
                'rating6c' => $request->rating6c,
                'rating6d' => $request->rating6d, 
                'rating6e' => $request->rating6e,
                'rating6f' => $request->rating6f,
                'rating6g' => $request->rating6g,
                'rating6h' => $request->rating6h,

                'remarks6a' => $request->remarks6a,
                'remarks6b' => $request->remarks6b,
                'remarks6c' => $request->remarks6c,
                'remarks6d' => $request->remarks6d,
                'remarks6e' => $request->remarks6e,
                'remarks6f' => $request->remarks6f,
                'remarks6g' => $request->remarks6g,
                'remarks6h' => $request->remarks6h,
                 

                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
            ]);
            return redirect('BarangayScholar/changeNS')->with('success', 'Data stored as Draft!'); 

        }else {

        } 
          $rules = [
            'barangay_id' => 'required|integer',
            'municipal_id' => 'required|integer',
            'province_id' => 'required|integer',
            'region_id' => 'required|integer',
            'dateMonitoring' => 'required|date|max:255',
            'periodCovereda' => 'required|string |max:255',

            'rating6a' => 'required|integer',
            'rating6b' => 'required|integer',
            'rating6c' => 'required|integer',
            'rating6d' => 'required|integer',
            'rating6e' => 'required|integer',
            'rating6f' => 'required|integer',
            'rating6g' => 'required|integer',
            'rating6h' => 'required|integer', 
            

            'remarks6a' => 'required|string|max: 255',
            'remarks6b' => 'required|string|max: 255',
            'remarks6c' => 'required|string|max: 255',
            'remarks6d' => 'required|string|max: 255',
            'remarks6e' => 'required|string|max: 255',
            'remarks6f' => 'required|string|max: 255',
            'remarks6g' => 'required|string|max: 255',
            'remarks6h' => 'required|string|max: 255', 

            'status' => 'required|string|max:255',
            'user_id' => 'required|integer',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        }
        else {
            $changeNSBarangay  = MellpiproChangeNS::find($request->id);

            $changeNSBarangay->update([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,

                'rating6a' => $request->rating6a,
                'rating6b' => $request->rating6b,
                'rating6c' => $request->rating6c,
                'rating6d' => $request->rating6d, 
                'rating6e' => $request->rating6e,
                'rating6f' => $request->rating6f,
                'rating6g' => $request->rating6g,
                'rating6h' => $request->rating6h,

                'remarks6a' => $request->remarks6a,
                'remarks6b' => $request->remarks6b,
                'remarks6c' => $request->remarks6c,
                'remarks6d' => $request->remarks6d,
                'remarks6e' => $request->remarks6e,
                'remarks6f' => $request->remarks6f,
                'remarks6g' => $request->remarks6g,
                'remarks6h' => $request->remarks6h,
                 

                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
            ]);
        
        }
        return redirect('BarangayScholar/changeNS')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::table('mplgubrgychangeNStracking')->where('mplgubrgychangeNS_id', $request->id)->delete();
        $lguprofile = MellpiproChangeNS::find( $request->id); 
        $lguprofile->delete();
        return redirect()->route('changeNS.index')->with('success', 'Deleted successfully!');
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
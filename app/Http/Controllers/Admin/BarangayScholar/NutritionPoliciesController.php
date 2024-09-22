<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MellpiprobarangayNationalpolicies;
use App\Models\mpbrgynationalPoliciestracking;
use App\Http\Controllers\LocationController;
use Termwind\Components\Raw;
use Barryvdh\DomPDF\Facade\Pdf;

class NutritionPoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangay = auth()->user()->barangay; 
        $nplocation = DB::table('mellpiprobarangaynationalpolicies')->where('user_id', auth()->user()->id)->get();

        return view('BarangayScholar.NutritionPolicies.index', ['nplocation' => $nplocation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $action = 'create';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
        
        $years = range(date("Y"), 1900);
        return view('BarangayScholar.NutritionPolicies.create', compact('provinces', 'cities_municipalities', 'barangays','years','action'));
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
        return redirect()->back()->withInput()->with('error', 'A record with the same data already exists.');
        }  

        if ($request->formrequest == 'draft') {
            $npbarangay = MellpiprobarangayNationalpolicies::create([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'rating2a' =>  $request->rating2a,
                'rating2b' =>  $request->rating2b,
                'rating2c' =>  $request->rating2c,
                'rating2d' =>  $request->rating2d,
                'rating2e' =>  $request->rating2e,
                'rating2f' =>  $request->rating2f,
                'rating2g' =>  $request->rating2g,
                'rating2h' =>  $request->rating2h,
                'rating2i' =>  $request->rating2i,
                'rating2j' =>  $request->rating2j,
                'rating2k' =>  $request->rating2k,
                'rating2l' =>  $request->rating2l,
                'remarks2a' =>  $request->remarks2a,
                'remarks2b' =>  $request->remarks2b,
                'remarks2c' =>  $request->remarks2c,
                'remarks2d' =>  $request->remarks2d,
                'remarks2e' =>  $request->remarks2e,
                'remarks2f' =>  $request->remarks2f,
                'remarks2g' =>  $request->remarks2g,
                'remarks2h' =>  $request->remarks2h,
                'remarks2i' =>  $request->remarks2i,
                'remarks2j' =>  $request->remarks2j,
                'remarks2k' =>  $request->remarks2k,
                'remarks2l' =>  $request->remarks2l,
                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
            ]); 
    
            mpbrgynationalPoliciestracking::create([
                'mellpiprobarangaynationalpolicies_id' => $npbarangay->id,
                'status' => $request->status,
                'barangay_id' => auth()->user()->barangay,
                'municipal_id' => auth()->user()->city_municipal,
                'user_id' => auth()->user()->id,
            ]);
    
            return redirect('BarangayScholar/nutritionpolicies')->with('success', 'Data stored as Draft!'); 
        }else {
                //dd($request);
        $rules = [
            'barangay_id' => 'required|integer',
            'municipal_id' => 'required|integer',
            'province_id' => 'required|integer',
            'region_id' => 'required|integer',
            'dateMonitoring' => 'required|date',
            'periodCovereda' => 'required|string ',
            'rating2a' => 'required|integer',
            'rating2b' => 'required|integer',
            'rating2c' => 'required|integer',
            'rating2d' => 'required|integer',
            'rating2e' => 'required|integer',
            'rating2f' => 'required|integer',
            'rating2g' => 'required|integer',
            'rating2h' => 'required|integer',
            'rating2i' => 'required|integer',
            'rating2j' => 'required|integer',
            'rating2k' => 'required|integer',
            'rating2l' => 'required|integer',
            'remarks2a' => 'required|string|max:255',
            'remarks2b' => 'required|string|max:255',
            'remarks2c' => 'required|string|max:255',
            'remarks2d' => 'required|string|max:255', 
            'remarks2e' => 'required|string|max:255', 
            'remarks2f' => 'required|string|max:255', 
            'remarks2g' => 'required|string|max:255', 
            'remarks2h' => 'required|string|max:255', 
            'remarks2i' => 'required|string|max:255', 
            'remarks2j' => 'required|string|max:255', 
            'remarks2k' => 'required|string|max:255', 
            'remarks2l' => 'required|string|max:255', 
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

        $validator = Validator::make($request->all() , $rules,$message);

        if($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()->with('error', 'Something went wrong! Please try again.');
        }

        $npbarangay = MellpiprobarangayNationalpolicies::create([
            'barangay_id' =>  $request->barangay_id,
            'municipal_id' =>  $request->municipal_id,
            'province_id' =>  $request->province_id,
            'region_id' =>  $request->region_id,
            'dateMonitoring' =>  $request->dateMonitoring,
            'periodCovereda' =>  $request->periodCovereda,
            'rating2a' =>  $request->rating2a,
            'rating2b' =>  $request->rating2b,
            'rating2c' =>  $request->rating2c,
            'rating2d' =>  $request->rating2d,
            'rating2e' =>  $request->rating2e,
            'rating2f' =>  $request->rating2f,
            'rating2g' =>  $request->rating2g,
            'rating2h' =>  $request->rating2h,
            'rating2i' =>  $request->rating2i,
            'rating2j' =>  $request->rating2j,
            'rating2k' =>  $request->rating2k,
            'rating2l' =>  $request->rating2l,
            'remarks2a' =>  $request->remarks2a,
            'remarks2b' =>  $request->remarks2b,
            'remarks2c' =>  $request->remarks2c,
            'remarks2d' =>  $request->remarks2d,
            'remarks2e' =>  $request->remarks2e,
            'remarks2f' =>  $request->remarks2f,
            'remarks2g' =>  $request->remarks2g,
            'remarks2h' =>  $request->remarks2h,
            'remarks2i' =>  $request->remarks2i,
            'remarks2j' =>  $request->remarks2j,
            'remarks2k' =>  $request->remarks2k,
            'remarks2l' =>  $request->remarks2l,
            'status' =>  $request->status,
            'user_id' =>  $request->user_id,
        ]); 

        mpbrgynationalPoliciestracking::create([
            'mellpiprobarangaynationalpolicies_id' => $npbarangay->id,
            'status' => $request->status,
            'barangay_id' => auth()->user()->barangay,
            'municipal_id' => auth()->user()->city_municipal,
            'user_id' => auth()->user()->id,
        ]);

        DB::table('lgubarangayreport')->insert([
            'mellpiprobarangaynationalpolicies_id' => $npbarangay->id, 
            'barangay_id' => $request->barangay_id,
            'municipal_id' => $request->municipal_id,   
            'dateMonitoring' => $request->dateMonitoring,
            'periodCovereda' => $request->periodCovereda,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'count' =>  1,
            'created_at' => now(), // Optional
            'updated_at' => now(), // Optional
        ]);

        return redirect('BarangayScholar/nutritionpolicies')->with('success', 'Data stored successfully!');

        }

    
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $action = 'edit';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
        
        $years = range(date("Y"), 1900);
        $row = DB::table('mellpiprobarangaynationalpolicies')->where('id', $request->id)->first();
        return view('BarangayScholar.NutritionPolicies.show', compact('row','provinces', 'cities_municipalities', 'barangays','years','action'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $action = 'edit';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
        
        $years = range(date("Y"), 1900);
        $row = DB::table('mellpiprobarangaynationalpolicies')->where('id', $request->id)->first();
        return view('BarangayScholar.NutritionPolicies.edit', compact('row','provinces', 'cities_municipalities', 'barangays','years','action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        if ($request->formrequest == 'draft') {

            $npbarangay =  MellpiprobarangayNationalpolicies::find($request->id);

            $npbarangay->update([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'rating2a' =>  $request->rating2a,
                'rating2b' =>  $request->rating2b,
                'rating2c' =>  $request->rating2c,
                'rating2d' =>  $request->rating2d,
                'rating2e' =>  $request->rating2e,
                'rating2f' =>  $request->rating2f,
                'rating2g' =>  $request->rating2g,
                'rating2h' =>  $request->rating2h,
                'rating2i' =>  $request->rating2i,
                'rating2j' =>  $request->rating2j,
                'rating2k' =>  $request->rating2k,
                'rating2l' =>  $request->rating2l,
                'remarks2a' =>  $request->remarks2a,
                'remarks2b' =>  $request->remarks2b,
                'remarks2c' =>  $request->remarks2c,
                'remarks2d' =>  $request->remarks2d,
                'remarks2e' =>  $request->remarks2e,
                'remarks2f' =>  $request->remarks2f,
                'remarks2g' =>  $request->remarks2g,
                'remarks2h' =>  $request->remarks2h,
                'remarks2i' =>  $request->remarks2i,
                'remarks2j' =>  $request->remarks2j,
                'remarks2k' =>  $request->remarks2k,
                'remarks2l' =>  $request->remarks2l,
                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
            ]); 
            
            return redirect()->route('nutritionpolicies.index')->with('success', 'Data stored as Draft!'); 
            
        }else {
          //dd($request);
          $rules = [
            'barangay_id' => 'required|integer',
            'municipal_id' => 'required|integer',
            'province_id' => 'required|integer',
            'region_id' => 'required|integer',
            'dateMonitoring' => 'required|date',
            'periodCovereda' => 'required|string ',
            'rating2a' => 'required|integer',
            'rating2b' => 'required|integer',
            'rating2c' => 'required|integer',
            'rating2d' => 'required|integer',
            'rating2e' => 'required|integer',
            'rating2f' => 'required|integer',
            'rating2g' => 'required|integer',
            'rating2h' => 'required|integer',
            'rating2i' => 'required|integer',
            'rating2j' => 'required|integer',
            'rating2k' => 'required|integer',
            'rating2l' => 'required|integer',
            'remarks2a' => 'required|string|max:255',
            'remarks2b' => 'required|string|max:255',
            'remarks2c' => 'required|string|max:255',
            'remarks2d' => 'required|string|max:255', 
            'remarks2e' => 'required|string|max:255', 
            'remarks2f' => 'required|string|max:255', 
            'remarks2g' => 'required|string|max:255', 
            'remarks2h' => 'required|string|max:255', 
            'remarks2i' => 'required|string|max:255', 
            'remarks2j' => 'required|string|max:255', 
            'remarks2k' => 'required|string|max:255', 
            'remarks2l' => 'required|string|max:255', 
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

        $validator = Validator::make($request->all() , $rules, $message);

        if($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()->with('error', 'Something went wrong! Please try again.');
        }else  {
            $npbarangay =  MellpiprobarangayNationalpolicies::find($request->id);

            $npbarangay->update([
                'barangay_id' =>  $request->barangay_id,
                'municipal_id' =>  $request->municipal_id,
                'province_id' =>  $request->province_id,
                'region_id' =>  $request->region_id,
                'dateMonitoring' =>  $request->dateMonitoring,
                'periodCovereda' =>  $request->periodCovereda,
                'rating2a' =>  $request->rating2a,
                'rating2b' =>  $request->rating2b,
                'rating2c' =>  $request->rating2c,
                'rating2d' =>  $request->rating2d,
                'rating2e' =>  $request->rating2e,
                'rating2f' =>  $request->rating2f,
                'rating2g' =>  $request->rating2g,
                'rating2h' =>  $request->rating2h,
                'rating2i' =>  $request->rating2i,
                'rating2j' =>  $request->rating2j,
                'rating2k' =>  $request->rating2k,
                'rating2l' =>  $request->rating2l,
                'remarks2a' =>  $request->remarks2a,
                'remarks2b' =>  $request->remarks2b,
                'remarks2c' =>  $request->remarks2c,
                'remarks2d' =>  $request->remarks2d,
                'remarks2e' =>  $request->remarks2e,
                'remarks2f' =>  $request->remarks2f,
                'remarks2g' =>  $request->remarks2g,
                'remarks2h' =>  $request->remarks2h,
                'remarks2i' =>  $request->remarks2i,
                'remarks2j' =>  $request->remarks2j,
                'remarks2k' =>  $request->remarks2k,
                'remarks2l' =>  $request->remarks2l,
                'status' =>  $request->status,
                'user_id' =>  $request->user_id,
            ]); 
        }

        return redirect()->route('nutritionpolicies.index')->with('success', 'Updated successfully!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         //dd($id);
         DB::table('mpbrgynationalPoliciestracking')->where('mellpiprobarangaynationalpolicies_id', $request->id)->delete();
         $npbarangay = MellpiprobarangayNationalpolicies::find($request->id); 
         $npbarangay->delete();
         return redirect()->route('nutritionpolicies.index')->with('success', 'Deleted successfully!');
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
<?php

namespace App\Http\Controllers\Admin\CityMunicipalOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LguProfile;
use Yajra\DataTables\DataTables;
use App\Models\barangaytracking;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\LocationController;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class CMOMellpiLGUProfileBarangayController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function report() {
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $barangay = auth()->user()->barangay;
        $lguProfile = DB::table('lguprofilebarangay')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        
        $data = DB::table('lgubarangayreport')
            ->leftJoin('lguprofilebarangay', 'lgubarangayreport.lguprofilebarangay_id', '=', 'lguprofilebarangay.id')
            ->leftJoin('mplgubrgyvisionmissions', 'lgubarangayreport.mplgubrgyvisionmissions_id', '=', 'mplgubrgyvisionmissions.id')
            ->leftJoin('mellpiprobarangaynationalpolicies', 'lgubarangayreport.mellpiprobarangaynationalpolicies_id', '=', 'mellpiprobarangaynationalpolicies.id')
            ->leftJoin('mplgubrgygovernance', 'lgubarangayreport.mplgubrgygovernance_id', '=', 'mplgubrgygovernance.id')
            ->leftJoin('mplgubrgylncmanagement', 'lgubarangayreport.mplgubrgylncmanagement_id', '=', 'mplgubrgylncmanagement.id')
            ->leftJoin('mplgubrgynutritionservice', 'lgubarangayreport.mplgubrgynutritionservice_id', '=', 'mplgubrgynutritionservice.id')
            ->leftJoin('mplgubrgychangeNS', 'lgubarangayreport.mplgubrgychangeNS_id', '=', 'mplgubrgychangeNS.id')
            ->leftJoin('mplgubrgydiscussionquestion', 'lgubarangayreport.mplgubrgydiscussionquestion_id', '=', 'mplgubrgydiscussionquestion.id')
            ->leftJoin('psgc_municipalities', DB::raw('CAST(lguprofilebarangay.municipal_id AS VARCHAR)'), '=', 'psgc_municipalities.citymun_code')
            ->leftJoin('psgc_cities', DB::raw('CAST(lguprofilebarangay.municipal_id AS VARCHAR)'), '=', 'psgc_cities.citymun_code')
            // ->where('lgubarangayreport.status', 1)
            ->where(function($query) {
                $query->whereNotNull('psgc_municipalities.citymun_code')
                      ->orWhereNotNull('psgc_cities.citymun_code');
            })
            ->select(
                'lgubarangayreport.*',
                'lguprofilebarangay.*',
                'mplgubrgyvisionmissions.*',
                'mellpiprobarangaynationalpolicies.*',
                'mplgubrgygovernance.*',
                'mplgubrgylncmanagement.*',
                'mplgubrgynutritionservice.*',
                'mplgubrgychangeNS.*',
                'mplgubrgydiscussionquestion.*', 
                'psgc_municipalities.name as name',
                'psgc_cities.name as name'
            )
            ->get();
 
 
        return view('CityMunicipalOfficer.LGUReport', ['data' => $data]);
        
    }


    public function fetchReport() {
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal; 
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);


        $data = DB::table('lgubarangayreport')
            ->leftJoin('users', 'lgubarangayreport.user_id', '=', 'users.id')
            ->leftJoin('lguprofilebarangay', 'lgubarangayreport.lguprofilebarangay_id', '=', 'lguprofilebarangay.id')
            ->leftJoin('mplgubrgyvisionmissions', 'lgubarangayreport.mplgubrgyvisionmissions_id', '=', 'mplgubrgyvisionmissions.id')
            ->leftJoin('mellpiprobarangaynationalpolicies', 'lgubarangayreport.mellpiprobarangaynationalpolicies_id', '=', 'mellpiprobarangaynationalpolicies.id')
            ->leftJoin('mplgubrgygovernance', 'lgubarangayreport.mplgubrgygovernance_id', '=', 'mplgubrgygovernance.id')
            ->leftJoin('mplgubrgylncmanagement', 'lgubarangayreport.mplgubrgylncmanagement_id', '=', 'mplgubrgylncmanagement.id')
            ->leftJoin('mplgubrgynutritionservice', 'lgubarangayreport.mplgubrgynutritionservice_id', '=', 'mplgubrgynutritionservice.id')
            ->leftJoin('mplgubrgychangeNS', 'lgubarangayreport.mplgubrgychangeNS_id', '=', 'mplgubrgychangeNS.id')
            ->leftJoin('mplgubrgydiscussionquestion', 'lgubarangayreport.mplgubrgydiscussionquestion_id', '=', 'mplgubrgydiscussionquestion.id')
            ->leftJoin('psgc_municipalities', DB::raw('CAST(lgubarangayreport.municipal_id AS VARCHAR)'), '=', 'psgc_municipalities.citymun_code')
            ->leftJoin('psgc_cities', DB::raw('CAST(lgubarangayreport.municipal_id AS VARCHAR)'), '=', 'psgc_cities.citymun_code')
            // ->where('lgubarangayreport.status', 1)
            ->where(function($query) {
                $query->whereNotNull('psgc_municipalities.citymun_code')
                      ->orWhereNotNull('psgc_cities.citymun_code');
            })
            ->select(
                //'lgubarangayreport.*',
                'users.Firstname as Firstname',
                'users.Middlename as Middlename',
                'users.Lastname as Lastname',
                'lgubarangayreport.dateMonitoring as repdateM',
                'lgubarangayreport.periodCovereda as repperiodC',
                'lgubarangayreport.status as repStatus',
                'lgubarangayreport.count as repCount',
                'lgubarangayreport.status as repStatus', 
          
                'lgubarangayreport.lguprofilebarangay_id as repLGU',
                'lguprofilebarangay.updated_at as lgudate', 

                'lgubarangayreport.mplgubrgyvisionmissions_id as repVM', 
                'mplgubrgyvisionmissions.updated_at as vmdate', 
 
                'lgubarangayreport.mellpiprobarangaynationalpolicies_id as repNP', 
                'mellpiprobarangaynationalpolicies.updated_at as npdate', 

                'lgubarangayreport.mplgubrgygovernance_id as repGov', 
                'mplgubrgygovernance.updated_at as govdate',  


                'lgubarangayreport.mplgubrgylncmanagement_id as repLNC', 
                'mplgubrgylncmanagement.updated_at as lncdate',   
 
                'lgubarangayreport.mplgubrgynutritionservice_id as repNS', 
                'mplgubrgynutritionservice.updated_at as nsdate',   

                'lgubarangayreport.mplgubrgychangeNS_id as repCNS', 
                'mplgubrgychangeNS.updated_at as cnsdate', 

                'lgubarangayreport.mplgubrgydiscussionquestion_id as repDQ', 
                'mplgubrgydiscussionquestion.updated_at as dqdate', 

                'psgc_municipalities.name as name',
                'psgc_cities.name as name',
                'lgubarangayreport.count as count',
            )
            ->get();

                //dd($data); 
            return response()->json(['data' => $data]);
            

    }

    public function index() {
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;  
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $barangay = auth()->user()->barangay_id;
        $lguProfile = DB::table('lguprofilebarangay')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        // get Municipal id and user id 
       
        $data  = DB::table('municipals')
            ->join('lguprofilebarangay', 'municipals.id', '=', 'lguprofilebarangay.municipal_id')
            ->where('lguprofilebarangay.status', 1) 
            ->get();

        return view('CityMunicipalOfficer.MellpiLGUProfileBarangay.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $action = 'create';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
        
        $years = range(date("Y"), 1900);
        return view('CityMunicipalOfficer.lguprofile.create', compact('provinces', 'cities_municipalities', 'barangays', 'years', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $rules = [
            'dateMonitoring' => 'required|date|max:255',
            'periodCovereda' => 'required|string|max:255',

            'totalPopulation' => 'required|integer',
            'householdWater' => 'required|integer',
            'householdToilets' => 'required|integer',
            'dayCareCenter' => 'required|integer',
            'elementary' => 'required|integer',
            'secondarySchool' => 'required|integer',
            'healthStations' => 'required|integer',
            'retailOutlets' => 'required|integer',
            'bakeries' => 'required|integer',
            'markets' => 'required|integer',
            'transportTerminals' => 'required|integer',
            'breastfeeding' => 'required|integer',
            'terrain' => 'required|string|max:255',
            'hazards' => 'required|string|max:255',
            'affectedLGU' => 'required|string|max:255',
            'noHousehold' => 'required|integer',
            'noPuroks' => 'required|integer',

            'populationA' => 'required|string|max:255', 
            'populationB' => 'required|string|max:255',  
            'populationC' => 'required|string|max:255',  
            'populationD' => 'required|string|max:255',  
            'populationE' => 'required|string|max:255',
            'populationF' => 'required|string|max:255',    
            'actualA' => 'required|string|max:255',  
            'actualB' => 'required|string|max:255',  
            'actualC' => 'required|string|max:255',  
            'actualD' => 'required|string|max:255',  
            'actualE' => 'required|string|max:255', 
            'actualF' => 'required|string|max:255',  
            
            'psnormalAAA' => 'required|string|max:255',
            'psunderweightAAA' => 'required|string|max:255',
            'pssevereUnderweightAAA' => 'required|string|max:255',
            'psoverweightAAA' => 'required|string|max:255',

            'psnormalBAA' => 'required|string|max:255',
            'psunderweightBAA' => 'required|string|max:255',
            'pssevereUnderweightBAA' => 'required|string|max:255',
            'psoverweightBAA' => 'required|string|max:255',

            'psnormalCAA' => 'required|string|max:255',
            'psunderweightCAA' => 'required|string|max:255',
            'pssevereUnderweightCAA' => 'required|string|max:255',
            'psoverweightCAA' => 'required|string|max:255',
            
            'psnormalABA' => 'required|string|max:255',
            'pswastedABA' => 'required|string|max:255',
            'psseverelyWastedABA' => 'required|string|max:255',
            'psoverweightABA' => 'required|string|max:255',
            'psobeseABA' => 'required|string|max:255',

            'psnormalBBA' => 'required|string|max:255',
            'pswastedBBA' => 'required|string|max:255',
            'psseverelyWastedBBA' => 'required|string|max:255',
            'psoverweightBBA' => 'required|string|max:255',
            'psobeseBBA' => 'required|string|max:255',

            'psnormalCCA' => 'required|string|max:255',
            'pswastedCCA' => 'required|string|max:255',
            'psseverelyWastedCCA' => 'required|string|max:255',
            'psoverweightCCA' => 'required|string|max:255',
            'psobeseCCA' => 'required|string|max:255',

            'psnormalAAB' => 'required|string|max:255',
            'psstuntedAAB' => 'required|string|max:255',
            'pssevereStuntedAAB' => 'required|string|max:255',
            'pstallAAB' => 'required|string|max:255',

            'psnormalBBB' => 'required|string|max:255',
            'psstuntedBBB' => 'required|string|max:255',
            'pssevereStuntedBBB' => 'required|string|max:255',
            'pstallBBB' => 'required|string|max:255',

            'psnormalCCC' => 'required|string|max:255',
            'psstuntedCCC' => 'required|string|max:255',
            'pssevereStuntedCCC' => 'required|string|max:255',
            'pstallCCC' => 'required|string|max:255',

            'scnormalABA' => 'required|string|max:255',
            'scwastedABA' => 'required|string|max:255',
            'scseverelyWastedABA' => 'required|string|max:255',
            'scoverweightABA' => 'required|string|max:255',
            'scobeseABA' => 'required|string|max:255',

            'scnormalBBA' => 'required|string|max:255',
            'scwastedBBA' => 'required|string|max:255',
            'scseverelyWastedBBA' => 'required|string|max:255',
            'scoverweightBBA' => 'required|string|max:255',
            'scobeseBBA' => 'required|string|max:255',

            'scnormalCCA' => 'required|string|max:255',
            'scwastedCCA' => 'required|string|max:255',
            'scseverelyWastedCCA' => 'required|string|max:255',
            'scoverweightCCA' => 'required|string|max:255',
            'scobeseCCA' => 'required|string|max:255',

            'pwnormalAAA' => 'required|string|max:255',
            'pwnutritionllyatriskAAA' => 'required|string|max:255',
            'pwoverweightAAA' => 'required|string|max:255',
            'pwobeseAAA' => 'required|string|max:255',

            'pwnormalBAA' => 'required|string|max:255',
            'pwnutritionllyatriskBAA' => 'required|string|max:255',
            'pwoverweightBAA' => 'required|string|max:255',
            'pwobeseBAA' => 'required|string|max:255',

            'pwnormalCAA' => 'required|string|max:255',
            'pwnutritionllyatriskCAA' => 'required|string|max:255',
            'pwoverweightCAA' => 'required|string|max:255',
            'pwobeseCAA' => 'required|string|max:255',

            'landAreaResidential' => 'required|integer|min:1|max:1000000',
            'remarksResidential' => 'required|string|max:255',

            'landAreaCommercial' => 'required|integer|min:1|max:1000000',
            'remarksCommercial' => 'required|string|max:255',

            'landAreaIndustrial' => 'required|integer|min:1|max:1000000',
            'remarksIndustrial' => 'required|string|max:255',

            'landAreaAgricultural' => 'required|integer|min:1|max:1000000',
            'remarksAgricultural' => 'required|string|max:255',

            'landAreaFLMLNP' => 'required|integer|min:1|max:1000000',
            'remarksFLMLNP' => 'required|string|max:255',

            'Isource' => 'required|string|max:255',
            'Iavailreceived' => 'required|string|max:255',
            'Idatereceived' => 'required|date ',
            'Ivolumepax' => 'required|integer|min:1|max:100000',
            'Iremarks' => 'required|string|max:255',

            'IIAsource' => 'required|string|max:255',
            'IIAavailreceived' => 'required|string|max:255',
            'IIAdatereceived' => 'required|date ',
            'IIAvolumepax' => 'required|integer|min:1|max:100000',
            'IIAremarks' => 'required|string|max:255',

            'IIBsource' => 'required|string|max:255',
            'IIBavailreceived' => 'required|string|max:255',
            'IIBdatereceived' => 'required|date ',
            'IIBvolumepax' => 'required|integer|min:1|max:100000',
            'IIBremarks' => 'required|string|max:255',

            'IIIAsource' => 'required|string|max:255',
            'IIIAavailreceived' => 'required|string|max:255',
            'IIIAdatereceived' => 'required|date',
            'IIIAvolumepax' => 'required|integer|min:1|max:100000',
            'IIIAremarks' => 'required|string|max:255',

            'IIIBsource' => 'required|string|max:255',
            'IIIBavailreceived' => 'required|string|max:255',
            'IIIBdatereceived' => 'required|date',
            'IIIBvolumepax' => 'required|integer|min:1|max:100000',
            'IIIBremarks' => 'required|string|max:255',

            'IIICsource' => 'required|string|max:255',
            'IIICavailreceived' => 'required|string|max:255',
            'IIICdatereceived' => 'required|date',
            'IIICvolumepax' => 'required|integer|min:1|max:100000',
            'IIICremarks' => 'required|string|max:255',

            'IIIDsource' => 'required|string|max:255',
            'IIIDavailreceived' => 'required|string|max:255',
            'IIIDdatereceived' => 'required|date ',
            'IIIDvolumepax' => 'required|integer|min:1|max:100000',
            'IIIDremarks' => 'required|string|max:255',

            'IIIEsource' => 'required|string|max:255',
            'IIIEavailreceived' => 'required|string|max:255',
            'IIIEdatereceived' => 'required|date ',
            'IIIEvolumepax' => 'required|integer|min:1|max:100000',
            'IIIEremarks' => 'required|string|max:255',

            'IIIFsource' => 'required|string|max:255',
            'IIIFavailreceived' => 'required|string|max:255',
            'IIIFdatereceived' => 'required|date ',
            'IIIFvolumepax' => 'required|integer|min:1|max:100000',
            'IIIFremarks' => 'required|string|max:255',

            'IVAsource' => 'required|string|max:255',
            'IVAavailreceived' => 'required|string|max:255',
            'IVAdatereceived' => 'required|date ',
            'IVAvolumepax' => 'required|integer|min:1|max:100000',
            'IVAremarks' => 'required|string|max:255',

            'VAsource' => 'required|string|max:255',
            'VAavailreceived' => 'required|string|max:255',
            'VAdatereceived' => 'required|date ',
            'VAvolumepax' => 'required|integer|min:1|max:100000',
            'VAremarks' => 'required|string|max:255',

            'status' => 'required|integer',
            'barangay_id' => 'required',
            'municipal_id' => 'required',
            'province_id' => 'required',
            'region_id' => 'required',
            'user_id' => 'required',
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
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()->with('error', 'Something went wrong! Please try again.');
        }

            $LGUProfileBarangay = LguProfile::create([
                'dateMonitoring'=> $request->dateMonitoring,
                'periodCovereda' => $request->periodCovereda,
                'totalPopulation' => $request->totalPopulation,
                'householdWater' => $request->householdWater, 
                'householdToilets' => $request->householdToilets, 
                'dayCareCenter' => $request->dayCareCenter, 
                'elementary' => $request->elementary, 
                'secondarySchool' => $request->secondarySchool, 
                'healthStations' => $request->healthStations, 
                'retailOutlets' => $request->retailOutlets, 
                'bakeries' => $request->bakeries, 
                'markets' => $request->markets, 
                'transportTerminals' => $request->transportTerminals, 
                'breastfeeding' => $request->breastfeeding,
                'terrain' => $request->terrain,  
                'hazards' => $request->hazards, 
                'affectedLGU' => $request->affectedLGU, 
                'noHousehold' => $request->noHousehold, 
                'noPuroks' => $request->noPuroks, 
                'populationA' => $request->populationA,   
                'populationB' => $request->populationB,   
                'populationC' => $request->populationC,   
                'populationD' => $request->populationD,   
                'populationE' => $request->populationE,   
                'populationF' => $request->populationF,
                'actualA' => $request->actualA,  
                'actualB' => $request->actualB,   
                'actualC' => $request->actualC,   
                'actualD' => $request->actualD,   
                'actualE' => $request->actualE,   
                'actualF' => $request->actualF,  

                // overweight (%) overweight
                'psnormalAAA' => $request->psnormalAAA, 
                'psunderweightAAA' => $request->psunderweightAAA, 
                'pssevereUnderweightAAA' => $request->pssevereUnderweightAAA, 
                'psoverweightAAA' => $request->psoverweightAAA, 

                'psnormalBAA' => $request->psnormalBAA, 
                'psunderweightBAA' => $request->psunderweightBAA, 
                'pssevereUnderweightBAA' => $request->pssevereUnderweightBAA, 
                'psoverweightBAA' => $request->psoverweightBAA, 

                'psnormalCAA' => $request->psnormalCAA, 
                'psunderweightCAA' => $request->psunderweightCAA,
                'pssevereUnderweightCAA' => $request->pssevereUnderweightCAA, 
                'psoverweightCAA' => $request->psoverweightCAA, 

                // overweight (%) obese
                'psnormalABA' => $request->psnormalABA, 
                'pswastedABA' => $request->pswastedABA, 
                'psseverelyWastedABA' => $request->psseverelyWastedABA, 
                'psoverweightABA' => $request->psoverweightABA, 
                'psobeseABA' => $request->psobeseABA, 

                'psnormalBBA' => $request->psnormalBBA, 
                'pswastedBBA' => $request->pswastedBBA, 
                'psseverelyWastedBBA' => $request->psseverelyWastedBBA, 
                'psoverweightBBA' => $request->psoverweightBBA, 
                'psobeseBBA' => $request->psobeseBBA, 

                'psnormalCCA' => $request->psnormalCCA, 
                'pswastedCCA' => $request->pswastedCCA, 
                'psseverelyWastedCCA' => $request->psseverelyWastedCCA, 
                'psoverweightCCA' => $request->psoverweightCCA, 
                'psobeseCCA' => $request->psobeseCCA, 

                // overweight (%) tall
                'psnormalAAB' => $request->psnormalAAB, 
                'psstuntedAAB' => $request->psstuntedAAB, 
                'pssevereStuntedAAB' => $request->pssevereStuntedAAB, 
                'pstallAAB' => $request->pstallAAB, 

                'psnormalBBB' => $request->psnormalBBB, 
                'psstuntedBBB' => $request->psstuntedBBB, 
                'pssevereStuntedBBB' => $request->pssevereStuntedBBB, 
                'pstallBBB' => $request->pstallBBB, 

                'psnormalCCC' => $request->psnormalCCC, 
                'psstuntedCCC' => $request->psstuntedCCC, 
                'pssevereStuntedCCC' => $request->pssevereStuntedCCC, 
                'pstallCCC' => $request->pstallCCC, 

                // overweight (%) obese School Children
                'scnormalABA' => $request->scnormalABA, 
                'scwastedABA' => $request->scwastedABA, 
                'scseverelyWastedABA' => $request->scseverelyWastedABA, 
                'scoverweightABA' => $request->scoverweightABA, 
                'scobeseABA' => $request->scobeseABA, 

                'scnormalBBA' => $request->scnormalBBA, 
                'scwastedBBA' => $request->scwastedABA, 
                'scseverelyWastedBBA' => $request->scseverelyWastedBBA, 
                'scoverweightBBA' => $request->scoverweightBBA, 
                'scobeseBBA' => $request->scobeseBBA, 

                'scnormalCCA' => $request->scnormalCCA, 
                'scwastedCCA' => $request->scwastedCCA, 
                'scseverelyWastedCCA' => $request->scseverelyWastedCCA, 
                'scoverweightCCA' => $request->scoverweightCCA, 
                'scobeseCCA' => $request->scobeseCCA,  

                // overweight (%) obese Pregnant Woman
                'pwnormalAAA' => $request->pwnormalAAA, 
                'pwnutritionllyatriskAAA' => $request->pwnutritionllyatriskAAA, 
                'pwoverweightAAA' => $request->pwoverweightAAA, 
                'pwobeseAAA' => $request->pwobeseAAA, 

                'pwnormalBAA' => $request->pwnormalBAA, 
                'pwnutritionllyatriskBAA' => $request->pwnutritionllyatriskBAA, 
                'pwoverweightBAA' => $request->pwoverweightBAA, 
                'pwobeseBAA' => $request->pwobeseBAA, 

                'pwnormalCAA' => $request->pwnormalCAA, 
                'pwnutritionllyatriskCAA' => $request->pwnutritionllyatriskCAA, 
                'pwoverweightCAA' => $request->pwoverweightCAA, 
                'pwobeseCAA' => $request->pwobeseCAA, 

                'landAreaResidential' => $request->landAreaResidential, 
                'remarksResidential' => $request->remarksResidential, 

                'landAreaCommercial' => $request->landAreaCommercial, 
                'remarksCommercial' => $request->remarksCommercial, 

                'landAreaIndustrial' => $request->landAreaIndustrial, 
                'remarksIndustrial' => $request->remarksIndustrial, 

                'landAreaAgricultural' => $request->landAreaAgricultural, 
                'remarksAgricultural' => $request->remarksAgricultural, 

                'landAreaFLMLNP' => $request->landAreaFLMLNP, 
                'remarksFLMLNP' => $request->remarksFLMLNP, 

                'Isource' => $request->Isource, 
                'Iavailreceived' => $request->Iavailreceived, 
                'Idatereceived' => $request->Idatereceived, 
                'Ivolumepax' => $request->Ivolumepax, 
                'Iremarks' => $request->Iremarks, 

                'IIAsource' => $request->IIAsource, 
                'IIAavailreceived' => $request->IIAavailreceived, 
                'IIAdatereceived' => $request->IIAdatereceived, 
                'IIAvolumepax' => $request->IIAvolumepax, 
                'IIAremarks' => $request->IIAremarks, 

                'IIBsource' => $request->IIBsource, 
                'IIBavailreceived' => $request->IIBavailreceived, 
                'IIBdatereceived' => $request->IIBdatereceived, 
                'IIBvolumepax' => $request->IIBvolumepax, 
                'IIBremarks' => $request->IIBremarks, 

                'IIIAsource' => $request->IIIAsource, 
                'IIIAavailreceived' => $request->IIIAavailreceived, 
                'IIIAdatereceived' => $request->IIIAdatereceived, 
                'IIIAvolumepax' => $request->IIIAvolumepax, 
                'IIIAremarks' => $request->IIIAremarks, 

                'IIIBsource' => $request->IIIBsource, 
                'IIIBavailreceived' => $request->IIIBavailreceived, 
                'IIIBdatereceived' => $request->IIIBdatereceived, 
                'IIIBvolumepax' => $request->IIIBvolumepax, 
                'IIIBremarks' => $request->IIIBremarks, 

                'IIICsource' => $request->IIICsource, 
                'IIICavailreceived' => $request->IIICavailreceived, 
                'IIICdatereceived' => $request->IIICdatereceived, 
                'IIICvolumepax' => $request->IIICvolumepax, 
                'IIICremarks' => $request->IIICremarks, 

                'IIIDsource' => $request->IIIDsource, 
                'IIIDavailreceived' => $request->IIIDavailreceived, 
                'IIIDdatereceived' => $request->IIIDdatereceived, 
                'IIIDvolumepax' => $request->IIIDvolumepax, 
                'IIIDremarks' => $request->IIIDremarks, 

                'IIIEsource' => $request->IIIEsource, 
                'IIIEavailreceived' => $request->IIIEavailreceived, 
                'IIIEdatereceived' => $request->IIIEdatereceived, 
                'IIIEvolumepax' => $request->IIIEvolumepax, 
                'IIIEremarks' => $request->IIIEremarks, 

                'IIIFsource' => $request->IIIFsource, 
                'IIIFavailreceived' => $request->IIIFavailreceived, 
                'IIIFdatereceived' => $request->IIIFdatereceived, 
                'IIIFvolumepax' => $request->IIIFvolumepax, 
                'IIIFremarks' => $request->IIIFremarks, 

                'IVAsource' => $request->IVAsource, 
                'IVAavailreceived' => $request->IVAavailreceived, 
                'IVAdatereceived' => $request->IVAdatereceived, 
                'IVAvolumepax' => $request->IVAvolumepax, 
                'IVAremarks' => $request->IVAremarks, 

                'VAsource' => $request->VAsource, 
                'VAavailreceived' => $request->VAavailreceived, 
                'VAdatereceived' => $request->VAdatereceived, 
                'VAvolumepax' => $request->VAvolumepax, 
                'VAremarks' => $request->VAremarks, 

                'status' => $request->status, 

                'barangay_id' =>$request->barangay_id,
                'municipal_id' => $request->municipal_id, 
                'province_id' => $request->province_id, 
                'region_id' => $request->region_id, 
                'user_id' => $request->user_id,  

            ]);

           barangaytracking::create([
                'lguprofilebarangay_id' => $LGUProfileBarangay->id,
                'status' => $request->status,
                'barangay_id' => auth()->user()->barangay,
                'municipal_id' => auth()->user()->city_municipal,
                'user_id' => auth()->user()->id,
            ]);


    return redirect('CityMunicipalOfficer/lguprofile')->with('success', 'Data created successfullySuccessfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,string $id)
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

        $row = DB::table('lguprofilebarangay')->where('id', $id)->first();

        return view('CityMunicipalOfficer.MellpiLGUProfileBarangay.show',compact('row','provinces', 'cities_municipalities', 'barangays', 'years', 'action'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

        //dd($request->id);
        $row = DB::table('lguprofilebarangay')->where('user_id', auth()->user()->id)->first();
        //dd($lguProfile);

        return view('CityMunicipalOfficer.lguprofile.edit',compact('row','provinces', 'cities_municipalities', 'barangays', 'years', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
 
     public function update( Request $request , $id ) {
        dd($request->status);
      $rules = [
          'dateMonitoring' => 'required|date|max:255',
          'periodCovereda' => 'required|string|max:255',

          'totalPopulation' => 'required|integer',
          'householdWater' => 'required|integer',
          'householdToilets' => 'required|integer',
          'dayCareCenter' => 'required|integer',
          'elementary' => 'required|integer',
          'secondarySchool' => 'required|integer',
          'healthStations' => 'required|integer',
          'retailOutlets' => 'required|integer',
          'bakeries' => 'required|integer',
          'markets' => 'required|integer',
          'transportTerminals' => 'required|integer',
          'breastfeeding' => 'required|integer',
          'terrain' => 'required|string|max:255',
          'hazards' => 'required|string|max:255',
          'affectedLGU' => 'required|string|max:255',
          'noHousehold' => 'required|integer',
          'noPuroks' => 'required|integer',

          'populationA' => 'required|string|max:255', 
          'populationB' => 'required|string|max:255',  
          'populationC' => 'required|string|max:255',  
          'populationD' => 'required|string|max:255',  
          'populationE' => 'required|string|max:255',
          'populationF' => 'required|string|max:255',    
          'actualA' => 'required|string|max:255',  
          'actualB' => 'required|string|max:255',  
          'actualC' => 'required|string|max:255',  
          'actualD' => 'required|string|max:255',  
          'actualE' => 'required|string|max:255', 
          'actualF' => 'required|string|max:255',  
          
          'psnormalAAA' => 'required|string|max:255',
          'psunderweightAAA' => 'required|string|max:255',
          'pssevereUnderweightAAA' => 'required|string|max:255',
          'psoverweightAAA' => 'required|string|max:255',

          'psnormalBAA' => 'required|string|max:255',
          'psunderweightBAA' => 'required|string|max:255',
          'pssevereUnderweightBAA' => 'required|string|max:255',
          'psoverweightBAA' => 'required|string|max:255',

          'psnormalCAA' => 'required|string|max:255',
          'psunderweightCAA' => 'required|string|max:255',
          'pssevereUnderweightCAA' => 'required|string|max:255',
          'psoverweightCAA' => 'required|string|max:255',
          
          'psnormalABA' => 'required|string|max:255',
          'pswastedABA' => 'required|string|max:255',
          'psseverelyWastedABA' => 'required|string|max:255',
          'psoverweightABA' => 'required|string|max:255',
          'psobeseABA' => 'required|string|max:255',

          'psnormalBBA' => 'required|string|max:255',
          'pswastedBBA' => 'required|string|max:255',
          'psseverelyWastedBBA' => 'required|string|max:255',
          'psoverweightBBA' => 'required|string|max:255',
          'psobeseBBA' => 'required|string|max:255',

          'psnormalCCA' => 'required|string|max:255',
          'pswastedCCA' => 'required|string|max:255',
          'psseverelyWastedCCA' => 'required|string|max:255',
          'psoverweightCCA' => 'required|string|max:255',
          'psobeseCCA' => 'required|string|max:255',

          'psnormalAAB' => 'required|string|max:255',
          'psstuntedAAB' => 'required|string|max:255',
          'pssevereStuntedAAB' => 'required|string|max:255',
          'pstallAAB' => 'required|string|max:255',

          'psnormalBBB' => 'required|string|max:255',
          'psstuntedBBB' => 'required|string|max:255',
          'pssevereStuntedBBB' => 'required|string|max:255',
          'pstallBBB' => 'required|string|max:255',

          'psnormalCCC' => 'required|string|max:255',
          'psstuntedCCC' => 'required|string|max:255',
          'pssevereStuntedCCC' => 'required|string|max:255',
          'pstallCCC' => 'required|string|max:255',

          'scnormalABA' => 'required|string|max:255',
          'scwastedABA' => 'required|string|max:255',
          'scseverelyWastedABA' => 'required|string|max:255',
          'scoverweightABA' => 'required|string|max:255',
          'scobeseABA' => 'required|string|max:255',

          'scnormalBBA' => 'required|string|max:255',
          'scwastedBBA' => 'required|string|max:255',
          'scseverelyWastedBBA' => 'required|string|max:255',
          'scoverweightBBA' => 'required|string|max:255',
          'scobeseBBA' => 'required|string|max:255',

          'scnormalCCA' => 'required|string|max:255',
          'scwastedCCA' => 'required|string|max:255',
          'scseverelyWastedCCA' => 'required|string|max:255',
          'scoverweightCCA' => 'required|string|max:255',
          'scobeseCCA' => 'required|string|max:255',

          'pwnormalAAA' => 'required|string|max:255',
          'pwnutritionllyatriskAAA' => 'required|string|max:255',
          'pwoverweightAAA' => 'required|string|max:255',
          'pwobeseAAA' => 'required|string|max:255',

          'pwnormalBAA' => 'required|string|max:255',
          'pwnutritionllyatriskBAA' => 'required|string|max:255',
          'pwoverweightBAA' => 'required|string|max:255',
          'pwobeseBAA' => 'required|string|max:255',

          'pwnormalCAA' => 'required|string|max:255',
          'pwnutritionllyatriskCAA' => 'required|string|max:255',
          'pwoverweightCAA' => 'required|string|max:255',
          'pwobeseCAA' => 'required|string|max:255',

          'landAreaResidential' => 'required|integer|min:1|max:1000000',
          'remarksResidential' => 'required|string|max:255',

          'landAreaCommercial' => 'required|integer|min:1|max:1000000',
          'remarksCommercial' => 'required|string|max:255',

          'landAreaIndustrial' => 'required|integer|min:1|max:1000000',
          'remarksIndustrial' => 'required|string|max:255',

          'landAreaAgricultural' => 'required|integer|min:1|max:1000000',
          'remarksAgricultural' => 'required|string|max:255',

          'landAreaFLMLNP' => 'required|integer|min:1|max:1000000',
          'remarksFLMLNP' => 'required|string|max:255',

          'Isource' => 'required|string|max:255',
          'Iavailreceived' => 'required|string|max:255',
          'Idatereceived' => 'required|date ',
          'Ivolumepax' => 'required|integer|min:1|max:100000',
          'Iremarks' => 'required|string|max:255',

          'IIAsource' => 'required|string|max:255',
          'IIAavailreceived' => 'required|string|max:255',
          'IIAdatereceived' => 'required|date ',
          'IIAvolumepax' => 'required|integer|min:1|max:100000',
          'IIAremarks' => 'required|string|max:255',

          'IIBsource' => 'required|string|max:255',
          'IIBavailreceived' => 'required|string|max:255',
          'IIBdatereceived' => 'required|date ',
          'IIBvolumepax' => 'required|integer|min:1|max:100000',
          'IIBremarks' => 'required|string|max:255',

          'IIIAsource' => 'required|string|max:255',
          'IIIAavailreceived' => 'required|string|max:255',
          'IIIAdatereceived' => 'required|date',
          'IIIAvolumepax' => 'required|integer|min:1|max:100000',
          'IIIAremarks' => 'required|string|max:255',

          'IIIBsource' => 'required|string|max:255',
          'IIIBavailreceived' => 'required|string|max:255',
          'IIIBdatereceived' => 'required|date',
          'IIIBvolumepax' => 'required|integer|min:1|max:100000',
          'IIIBremarks' => 'required|string|max:255',

          'IIICsource' => 'required|string|max:255',
          'IIICavailreceived' => 'required|string|max:255',
          'IIICdatereceived' => 'required|date',
          'IIICvolumepax' => 'required|integer|min:1|max:100000',
          'IIICremarks' => 'required|string|max:255',

          'IIIDsource' => 'required|string|max:255',
          'IIIDavailreceived' => 'required|string|max:255',
          'IIIDdatereceived' => 'required|date ',
          'IIIDvolumepax' => 'required|integer|min:1|max:100000',
          'IIIDremarks' => 'required|string|max:255',

          'IIIEsource' => 'required|string|max:255',
          'IIIEavailreceived' => 'required|string|max:255',
          'IIIEdatereceived' => 'required|date ',
          'IIIEvolumepax' => 'required|integer|min:1|max:100000',
          'IIIEremarks' => 'required|string|max:255',

          'IIIFsource' => 'required|string|max:255',
          'IIIFavailreceived' => 'required|string|max:255',
          'IIIFdatereceived' => 'required|date ',
          'IIIFvolumepax' => 'required|integer|min:1|max:100000',
          'IIIFremarks' => 'required|string|max:255',

          'IVAsource' => 'required|string|max:255',
          'IVAavailreceived' => 'required|string|max:255',
          'IVAdatereceived' => 'required|date ',
          'IVAvolumepax' => 'required|integer|min:1|max:100000',
          'IVAremarks' => 'required|string|max:255',

          'VAsource' => 'required|string|max:255',
          'VAavailreceived' => 'required|string|max:255',
          'VAdatereceived' => 'required|date ',
          'VAvolumepax' => 'required|integer|min:1|max:100000',
          'VAremarks' => 'required|string|max:255',

          'status' => 'required|integer',
          'barangay_id' => 'required',
          'municipal_id' => 'required',
          'province_id' => 'required',
          'region_id' => 'required',
          'user_id' => 'required',
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
          return response()->json([
              'errors' => $validator->errors()
          ], 422);
      }else {
          $lguprofile = LguProfile::find($id);


          $lguprofile->update([
              'dateMonitoring'=> $request->dateMonitoring,
               'periodCovereda' => $request->periodCovereda,
               'totalPopulation' => $request->totalPopulation,
               'householdWater' => $request->householdWater, 
               'householdToilets' => $request->householdToilets, 
               'dayCareCenter' => $request->dayCareCenter, 
               'elementary' => $request->elementary, 
               'secondarySchool' => $request->secondarySchool, 
               'healthStations' => $request->healthStations, 
               'retailOutlets' => $request->retailOutlets, 
               'bakeries' => $request->bakeries, 
               'markets' => $request->markets, 
               'transportTerminals' => $request->transportTerminals, 
               'breastfeeding' => $request->breastfeeding,
               'terrain' => $request->terrain,  
               'hazards' => $request->hazards, 
               'affectedLGU' => $request->affectedLGU, 
               'noHousehold' => $request->noHousehold, 
               'noPuroks' => $request->noPuroks, 
               'populationA' => $request->populationA,   
               'populationB' => $request->populationB,   
               'populationC' => $request->populationC,   
               'populationD' => $request->populationD,   
               'populationE' => $request->populationE,   
               'populationF' => $request->populationF,
               'actualA' => $request->actualA,  
               'actualB' => $request->actualB,   
               'actualC' => $request->actualC,   
               'actualD' => $request->actualD,   
               'actualE' => $request->actualE,   
               'actualF' => $request->actualF,  

               // overweight (%) overweight
               'psnormalAAA' => $request->psnormalAAA, 
               'psunderweightAAA' => $request->psunderweightAAA, 
               'pssevereUnderweightAAA' => $request->pssevereUnderweightAAA, 
               'psoverweightAAA' => $request->psoverweightAAA, 

               'psnormalBAA' => $request->psnormalBAA, 
               'psunderweightBAA' => $request->psunderweightBAA, 
               'pssevereUnderweightBAA' => $request->pssevereUnderweightBAA, 
               'psoverweightBAA' => $request->psoverweightBAA, 

               'psnormalCAA' => $request->psnormalCAA, 
               'psunderweightCAA' => $request->psunderweightCAA,
               'pssevereUnderweightCAA' => $request->pssevereUnderweightCAA, 
               'psoverweightCAA' => $request->psoverweightCAA, 

               // overweight (%) obese
               'psnormalABA' => $request->psnormalABA, 
               'pswastedABA' => $request->pswastedABA, 
               'psseverelyWastedABA' => $request->psseverelyWastedABA, 
               'psoverweightABA' => $request->psoverweightABA, 
               'psobeseABA' => $request->psobeseABA, 

               'psnormalBBA' => $request->psnormalBBA, 
               'pswastedBBA' => $request->pswastedBBA, 
               'psseverelyWastedBBA' => $request->psseverelyWastedBBA, 
               'psoverweightBBA' => $request->psoverweightBBA, 
               'psobeseBBA' => $request->psobeseBBA, 

               'psnormalCCA' => $request->psnormalCCA, 
               'pswastedCCA' => $request->pswastedCCA, 
               'psseverelyWastedCCA' => $request->psseverelyWastedCCA, 
               'psoverweightCCA' => $request->psoverweightCCA, 
               'psobeseCCA' => $request->psobeseCCA, 

               // overweight (%) tall
               'psnormalAAB' => $request->psnormalAAB, 
               'psstuntedAAB' => $request->psstuntedAAB, 
               'pssevereStuntedAAB' => $request->pssevereStuntedAAB, 
               'pstallAAB' => $request->pstallAAB, 

               'psnormalBBB' => $request->psnormalBBB, 
               'psstuntedBBB' => $request->psstuntedBBB, 
               'pssevereStuntedBBB' => $request->pssevereStuntedBBB, 
               'pstallBBB' => $request->pstallBBB, 

               'psnormalCCC' => $request->psnormalCCC, 
               'psstuntedCCC' => $request->psstuntedCCC, 
               'pssevereStuntedCCC' => $request->pssevereStuntedCCC, 
               'pstallCCC' => $request->pstallCCC, 

               // overweight (%) obese School Children
               'scnormalABA' => $request->scnormalABA, 
               'scwastedABA' => $request->scwastedABA, 
               'scseverelyWastedABA' => $request->scseverelyWastedABA, 
               'scoverweightABA' => $request->scoverweightABA, 
               'scobeseABA' => $request->scobeseABA, 

               'scnormalBBA' => $request->scnormalBBA, 
               'scwastedBBA' => $request->scwastedABA, 
               'scseverelyWastedBBA' => $request->scseverelyWastedBBA, 
               'scoverweightBBA' => $request->scoverweightBBA, 
               'scobeseBBA' => $request->scobeseBBA, 

               'scnormalCCA' => $request->scnormalCCA, 
               'scwastedCCA' => $request->scwastedCCA, 
               'scseverelyWastedCCA' => $request->scseverelyWastedCCA, 
               'scoverweightCCA' => $request->scoverweightCCA, 
               'scobeseCCA' => $request->scobeseCCA,  

               // overweight (%) obese Pregnant Woman
               'pwnormalAAA' => $request->pwnormalAAA, 
               'pwnutritionllyatriskAAA' => $request->pwnutritionllyatriskAAA, 
               'pwoverweightAAA' => $request->pwoverweightAAA, 
               'pwobeseAAA' => $request->pwobeseAAA, 

               'pwnormalBAA' => $request->pwnormalBAA, 
               'pwnutritionllyatriskBAA' => $request->pwnutritionllyatriskBAA, 
               'pwoverweightBAA' => $request->pwoverweightBAA, 
               'pwobeseBAA' => $request->pwobeseBAA, 

               'pwnormalCAA' => $request->pwnormalCAA, 
               'pwnutritionllyatriskCAA' => $request->pwnutritionllyatriskCAA, 
               'pwoverweightCAA' => $request->pwoverweightCAA, 
               'pwobeseCAA' => $request->pwobeseCAA, 

               'landAreaResidential' => $request->landAreaResidential, 
               'remarksResidential' => $request->remarksResidential, 

               'landAreaCommercial' => $request->landAreaCommercial, 
               'remarksCommercial' => $request->remarksCommercial, 

               'landAreaIndustrial' => $request->landAreaIndustrial, 
               'remarksIndustrial' => $request->remarksIndustrial, 

               'landAreaAgricultural' => $request->landAreaAgricultural, 
               'remarksAgricultural' => $request->remarksAgricultural, 

               'landAreaFLMLNP' => $request->landAreaFLMLNP, 
               'remarksFLMLNP' => $request->remarksFLMLNP, 

               'Isource' => $request->Isource, 
               'Iavailreceived' => $request->Iavailreceived, 
               'Idatereceived' => $request->Idatereceived, 
               'Ivolumepax' => $request->Ivolumepax, 
               'Iremarks' => $request->Iremarks, 

               'IIAsource' => $request->IIAsource, 
               'IIAavailreceived' => $request->IIAavailreceived, 
               'IIAdatereceived' => $request->IIAdatereceived, 
               'IIAvolumepax' => $request->IIAvolumepax, 
               'IIAremarks' => $request->IIAremarks, 

               'IIBsource' => $request->IIBsource, 
               'IIBavailreceived' => $request->IIBavailreceived, 
               'IIBdatereceived' => $request->IIBdatereceived, 
               'IIBvolumepax' => $request->IIBvolumepax, 
               'IIBremarks' => $request->IIBremarks, 

               'IIIAsource' => $request->IIIAsource, 
               'IIIAavailreceived' => $request->IIIAavailreceived, 
               'IIIAdatereceived' => $request->IIIAdatereceived, 
               'IIIAvolumepax' => $request->IIIAvolumepax, 
               'IIIAremarks' => $request->IIIAremarks, 

               'IIIBsource' => $request->IIIBsource, 
               'IIIBavailreceived' => $request->IIIBavailreceived, 
               'IIIBdatereceived' => $request->IIIBdatereceived, 
               'IIIBvolumepax' => $request->IIIBvolumepax, 
               'IIIBremarks' => $request->IIIBremarks, 

               'IIICsource' => $request->IIICsource, 
               'IIICavailreceived' => $request->IIICavailreceived, 
               'IIICdatereceived' => $request->IIICdatereceived, 
               'IIICvolumepax' => $request->IIICvolumepax, 
               'IIICremarks' => $request->IIICremarks, 

               'IIIDsource' => $request->IIIDsource, 
               'IIIDavailreceived' => $request->IIIDavailreceived, 
               'IIIDdatereceived' => $request->IIIDdatereceived, 
               'IIIDvolumepax' => $request->IIIDvolumepax, 
               'IIIDremarks' => $request->IIIDremarks, 

               'IIIEsource' => $request->IIIEsource, 
               'IIIEavailreceived' => $request->IIIEavailreceived, 
               'IIIEdatereceived' => $request->IIIEdatereceived, 
               'IIIEvolumepax' => $request->IIIEvolumepax, 
               'IIIEremarks' => $request->IIIEremarks, 

               'IIIFsource' => $request->IIIFsource, 
               'IIIFavailreceived' => $request->IIIFavailreceived, 
               'IIIFdatereceived' => $request->IIIFdatereceived, 
               'IIIFvolumepax' => $request->IIIFvolumepax, 
               'IIIFremarks' => $request->IIIFremarks, 

               'IVAsource' => $request->IVAsource, 
               'IVAavailreceived' => $request->IVAavailreceived, 
               'IVAdatereceived' => $request->IVAdatereceived, 
               'IVAvolumepax' => $request->IVAvolumepax, 
               'IVAremarks' => $request->IVAremarks, 

               'VAsource' => $request->VAsource, 
               'VAavailreceived' => $request->VAavailreceived, 
               'VAdatereceived' => $request->VAdatereceived, 
               'VAvolumepax' => $request->VAvolumepax, 
               'VAremarks' => $request->VAremarks, 

               'status' => $request->status, 

               'barangay_id' =>$request->barangay_id,
               'municipal_id' => $request->municipal_id, 
               'province_id' => $request->province_id, 
               'region_id' => $request->region_id, 
               'user_id' => $request->user_id,  
          ]);
      }
      
      return redirect('CityMunicipalOfficer/lguprofile')->with('success', 'Data updated successfullySuccessfully!');
  }

 public function destroy(Request $request, $id ) {
      
      DB::table('barangaytracking')->where('lguprofilebarangay_id', $request->id)->delete();
      $lguprofile = LguProfile::find($id); 
      $lguprofile->delete();
     

      return redirect()->route('CMOLGUprofile.index')->with('success', 'Data updated Successfully!');
 }
  

 public function Approved(Request $request ) {
    //dd($request->id);
   
    $lguprofile = LguProfile::find($request->id); 

    if($lguprofile){
        $lguprofile->update(['status' => '0']);
        DB::table('barangaytracking')->where('lguprofilebarangay_id', $lguprofile->id)->update(['status' => '0']);
    }
  
    return redirect()->route('CMOLGUprofile.index')->with('success', 'Data updated Successfully!');
 }

 public function approvedReport(Request $request) {
    $dataLGU = LguProfile::find($request->id); 

    // Check if the record exists of DateMonitoring and periodCovered
    $record =  DB::table('lgubarangayreport')
                ->where(function ($query) use ($dataLGU) {
                    $query->where('dateMonitoring',  $dataLGU['dateMonitoring'])
                        ->orWhere('periodCovereda', $dataLGU['periodCovereda']);
                        // ->orWhere('barangay_id', $dataLGU['barangay_id'])
                        // ->orWhere('municipal_id', $dataLGU['municipal_id']);
                })->exists();


    if ($record) {
        $findData = DB::table('lgubarangayreport')->whereNotNull('lguprofilebarangay_id')->whereNotNull('lguapproveddate')->exists();

        if($findData) {
            DB::table('lgubarangayreport')
            ->where('id', $request->id)
            ->update([
                'lguprofilebarangay_id' => $dataLGU['id'],
                'lguapproveddate' => $dataLGU['updated_at'], 
            ]);

            //  need if-else return notification and after this if statement
        }  
     

    } else { 
        // Create a new record if none exists foir LGU form only
        DB::table('lgubarangayreport')->insert([ 
            'dateMonitoring' => $dataLGU['dateMonitoring'],
            'periodCovereda' => $dataLGU['periodCovereda'], 
            'barangay_id' => $dataLGU['barangay_id'], 
            'municipal_id' => $dataLGU['municipal_id'], 
            'lguprofilebarangay_id' =>  $dataLGU['id'],
            'lguapproveddate' => $dataLGU['updated_at'], 
            'user_id' => $dataLGU['user_id'],   
            'status' => $dataLGU['status'],   
            'count' => 1,  
        ]);
        $dataLGU->update(['status' => '0']);
        DB::table('barangaytracking')->where('lguprofilebarangay_id', $dataLGU->id)->update(['status' => '0']);
    }
  
 
    return redirect()->route('CMOLGUprofile.index')->with('success', 'Data updated Successfully!');
    
}


 public function Declined(Request $request ) {
        //dd($request->id);  

        $lguprofile = LguProfile::find($request->id); 

        if($lguprofile){
            $lguprofile->update(['status' => '3']);
            DB::table('barangaytracking')->where('lguprofilebarangay_id', $lguprofile->id)->update(['status' => '3']);
        } 
        
        return redirect()->route('CMOLGUprofile.index')->with('success', 'Data updated Successfully!');
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
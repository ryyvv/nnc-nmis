<?php

namespace App\Http\Controllers\Admin\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LocationController;

class CMSDashboardController extends Controller
{
    //  public function index (){
    //     return view('BarangayScholar.dashboard');
    //  }

     public function index() {
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $barangay = auth()->user()->barangay;
        $lguProfile = DB::table('lguprofilebarangay')->where('user_id',)->orderBy('id', 'DESC')->get();
        
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
 
        return view('users.MunicipalStaff', ['data' => $data]);
        
    }

    public function fetchReport() {
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal; 
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);


        //  $data = DB::table('lgubarangayreport')
        //     ->leftJoin('psgc_municipalities', DB::raw('CAST(lguprofilebarangay.municipal_id AS VARCHAR)'), '=', 'psgc_municipalities.citymun_code')
        //     ->leftJoin('psgc_cities', DB::raw('CAST(lguprofilebarangay.municipal_id AS VARCHAR)'), '=', 'psgc_cities.citymun_code')
        //     // ->where('lgubarangayreport.status', 1)
        //     ->where(function($query) {
        //         $query->whereNotNull('psgc_municipalities.citymun_code')
        //             ->orWhereNotNull('psgc_cities.citymun_code');
        //     })
        //     ->select('lgubarangayreport.*')
        //     ->get();


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
}

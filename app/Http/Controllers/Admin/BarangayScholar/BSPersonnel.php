<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonnelDnaDirectoryBnsModel;
use App\Models\PersonnelDnaDirectoryModel;
use App\Models\Region;
use App\Models\Province;
use App\Models\Municipal;
use App\Models\Barangay;
use App\Models\PersonnelDnaDirectoryNaoModel;
use App\Models\PersonnelDnaDirectoryNpcModel; 

class BSPersonnel extends Controller
{
    public function index()
    {
        $naosPersonnel = PersonnelDnaDirectoryModel::all(); // Use `all()` for better readability when fetching all records
        return view('BarangayScholar.PersonnelDirectory.index', compact('naosPersonnel'));
        
    }

    public function create()
    {
        $Regs = Region::all();       
        $Prov = Province::get();
        $Mun = Municipal::get();

        $Brgy = Barangay::get();

        return view('BarangayScholar.PersonnelDirectory.create', compact('Regs' , 'Prov'  , 'Mun'  , 'Brgy' )); 
    }

    public function storeNAO(Request $request) {
                $addPersonnels = PersonnelDnaDirectoryModel::create([
                    'lastname' => $request->inputLN,
                    'firstname' => $request->inputFN,
                    'middlename' => $request->inputMN,
                    'suffix' => $request->inputSuffix,
                    'sex' => $request->inputSex,
                    'cellphonenumer' => $request->inputCPNum,
                    'telephonenumber' => $request->inputTPNum,
                    'email' => $request->inputNaoEmail,
                    'address' => $request->inputNaoAddress,
                    'birthdate' => $request->inputBdate,
                    'age' => $request->inputage,
                    'civilstatus' => $request -> inputCivilStatus,
                    'educationalbackground' => $request->inputEB,
                    'degreeCourse' => $request->inputDegree,
                    'region_id' => '482',
                    'province_id' => '1301',
                    'cities_id' =>  '1919',
                    'barangay_id' => '358',

                    // 'region_id' => $request->inputRegionNAO,
                    // 'province_id' => $request->inputProvinceNAO, 
                    // 'cities_id' => $request->inputCityNAO,
                ]);

                $addNao = PersonnelDnaDirectoryNaoModel::create([
                    'nameGovMayor' => $request->inputGovMayor,
                    'typenao' => $request->inputNoaType,
                    'typedesignation' => $request->inputNoaDesignationType,
                    'datedesignation' => $request->inputNoaDateDesignation,
                    'typeappointment' => $request->inputNoaAppointment,
                    'position' => $request->inputNaoPosition,
                    'department' => $request->inputNaoDepartment,
                    'personnel_id' => $addPersonnels->id,

                ]);
            // return response()->json(['message' => 'Personnel Directory (NAO) added successfully!']);
            return redirect()->back()->with('success', 'Personnel Directory (NAO) added successfully!');
    }

    public function storeNPC(Request $request) {
        $addPersonnels = PersonnelDnaDirectoryModel::create([
            'lastname' => $request->inputLN,
            'firstname' => $request->inputFN,
            'middlename' => $request->inputMN,
            'suffix' => $request->inputSuffix,
            'sex' => $request->inputSex,
            'cellphonenumer' => $request->inputCPNum,
            'telephonenumber' => $request->inputTPNum,
            'email' => $request->inputNaoEmail,
            'address' => $request->inputNaoAddress,
            'birthdate' => $request->inputNpcBdate,
            'age' => $request->inputNpcAge,
            'civilstatus' => $request -> inputCivilStatus,
            'educationalbackground' => $request->inputEB,
            'degreeCourse' => $request->inputDegree,
            'region_id' => '482',
            'province_id' => '1301',
            'cities_id' =>  '1919',
            'barangay_id' => '358',
            // 'region_id' => $request->inputRegion,
            // 'province_id' => $request->inputProvince,
            // 'municipal_id' => $request->inputCM,
            // 'barangay_id' => $request->inputBarangayID,
        ]);

        $addNao = PersonnelDnaDirectoryNpcModel::create([
            'nameGovMayor' => $request->inputGovMayor,
            'typenpc' => $request->inputNpcType,
            'typedesignation' => $request->inputNpcDesignationType,
            'datedesignation' => $request->inputNpcDateDesignation,
            'typeappointment' => $request->inputNpcAppointment,
            'position' => $request->inputNpcPosition,
            'department' => $request->inputNpcDepartment,
            'dcnpcapmembership' => $request->inputNpcDCNPCAPMembership,
            'dcnpcapposition' => $request->inputNpcDCNPCAPPosition,
            'dcnpcapofficer' => $request->inputNpcDCNPCAPOfficer,
            'personnel_id' => $addPersonnels->id,

        ]);
        // return redirect()->route('personnelDnaDirectory.storeNAO');
        return redirect()->back()->with('success', 'Personnel Directory (NPC) added successfully!');
    }

    public function storeBNS(Request $request) {
        $addPersonnels = PersonnelDnaDirectoryModel::create([
            'id_number' => $request->inputIdNum,
            'lastname' => $request->inputLN,
            'firstname' => $request->inputFN,
            'middlename' => $request->inputMN,
            'suffix' => $request->inputSuffix,
            'sex' => $request->inputSex,
            'cellphonenumer' => $request->inputCPNum,
            'telephonenumber' => $request->inputTPNum,
            'email' => $request->inputBnsEmail,
            'address' => $request->inputBnsAddress,
            'birthdate' => $request->inputBnsBdate,
            'age' => $request->inputBnsAge,
            'civilstatus' => $request -> inputCivilStat,
            'educationalbackground' => $request->inputEB,
            'degreeCourse' => $request->inputDegree,
            'region_id' => '482',
            'province_id' => '1301',
            'cities_id' =>  '1919',
            'barangay_id' => '358',
            // 'region_id' => $request->inputRegion,
            // 'province_id' => $request->inputProvince,
            // 'municipal_id' => $request->inputCM,
            // 'barangay_id' => $request->inputBarangayID,
        ]);

        $addNao = PersonnelDnaDirectoryBnsModel::create([
            'Barangay' => $request->inputBarangay,
            'statusemployment' => $request->inputBnsEmploymentStat,
            'beneficiaryname' => $request->inputBnsBeneficiary,
            'relationship' => $request->inputBnsRelationship,
            'periodactivefrom' => $request->inputBnsActiveFrom,
            'periodactiveto' => $request->inputBnsActiveTo,
            'lastupdate' => $request->inputBnsLastUpdate,
            'bnsstatus' => $request->inputBnsStatus,
            'personnel_id' => $addPersonnels->id,

        ]);
        return redirect()->back()->with('success', 'Personnel Directory (BNS) added successfully!');
    }
}

<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonnelDnaDirectoryBnsModel;
use App\Models\PersonnelDnaDirectoryModel;
use App\Models\PersonnelDnaDirectoryNaoModel;
use App\Models\PersonnelDnaDirectoryNpcModel; 
use Illuminate\Support\Facades\Validator;

class BSPersonnel extends Controller
{
    public function index()
    {
        $naosPersonnel = PersonnelDnaDirectoryModel::all();
        return view('BarangayScholar.PersonnelDirectory.index', compact('naosPersonnel'));   
    }

    public function create()
    {   
        return view('BarangayScholar.PersonnelDirectory.create'); 
    }

    public function storeNAO(Request $request) {        
        $rules = [
            'inputNaoPSGC' => 'required|string|max:255',
            'inputNaoRegion' => 'required|string',
            'inputNaoProvince' => 'required|string',
            'inputNaoCM' => 'required|string',
            'inputNaoLN' => 'required|string|max:100',
            'inputNaoFN' => 'required|string|max:100',
            'inputNaoMN' => 'nullable|string|max:100',
            'inputNaoSuffix' => 'nullable|string|max:10',
            'inputNaoSex' => 'required|string',
            'inputNaoCPNum' => 'required|numeric',
            'inputNaoTPNum' => 'nullable|numeric',
            'inputNaoEmail' => 'required|email|max:255',
            'inputNaoAddress' => 'required|string|max:255',
            'inputNaoBdate' => 'required|date',
            'inputNaoAge' => 'required|integer|min:0',
            'inputNaoCivilStatus' => 'required|string|max:20',
            'inputNaoEB' => 'required|string',
            'inputNaoDegree' => 'required|string|max:255',
            'inputNaoType' => 'required|string',
            'inputNaoDesignationType' => 'required|string',
            'inputNaoDateDesignation' => 'required|date',
            'inputNaoAppointment' => 'required|string',
            'inputNaoPosition' => 'required|string',
            'inputNaoDepartment' => 'required|string',
        ];
        
        if ($request->input('inputNaoRegion') === '13') {
            $rules['inputNaoProvince'] = 'nullable|string';
        }

        $message = [];

        $request->merge([
            'inputNaoProvince' => !empty($request->input('inputNaoProvince')) ? $request->input('inputNaoProvince') : substr($request->input('inputNaoCM'), 0, 5),
        ]);

        $validator = Validator::make($request->all(), $rules, $message);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('activeTab', 'tab1')
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        }
        
        $validatedData = $validator->validated();

        $addPersonnels = PersonnelDnaDirectoryModel::create([
            'lastname' => $validatedData['inputNaoLN'],
            'firstname' => $validatedData['inputNaoFN'],
            'middlename' => $validatedData['inputNaoMN'],
            'suffix' => $validatedData['inputNaoSuffix'],
            'sex' => $validatedData['inputNaoSex'],
            'cellphonenumer' => $validatedData['inputNaoCPNum'],
            'telephonenumber' => $validatedData['inputNaoTPNum'],
            'email' => $validatedData['inputNaoEmail'],
            'address' => $validatedData['inputNaoAddress'],
            'birthdate' => $validatedData['inputNaoBdate'],
            'age' => $validatedData['inputNaoAge'],
            'civilstatus' => $validatedData['inputNaoCivilStatus'],
            'educationalbackground' => $validatedData['inputNaoEB'],
            'degreeCourse' => $validatedData['inputNaoDegree'],
            'region_id' => $validatedData['inputNaoRegion'],
            'province_id' => $validatedData['inputNaoProvince'],
            'cities_id' => $validatedData['inputNaoCM'],
        ]);
        
        PersonnelDnaDirectoryNaoModel::create([
            'nameGovMayor' => $validatedData['inputNaoGovMayor'] ?? null,
            'typenao' => $validatedData['inputNaoType'],
            'typedesignation' => $validatedData['inputNaoDesignationType'],
            'datedesignation' => $validatedData['inputNaoDateDesignation'],
            'typeappointment' => $validatedData['inputNaoAppointment'],
            'position' => $validatedData['inputNaoPosition'],
            'department' => $validatedData['inputNaoDepartment'],
            'personnel_id' => $addPersonnels->id,
        ]);
        
        return redirect()->back()->with('success', 'Personnel Directory (NAO) added successfully!');
    }

    public function storeNPC(Request $request) {
        $rules = [
            'inputNpcPSGC' => 'required|string',
            'inputNpcRegion' => 'required|string',
            'inputNpcProvince' => 'required|string',
            'inputNpcCM' => 'required|string',
            'inputNpcGovMayor' => 'required|string',
            'inputNpcLN' => 'required|string',
            'inputNpcFN' => 'required|string',
            'inputNpcMN' => 'nullable|string',
            'inputNpcSuffix' => 'nullable|string',
            'inputNpcSex' => 'required|string',
            'inputNpcCPNum' => 'required|numeric',
            'inputNpcTPNum' => 'nullable|numeric',
            'inputNpcEmail' => 'required|email',
            'inputNpcAddress' => 'required|string',
            'inputNpcBdate' => 'required|date',
            'inputNpcAge' => 'required|integer|min:0',
            'inputNpcCivilStatus' => 'required|string|max:20',
            'inputNpcEB' => 'required|string',
            'inputNpcDegree' => 'required|string',
            'inputNpcType' => 'required|string',
            'inputNpcDesignationType' => 'required|string',
            'inputNpcDateDesignation' => 'required|date',
            'inputNpcAppointment' => 'required|string',
            'inputNpcPosition' => 'required|string',
            'inputNpcDepartment' => 'required|string',
            'inputNpcDCNPCAPMembership' => 'required|string',
            'inputNpcDCNPCAPPosition' => 'required|string',
            'inputNpcDCNPCAPOfficer' => 'required|string',
        ];

        if ($request->input('inputNpcRegion') === '13') {
            $rules['inputNpcProvince'] = 'nullable|string';
        }

        $message = [

        ];

        $request->merge([
            'inputNpcProvince' => !empty($request->input('inputNpcProvince')) ? $request->input('inputNpcProvince') : substr($request->input('inputNpcCM'), 0, 5),
        ]);

        $validator = Validator::make($request->all(), $rules, $message);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('activeTab', 'tab2')
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        }
        
        $validatedData = $validator->validated();
        
        
        $addPersonnels = PersonnelDnaDirectoryModel::create([
            'lastname' => $validatedData['inputNpcLN'],
            'firstname' => $validatedData['inputNpcFN'],
            'middlename' => $validatedData['inputNpcMN'],
            'suffix' => $validatedData['inputNpcSuffix'],
            'sex' => $validatedData['inputNpcSex'],
            'cellphonenumer' => $validatedData['inputNpcCPNum'],
            'telephonenumber' => $validatedData['inputNpcTPNum'],
            'email' => $validatedData['inputNpcEmail'],
            'address' => $validatedData['inputNpcAddress'],
            'birthdate' => $validatedData['inputNpcBdate'],
            'age' => $validatedData['inputNpcAge'],
            'civilstatus' => $validatedData['inputNpcCivilStatus'], 
            'educationalbackground' => $validatedData['inputNpcEB'],
            'degreeCourse' => $validatedData['inputNpcDegree'],
            'region_id' => $validatedData['inputNpcRegion'],
            'province_id' => $validatedData['inputNpcProvince'],
            'cities_id' => $validatedData['inputNpcCM'],
            // 'barangay_id' => '358', TODO: Add Null
        ]);
        
        PersonnelDnaDirectoryNpcModel::create([
            'nameGovMayor' => $validatedData['inputNpcGovMayor'],
            'typenpc' => $validatedData['inputNpcType'],
            'typedesignation' => $validatedData['inputNpcDesignationType'],
            'datedesignation' => $validatedData['inputNpcDateDesignation'],
            'typeappointment' => $validatedData['inputNpcAppointment'],
            'position' => $validatedData['inputNpcPosition'],
            'department' => $validatedData['inputNpcDepartment'],
            'dcnpcapmembership' => $validatedData['inputNpcDCNPCAPMembership'],
            'dcnpcapposition' => $validatedData['inputNpcDCNPCAPPosition'],
            'dcnpcapofficer' => $validatedData['inputNpcDCNPCAPOfficer'],
            'personnel_id' => $addPersonnels->id,
        ]);
        
        return redirect()->back()->with('success', 'Personnel Directory (NPC) added successfully!');
    }

    public function storeBNS(Request $request) {
        $rules = [
            'inputBnsPSGC' => 'required|string',
            'inputBnsRegion' => 'required|string',
            'inputBnsProvince' => 'required|string',
            'inputBnsCM' => 'required|string',
            'inputBnsBarangay' => 'required|string',
            'inputBnsIdNum' => 'required|numeric|digits:10',
            'inputBnsLN' => 'required|string',
            'inputBnsFN' => 'required|string',
            'inputBnsMN' => 'nullable|string',
            'inputBnsSuffix' => 'nullable|string',
            'inputBnsSex' => 'required|string',
            'inputBnsCPNum' => 'required|numeric',
            'inputBnsTPNum' => 'nullable|numeric',
            'inputBnsEmail' => 'required|email',
            'inputBnsAddress' => 'required|string',
            'inputBnsBdate' => 'required|date',
            'inputBnsAge' => 'required|integer|min:0',
            'inputBnsEB' => 'required|string',
            'inputBnsDegree' => 'required|string',
            'inputBnsCivilStat' => 'required|string',
            'inputBnsEmploymentStat' => 'required|string',
            'inputBnsBeneficiary' => 'required|string',
            'inputBnsRelationship' => 'required|string',
            'inputBnsActiveFrom' => 'required|date',
            'inputBnsActiveTo' => 'required|date',
            'inputBnsLastUpdate' => 'required|date',
            'inputBnsStatus' => 'required|string',
        ];

        if ($request->input('inputBnsRegion') === '13') {
            $rules['inputBnsProvince'] = 'nullable|string';
        }
        
        $message = [
        ];

        $request->merge([
            'inputBnsProvince' => !empty($request->input('inputBnsProvince')) ? $request->input('inputBnsProvince') : substr($request->input('inputBnsCM'), 0, 5),
        ]);

        $validator = Validator::make($request->all(), $rules, $message);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('activeTab', 'tab3')
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        }
        
        $validatedData = $validator->validated();
        
        if (false) {
            return redirect()->back()->with('error', 'Records already exist.');
        }
        
        
        $addPersonnels = PersonnelDnaDirectoryModel::create([
            'id_number' => $validatedData['inputBnsIdNum'],
            'lastname' => $validatedData['inputBnsLN'],
            'firstname' => $validatedData['inputBnsFN'],
            'middlename' => $validatedData['inputBnsMN'],
            'suffix' => $validatedData['inputBnsSuffix'],
            'sex' => $validatedData['inputBnsSex'],
            'cellphonenumer' => $validatedData['inputBnsCPNum'],
            'telephonenumber' => $validatedData['inputBnsTPNum'],
            'email' => $validatedData['inputBnsEmail'],
            'address' => $validatedData['inputBnsAddress'],
            'birthdate' => $validatedData['inputBnsBdate'],
            'age' => $validatedData['inputBnsAge'],
            'civilstatus' => $validatedData['inputBnsCivilStat'],
            'educationalbackground' => $validatedData['inputBnsEB'],
            'degreeCourse' => $validatedData['inputBnsDegree'],
            'region_id' => $validatedData['inputBnsRegion'],
            'province_id' => $validatedData['inputBnsProvince'],
            'cities_id' => $validatedData['inputBnsCM'],
            // 'barangay_id' => '', 
        ]);
        
        PersonnelDnaDirectoryBnsModel::create([
            'Barangay' => $validatedData['inputBnsBarangay'],
            'statusemployment' => $validatedData['inputBnsEmploymentStat'],
            'beneficiaryname' => $validatedData['inputBnsBeneficiary'],
            'relationship' => $validatedData['inputBnsRelationship'],
            'periodactivefrom' => $validatedData['inputBnsActiveFrom'],
            'periodactiveto' => $validatedData['inputBnsActiveTo'],
            'lastupdate' => $validatedData['inputBnsLastUpdate'],
            'bnsstatus' => $validatedData['inputBnsStatus'],
            'personnel_id' => $addPersonnels->id,
        ]);
        
        return redirect()->back()->with('success', 'Personnel Directory (BNS) added successfully!');
    }
}
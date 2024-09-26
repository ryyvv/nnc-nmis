<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonnelDnaDirectoryBnsModel;
use App\Models\PersonnelDnaDirectoryModel;
use App\Models\PersonnelDnaDirectoryNaoModel;
use App\Models\PersonnelDnaDirectoryNpcModel;
use App\Models\PsgcBarangay;
use App\Models\PsgcCity;
use App\Models\PsgcMunicipality;
use Illuminate\Support\Facades\Validator;

class BSPersonnel extends Controller
{
    public function index()
    {
        return view('BarangayScholar.PersonnelDirectory.index');   
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
            'inputNaoGovMayor' => 'nullable|string',
            'inputNaoLN' => 'required|string|max:100',
            'inputNaoFN' => 'required|string|max:100',
            'inputNaoMN' => 'nullable|string|max:100',
            'inputNaoSuffix' => 'nullable|string|max:10',
            'inputNaoSex' => 'required|string',
            'inputNaoCPNum' => 'required|numeric',
            'inputNaoTPNum' => 'nullable|numeric',
            'inputNaoEmail' => 'required|unique:personnels,email|max:100',
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

        $citymunExists = PsgcCity::where('psgc_code', $validatedData['inputNaoPSGC'])->first() 
        ?? PsgcMunicipality::where('psgc_code', $validatedData['inputNaoPSGC'])->first();
        
        if (!$citymunExists) {
            return redirect()->back()->with('error', 'Invalid 10-Digit PSGC code: ' .  $validatedData['inputNaoPSGC']);
        }

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
            'psgc_code' => $citymunExists->psgc_code,
            'name' => $citymunExists->name,
            'correspondence_code' => $citymunExists->correspondence_code,
            'region_id' => $citymunExists->reg_code,
            'province_id' => $citymunExists->prov_code,
            'cities_id' => $citymunExists->citymun_code,
            'directory_type' => 'nao',
        ]);
        
        PersonnelDnaDirectoryNaoModel::create([
            'namegovmayor' => $validatedData['inputNaoGovMayor'] ?? null,
            'typenao' => $validatedData['inputNaoType'],
            'typedesignation' => $validatedData['inputNaoDesignationType'],
            'datedesignation' => $validatedData['inputNaoDateDesignation'],
            'typeappointment' => $validatedData['inputNaoAppointment'],
            'position' => $validatedData['inputNaoPosition'],
            'department' => $validatedData['inputNaoDepartment'],
            'personnel_id' => $addPersonnels->id,
        ]);
        
        return redirect()->route('BSpersonnel.index')->with('success', 'Personnel Directory (NAO) added successfully!');
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
            'inputNpcEmail' => 'required|unique:personnels,email|max:100',
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

        $citymunExists = PsgcCity::where('psgc_code', $validatedData['inputNpcPSGC'])->first() 
        ?? PsgcMunicipality::where('psgc_code', $validatedData['inputNpcPSGC'])->first();
        
        if (!$citymunExists) {
            return redirect()->back()->with('error', 'Invalid 10-Digit PSGC code: ' .  $validatedData['inputNpcPSGC']);
        }
        
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
            'psgc_code' => $citymunExists->psgc_code,
            'name' => $citymunExists->name,
            'correspondence_code' => $citymunExists->correspondence_code,
            'region_id' => $citymunExists->reg_code,
            'province_id' => $citymunExists->prov_code,
            'cities_id' => $citymunExists->citymun_code,
            'directory_type' => 'npc',
        ]);
        
        PersonnelDnaDirectoryNpcModel::create([
            'namegovmayor' => $validatedData['inputNpcGovMayor'],
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
        
        return redirect()->route('BSpersonnel.index')->with('success', 'Personnel Directory (NPC) added successfully!');
    }

    public function storeBNS(Request $request) {
        $rules = [
            'inputBnsPSGC' => 'required|string',
            'inputBnsRegion' => 'required|string',
            'inputBnsProvince' => 'required|string',
            'inputBnsCM' => 'required|string',
            'inputBnsBarangay' => 'required|string',
            'inputBnsBarangayText' => 'required|string',
            'inputBnsIdNum' => 'required|numeric|digits:10',
            'inputBnsIdName' => 'required|string',
            'inputBnsLN' => 'required|string',
            'inputBnsFN' => 'required|string',
            'inputBnsMN' => 'nullable|string',
            'inputBnsSuffix' => 'nullable|string',
            'inputBnsSex' => 'required|string',
            'inputBnsCPNum' => 'required|numeric',
            'inputBnsTPNum' => 'nullable|numeric',
            'inputBnsEmail' => 'required|unique:personnels,email|max:100',
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

        $barangayExists = PsgcBarangay::where('psgc_code', $validatedData['inputBnsPSGC'])->first();
        
        if (!$barangayExists) {
            return redirect()->back()->with('error', 'Invalid 10-Digit PSGC code: ' .  $validatedData['inputBnsPSGC']);
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
            'psgc_code' => $barangayExists->psgc_code,
            'name' => $barangayExists->name,
            'correspondence_code' => $barangayExists->correspondence_code,
            'region_id' => $barangayExists->reg_code,
            'province_id' => $barangayExists->prov_code,
            'cities_id' => $barangayExists->citymun_code,
            'directory_type' => 'bns',
            'name_on_id' => $validatedData['inputBnsIdName'],
        ]);
        
        PersonnelDnaDirectoryBnsModel::create([
            'barangay' => $validatedData['inputBnsBarangayText'],
            'statusemployment' => $validatedData['inputBnsEmploymentStat'],
            'beneficiaryname' => $validatedData['inputBnsBeneficiary'],
            'relationship' => $validatedData['inputBnsRelationship'],
            'periodactivefrom' => $validatedData['inputBnsActiveFrom'],
            'periodactiveto' => $validatedData['inputBnsActiveTo'],
            'lastupdate' => $validatedData['inputBnsLastUpdate'],
            'bnsstatus' => $validatedData['inputBnsStatus'],
            'personnel_id' => $addPersonnels->id,
        ]);
        
        return redirect()->route('BSpersonnel.index')->with('success', 'Personnel Directory (BNS) added successfully!');
    }

    public function getPersonel(Request $request) {
        
        $query = PersonnelDnaDirectoryModel::where('directory_type', $request->input('directory_type'))->with($request->input('directory_type'));
        
        if ($request->has('psgc_code')) {
            $query->where('psgc_code', $request->input('psgc_code'));
        }

        // if ($request->has('name')) {
        //     $query->where('name', 'like', '%' . $request->input('name') . '%');
        // }

        // if ($request->has('correspondence_code')) {
        //     $query->where('correspondence_code', $request->input('correspondence_code'));
        // }

        if ($request->has('reg_code')) {
            $query->where('region_id', $request->input('reg_code'));
        }

        if ($request->has('prov_code')) {
            $query->where('province_id', $request->input('prov_code'));
        }

        if ($request->has('citymun_code')) {
            $query->where('cities_id', $request->input('citymun_code'));
        }
        
        $personnels = $query->get();


        return response()->json($personnels);

    }

    public function edit($id)
    {
        $personnel = PersonnelDnaDirectoryModel::findOrFail($id);
        // include nao | npc | bns
        $personnel->load($personnel->directory_type);

        return view('BarangayScholar.PersonnelDirectory.edit', compact('personnel'));
    }

    public function show($id)
    {
        $personnel = PersonnelDnaDirectoryModel::findOrFail($id);
        // include nao | npc | bns
        $personnel->load($personnel->directory_type);

        return view('BarangayScholar.PersonnelDirectory.show', compact('personnel'));
    }

    public function updateNAO(Request $request, $id) {
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
            'inputNaoEmail' => 'required|unique:personnels,email,' . $id . '|max:100', // Adjusting unique rule
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

        
        $citymunExists = PsgcCity::where('psgc_code', $validatedData['inputNaoPSGC'])->first() 
        ?? PsgcMunicipality::where('psgc_code', $validatedData['inputNaoPSGC'])->first();
        
        if (!$citymunExists) {
            return redirect()->back()->with('error', 'Invalid 10-Digit PSGC code: ' .  $validatedData['inputNaoPSGC']);
        }
        
        // Find the existing personnel record
        $personnel = PersonnelDnaDirectoryModel::findOrFail($id);
        $personnel->update([
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
            'psgc_code' => $citymunExists->psgc_code,
            'name' => $citymunExists->name,
            'correspondence_code' => $citymunExists->correspondence_code,
            'region_id' => $citymunExists->reg_code,
            'province_id' => $citymunExists->prov_code,
            'cities_id' => $citymunExists->citymun_code,
            'directory_type' => 'nao',
        ]);
    
        $naoData = PersonnelDnaDirectoryNaoModel::where('personnel_id', $personnel->id)->first();
        if ($naoData) {
            $naoData->update([
                'namegovmayor' => $validatedData['inputNaoGovMayor'] ?? null,
                'typenao' => $validatedData['inputNaoType'],
                'typedesignation' => $validatedData['inputNaoDesignationType'],
                'datedesignation' => $validatedData['inputNaoDateDesignation'],
                'typeappointment' => $validatedData['inputNaoAppointment'],
                'position' => $validatedData['inputNaoPosition'],
                'department' => $validatedData['inputNaoDepartment'],
            ]);
        }
    
        return redirect()->route('BSpersonnel.index')->with('success', 'Personnel Directory (NAO) updated successfully!');
    }
    
    public function updateNPC(Request $request, $id) {
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
            'inputNpcEmail' => 'required|unique:personnels,email,' . $id . '|max:100', // Adjusting unique rule
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
    
        $message = [];
    
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

        $citymunExists = PsgcCity::where('psgc_code', $validatedData['inputNpcPSGC'])->first() 
        ?? PsgcMunicipality::where('psgc_code', $validatedData['inputNpcPSGC'])->first();
        
        if (!$citymunExists) {
            return redirect()->back()->with('error', 'Invalid 10-Digit PSGC code: ' .  $validatedData['inputNpcPSGC']);
        }
    
        // Find the existing personnel record
        $personnel = PersonnelDnaDirectoryModel::findOrFail($id);
        $personnel->update([
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
            'psgc_code' => $citymunExists->psgc_code,
            'name' => $citymunExists->name,
            'correspondence_code' => $citymunExists->correspondence_code,
            'region_id' => $citymunExists->reg_code,
            'province_id' => $citymunExists->prov_code,
            'cities_id' => $citymunExists->citymun_code,
            'directory_type' => 'npc',
        ]);
    
        // Update the NPC-specific data
        $npcData = PersonnelDnaDirectoryNpcModel::where('personnel_id', $personnel->id)->first();
        if ($npcData) {
            $npcData->update([
                'namegovmayor' => $validatedData['inputNpcGovMayor'],
                'typenpc' => $validatedData['inputNpcType'],
                'typedesignation' => $validatedData['inputNpcDesignationType'],
                'datedesignation' => $validatedData['inputNpcDateDesignation'],
                'typeappointment' => $validatedData['inputNpcAppointment'],
                'position' => $validatedData['inputNpcPosition'],
                'department' => $validatedData['inputNpcDepartment'],
                'dcnpcapmembership' => $validatedData['inputNpcDCNPCAPMembership'],
                'dcnpcapposition' => $validatedData['inputNpcDCNPCAPPosition'],
                'dcnpcapofficer' => $validatedData['inputNpcDCNPCAPOfficer'],
            ]);
        }
    
        return redirect()->route('BSpersonnel.index')->with('success', 'Personnel Directory (NPC) updated successfully!');
    }
    
    public function updateBNS(Request $request, $id) {
        $rules = [
            'inputBnsPSGC' => 'required|string',
            'inputBnsRegion' => 'required|string',
            'inputBnsProvince' => 'required|string',
            'inputBnsCM' => 'required|string',
            'inputBnsBarangay' => 'required|string',
            'inputBnsBarangayText' => 'required|string',
            'inputBnsIdNum' => 'required|numeric|digits:10',
            'inputBnsIdName' => 'required|string',
            'inputBnsLN' => 'required|string',
            'inputBnsFN' => 'required|string',
            'inputBnsMN' => 'nullable|string',
            'inputBnsSuffix' => 'nullable|string',
            'inputBnsSex' => 'required|string',
            'inputBnsCPNum' => 'required|numeric',
            'inputBnsTPNum' => 'nullable|numeric',
            'inputBnsEmail' => 'required|unique:personnels,email,' . $id . '|max:100', // Adjusting unique rule
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
    
        $message = [];
    
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

        $barangayExists = PsgcBarangay::where('psgc_code', $validatedData['inputBnsPSGC'])->first();
        
        if (!$barangayExists) {
            return redirect()->back()->with('error', 'Invalid 10-Digit PSGC code: ' .  $validatedData['inputBnsPSGC']);
        }
    
        // Find the existing personnel record
        $personnel = PersonnelDnaDirectoryModel::findOrFail($id);
        $personnel->update([
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
            'psgc_code' => $barangayExists->psgc_code,
            'name' => $barangayExists->name,
            'correspondence_code' => $barangayExists->correspondence_code,
            'region_id' => $barangayExists->reg_code,
            'province_id' => $barangayExists->prov_code,
            'cities_id' => $barangayExists->citymun_code,
            'directory_type' => 'bns',
            'name_on_id' => $validatedData['inputBnsIdName'],
        ]);
    
        // Update the BNS-specific data
        $bnsData = PersonnelDnaDirectoryBnsModel::where('personnel_id', $personnel->id)->first();
        if ($bnsData) {
            $bnsData->update([
                'barangay' => $validatedData['inputBnsBarangayText'],
                'statusemployment' => $validatedData['inputBnsEmploymentStat'],
                'beneficiaryname' => $validatedData['inputBnsBeneficiary'],
                'relationship' => $validatedData['inputBnsRelationship'],
                'periodactivefrom' => $validatedData['inputBnsActiveFrom'],
                'periodactiveto' => $validatedData['inputBnsActiveTo'],
                'lastupdate' => $validatedData['inputBnsLastUpdate'],
                'bnsstatus' => $validatedData['inputBnsStatus'],
            ]);
        }
    
        return redirect()->route('BSpersonnel.index')->with('success', 'Personnel Directory (BNS) updated successfully!');
    }
    

    public function destroy(Request $request)
    {
        
        $personnel = PersonnelDnaDirectoryModel::where('id', $request->input('id'))->first();

        if (!$personnel) {
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }

        $personnel->delete();
        
        return redirect()->route('BSpersonnel.index')->with('success', 'Personnel Directory deleted successfully!');
    }
}
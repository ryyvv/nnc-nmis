<?php

namespace App\Http\Controllers;

use App\Models\Mellpro_LGU;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Mellpi;
use App\Models\PSGC;
use App\Models\Region;
use App\Models\Province;
use App\Models\Municipal;
use App\Models\City;
use App\Models\Barangay;
use App\Models\LocationPivot;
use App\Models\Barangay as ModelsBarangay;
use App\Models\LncFunctionality;
use App\Models\PersonnelDnaDirectoryBnsModel;
use App\Models\PersonnelDnaDirectoryModel;
use App\Models\PersonnelDnaDirectoryNaoModel;
use App\Models\PersonnelDnaDirectoryNpcModel;
use App\Models\PsgcBarangay;
use App\Models\PsgcCity;
use App\Models\PsgcEquipmentInventory;
use App\Models\PsgcMunicipality;
use App\Models\PsgcProvince;
use App\Models\PsgcRegion;
use App\Models\PsgcSubMunicipality;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

// added namespacing
use League\Csv\Reader;
use League\Csv\Statement;

class MellproLGUController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mellpi_pro_lgu.mellpi_Pro_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mellpro_LGU $mellpro_LGU)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mellpro_LGU $mellpro_LGU)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mellpro_LGU $mellpro_LGU)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mellpro_LGU $mellpro_LGU)
    {
        //
    }

    public function Psgcupload(Request $request)
    {
        $request->validate([
            'inputcsvfilePsgc' => 'required|mimes:csv,txt'
        ]);

        $csv = Reader::createFromPath($request->file('inputcsvfilePsgc')->getRealPath());
        $csv->setHeaderOffset(0);

        $records = Statement::create()->process($csv);

        foreach ($records as $record) {
            $psgc_code = trim($record['10-digit PSGC']);
            $name = trim($record['Name']);
            $correspondence_code = trim($record['Correspondence Code']);
            $geographic_level = trim($record['Geographic Level']);
            $old_names = trim($record['Old names']);
            $income_classification = trim($record['Income Classification']);
            $urban_rural_classification = trim($record['Urban / Rural (based on 2020 CPH)']);
            $population_2020 = trim($record['2020 Population']);
            $status = trim($record['Status']);

            $population_2020 = str_replace(',', '', $population_2020);
            $population_2020 = is_numeric($population_2020) ? $population_2020 : 0;
            $name = str_replace('�', 'ñ', $record['Name']);
            $old_names = str_replace('�', 'ñ', $record['Old names']);

            $reg_code = substr($psgc_code, 0, 2);
            $prov_code = substr($psgc_code, 0, 5);
            $citymun_code = substr($psgc_code, 0, 7);

            switch ($geographic_level) {
                case 'Reg':
                    if (!PsgcRegion::where('psgc_code', $psgc_code)->exists()) {
                        PsgcRegion::create([
                            'psgc_code' => $psgc_code,
                            'name' => $name,
                            'correspondence_code' => $correspondence_code,
                            'old_names' => $old_names,
                            'income_classification' => $income_classification,
                            'population_2020' => $population_2020,
                            'reg_code' => $reg_code,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                    break;

                case 'Prov':
                    if (!PsgcProvince::where('psgc_code', $psgc_code)->exists()) {
                        PsgcProvince::create([
                            'psgc_code' => $psgc_code,
                            'name' => $name,
                            'correspondence_code' => $correspondence_code,
                            'old_names' => $old_names,
                            'income_classification' => $income_classification,
                            'population_2020' => $population_2020,
                            'reg_code' => $reg_code,
                            'prov_code' => $prov_code,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                    break;

                case 'Mun':
                    if (!PsgcMunicipality::where('psgc_code', $psgc_code)->exists()) {
                        PsgcMunicipality::create([
                            'psgc_code' => $psgc_code,
                            'name' => $name,
                            'correspondence_code' => $correspondence_code,
                            'old_names' => $old_names,
                            'income_classification' => $income_classification,
                            'population_2020' => $population_2020,
                            'status' => $status,
                            'reg_code' => $reg_code,
                            'prov_code' => $prov_code,
                            'citymun_code' => $citymun_code,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                    break;

                case 'City':
                    if (!PsgcCity::where('psgc_code', $psgc_code)->exists()) {
                        PsgcCity::create([
                            'psgc_code' => $psgc_code,
                            'name' => $name,
                            'correspondence_code' => $correspondence_code,
                            'old_names' => $old_names,
                            'city_class' => trim($record['City Class']),
                            'income_classification' => $income_classification,
                            'population_2020' => $population_2020,
                            'status' => $status,
                            'reg_code' => $reg_code,
                            'prov_code' => $prov_code,
                            'citymun_code' => $citymun_code,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                    break;

                case 'Bgy':
                    if (!PsgcBarangay::where('psgc_code', $psgc_code)->exists()) {
                        PsgcBarangay::create([
                            'psgc_code' => $psgc_code,
                            'name' => $name,
                            'correspondence_code' => $correspondence_code,
                            'old_names' => $old_names,
                            'urban_rural_classification' => $urban_rural_classification,
                            'population_2020' => $population_2020,
                            'status' => $status,
                            'reg_code' => $reg_code,
                            'prov_code' => $prov_code,
                            'citymun_code' => $citymun_code,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                    break;

                case 'SubMun':
                    if (!PsgcSubMunicipality::where('psgc_code', $psgc_code)->exists()) {
                        PsgcSubMunicipality::create([
                            'psgc_code' => $psgc_code,
                            'name' => $name,
                            'correspondence_code' => $correspondence_code,
                            'old_names' => $old_names,
                            'urban_rural_classification' => trim($record['Urban / Rural (based on 2020 CPH)']),
                            'population_2020' => $population_2020,
                            'status' => $status,
                            'reg_code' => $reg_code,
                            'prov_code' => $prov_code,
                            'citymun_code' => $citymun_code,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                    break;

                default:
                    // Handle unknown geographic level if necessary
                    break;
            }
        }

        return redirect('/mellpi_pro_LGU')->withStatus(__('Psgc successfully added.'));
    }

    public function Regionupload(Request $request)
    {
        $request->validate([
            'inputcsvfileRegion' => 'required|mimes:csv,txt'
        ]);
        $csv = Reader::createFromPath($request->file('inputcsvfileRegion')->getRealPath());
        $csv->setHeaderOffset(0);
    
        $records = Statement::create()->process($csv);
    
        foreach ($records as $record) {
            $psgc_code = trim($record['10-digit PSGC']);
            $name = trim($record['Name']);
            $correspondence_code = trim($record['Correspondence Code']);
            $population_2020 = trim($record['2020 Population']);
    
            $population_2020 = str_replace(',', '', $population_2020);
            $population_2020 = is_numeric($population_2020) ? $population_2020 : 0;

            $reg_code = substr($psgc_code, 0, 2);
    
            if (PsgcRegion::where('psgc_code', $psgc_code)->exists()) return;
    
            PsgcRegion::create([
                'psgc_code' => $psgc_code,
                'name' => $name,
                'correspondence_code' => $correspondence_code,
                'population_2020' => $population_2020,
                'reg_code' => $reg_code,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return redirect('/mellpi_pro_LGU')->withStatus(__('Region successfully added.'));
    }
    
    public function Provinceupload(Request $request)
    {
        $request->validate([
            'inputcsvfileProvince' => 'required|mimes:csv,txt'
        ]);
        $csv = Reader::createFromPath($request->file('inputcsvfileProvince')->getRealPath());
        $csv->setHeaderOffset(0);
        $records = Statement::create()->process($csv);
        
        foreach ($records as $record) {
            $psgc_code = trim($record['10-digit PSGC']);
            $name = trim($record['Name']);
            $correspondence_code = trim($record['Correspondence Code']);
            $old_names = trim($record['Old names']);
            $income_classification = trim($record['Income Classification']);
            $population_2020 = trim($record['2020 Population']);
            
            $population_2020 = str_replace(',', '', $population_2020);
            $population_2020 = is_numeric($population_2020) ? $population_2020 : 0;
            
            $reg_code = substr($psgc_code, 0, 2);
            $prov_code = substr($psgc_code, 0, 5);
            
            if (PsgcProvince::where('psgc_code', $psgc_code)->exists()) return;
    
            PsgcProvince::create([
                'psgc_code' => $psgc_code,
                'name' => $name,
                'correspondence_code' => $correspondence_code,
                'old_names' => $old_names,
                'income_classification' => $income_classification,
                'population_2020' => $population_2020,
                'reg_code' => $reg_code,
                'prov_code' => $prov_code,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return redirect('/mellpi_pro_LGU')->withStatus(__('Province successfully added.'));
    }
    
    public function Cityupload(Request $request)
    {
        $request->validate([
            'inputcsvfileCity' => 'required|mimes:csv,txt'
        ]);
        $csv = Reader::createFromPath($request->file('inputcsvfileCity')->getRealPath());
        $csv->setHeaderOffset(0);
    
        $records = Statement::create()->process($csv);
    
        foreach ($records as $record) {
            $psgc_code = trim($record['10-digit PSGC']);
            $name = trim($record['Name']);
            $correspondence_code = trim($record['Correspondence Code']);
            $old_names = trim($record['Old names']);
            $city_class = trim($record['City Class']);
            $income_classification = trim($record['Income Classification']);
            $population_2020 = trim($record['2020 Population']);
            $status = trim($record['Status']);
    
            $population_2020 = str_replace(',', '', $population_2020);
            $population_2020 = is_numeric($population_2020) ? $population_2020 : 0;

            $reg_code = substr($psgc_code, 0, 2);
            $prov_code = substr($psgc_code, 0, 5);
            $citymun_code = substr($psgc_code, 0, 7);
    
            if (PsgcCity::where('psgc_code', $psgc_code)->exists()) return;
    
            PsgcCity::create([
                'psgc_code' => $psgc_code,
                'name' => $name,
                'correspondence_code' => $correspondence_code,
                'old_names' => $old_names,
                'city_class' => $city_class,
                'income_classification' => $income_classification,
                'population_2020' => $population_2020,
                'status' => $status,
                'reg_code' => $reg_code,
                'prov_code' => $prov_code,
                'citymun_code' => $citymun_code,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return redirect('/mellpi_pro_LGU')->withStatus(__('City successfully added.'));
    }
    
    public function Munupload(Request $request)
    {
        $request->validate([
            'inputcsvfileMun' => 'required|mimes:csv,txt'
        ]);
        $csv = Reader::createFromPath($request->file('inputcsvfileMun')->getRealPath());
        $csv->setHeaderOffset(0);
    
        $records = Statement::create()->process($csv);
    
        foreach ($records as $record) {
            $psgc_code = trim($record['10-digit PSGC']);
            $name = trim($record['Name']);
            $correspondence_code = trim($record['Correspondence Code']);
            $old_names = trim($record['Old names']);
            $income_classification = trim($record['Income Classification']);
            $population_2020 = trim($record['2020 Population']);
            $status = trim($record['Status']);
    
            $population_2020 = str_replace(',', '', $population_2020);
            $population_2020 = is_numeric($population_2020) ? $population_2020 : 0;

            $reg_code = substr($psgc_code, 0, 2);
            $prov_code = substr($psgc_code, 0, 5);
            $citymun_code = substr($psgc_code, 0, 7);
    
            if (PsgcMunicipality::where('psgc_code', $psgc_code)->exists()) return;
    
            PsgcMunicipality::create([
                'psgc_code' => $psgc_code,
                'name' => $name,
                'correspondence_code' => $correspondence_code,
                'old_names' => $old_names,
                'income_classification' => $income_classification,
                'population_2020' => $population_2020,
                'status' => $status,
                'reg_code' => $reg_code,
                'prov_code' => $prov_code,
                'citymun_code' => $citymun_code,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return redirect('/mellpi_pro_LGU')->withStatus(__('Municipality successfully added.'));
    }
    
    public function SubMunupload(Request $request)
    {
        $request->validate([
            'inputcsvfileSubMun' => 'required|mimes:csv,txt'
        ]);
    
        $csv = Reader::createFromPath($request->file('inputcsvfileSubMun')->getRealPath());
        $csv->setHeaderOffset(0);
    
        $records = Statement::create()->process($csv);
    
        foreach ($records as $record) {
            $psgc_code = trim($record['10-digit PSGC']);
            $name = trim($record['Name']);
            $correspondence_code = trim($record['Correspondence Code']);
            $population_2020 = trim($record['2020 Population']);
    
            $population_2020 = str_replace(',', '', $population_2020);
            $population_2020 = is_numeric($population_2020) ? $population_2020 : 0;

            $reg_code = substr($psgc_code, 0, 2);
            $prov_code = substr($psgc_code, 0, 5);
            $citymun_code = substr($psgc_code, 0, 7);
    
            if (PsgcSubMunicipality::where('psgc_code', $psgc_code)->exists()) continue;
    
            PsgcSubMunicipality::create([
                'psgc_code' => $psgc_code,
                'name' => $name,
                'correspondence_code' => $correspondence_code,
                'population_2020' => $population_2020,
                'reg_code' => $reg_code,
                'prov_code' => $prov_code,
                'citymun_code' => $citymun_code,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return redirect('/mellpi_pro_LGU')->withStatus(__('Sub municipality successfully added.'));
    }
    
    public function Barangayupload(Request $request)
    {
        $request->validate([
            'inputcsvfileBarangay' => 'required|mimes:csv,txt'
        ]);
        $csv = Reader::createFromPath($request->file('inputcsvfileBarangay')->getRealPath());
        $csv->setHeaderOffset(0);
    
        $records = Statement::create()->process($csv);
    
        foreach ($records as $record) {
            $psgc_code = trim($record['10-digit PSGC']);
            $name = trim($record['Name']);
            $correspondence_code = trim($record['Correspondence Code']);
            $old_names = trim($record['Old names']);
            $urban_rural_classification = trim($record['Urban / Rural (based on 2020 CPH)']);
            $population_2020 = trim($record['2020 Population']);
            $status = trim($record['Status']);
    
            $population_2020 = str_replace(',', '', $population_2020);
            $population_2020 = is_numeric($population_2020) ? $population_2020 : 0;
            
            $reg_code = substr($psgc_code, 0, 2);
            $prov_code = substr($psgc_code, 0, 5);
            $citymun_code = substr($psgc_code, 0, 7);
    
            if (PsgcBarangay::where('psgc_code', $psgc_code)->exists()) return;
    
            PsgcBarangay::create([
                'psgc_code' => $psgc_code,
                'name' => $name,
                'correspondence_code' => $correspondence_code,
                'old_names' => $old_names,
                'urban_rural_classification' => $urban_rural_classification,
                'population_2020' => $population_2020,
                'status' => $status,
                'reg_code' => $reg_code,
                'prov_code' => $prov_code,
                'citymun_code' => $citymun_code,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return redirect('/mellpi_pro_LGU')->withStatus(__('Barangay successfully added.'));
    }

    public function EquipmentInventoryupload(Request $request)
    {
        $request->validate([
            'inputcsvfileEquipmentInventory' => 'required|mimes:csv,txt'
        ]);
        $csv = Reader::createFromPath($request->file('inputcsvfileEquipmentInventory')->getRealPath());
        $csv->setHeaderOffset(0);
    
        $records = Statement::create()->process($csv);
    
        foreach ($records as $record) {
            if (empty(trim($record['PSGC']))) {
                continue;
            }
            
            $psgc_code = trim($record['PSGC']);
        
            $data = [
                'total_barangay' =>  $this->convertToInt(trim($record['Total No. of Barangays'] ?? '')),
                'wooden_hb' => $this->convertToInt(trim($record['Wooden HB'] ?? '')),
                'non_wooden_hb' => $this->convertToInt(trim($record['Non-wooden HB'] ?? '')),
                'defective_hb' => $this->convertToInt(trim($record['Defective/ Non-functional HB'] ?? '')),
                'total_hb' => $this->convertToInt(trim($record['Total HB'] ?? '')),
                'availability_hb' => $this->convertToFloat(trim($record['HB % Availability'] ?? '')),
                'steel_rules' => $this->convertToInt(trim($record['Steel Rules'] ?? '')),
                'microtoise' => $this->convertToInt(trim($record['Microtoise'] ?? '')),
                'infantometer' => $this->convertToInt(trim($record['Infantometer'] ?? '')),
                'remarks_hb' => trim($record['Remarks HB'] ?? ''),
                'hanging_type' => $this->convertToInt(trim($record['Hanging-type'] ?? '')),
                'defective_ws' => $this->convertToInt(trim($record['Defective/ Non-functional WS'] ?? '')),
                'total_ws' => $this->convertToInt(trim($record['Total WS'] ?? '')),
                'availability_ws' => $this->convertToFloat(trim($record['WS % Availability'] ?? '')),
                'infat_scale' => $this->convertToInt(trim($record['Infant Scale'] ?? '')),
                'beam_balance' => $this->convertToInt(trim($record['Beam Balance'] ?? '')),
                'remarks_ws' => trim($record['Remarks WS'] ?? ''),
                'child' => $this->convertToInt(trim($record['Child'] ?? '')),
                'defective_muac_child' => $this->convertToInt(trim($record['Defective/ Non-functional Child'] ?? '')),
                'total_muac_child' => $this->convertToInt(trim($record['Total Child'] ?? '')),
                'availability_muac_child' => $this->convertToFloat(trim($record['% Availability Child'] ?? '')),
                'adults' => $this->convertToInt(trim($record['Adult'] ?? '')),
                'defective_muac_adults' => $this->convertToInt(trim($record['Defective/ Non-functional Adult'] ?? '')),
                'total_muac_adults' => $this->convertToInt(trim($record['Total Adult'] ?? '')),
                'availability_muac_adults' => $this->convertToFloat(trim($record['% Availability Adult'] ?? '')),
                'remarks_muac' => trim($record['Remarks MUAC'] ?? ''),
            ];

            $citymunExists = PsgcCity::where('psgc_code', $psgc_code)->first() ??
            PsgcMunicipality::where('psgc_code', $psgc_code)->first();

            if (!$citymunExists) {
                // return redirect()->back()->with('error', 'Invalid 10-Digit PSGC code.' . $psgc_code);
                
                $correspondenceExists = PsgcCity::where('correspondence_code', $psgc_code)->first() ??
                PsgcMunicipality::where('correspondence_code', $psgc_code)->first();
                
                if (!$correspondenceExists) {
                    // return redirect()->back()->with('error', 'Invalid Correspondence code PSGC code.');
                    return redirect()->back()->with('error', 'Invalid 10-Digit PSGC code.' . $psgc_code);
                }

                $equipmentInventory = PsgcEquipmentInventory::where('citymun_code', $correspondenceExists->citymun_code)->first();
                $totalBarangaysFromDB = $this->getTotalBarangaysFromDB($correspondenceExists->citymun_code);
    
                if ($equipmentInventory) {
                    $equipmentInventory->update($data);
                } else {
                    PsgcEquipmentInventory::create(array_merge($data, [
                        // 'total_barangay' => $totalBarangaysFromDB,
                        'psgc_code' => $correspondenceExists->psgc_code,
                        'name' => $correspondenceExists->name,
                        'correspondence_code' => $correspondenceExists->correspondence_code,
                        'city_class' => $correspondenceExists->city_class,
                        'reg_code' => $correspondenceExists->reg_code,
                        'prov_code' => $correspondenceExists->prov_code,
                        'citymun_code' => $correspondenceExists->citymun_code,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]));
                }
                continue;
            }

            $equipmentInventory = PsgcEquipmentInventory::where('citymun_code', $citymunExists->citymun_code)->first();
            $totalBarangaysFromDB = $this->getTotalBarangaysFromDB($citymunExists->citymun_code);
    
            if ($equipmentInventory) {
                $equipmentInventory->update($data);
            } else {
                PsgcEquipmentInventory::create(array_merge($data, [
                    // 'total_barangay' => $totalBarangaysFromDB,
                    'psgc_code' => $citymunExists->psgc_code,
                    'name' => $citymunExists->name,
                    'correspondence_code' => $citymunExists->correspondence_code,
                    'city_class' => $citymunExists->city_class,
                    'reg_code' => $citymunExists->reg_code,
                    'prov_code' => $citymunExists->prov_code,
                    'citymun_code' => $citymunExists->citymun_code,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]));
            }
            
        }
        
        return redirect('/mellpi_pro_LGU')->withStatus(__('Equipment Inventory successfully added.'));
    }

    public function PersonnelDirectoryupload(Request $request)
    {
        $request->validate([
            'inputcsvfilePersonnelDirectory' => 'required|mimes:csv,txt'
        ]);
        $csv = Reader::createFromPath($request->file('inputcsvfilePersonnelDirectory')->getRealPath());
        $csv->setHeaderOffset(0);
    
        $records = Statement::create()->process($csv);
    
        foreach ($records as $record) {
            // Detect the directory type based on the first column
            $directory_type = strtolower(trim($record[array_keys($record)[0]]));
        
            $psgc_code = trim($record['PSGC']);
        
            if (!in_array($directory_type, ['nao', 'npc', 'bns'])) {
                return redirect()->back()->with('error', 'Invalid directory type: ' . $directory_type);
            }
        
            $citymunExists = PsgcCity::where('psgc_code', $psgc_code)->first() 
            ?? PsgcMunicipality::where('psgc_code', $psgc_code)->first();
            $barangayExists = null;

            if (!$citymunExists) {
                $barangayExists = PsgcBarangay::where('psgc_code', $psgc_code)->first();
                if (!$barangayExists) {
                    return redirect()->back()->with('error', 'Invalid 10-Digit PSGC code: ' . $psgc_code);
                }
            }
        
            // Common personnel data
            $personnelData = [
                'id_number' => trim($record['ID No.'] ?? ''),
                'lastname' => trim($record['Last Name'] ?? ''),
                'firstname' => trim($record['First Name'] ?? ''),
                'middlename' => trim($record['Middle Name'] ?? ''),
                'suffix' => trim($record['Suffix'] ?? ''),
                'sex' => trim($record['Sex'] ?? ''),
                'age' => trim($record['Age'] ?? ''),
                'birthdate' => trim($record['Birthdate'] ?? ''),
                'educationalbackground' => trim($record['Educational Background'] ?? ''),
                'degreeCourse' => trim($record['Degree, course or years finished'] ?? ''),
                'address' => trim($record['Address'] ?? ''),
                'civilstatus' => trim($record['Civil Status'] ?? ''),
                'email' => trim($record['Email Address'] ?? ''),
                'cellphonenumer' => trim($record['Cellphone Number'] ?? ''),
                'telephonenumber' => trim($record['Telephone Number'] ?? ''),
                'directory_type' => $directory_type, // nao | npc | bns
                'name_on_id' => trim($record['Name on ID'] ?? ''),
                'psgc_code' => $citymunExists->psgc_code ?? $barangayExists->psgc_code,
                'name' => $citymunExists->name ?? $barangayExists->name,
                'correspondence_code' => $citymunExists->correspondence_code ?? $barangayExists->correspondence_code,
                'reg_code' => $citymunExists->reg_code ?? $barangayExists->reg_code,
                'prov_code' => $citymunExists->prov_code ?? $barangayExists->prov_code,
                'citymun_code' => $citymunExists->citymun_code ?? $barangayExists->citymun_code,
            ];
        
            // Check if the personnel already exists
            $personnel = PersonnelDnaDirectoryModel::where('email', $personnelData['email'])->first();
        
            if ($personnel) {
                $personnel->update($personnelData);
            } else {
                $personnel = PersonnelDnaDirectoryModel::create($personnelData);
            }
    
            switch ($directory_type) {
                case 'nao':
                    $naoData = [
                        'namegovmayor' => trim($record['Name of Governor/Mayor'] ?? ''),
                        'typenao' => trim($record['Type of NAO'] ?? ''),
                        'typedesignation' => trim($record['Type of Designation'] ?? ''),
                        'datedesignation' => trim($record['Date of Designation'] ?? ''),
                        'typeappointment' => trim($record['Type of Appointment'] ?? ''),
                        'position' => trim($record['Office Position/Title'] ?? ''),
                        'department' => trim($record['Office/Department'] ?? ''),
                        'personnel_id' => $personnel->id, // Link to the personnel record
                    ];
                    PersonnelDnaDirectoryNaoModel::updateOrCreate(['personnel_id' => $naoData['personnel_id']], $naoData);
                    break;
        
                case 'npc':
                    $npcData = [
                        'namegovmayor' => trim($record['Name of Governor/Mayor'] ?? ''),
                        'typenpc' => trim($record['Type of NPC'] ?? ''),
                        'typedesignation' => trim($record['Type of Designation'] ?? ''),
                        'datedesignation' => trim($record['Date of Designation'] ?? ''),
                        'typeappointment' => trim($record['Type of Appointment'] ?? ''),
                        'position' => trim($record['Office Position/Title'] ?? ''),
                        'department' => trim($record['Office/Department'] ?? ''),
                        'dcnpcapmembership' => trim($record['DCNPCAP Membership'] ?? ''),
                        'dcnpcapposition' => trim($record['DCNPCAP-Position (if officer)'] ?? ''),
                        'dcnpcapofficer' => trim($record['National or Regional (DCNPCAP Officer)'] ?? ''),
                        'personnel_id' => $personnel->id, // Link to the personnel record
                    ];
                    PersonnelDnaDirectoryNpcModel::updateOrCreate(['personnel_id' => $npcData['personnel_id']], $npcData);
                    break;
        
                case 'bns':
                    $bnsData = [
                        'barangay' => trim($record['Barangay'] ?? ''),
                        'statusemployment' => trim($record['Status of Employment'] ?? ''),
                        'beneficiaryname' => trim($record['Beneficiary Name'] ?? ''),
                        'relationship' => trim($record['Relationship'] ?? ''),
                        'periodactivefrom' => trim($record['Period of active service from'] ?? ''),
                        'periodactiveto' => trim($record['Period of active service to'] ?? ''),
                        'lastupdate' => trim($record['Last updated'] ?? ''),
                        'bnsstatus' => trim($record['BNS Status'] ?? ''),
                        'personnel_id' => $personnel->id, // Link to the personnel record
                    ];
                    PersonnelDnaDirectoryBnsModel::updateOrCreate(['personnel_id' => $bnsData['personnel_id']], $bnsData);
                    break;
        
                default:
                    return redirect()->back()->with('error', 'Unknown directory type.');
            }
            
        }
    
        return redirect('/mellpi_pro_LGU')->withStatus(__('Personnel Directory successfully added.'));
    }
    

    public function LncFunctionalityupload(Request $request)
    {
        $request->validate([
            'inputcsvfileLncFunctionality' => 'required|mimes:csv,txt'
        ]);

        $csv = Reader::createFromPath($request->file('inputcsvfileLncFunctionality')->getRealPath());
        $csv->setHeaderOffset(0); 

        $records = Statement::create()->process($csv);

        foreach ($records as $record) {
            if (empty(trim($record['10-digit PSGC']))) {
                continue;
            }
            $psgc_code = trim($record['10-digit PSGC']);
            
            $data = [
                'cd' => $this->convertToInt(trim($record['CD'] ?? '')),
                'pp1a' => $this->convertToInt(trim($record['PP1A'] ?? '')),
                'pp1b' => $this->convertToInt(trim($record['PP1B'] ?? '')),
                'pp2a' => $this->convertToInt(trim($record['PP2A'] ?? '')),
                'pp2b' => $this->convertToInt(trim($record['PP2B'] ?? '')),
                'pp3a' => $this->convertToInt(trim($record['PP3A'] ?? '')),
                'pp3b' => $this->convertToInt(trim($record['PP3B'] ?? '')),
                'pp4a' => $this->convertToInt(trim($record['PP4A'] ?? '')),
                'nsd' => $this->convertToInt(trim($record['NSD'] ?? '')),
                'me1' => $this->convertToInt(trim($record['ME1'] ?? '')),
                'me2' => $this->convertToInt(trim($record['ME2'] ?? '')),
                'me3' => $this->convertToInt(trim($record['ME3'] ?? '')),
                'total' => $this->convertToInt(trim($record['Total'] ?? '')),
                'functionality' => trim($record['Functionality'] ?? '')
            ];

            if (PsgcRegion::where('psgc_code', $psgc_code)->exists()) {
                $region = PsgcRegion::where('psgc_code', $psgc_code)->first();
    
                $lncFunctionalityExists = LncFunctionality::where('psgc_code', $psgc_code)->first();

                if ($lncFunctionalityExists) {
                    $lncFunctionalityExists->update($data);
                } else {
                    LncFunctionality::create(array_merge($data, [
                        'psgc_code' => $region->psgc_code,
                        'name' => $region->name,
                        'correspondence_code' => $region->correspondence_code,
                        'geographic_level' => 'Reg',
                        'reg_code' => $region->reg_code,
                    ]));
                }
                
            } elseif (PsgcProvince::where('psgc_code', $psgc_code)->exists()) {
                $province = PsgcProvince::where('psgc_code', $psgc_code)->first();
    
                $lncFunctionalityExists = LncFunctionality::where('psgc_code', $psgc_code)->first();

                if ($lncFunctionalityExists) {
                    $lncFunctionalityExists->update($data);
                } else {
                    LncFunctionality::create(array_merge($data, [
                        'psgc_code' => $province->psgc_code,
                        'name' => $province->name,
                        'correspondence_code' => $province->correspondence_code,
                        'geographic_level' => 'Prov',
                        'reg_code' => $province->reg_code,
                        'prov_code' => $province->prov_code,
                    ]));
                }
                
            } elseif (PsgcCity::where('psgc_code', $psgc_code)->exists()) {
                $city = PsgcCity::where('psgc_code', $psgc_code)->first();
    
                $lncFunctionalityExists = LncFunctionality::where('psgc_code', $psgc_code)->first();

                if ($lncFunctionalityExists) {
                    $lncFunctionalityExists->update($data);
                } else {
                    LncFunctionality::create(array_merge($data, [
                        'psgc_code' => $city->psgc_code,
                        'name' => $city->name,
                        'correspondence_code' => $city->correspondence_code,
                        'geographic_level' => $city->city_class,
                        'reg_code' => $city->reg_code,
                        'prov_code' => $city->prov_code,
                        'citymun_code' => $city->citymun_code,
                    ]));
                }
                
            } elseif (PsgcMunicipality::where('psgc_code', $psgc_code)->exists()) {
                $municipality = PsgcMunicipality::where('psgc_code', $psgc_code)->first();
    
                $lncFunctionalityExists = LncFunctionality::where('psgc_code', $psgc_code)->first();

                if ($lncFunctionalityExists) {
                    $lncFunctionalityExists->update($data);
                } else {
                    LncFunctionality::create(array_merge($data, [
                        'psgc_code' => $municipality->psgc_code,
                        'name' => $municipality->name,
                        'correspondence_code' => $municipality->correspondence_code,
                        'geographic_level' => 'Mun',
                        'reg_code' => $municipality->reg_code,
                        'prov_code' => $municipality->prov_code,
                        'citymun_code' => $municipality->citymun_code,
                    ]));
                }
                
            } elseif (PsgcBarangay::where('psgc_code', $psgc_code)->exists()) {
                $barangay = PsgcBarangay::where('psgc_code', $psgc_code)->first();
    
                $lncFunctionalityExists = LncFunctionality::where('psgc_code', $psgc_code)->first();

                if ($lncFunctionalityExists) {
                    $lncFunctionalityExists->update($data);
                } else {
                    LncFunctionality::create(array_merge($data, [
                        'psgc_code' => $barangay->psgc_code,
                        'name' => $barangay->name,
                        'correspondence_code' => $barangay->correspondence_code,
                        'geographic_level' => 'Bgy',
                        'reg_code' => $barangay->reg_code,
                        'prov_code' => $barangay->prov_code,
                        'citymun_code' => $barangay->citymun_code,
                    ]));
                }
                
            } elseif (PsgcSubMunicipality::where('psgc_code', $psgc_code)->exists()) {
                $submunicipal = PsgcSubMunicipality::where('psgc_code', $psgc_code)->first();
    
                $lncFunctionalityExists = LncFunctionality::where('psgc_code', $psgc_code)->first();

                if ($lncFunctionalityExists) {
                    $lncFunctionalityExists->update($data);
                } else {
                    LncFunctionality::create(array_merge($data, [
                        'psgc_code' => $submunicipal->psgc_code,
                        'name' => $submunicipal->name,
                        'correspondence_code' => $submunicipal->correspondence_code,
                        'geographic_level' => 'SubMun',
                        'reg_code' => $submunicipal->reg_code,
                        'prov_code' => $submunicipal->prov_code,
                        'citymun_code' => $submunicipal->citymun_code,
                    ]));
                }
            } else {
                return redirect()->back()->with('error', 'Invalid 10-Digit PSGC code: ' . $psgc_code);
            }

        }

        return redirect('/mellpi_pro_LGU')->withStatus(__('LNC Functionality data successfully uploaded.'));
    }

    private function getTotalBarangaysFromDB(string $citymun_code): int
    {
        $cityOfManilaCode = '1380600';
        $query = PsgcBarangay::query();

        if ($citymun_code === $cityOfManilaCode) {
            $query->where('citymun_code', 'like', '13806%');
            return $query->count();
        }
        
        $query->where('citymun_code', $citymun_code);
        return $query->count() ?? 0;
    }
    
    private function convertToInt($value) {
        return is_numeric($value) ? (int)$value : 0;
    }
    
    private function convertToFloat($value) {
        return is_numeric($value) ? (float)$value : 0.00;
    }
    
    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'inputcsvfile' => 'required|mimes:csv,txt'
    //     ]);
    //     $csv = Reader::createFromPath($request->file('inputcsvfile')->getRealPath());
    //     $csv->setHeaderOffset(0);

    //     // checker
    //     //dd($request->file('inputcsvfile'));
    //     // dd($request->file('inputcsvfile')->getRealPath());
    //     $count = 0;

    //     $ExistingPSGCData = PSGC::all();
    //     $ExistingRegionData = Region::all();
    //     $ExistingProvinceData = Province::all();
    //     $ExistingMunicipalData = Municipal::all();

    //     foreach ($csv as $record) {

    //         $ExistingDatahold =  $ExistingPSGCData->where('psgccode', $record['Code'])->first();

    //         // parse from fetch data

    //         // parse from bulk Data
    //         $regionsubtr = substr($record['Code'], 0, 2);
    //         $provsubtr = substr($record['Code'], 2, 4);
    //         $munsubtr = substr($record['Code'], 5, 6);


    //         // substr

    //         if ($ExistingDatahold) {
    //             continue;
    //         } else {



    //             if ($record['Geographic_Level'] === 'Bgy') {
    //                 $PSGCdata = PSGC::create([
    //                     'psgccode' => $record['Code'],
    //                     'correspondencecode' => $record['Correspondence_Code'],
    //                     'geolevel' => $record['Geographic_Level'],
    //                     'oldname' => $record['Old_names'],
    //                     'incomeclass' =>  '0',
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 $Regiondata = Region::create([
    //                     'psgccode_id' => $PSGCdata->id,
    //                     'region' => $record['Name'],
    //                     'regclass' => '0',
    //                     'regnumber' =>  $record['Number'],
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 $Provincedata = Province::create([
    //                     'region_id' => $Regiondata->id,
    //                     'province' => $record['Name'],
    //                     'proclass' =>  '0',
    //                     'provnumber' => $record['Number'],
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 $Municipaldata = Municipal::create([
    //                     'province_id' => $Provincedata->id,
    //                     'municipal' => $record['Name'],
    //                     'munclass' => $record['Income_classification'],
    //                     'munnumber' => $record['Number'],
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 $Barangaydata = Barangay::create([
    //                     'municipal_id' => $Municipaldata->id,
    //                     'barangay' => $record['Name'],
    //                     'brgytype' => $record['Type'],
    //                     'brgynumber' => $record['Number'],
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);
    //             } elseif ($record['Geographic_Level'] === 'Mun'  || $record['Geographic_Level'] === 'City') {
    //                 //echo 'Municipal', $count;
    //                 $PSGCdata = PSGC::create([
    //                     'psgccode' => $record['Code'],
    //                     'correspondencecode' => $record['Correspondence_Code'],
    //                     'geolevel' => $record['Geographic_Level'],
    //                     'oldname' => $record['Old_names'],
    //                     'incomeclass' =>  '0',
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 $Regiondata = Region::create([
    //                     'psgccode_id' => $PSGCdata->id,
    //                     'region' => $record['Name'],
    //                     'regclass' => '0',
    //                     'regnumber' =>  $record['Number'],
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 $Provincedata = Province::create([
    //                     'region_id' => $Regiondata->id,
    //                     'province' => $record['Name'],
    //                     'proclass' =>  '0',
    //                     'provnumber' => $record['Number'],
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 $Municipaldata = Municipal::create([
    //                     'province_id' => $Provincedata->id,
    //                     'municipal' => $record['Name'],
    //                     'munclass' => $record['Income_classification'],
    //                     'munnumber' => $record['Number'],
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);
    //             } elseif ($record['Geographic_Level'] === 'Prov') {
    //                 $PSGCdata = PSGC::create([
    //                     'psgccode' => $record['Code'],
    //                     'correspondencecode' => $record['Correspondence_Code'],
    //                     'geolevel' => $record['Geographic_Level'],
    //                     'oldname' => $record['Old_names'],
    //                     'incomeclass' =>  '0',
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 $Regiondata = Region::create([
    //                     'psgccode_id' => $PSGCdata->id,
    //                     'region' => $record['Name'],
    //                     'regclass' => '0',
    //                     'regnumber' =>  $record['Number'],
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 $Provincedata = Province::create([
    //                     'region_id' => $Regiondata->id,
    //                     'province' => $record['Name'],
    //                     'proclass' =>  $record['Income_classification'],
    //                     'provnumber' => $record['Number'],
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);
    //             } elseif ($record['Geographic_Level'] === 'Reg') {
    //                 //echo 'Region', $count;
    //                 $PSGCdata = PSGC::create([
    //                     'psgccode' => $record['Code'],
    //                     'correspondencecode' => $record['Correspondence_Code'],
    //                     'geolevel' => $record['Geographic_Level'],
    //                     'oldname' => $record['Old_names'],
    //                     'incomeclass' =>  '0',
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 $Regiondata = Region::create([
    //                     'psgccode_id' => $PSGCdata->id,
    //                     'region' => $record['Name'],
    //                     'regclass' => $record['Income_classification'],
    //                     'regnumber' =>  $record['Number'],
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);
    //             } else {
    //                 echo "data is not found!";
    //                 //  loop++;
    //                 // continue;
    //             }
    //         }


    //         //    $count++;
    //     }

    //     // Test limit to 2000 data rows
    //     if ($count >= 20000) {
    //         dd($count, ' records imported!');
    //     }

    //     //return redirect()->back()->with('success', 'CSV file uploaded successfully.');
    //     return redirect('/mellpi_pro_LGU')->withStatus(__('LGU Profile successfully added.'));
    // }

    // public function Regionupload(Request $request)
    // {
    //     $request->validate([
    //         'inputcsvfileRegion' => 'required|mimes:csv,txt'
    //     ]);
    //     $csv = Reader::createFromPath($request->file('inputcsvfileRegion')->getRealPath());
    //     $csv->setHeaderOffset(0);

    //     // checker
    //     //dd($request->file('inputcsvfileRegion'));
    //     // dd($request->file('inputcsvfile')->getRealPath());
    //     $count = 0;

    //     $ExistingPSGCData = PSGC::all();
    //     $ExistingRegionData = Region::all();

    //     foreach ($csv as $record) {

    //         $ExistingDatahold =  $ExistingPSGCData->where('psgccode', $record['Code'])->first();

    //         // parse two digits
    //         $regionsubtr = substr($record['Code'], 0, 2);
    //         //dd($regionsubtr);

    //         if ($ExistingDatahold) {
    //             continue;
    //         } else {

    //             $PSGCdata = PSGC::create([
    //                 'psgccode' => $record['Code'],
    //                 'correspondencecode' =>  '0',
    //                 'geolevel' =>  '0',
    //                 'oldname' =>  '0',
    //                 'incomeclass' =>  '0',
    //                 'created_at' => now(),
    //                 'updated_at' => now(),
    //             ]);


    //             Region::create([
    //                 'psgccode_id' => $PSGCdata->id,
    //                 'region' => $record['Name'],
    //                 'regclass' => '0',
    //                 'regnumber' =>  '0',
    //                 'created_at' => now(),
    //                 'updated_at' => now(),
    //             ]);
    //         }
    //     }


    //     //return redirect()->back()->with('success', 'CSV file uploaded successfully.');
    //     return redirect('/mellpi_pro_LGU')->withStatus(__('LGU Profile successfully added.'));
    // }

    // public function Provinceupload(Request $request)
    // {
    //     $request->validate([
    //         'inputcsvfileProvince' => 'required|mimes:csv,txt'
    //     ]);
    //     $csv = Reader::createFromPath($request->file('inputcsvfileProvince')->getRealPath());
    //     $csv->setHeaderOffset(0);

    //     // checker
    //     //dd($request->file('inputcsvfileProvince'));
    //     // dd($request->file('inputcsvfile')->getRealPath());
    //     $count = 0;
    //     foreach ($csv as $record) {
    //         // parse raw data  psgc  
    //         $regionsubtr = substr($record['Code'], 0, 2);
    //         //dd($regionsubtr);

    //         // query get match psgc database
    //         $datamatchRegions = DB::table('psgcs')
    //             ->join('regions', 'psgcs.id', '=', 'regions.psgccode_id')
    //             ->select('regions.psgccode_id', 'regions.id as regionid', 'psgccode', 'region as regionname')
    //             ->where('psgccode', 'LIKE', $regionsubtr . '%')
    //             ->first();

    //         $provinceQueryExist = DB::table('psgcs')->where('psgccode', $record['Code'])->first();
    //         //dd($datamatchRegions->regionid,$regionsubtr,$record['Code'], $provinceQueryExist); 

    //         if ($provinceQueryExist) {
    //             echo 'Data found!';
    //             continue;
    //         } else {
    //             echo 'Data does not exists!';

    //             $psgcID = PSGC::create([
    //                 'psgccode' => $record['Code'],
    //                 'correspondencecode' =>  '0',
    //                 'geolevel' =>  '0',
    //                 'oldname' =>  '0',
    //                 'incomeclass' =>  '0',
    //                 'created_at' => now(),
    //                 'updated_at' => now(),
    //             ]);

    //             Province::create([
    //                 'region_id' => $datamatchRegions->regionid,
    //                 'psgccode_id' => $psgcID->id,
    //                 'province' =>  $record['Name'],
    //                 'proclass' =>  '0',
    //                 'provnumber' => '0',
    //                 'created_at' => now(),
    //                 'updated_at' => now(),
    //             ]);
    //         }
    //     }


    //     //return redirect()->back()->with('success', 'CSV file uploaded successfully.');
    //     return redirect('/mellpi_pro_LGU')->withStatus(__('LGU Profile successfully added.'));
    // }

    // public function Cityupload(Request $request)
    // {
    //     $request->validate([
    //         'inputcsvfileCity' => 'required|mimes:csv,txt'
    //     ]);
    //     $csv = Reader::createFromPath($request->file('inputcsvfileCity')->getRealPath());
    //     $csv->setHeaderOffset(0);

    //     // checker
    //     //dd($request->file('inputcsvfileCity'));
    //     //dd($request->file('inputcsvfile')->getRealPath());
    //     $count = 0;
    //     foreach ($csv as $record) {

    //         // parse raw data  psgc  
    //         $regionsubtr = substr($record['Code'], 0, 2);
    //         //dd($regionsubtr);

    //         // query get match psgc database
    //         $datamatchRegionsDATA = DB::table('psgcs')
    //             ->join('regions', 'psgcs.id', '=', 'regions.psgccode_id')
    //             ->select('regions.psgccode_id', 'regions.id as regionid', 'psgccode',)
    //             // ->select('psgccode')
    //             ->where('psgccode', 'LIKE', $regionsubtr . '%')
    //             ->first();

    //         $provinceQueryExist = DB::table('psgcs')->where('psgccode', $record['Code'])->first();
    //         //dd($datamatchRegionsDATA); 

    //         if ($provinceQueryExist) {
    //             echo 'Data found!';
    //             continue;
    //         } else {
    //             echo 'Data does not exists!';
    //             $PSGCdata = PSGC::create([
    //                 'psgccode' => $record['Code'],
    //                 'correspondencecode' =>  '0',
    //                 'geolevel' =>  '0',
    //                 'oldname' =>  '0',
    //                 'incomeclass' =>  '0',
    //                 'created_at' => now(),
    //                 'updated_at' => now(),
    //             ]);


    //             City::create([
    //                 'region_id' => $datamatchRegionsDATA->regionid,
    //                 'psgccode_id' =>   $PSGCdata->id,
    //                 'city' =>  $record['Name'],
    //                 'cityclass' =>  '0',
    //                 'citynumber' => '0',
    //                 'cityIncomeClass' => '0',
    //                 'created_at' => now(),
    //                 'updated_at' => now(),
    //             ]);
    //         }
    //     }


    //     //return redirect()->back()->with('success', 'CSV file uploaded successfully.');
    //     return redirect('/mellpi_pro_LGU')->withStatus(__('LGU Profile successfully added.'));
    // }

    // public function Munupload(Request $request)
    // {
    //     $request->validate([
    //         'inputcsvfileMun' => 'required|mimes:csv,txt|max: 100000'
    //     ]);
    //     $csv = Reader::createFromPath($request->file('inputcsvfileMun')->getRealPath());
    //     $csv->setHeaderOffset(0);
    //     //dd($request->file('inputcsvfileMun'));

    //     foreach ($csv as $record) {
    //         $provinceQueryExist = DB::table('psgcs')->where('psgccode', $record['Code'])->first();
    //         //dd($provinceQueryExist); 

    //         // if data found
    //         if ($provinceQueryExist) {
    //             continue;
    //         } else {
    //             // if datacolumn is Reg, City , Prov
    //             if ($record['Geographic_Level'] == 'Reg' || $record['Geographic_Level'] == 'Prov' || $record['Geographic_Level'] == 'City' ||  $record['Geographic_Level'] == 'Bgy' ||  $record['Geographic_Level'] == 'SubMun') {
    //                 continue;
    //             } else {
    //                 // if Munnicipal
    //                 // parse raw data  psgc  
    //                 $provincensubtr = substr($record['Code'], 0, 4);
    //                 //dd($provincensubtr , $record['Code']);

    //                 // parse raw data  psgc  
    //                 $regionsubtr1 = substr($record['Code'], 0, 2);
    //                 //dd($regionsubtr1);
    //                 // query get match psgc database
    //                 $datamatchRegions = DB::table('psgcs')
    //                     ->join('regions', 'psgcs.id', '=', 'regions.psgccode_id')     //connection to regions psgc code
    //                     ->join('provinces', 'regions.id', '=', 'provinces.region_id') //connection to regions data            //connection to regions data
    //                     ->select('psgccode', 'regions.id as regionid', 'provinces.id as provinceid')
    //                     ->where('psgccode', 'LIKE', $regionsubtr1 . '%')
    //                     ->first();
    //                 //dd($datamatchRegions->provinceid, $record['Code']);


    //                 $psgcData = PSGC::create([
    //                     'psgccode' => $record['Code'],
    //                     'correspondencecode' =>  '0',
    //                     'geolevel' =>  '0',
    //                     'oldname' =>  '0',
    //                     'incomeclass' =>  '0',
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 Municipal::create([
    //                     'province_id' => $datamatchRegions->provinceid,
    //                     'psgccode_id' => $psgcData->id,
    //                     'municipal' => $record['Name'],
    //                     'munclass' => '0',
    //                     'munnumber' => '0',
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);
    //             }
    //         }
    //     }

    //     //return redirect()->back()->with('success', 'CSV file uploaded successfully.');
    //     return redirect('/mellpi_pro_LGU')->withStatus(__('LGU Profile successfully added.'));
    // }

    // public function Barangayupload(Request $request)
    // {
    //     $request->validate([
    //         'inputcsvfileBarangay' => 'required|mimes:csv,txt|max: 100000'
    //     ]);
    //     $csv = Reader::createFromPath($request->file('inputcsvfileBarangay')->getRealPath());
    //     $csv->setHeaderOffset(0);
    //     //dd($request->file('inputcsvfileBarangay'));

    //     foreach ($csv as $record) {
    //         $provinceQueryExist = DB::table('psgcs')->where('psgccode', $record['Code'])->first();
    //         //dd($provinceQueryExist); 

    //         // if data found
    //         if ($provinceQueryExist) {
    //             continue;

    //             //dd('Exist!');
    //         } else {
                
    //             // if datacolumn is Reg, City , Prov
    //             if ($record['Geographic_Level'] == 'Reg' || $record['Geographic_Level'] == 'City' || $record['Geographic_Level'] == 'Prov' ||  $record['Geographic_Level'] == 'Mun') {
    //                 continue;

    //             } else { 
    //                 //dd('Municipal');

    //                 // parse raw data  psgc  
    //                 $regionsubtr = substr($record['Code'], 0, 2);
                   
    //                 $municipalsubtr = substr($record['Code'], 5, 2);

    //                 $cityData = substr($record['Code'], 5, 2);
    //                 $provincesubtr = substr($record['Code'], 0, 5);

    //                 //---------------------------------accessing municipals and city ids -----------------------------------
    //                 $dataProv = DB::table('psgcs') 
    //                 ->join('provinces', 'psgcs.id', '=', 'provinces.psgccode_id')
    //                 ->select('provinces.id as provincesID')
    //                 ->where('psgcs.psgccode', 'LIKE',  $provincesubtr . '%')
    //                 ->first();

    //                 // ----------------------get Data from PSGC to City/Province------------------------
    //                 $dataMun = DB::table('provinces') 
    //                 ->join('municipals', 'provinces.id', '=', 'municipals.province_id')
    //                 ->select('municipals.id as municipalid')
    //                 ->where('provinces.id', 'LIKE',     $dataProv->provincesID. '%')
    //                 ->first();

    //                 dd($dataProv, $provincesubtr,  $municipalsubtr,$record['Code'], $dataMun->municipalid, 'Municipal_id to Barangay');
                   
    //                 // get data city foreign key to psgc code
    //                 //The psgc code for region is 2 digit only and unique; no psgc code data is duplicated
    //                 $PSGC = DB::table('psgcs')
    //                     ->join('regions', 'psgcs.id', '=', 'regions.psgccode_id')
    //                     ->join('citys', 'regions.id', '=', 'citys.region_id')
    //                     ->select('citys.id as cityid')
    //                     ->where('psgccode', 'LIKE', $regionsubtr . '%')
    //                     ->first();
                    

                   

    //                 // compare parsed raw data to database
    //                 if ($cityData == '00') {
    //                     // citymun_id to Barangay    
    //                     dd('City properties -> barangay!....Solved!');
    //                     //dd($datamatchBarangay->cityid);
    //                     //dd($regionsubtr,$datamatchCity->cityid , $cityData ,$datamatchRegions->psgccode, $record['Code']);

    //                     //done
    //                     $PSGCdata = PSGC::create([
    //                         'psgccode' => $record['Code'],
    //                         'correspondencecode' =>  '0',
    //                         'geolevel' =>  '0',
    //                         'oldname' =>  '0',
    //                         'incomeclass' =>  '0',
    //                         'created_at' => now(),
    //                         'updated_at' => now(),
    //                     ]);

    //                     Barangay::create([
    //                         'psgccode_id' =>   $PSGCdata->id,
    //                         'citymun_id' => $PSGC->cityid,
    //                         'municipal_id' => '0', //$dataMun->municipalid,
    //                         'barangay' => $record['Name'],
    //                         'brgytype' => '0',
    //                         'brgynumber' => '0',
    //                         'created_at' => now(),
    //                         'updated_at' => now(),
    //                     ]);
    //                 } else {


    //                     //dd('Municipal_id to Barangay');
    //                     //dd('Municipal properties -> barangay!!', $PSGCmunicipal->municipalid);
                     

    //                     $PSGCdata = PSGC::create([
    //                         'psgccode' => $record['Code'],
    //                         'correspondencecode' =>  '0',
    //                         'geolevel' =>  '0',
    //                         'oldname' =>  '0',
    //                         'incomeclass' =>  '0',
    //                         'created_at' => now(),
    //                         'updated_at' => now(),
    //                     ]);

    //                     Barangay::create([

    //                         'psgccode_id' => $PSGCdata->id,
    //                         'citymun_id' => '0',
    //                         'municipal_id' =>  $dataMun->municipalid,
    //                         'barangay' => $record['Name'],
    //                         'brgytype' => '0',
    //                         'brgynumber' => '0',
    //                         'created_at' => now(),
    //                         'updated_at' => now(),
    //                     ]);
    //                 }
    //             }
    //         }
    //     }

    //     //return redirect()->back()->with('success', 'CSV file uploaded successfully.');
    //     return redirect('/mellpi_pro_LGU')->withStatus(__('LGU Profile successfully added.'));
    // }
 

    // public function Barangayupload(Request $request)
    // {
    //     $request->validate([
    //         'inputcsvfileBarangay' => 'required|mimes:csv,txt|max: 100000'
    //     ]);
    //     $csv = Reader::createFromPath($request->file('inputcsvfileBarangay')->getRealPath());
    //     $csv->setHeaderOffset(0);
    //     //dd($request->file('inputcsvfileBarangay'));

    //     foreach ($csv as $record) {
    //         $provinceQueryExist = DB::table('psgcs')->where('psgccode', $record['Code'])->first();
    //         //dd($provinceQueryExist); 

    //         // if data found
    //         if ($provinceQueryExist) {
    //             continue;

    //             //dd('Exist!');
    //         } else {
                
    //             // if datacolumn is Reg, City , Prov
    //             if ($record['Geographic_Level'] == 'Reg' || $record['Geographic_Level'] == 'City' || $record['Geographic_Level'] == 'Prov' ||  $record['Geographic_Level'] == 'Mun') {
    //                 continue;

    //             } else { 
    //                 //dd('Municipal');

    //                 // parse raw data  psgc  
    //                 $regionsubtr = substr($record['Code'], 0, 2);
                   
    //                 $municipalsubtr = substr($record['Code'], 5, 2);

    //                 $cityData = substr($record['Code'], 5, 2);

                 
                   
    //                 // get data city foreign key to psgc code
    //                 //The psgc code for region is 2 digit only and unique; no psgc code data is duplicated
    //                 $PSGC = DB::table('psgcs')
    //                     ->join('regions', 'psgcs.id', '=', 'regions.psgccode_id')
    //                     ->join('citys', 'regions.id', '=', 'citys.region_id')
    //                     ->select('citys.id as cityid')
    //                     ->where('psgccode', 'LIKE', $regionsubtr . '%')
    //                     ->first();
                    

                   

    //                 // compare parsed raw data to database
    //                 if ($cityData == '00') {
    //                     // citymun_id to Barangay    
    //                     dd('City properties -> barangay!....Solved!');
    //                     //dd($datamatchBarangay->cityid);
    //                     //dd($regionsubtr,$datamatchCity->cityid , $cityData ,$datamatchRegions->psgccode, $record['Code']);

    //                     //done
    //                     $PSGCdata = PSGC::create([
    //                         'psgccode' => $record['Code'],
    //                         'correspondencecode' =>  '0',
    //                         'geolevel' =>  '0',
    //                         'oldname' =>  '0',
    //                         'incomeclass' =>  '0',
    //                         'created_at' => now(),
    //                         'updated_at' => now(),
    //                     ]);

    //                     Barangay::create([
    //                         'psgccode_id' =>   $PSGCdata->id,
    //                         'citymun_id' => $PSGC->cityid,
    //                         'municipal_id' => '0', //$dataMun->municipalid,
    //                         'barangay' => $record['Name'],
    //                         'brgytype' => '0',
    //                         'brgynumber' => '0',
    //                         'created_at' => now(),
    //                         'updated_at' => now(),
    //                     ]);
    //                 } else {


    //                     //dd('Municipal_id to Barangay');
    //                     //dd('Municipal properties -> barangay!!', $PSGCmunicipal->municipalid);
    //                     $provincesubtr = substr($record['Code'], 0, 5);

    //                     //---------------------------------accessing municipals and city ids -----------------------------------
    //                     $dataProv = DB::table('psgcs') 
    //                     ->join('provinces', 'psgcs.id', '=', 'provinces.psgccode_id')
    //                     ->select('provinces.id as provincesID')
    //                     ->where('psgcs.psgccode', 'LIKE',  $provincesubtr . '%')
    //                     ->first();
    
    //                     // ----------------------get Data from PSGC to City/Province------------------------
    //                     $dataMun = DB::table('provinces') 
    //                     ->join('municipals', 'provinces.id', '=', 'municipals.province_id')
    //                     ->select('municipals.id as municipalid')
    //                     ->where('provinces.id', 'LIKE',     $dataProv->provincesID. '%')
    //                     ->first();

    //                     dd($dataProv, $provincesubtr,  $municipalsubtr,$record['Code'], $dataMun->municipalid, 'Municipal_id to Barangay');

    //                     $PSGCdata = PSGC::create([
    //                         'psgccode' => $record['Code'],
    //                         'correspondencecode' =>  '0',
    //                         'geolevel' =>  '0',
    //                         'oldname' =>  '0',
    //                         'incomeclass' =>  '0',
    //                         'created_at' => now(),
    //                         'updated_at' => now(),
    //                     ]);

    //                     Barangay::create([

    //                         'psgccode_id' => $PSGCdata->id,
    //                         'citymun_id' => '0',
    //                         'municipal_id' =>  $dataMun->municipalid,
    //                         'barangay' => $record['Name'],
    //                         'brgytype' => '0',
    //                         'brgynumber' => '0',
    //                         'created_at' => now(),
    //                         'updated_at' => now(),
    //                     ]);
    //                 }
    //             }
    //         }
    //     }

    //     //return redirect()->back()->with('success', 'CSV file uploaded successfully.');
    //     return redirect('/mellpi_pro_LGU')->withStatus(__('LGU Profile successfully added.'));
    // }
}
<?php

namespace App\Http\Controllers\Admin\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lnfp_form8;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\lnfp_formOverall;
use App\Models\lnfp_lguform8tracking;
use App\Http\Controllers\LocationController;

class CMSMellpiProForLNFP_form8Controller extends Controller
{
    //
    public function ActionSheetForm8()
    {
        $form8 = lnfp_form8::get();
        return view('CityMunicipalStaff/MellpiProForLNFP/MellpiProActionSheet/ActionSheetForm8Index', ['form8' => $form8]);
    }
    public function ActionSheetForm8Edit(Request $request)
    {
        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);

        $row = DB::table('lnfp_form8')->where('id', $request->id)->first();

        return view('CityMunicipalStaff/MellpiProForLNFP/MellpiProActionSheet/ActionSheetForm8Edit',compact('row', 'prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }
    public function ActionSheetForm8Create()
    {
        $action = 'create';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);

        return view('CityMunicipalStaff/MellpiProForLNFP/MellpiProActionSheet/ActionSheetForm8Create', compact('prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }
    public function storeASForm8(Request $request)
    {
        $action = $request->input('action');

        // dd($action);

        if ($action == 'submit') {
            try {
                //code...
                $rules = [
                    'periodCovereda' => 'required|string|max:255',
                    'nameOf' => 'required|string|max:255',
                    'areaAssign' => 'required|string|max:255',
                    'dateMonitoring' => 'required|date',
                    'recoPNAO_A' => 'nullable|string',
                    'recoPNAO_B' => 'nullable|string',
                    'recoPNAO_C' => 'nullable|string',
                    'recoPNAO_D' => 'nullable|string',
                    'recoPNAO_E' => 'nullable|string',
                    'recoPNAO_F' => 'nullable|string',
                    'recoPNAO_G' => 'nullable|string',
                    'recoPNAO_H' => 'nullable|string',
                    'recoLNC_A' => 'nullable|string',
                    'recoLNC_B' => 'nullable|string',
                    'recoLNC_C' => 'nullable|string',
                    'recoLNC_D' => 'nullable|string',
                    'recoLNC_E' => 'nullable|string',
                    'recoLNC_F' => 'nullable|string',
                    'recoLNC_G' => 'nullable|string',
                    'recoLNC_H' => 'nullable|string',
                    'nameTM1' => 'required|string',
                    'nameTM2' => 'required|string',
                    'nameTM3' => 'required|string',
                    'desigOffice1' => 'required|string',
                    'desigOffice2' => 'required|string',
                    'desigOffice3' => 'required|string',
                    'sigDate1' => 'required|file|mimes:jpg,jpeg,png|max:2048',
                    'sigDate2' => 'required|file|mimes:jpg,jpeg,png|max:2048',
                    'sigDate3' => 'required|file|mimes:jpg,jpeg,png|max:2048',
                    'receivedBy' => 'nullable|string',
                    'whatDate' => 'nullable|date',
                ];

                $message = [
                    'required' => 'The field is required.',
                    'integer' => 'The field must be a integer.',
                    'string' => 'The field must be a string.',
                    'date' => 'The field must be a valid date.',
                    'max' => 'The field may not be greater than :max characters.',
                ];

                $input = $request->all();

                $validator = Validator::make($input, $rules, $message);


                if ($validator->fails()) {
                    Log::error($validator->errors());
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Something went wrong! Please try again.');
                } else {

                    $sigDate1 = null;
                    $sigDate2 = null;
                    $sigDate3 = null;

                    if ($request->hasFile('sigDate1')) {
                        $file1 = $request->file('sigDate1');
                        $fileName1 = time() . '_sigDate1_' . $file1->getClientOriginalName();
                        $sigDate1 = $file1->storeAs('uploads', $fileName1, 'public');
                    }

                    if ($request->hasFile('sigDate2')) {
                        $file2 = $request->file('sigDate2');
                        $fileName2 = time() . '_sigDate2_' . $file2->getClientOriginalName();
                        $sigDate2 = $file2->storeAs('uploads', $fileName2, 'public');
                    }

                    if ($request->hasFile('sigDate3')) {
                        $file3 = $request->file('sigDate3');
                        $fileName3 = time() . '_sigDate3_' . $file3->getClientOriginalName();
                        $sigDate3 = $file3->storeAs('uploads', $fileName3, 'public');
                    }

                    $LNFPForm8AS = lnfp_form8::create([
                        'periodCovereda' => $request->input('periodCovereda'),
                        'nameOfPnao' => $request->input('nameOf'),
                        'areaOfAssign' => $request->input('areaAssign'),
                        'dateMonitoring' => $request->input('dateMonitoring'),
                        'recoPNAO_A' => $request->input('recoPNAO_A'),
                        'recoPNAO_B' => $request->input('recoPNAO_B'),
                        'recoPNAO_C' => $request->input('recoPNAO_C'),
                        'recoPNAO_D' => $request->input('recoPNAO_D'),
                        'recoPNAO_E' => $request->input('recoPNAO_E'),
                        'recoPNAO_F' => $request->input('recoPNAO_F'),
                        'recoPNAO_G' => $request->input('recoPNAO_G'),
                        'recoPNAO_H' => $request->input('recoPNAO_H'),
                        'recoLNC_A' => $request->input('recoLNC_A'),
                        'recoLNC_B' => $request->input('recoLNC_B'),
                        'recoLNC_C' => $request->input('recoLNC_C'),
                        'recoLNC_D' => $request->input('recoLNC_D'),
                        'recoLNC_E' => $request->input('recoLNC_E'),
                        'recoLNC_F' => $request->input('recoLNC_F'),
                        'recoLNC_G' => $request->input('recoLNC_G'),
                        'recoLNC_H' => $request->input('recoLNC_H'),
                        'nameTM1' => $request->input('nameTM1'),
                        'nameTM2' => $request->input('nameTM2'),
                        'nameTM3' => $request->input('nameTM3'),
                        'desigOffice1' => $request->input('desigOffice1'),
                        'desigOffice2' => $request->input('desigOffice2'),
                        'desigOffice3' => $request->input('desigOffice3'),
                        'sigDate1' => $sigDate1,
                        'sigDate2' => $sigDate2,
                        'sigDate3' => $sigDate3,
                        'receivedBy' => $request->input('receivedBy'),
                        'whatDate' => $request->input('whatDate'),
                        'status' => $request->input('submitStatus'),

                        'barangay_id' => $request->barangay_id,
                        'municipal_id' => $request->municipal_id,
                        'province_id' => $request->province_id,
                        'region_id' => $request->region_id,
                        'user_id' => auth()->user()->id,
                    ]);

                    if ($LNFPForm8AS) {
                        # code...
                        lnfp_lguform8tracking::create([
                            'lnfp_form8_id' => $LNFPForm8AS->id,
                            'status' => $request->input('submitStatus'),
                            'barangay_id' => auth()->user()->barangay,
                            'municipal_id' => auth()->user()->city_municipal,
                            'user_id' => auth()->user()->id,
                        ]);
                    }

                    return redirect()->route('lnfpForm8Index')->with('alert', 'Data Submitted Successfully!');
                }
            } catch (\Throwable $th) {
                //throw $th;
                return "An error occured: " . $th->getMessage();
            }
        } elseif ($action == 'draft') {
            # code...
            // dd($action);
            try {
                //code...
                    $sigDate1 = null;
                    $sigDate2 = null;
                    $sigDate3 = null;

                    if ($request->hasFile('sigDate1')) {
                        $file1 = $request->file('sigDate1');
                        $fileName1 = time() . '_sigDate1_' . $file1->getClientOriginalName();
                        $sigDate1 = $file1->storeAs('uploads', $fileName1, 'public');
                    }

                    if ($request->hasFile('sigDate2')) {
                        $file2 = $request->file('sigDate2');
                        $fileName2 = time() . '_sigDate2_' . $file2->getClientOriginalName();
                        $sigDate2 = $file2->storeAs('uploads', $fileName2, 'public');
                    }

                    if ($request->hasFile('sigDate3')) {
                        $file3 = $request->file('sigDate3');
                        $fileName3 = time() . '_sigDate3_' . $file3->getClientOriginalName();
                        $sigDate3 = $file3->storeAs('uploads', $fileName3, 'public');
                    }
                $LNFPForm8AS = lnfp_form8::create([
                    'periodCovereda' => $request->input('periodCovereda'),
                    'nameOfPnao' => $request->input('nameOf'),
                    'areaOfAssign' => $request->input('areaAssign'),
                    'dateMonitoring' => $request->input('dateMonitoring'),
                    'recoPNAO_A' => $request->input('recoPNAO_A'),
                    'recoPNAO_B' => $request->input('recoPNAO_B'),
                    'recoPNAO_C' => $request->input('recoPNAO_C'),
                    'recoPNAO_D' => $request->input('recoPNAO_D'),
                    'recoPNAO_E' => $request->input('recoPNAO_E'),
                    'recoPNAO_F' => $request->input('recoPNAO_F'),
                    'recoPNAO_G' => $request->input('recoPNAO_G'),
                    'recoPNAO_H' => $request->input('recoPNAO_H'),
                    'recoLNC_A' => $request->input('recoLNC_A'),
                    'recoLNC_B' => $request->input('recoLNC_B'),
                    'recoLNC_C' => $request->input('recoLNC_C'),
                    'recoLNC_D' => $request->input('recoLNC_D'),
                    'recoLNC_E' => $request->input('recoLNC_E'),
                    'recoLNC_F' => $request->input('recoLNC_F'),
                    'recoLNC_G' => $request->input('recoLNC_G'),
                    'recoLNC_H' => $request->input('recoLNC_H'),
                    'nameTM1' => $request->input('nameTM1'),
                    'nameTM2' => $request->input('nameTM2'),
                    'nameTM3' => $request->input('nameTM3'),
                    'desigOffice1' => $request->input('desigOffice1'),
                    'desigOffice2' => $request->input('desigOffice2'),
                    'desigOffice3' => $request->input('desigOffice3'),
                    'sigDate1' => $sigDate1,
                    'sigDate2' => $sigDate2,
                    'sigDate3' => $sigDate3,
                    'receivedBy' => $request->input('receivedBy'),
                    'whatDate' => $request->input('whatDate'),
                    'status' => $request->input('DraftStatus'),
                ]);
                return redirect()->route('lnfpForm8Index')->with('alert', 'Data Saved as Draft Successfully!');
            } catch (\Throwable $th) {
                //throw $th;
                return "An error occured: " . $th->getMessage();
            }
        }
    }
    public function storeUpdateASForm8(Request $request, $id)
    {
        $action = $request->input('action');
        // dd($action);
        if ($action == 'submit') {
            # code...
            // dd($action);
            try {
                $rules = [
                    'periodCovereda' => 'required|string|max:255',
                    'nameOf' => 'required|string|max:255',
                    'areaAssign' => 'required|string|max:255',
                    'dateMonitoring' => 'required|date',
                    'recoPNAO_A' => 'nullable|string',
                    'recoPNAO_B' => 'nullable|string',
                    'recoPNAO_C' => 'nullable|string',
                    'recoPNAO_D' => 'nullable|string',
                    'recoPNAO_E' => 'nullable|string',
                    'recoPNAO_F' => 'nullable|string',
                    'recoPNAO_G' => 'nullable|string',
                    'recoPNAO_H' => 'nullable|string',
                    'recoLNC_A' => 'nullable|string',
                    'recoLNC_B' => 'nullable|string',
                    'recoLNC_C' => 'nullable|string',
                    'recoLNC_D' => 'nullable|string',
                    'recoLNC_E' => 'nullable|string',
                    'recoLNC_F' => 'nullable|string',
                    'recoLNC_G' => 'nullable|string',
                    'recoLNC_H' => 'nullable|string',
                    'nameTM1' => 'required|string',
                    'nameTM2' => 'required|string',
                    'nameTM3' => 'required|string',
                    'desigOffice1' => 'required|string',
                    'desigOffice2' => 'required|string',
                    'desigOffice3' => 'required|string',
                    'sigDate1' => 'required|file|mimes:jpg,jpeg,png|max:2048',
                    'sigDate2' => 'required|file|mimes:jpg,jpeg,png|max:2048',
                    'sigDate3' => 'required|file|mimes:jpg,jpeg,png|max:2048',
                    'receivedBy' => 'required|string',
                    'whatDate' => 'required|date',
                ];
        
                $messages = [
                    'required' => 'The :attribute field is required.',
                    'integer' => 'The :attribute field must be an integer.',
                    'string' => 'The :attribute field must be a string.',
                    'date' => 'The :attribute field must be a valid date.',
                    'max' => 'The :attribute field may not be greater than :max characters.',
                    'mimes' => 'The :attribute field must be a file of type: :values.',
                    'file' => 'The :attribute field must be a valid file.',
                ];
        
                $input = $request->all();
        
                $validator = Validator::make($input, $rules, $messages);
        
                if ($validator->fails()) {
                    Log::error($validator->errors());
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Something went wrong! Please try again.');
                }
        
                $LNFPForm8AS = lnfp_form8::findOrFail($id);
        
                $sigDate1 = $this->handleFileUpload($request, 'sigDate1', $LNFPForm8AS->sigDate1);
                $sigDate2 = $this->handleFileUpload($request, 'sigDate2', $LNFPForm8AS->sigDate2);
                $sigDate3 = $this->handleFileUpload($request, 'sigDate3', $LNFPForm8AS->sigDate3);
        
                $LNFPForm8AS->update([
                    'periodCovereda' => $request->input('periodCovereda'),
                    'nameOfPnao' => $request->input('nameOf'),
                    'areaOfAssign' => $request->input('areaAssign'),
                    'dateMonitoring' => $request->input('dateMonitoring'),
                    'recoPNAO_A' => $request->input('recoPNAO_A'),
                    'recoPNAO_B' => $request->input('recoPNAO_B'),
                    'recoPNAO_C' => $request->input('recoPNAO_C'),
                    'recoPNAO_D' => $request->input('recoPNAO_D'),
                    'recoPNAO_E' => $request->input('recoPNAO_E'),
                    'recoPNAO_F' => $request->input('recoPNAO_F'),
                    'recoPNAO_G' => $request->input('recoPNAO_G'),
                    'recoPNAO_H' => $request->input('recoPNAO_H'),
                    'recoLNC_A' => $request->input('recoLNC_A'),
                    'recoLNC_B' => $request->input('recoLNC_B'),
                    'recoLNC_C' => $request->input('recoLNC_C'),
                    'recoLNC_D' => $request->input('recoLNC_D'),
                    'recoLNC_E' => $request->input('recoLNC_E'),
                    'recoLNC_F' => $request->input('recoLNC_F'),
                    'recoLNC_G' => $request->input('recoLNC_G'),
                    'recoLNC_H' => $request->input('recoLNC_H'),
                    'nameTM1' => $request->input('nameTM1'),
                    'nameTM2' => $request->input('nameTM2'),
                    'nameTM3' => $request->input('nameTM3'),
                    'desigOffice1' => $request->input('desigOffice1'),
                    'desigOffice2' => $request->input('desigOffice2'),
                    'desigOffice3' => $request->input('desigOffice3'),
                    'sigDate1' => $sigDate1,
                    'sigDate2' => $sigDate2,
                    'sigDate3' => $sigDate3,
                    'receivedBy' => $request->input('receivedBy'),
                    'whatDate' => $request->input('whatDate'),
                    'status' => $request->input('submitStatus'),

                    'barangay_id' => $request->barangay_id,
                    'municipal_id' => $request->municipal_id,
                    'province_id' => $request->province_id,
                    'region_id' => $request->region_id,
                    'user_id' => auth()->user()->id,
                ]);

                if ($LNFPForm8AS) {
                    # code...
                    lnfp_lguform8tracking::create([
                        'lnfp_form8_id' => $request->id,
                        'status' => $request->input('submitStatus'),
                        'barangay_id' => auth()->user()->barangay,
                        'municipal_id' => auth()->user()->city_municipal,
                        'user_id' => auth()->user()->id,
                    ]);
                }

                // $overallScore = lnfp_formOverall::where('lnfp_lgu_id', $request->lgu_id)
                // ->update([
                //     'form8_id' => $request->id
                // ]);
                
        
                return redirect()->route('lnfpForm8Index')->with('alert', 'Data Submitted Successfully!');
            } catch (\Throwable $th) {
                Log::error('An error occurred: ' . $th->getMessage());
                return redirect()->back()->with('error', 'An error occurred. Please try again.');
            }
        } elseif ($action == 'draft') {
            # code...
            // dd($action);
            try {
                //code...
                $LNFPForm8AS = lnfp_form8::findOrFail($id);
        
                $sigDate1 = $this->handleFileUpload($request, 'sigDate1', $LNFPForm8AS->sigDate1);
                $sigDate2 = $this->handleFileUpload($request, 'sigDate2', $LNFPForm8AS->sigDate2);
                $sigDate3 = $this->handleFileUpload($request, 'sigDate3', $LNFPForm8AS->sigDate3);
        
                $LNFPForm8AS->update([
                    'periodCovereda' => $request->input('periodCovereda'),
                    'nameOfPnao' => $request->input('nameOf'),
                    'areaOfAssign' => $request->input('areaAssign'),
                    'dateMonitoring' => $request->input('dateMonitoring'),
                    'recoPNAO_A' => $request->input('recoPNAO_A'),
                    'recoPNAO_B' => $request->input('recoPNAO_B'),
                    'recoPNAO_C' => $request->input('recoPNAO_C'),
                    'recoPNAO_D' => $request->input('recoPNAO_D'),
                    'recoPNAO_E' => $request->input('recoPNAO_E'),
                    'recoPNAO_F' => $request->input('recoPNAO_F'),
                    'recoPNAO_G' => $request->input('recoPNAO_G'),
                    'recoPNAO_H' => $request->input('recoPNAO_H'),
                    'recoLNC_A' => $request->input('recoLNC_A'),
                    'recoLNC_B' => $request->input('recoLNC_B'),
                    'recoLNC_C' => $request->input('recoLNC_C'),
                    'recoLNC_D' => $request->input('recoLNC_D'),
                    'recoLNC_E' => $request->input('recoLNC_E'),
                    'recoLNC_F' => $request->input('recoLNC_F'),
                    'recoLNC_G' => $request->input('recoLNC_G'),
                    'recoLNC_H' => $request->input('recoLNC_H'),
                    'nameTM1' => $request->input('nameTM1'),
                    'nameTM2' => $request->input('nameTM2'),
                    'nameTM3' => $request->input('nameTM3'),
                    'desigOffice1' => $request->input('desigOffice1'),
                    'desigOffice2' => $request->input('desigOffice2'),
                    'desigOffice3' => $request->input('desigOffice3'),
                    'sigDate1' => $sigDate1,
                    'sigDate2' => $sigDate2,
                    'sigDate3' => $sigDate3,
                    'receivedBy' => $request->input('receivedBy'),
                    'whatDate' => $request->input('whatDate'),
                    'status' => $request->input('DraftStatus'),
                ]);
        
                return redirect()->route('lnfpForm8Index')->with('alert', 'Data Saved as Draft Successfully!');
            } catch (\Throwable $th) {
                //throw $th;
                Log::error('An error occurred: ' . $th->getMessage());
                return redirect()->back()->with('error', 'An error occurred. Please try again.');
            }
        }
    }
    private function handleFileUpload($request, $fieldName, $existingFilePath = null) {
        if ($request->hasFile($fieldName)) {
            if ($existingFilePath) {
                Storage::disk('public')->delete($existingFilePath);
            }
            $file = $request->file($fieldName);
            $fileName = time() . '_' . $fieldName . '_' . $file->getClientOriginalName();
            return $file->storeAs('uploads', $fileName, 'public');
        }
        return $existingFilePath;
    }
    
    public function deleteForm8(Request $request, $id)
    {
        DB::table('lnfp_lguform8tracking')->where('lnfp_form8_id', $request->id)->delete();

        $lnfp_form8 = lnfp_form8::find($id);
        $lnfp_form8->delete();

        return redirect()->route('lnfpForm8Index')->with('alert', 'Deleted Successfully!');
    }
}

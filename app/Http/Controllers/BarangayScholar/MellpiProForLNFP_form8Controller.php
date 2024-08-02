<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lnfp_form8;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MellpiProForLNFP_form8Controller extends Controller
{
    //
    public function ActionSheetForm8()
    {
        $form8 = lnfp_form8::get();
        return view('BarangayScholar/MellpiProForLNFP/MellpiProActionSheet/ActionSheetForm8Index', ['form8' => $form8]);
    }
    public function ActionSheetForm8Edit(Request $request)
    {
        $form8 = DB::table('lnfp_form8')->where('id', $request->id)->first();

        return view('BarangayScholar/MellpiProForLNFP/MellpiProActionSheet/ActionSheetForm8Edit', ['form8' => $form8]);
    }
    public function ActionSheetForm8Create()
    {
        return view('BarangayScholar/MellpiProForLNFP/MellpiProActionSheet/ActionSheetForm8Create');
    }
    public function storeASForm8(Request $request)
    {
        $action = $request->input('action');

        // dd($action);

        if ($action == 'submit') {
            try {
                //code...
                $rules = [
                    'forTheperiod' => 'required|string|max:255',
                    'nameOf' => 'required|string|max:255',
                    'areaAssign' => 'required|string|max:255',
                    'dateMonitor' => 'required|date',
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
                        'forThePeriod' => $request->input('forTheperiod'),
                        'nameOfPnao' => $request->input('nameOf'),
                        'areaOfAssign' => $request->input('areaAssign'),
                        'dateMonitor' => $request->input('dateMonitor'),
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
                    ]);

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
                    'forThePeriod' => $request->input('forTheperiod'),
                    'nameOfPnao' => $request->input('nameOf'),
                    'areaOfAssign' => $request->input('areaAssign'),
                    'dateMonitor' => $request->input('dateMonitor'),
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
    public function storeUpdateASForm8(Request $request)
    {
        $action = $request->input('action');
        // dd($action);
        if ($action == 'submit') {
            # code...
            try {
                $rules = [
                    'forTheperiod' => 'required|string|max:255',
                    'nameOf' => 'required|string|max:255',
                    'areaAssign' => 'required|string|max:255',
                    'dateMonitor' => 'required|date',
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
                    'sigDate1' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
                    'sigDate2' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
                    'sigDate3' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
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
                    $form8 = lnfp_form8::find($request->id);
            
                    if ($request->hasFile('sigDate1')) {
                        $file1 = $request->file('sigDate1');
                        $fileName1 = time() . '_sigDate1_' . $file1->getClientOriginalName();
                        $sigDate1 = $file1->storeAs('uploads', $fileName1, 'public');
                        $form8->sigDate1 = $sigDate1;
                    }
            
                    if ($request->hasFile('sigDate2')) {
                        $file2 = $request->file('sigDate2');
                        $fileName2 = time() . '_sigDate2_' . $file2->getClientOriginalName();
                        $sigDate2 = $file2->storeAs('uploads', $fileName2, 'public');
                        $form8->sigDate2 = $sigDate2;
                    }
            
                    if ($request->hasFile('sigDate3')) {
                        $file3 = $request->file('sigDate3');
                        $fileName3 = time() . '_sigDate3_' . $file3->getClientOriginalName();
                        $sigDate3 = $file3->storeAs('uploads', $fileName3, 'public');
                        $form8->sigDate3 = $sigDate3;
                    }
            
                    $form8->forThePeriod = $request->input('forTheperiod');
                    $form8->nameOfPnao = $request->input('nameOf');
                    $form8->areaOfAssign = $request->input('areaAssign');
                    $form8->dateMonitor = $request->input('dateMonitor');
                    $form8->recoPNAO_A = $request->input('recoPNAO_A');
                    $form8->recoPNAO_B = $request->input('recoPNAO_B');
                    $form8->recoPNAO_C = $request->input('recoPNAO_C');
                    $form8->recoPNAO_D = $request->input('recoPNAO_D');
                    $form8->recoPNAO_E = $request->input('recoPNAO_E');
                    $form8->recoPNAO_F = $request->input('recoPNAO_F');
                    $form8->recoPNAO_G = $request->input('recoPNAO_G');
                    $form8->recoPNAO_H = $request->input('recoPNAO_H');
                    $form8->recoLNC_A = $request->input('recoLNC_A');
                    $form8->recoLNC_B = $request->input('recoLNC_B');
                    $form8->recoLNC_C = $request->input('recoLNC_C');
                    $form8->recoLNC_D = $request->input('recoLNC_D');
                    $form8->recoLNC_E = $request->input('recoLNC_E');
                    $form8->recoLNC_F = $request->input('recoLNC_F');
                    $form8->recoLNC_G = $request->input('recoLNC_G');
                    $form8->recoLNC_H = $request->input('recoLNC_H');
                    $form8->nameTM1 = $request->input('nameTM1');
                    $form8->nameTM2 = $request->input('nameTM2');
                    $form8->nameTM3 = $request->input('nameTM3');
                    $form8->desigOffice1 = $request->input('desigOffice1');
                    $form8->desigOffice2 = $request->input('desigOffice2');
                    $form8->desigOffice3 = $request->input('desigOffice3');
                    $form8->receivedBy = $request->input('receivedBy');
                    $form8->whatDate = $request->input('whatDate');
                    $form8->status = $request->input('submitStatus');
            
                    $form8->save();
            
                    return redirect()->route('lnfpForm8Index')->with('alert', 'Data Submitted Successfully!');
                }
            } catch (\Throwable $th) {
                return "An error occurred: " . $th->getMessage();
            }
            
        } elseif ($action == 'draft') {
            # code...
            try {
                //code...
                $LNFPForm8AS = lnfp_form8::where('id', $request->id)
                    ->update([
                    'forThePeriod' => $request->input('forTheperiod'),
                    'nameOfPnao' => $request->input('nameOf'),
                    'areaOfAssign' => $request->input('areaAssign'),
                    'dateMonitor' => $request->input('dateMonitor'),
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
                    'sigDate1' => $request->input('sigDate1'),
                    'sigDate2' => $request->input('sigDate2'),
                    'sigDate3' => $request->input('sigDate3'),
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
    public function deleteForm8($id)
    {
        $lnfp_form8 = lnfp_form8::find($id);
        $lnfp_form8->delete();

        return redirect()->route('lnfpForm8Index')->with('alert', 'Deleted Successfully!');
    }
}

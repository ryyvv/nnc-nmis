<?php

namespace App\Http\Controllers\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lnfp_form8;
use Illuminate\Support\Facades\DB;

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
                'sigDate1' => $request->input('sigDate1'),
                'sigDate2' => $request->input('sigDate2'),
                'sigDate3' => $request->input('sigDate3'),
                'receivedBy' => $request->input('receivedBy'),
                'whatDate' => $request->input('whatDate'),
                'status' => $request->input('submitStatus'),
            ]);
            return redirect()->route('lnfpForm8Index')->with('alert', 'Data Submitted Successfully!');
            } catch (\Throwable $th) {
                //throw $th;
                return "An error occured: " . $th->getMessage();
            }
        } elseif ($action == 'draft') {
            # code...
            // dd($action);
            try {
                //code...
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
    public function deleteForm8($id) {
        $lnfp_form8 = lnfp_form8::find($id);
        $lnfp_form8->delete();

        return redirect()->route('lnfpForm8Index')->with('alert', 'Deleted Successfully!');
    }
}

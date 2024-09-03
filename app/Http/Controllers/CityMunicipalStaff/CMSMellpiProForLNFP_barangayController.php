<?php

namespace App\Http\Controllers\CityMunicipalStaff;

use App\Models\MellpiProForLNFP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\lnfp_form5a;
use App\Models\lnfp_form5a_rr;
use App\Models\sampleUpdateForm5a;
use Illuminate\Support\Facades\DB;
use illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\lnfp_lguprofile;
use App\Models\lnfp_form7;
use App\Models\lnfp_form8;
use App\Models\lnfp_formInterview;
use App\Models\lnfp_formOverall;
use App\Models\lnfp_lguform5atracking;
use App\Http\Controllers\LocationController;

class CMSMellpiProForLNFP_barangayController extends Controller
{
    public function createdata()
    {
        $lnfp = lnfp_lguprofile::get();

        return view('CityMunicipalStaff/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5CreateData', ['lnfp' => $lnfp]);
    }
    public function addForm(Request $request)
    {
        $form5a = lnfp_form5a::get();

        $lnfp = DB::table('lnfp_lguprofile')->where('id', $request->id)->first();

        return view('CityMunicipalStaff/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Create', ['lnfp' => $lnfp, 'form5a' => $form5a]);
    }
    /**
     * Display a listing of the resource.
     */


    //form 5 Monitoring
    public function monitoringForm5()
    {
        //
        $form5a_rr = lnfp_form5a_rr::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();


        return view('CityMunicipalStaff/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Index', ['form5a_rr' => $form5a_rr]);
    }
    public function monitoringForm5edit(Request $request)
    {
        $form5a = lnfp_form5a::get();

        $row = DB::table('lnfp_form5a_rr')->where('id', $request->id)->first();

        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);

        return view('CityMunicipalStaff/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Edit', compact('form5a', 'row', 'prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }
    public function monitoringForm5create()
    {
        //
        $form5a = lnfp_form5a::get();
        $action = 'create';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);

        return view('CityMunicipalStaff/MellpiProForLNFP/MellpiProMonitoring.MonitoringForm5Create', compact('form5a', 'prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }
    public function editForm5a(Request $request)
    {
        $elementsA = $request->input('elementsA');
        $performanceA1 = $request->input('performanceA1');
        $performanceA2 = $request->input('performanceA2');
        $performanceA3 = $request->input('performanceA3');
        $performanceA4 = $request->input('performanceA4');
        $performanceA5 = $request->input('performanceA5');
        $docuSourceA = $request->input('docuSourceA');

        $elementsB = $request->input('elementsB');
        $performanceB1 = $request->input('performanceB1');
        $performanceB2 = $request->input('performanceB2');
        $performanceB3 = $request->input('performanceB3');
        $performanceB4 = $request->input('performanceB4');
        $performanceB5 = $request->input('performanceB5');
        $docuSourceB = $request->input('docuSourceB');

        $elementsBB = $request->input('elementsBB');
        $performanceBB1 = $request->input('performanceBB1');
        $performanceBB2 = $request->input('performanceBB2');
        $performanceBB3 = $request->input('performanceBB3');
        $performanceBB4 = $request->input('performanceBB4');
        $performanceBB5 = $request->input('performanceBB5');
        $docuSourceBB = $request->input('docuSourceBB');

        $elementsC = $request->input('elementsC');
        $performanceC1 = $request->input('performanceC1');
        $performanceC2 = $request->input('performanceC2');
        $performanceC3 = $request->input('performanceC3');
        $performanceC4 = $request->input('performanceC4');
        $performanceC5 = $request->input('performanceC5');
        $docuSourceC = $request->input('docuSourceC');

        $elementsD = $request->input('elementsD');
        $performanceD1 = $request->input('performanceD1');
        $performanceD2 = $request->input('performanceD2');
        $performanceD3 = $request->input('performanceD3');
        $performanceD4 = $request->input('performanceD4');
        $performanceD5 = $request->input('performanceD5');
        $docuSourceD = $request->input('docuSourceD');

        $elementsE = $request->input('elementsE');
        $performanceE1 = $request->input('performanceE1');
        $performanceE2 = $request->input('performanceE2');
        $performanceE3 = $request->input('performanceE3');
        $performanceE4 = $request->input('performanceE4');
        $performanceE5 = $request->input('performanceE5');
        $docuSourceE = $request->input('docuSourceE');

        $elementsF = $request->input('elementsF');
        $performanceF1 = $request->input('performanceF1');
        $performanceF2 = $request->input('performanceF2');
        $performanceF3 = $request->input('performanceF3');
        $performanceF4 = $request->input('performanceF4');
        $performanceF5 = $request->input('performanceF5');
        $docuSourceF = $request->input('docuSourceF');

        $elementsG = $request->input('elementsG');
        $performanceG1 = $request->input('performanceG1');
        $performanceG2 = $request->input('performanceG2');
        $performanceG3 = $request->input('performanceG3');
        $performanceG4 = $request->input('performanceG4');
        $performanceG5 = $request->input('performanceG5');
        $docuSourceG = $request->input('docuSourceG');

        $elementsGG = $request->input('elementsGG');
        $performanceGG1 = $request->input('performanceGG1');
        $performanceGG2 = $request->input('performanceGG2');
        $performanceGG3 = $request->input('performanceGG3');
        $performanceGG4 = $request->input('performanceGG4');
        $performanceGG5 = $request->input('performanceGG5');
        $docuSourceGG = $request->input('docuSourceGG');


        $elementsH = $request->input('elementsH');
        $performanceH1 = $request->input('performanceH1');
        $performanceH2 = $request->input('performanceH2');
        $performanceH3 = $request->input('performanceH3');
        $performanceH4 = $request->input('performanceH4');
        $performanceH5 = $request->input('performanceH5');
        $docuSourceH = $request->input('docuSourceH');

        $periodCovereda = $request->input('periodCovereda');
        $nameOf = $request->input('nameOf');
        $address = $request->input('address');
        $provDev = $request->input('provDev');
        $numYear = $request->input('numYr');
        $fulltime = $request->input('fulltime');
        $profAct = $request->input('profAct');
        $bday = $request->input('bday');
        $sex = $request->input('sex');
        $dateDesig = $request->input('dateDesig');
        $seconded = $request->input('seconded');
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $num3 = $request->input('num3');
        $ratingA = $request->input('ratingA');
        $ratingB = $request->input('ratingB');
        $ratingBB = $request->input('ratingBB');
        $ratingC = $request->input('ratingC');
        $ratingD = $request->input('ratingD');
        $ratingE = $request->input('ratingE');
        $ratingF = $request->input('ratingF');
        $ratingG = $request->input('ratingG');
        $ratingGG = $request->input('ratingGG');
        $ratingH = $request->input('ratingH');
        $remarksA = $request->input('remarksA');
        $remarksB = $request->input('remarksB');
        $remarksBB = $request->input('remarksBB');
        $remarksC = $request->input('remarksC');
        $remarksD = $request->input('remarksD');
        $remarksE = $request->input('remarksE');
        $remarksF = $request->input('remarksF');
        $remarksG = $request->input('remarksG');
        $remarksGG = $request->input('remarksGG');
        $remarksH = $request->input('remarksH');
        $statusSubmit = 1;
        $statusDraft = 2;

        $action = $request->input('action');


        if ($action == 'submit') {
            try {
                // $submitForm5a_rr = new lnfp_form5a_rr;

                // $submitForm5a_rr->forThePeriod = $request->input('forTheperiod');
                // $submitForm5a_rr->nameofPnao = $request->input('nameOf');
                // $submitForm5a_rr->address = $request->input('address');
                // $submitForm5a_rr->provDeploy = $request->input('provDev');
                // $submitForm5a_rr->numYearPnao = $request->input('numYr');
                // $submitForm5a_rr->fulltime = $request->input('fulltime');
                // $submitForm5a_rr->profAct = $request->input('profAct');
                // $submitForm5a_rr->bdate = $request->input('bday');
                // $submitForm5a_rr->sex = $request->input('sex');
                // $submitForm5a_rr->dateDesignation = $request->input('dateDesig');
                // $submitForm5a_rr->secondedOffice = $request->input('seconded');
                // $submitForm5a_rr->devActnum1 = $request->input('num1');
                // $submitForm5a_rr->devActnum2 = $request->input('num2');
                // $submitForm5a_rr->devActnum3 = $request->input('num3');
                // $submitForm5a_rr->ratingA = $request->input('ratingA');
                // $submitForm5a_rr->ratingB = $request->input('ratingB');
                // $submitForm5a_rr->ratingBB = $request->input('ratingBB');
                // $submitForm5a_rr->ratingC = $request->input('ratingC');
                // $submitForm5a_rr->ratingD = $request->input('ratingD');
                // $submitForm5a_rr->ratingE = $request->input('ratingE');
                // $submitForm5a_rr->ratingF = $request->input('ratingF');
                // $submitForm5a_rr->ratingG = $request->input('ratingG');
                // $submitForm5a_rr->ratingGG = $request->input('ratingGG');
                // $submitForm5a_rr->ratingH = $request->input('ratingH');
                // $submitForm5a_rr->remarksA = $request->input('remarksA');
                // $submitForm5a_rr->remarksB = $request->input('remarksB');
                // $submitForm5a_rr->remarksBB = $request->input('remarksBB');
                // $submitForm5a_rr->remarksC = $request->input('remarksC');
                // $submitForm5a_rr->remarksD = $request->input('remarksD');
                // $submitForm5a_rr->remarksE = $request->input('remarksE');
                // $submitForm5a_rr->remarksF = $request->input('remarksF');
                // $submitForm5a_rr->remarksG = $request->input('remarksG');
                // $submitForm5a_rr->remarksGG = $request->input('remarksGG');
                // $submitForm5a_rr->remarksH = $request->input('remarksH');
                // $submitForm5a_rr->status = 1;

                // $submitForm5a_rr->save();
                $submitForm5a_rr = lnfp_form5a_rr::create([
                    'periodCovereda' => $request->input('periodCovereda'),
                    'dateMonitoring' => $request->input('dateMonitoring'),
                    'nameofPnao' => $request->input('nameOf'),
                    'address' => $request->input('address'),
                    'provDeploy' => $request->input('provDev'),
                    'numYearPnao' => $request->input('numYr'),
                    'fulltime' => $request->input('fulltime'),
                    'profAct' => $request->input('profAct'),
                    'bdate' => $request->input('bday'),
                    'sex' => $request->input('sex'),
                    'dateDesignation' => $request->input('dateDesig'),
                    'secondedOffice' => $request->input('seconded'),
                    'devActnum1' => $request->input('num1'),
                    'devActnum2' => $request->input('num2'),
                    'devActnum3' => $request->input('num3'),
                    'ratingA' => $request->input('ratingA'),
                    'ratingB' => $request->input('ratingB'),
                    'ratingBB' => $request->input('ratingBB'),
                    'ratingC' => $request->input('ratingC'),
                    'ratingD' => $request->input('ratingD'),
                    'ratingE' => $request->input('ratingE'),
                    'ratingF' => $request->input('ratingF'),
                    'ratingG' => $request->input('ratingG'),
                    'ratingGG' => $request->input('ratingGG'),
                    'ratingH' => $request->input('ratingH'),
                    'remarksA' => $request->input('remarksA'),
                    'remarksB' => $request->input('remarksB'),
                    'remarksBB' => $request->input('remarksBB'),
                    'remarksC' => $request->input('remarksC'),
                    'remarksD' => $request->input('remarksD'),
                    'remarksE' => $request->input('remarksE'),
                    'remarksF' => $request->input('remarksF'),
                    'remarksG' => $request->input('remarksG'),
                    'remarksGG' => $request->input('remarksGG'),
                    'remarksH' => $request->input('remarksH'),
                    'status' => 1,

                    'barangay_id' => $request->barangay_id,
                    'municipal_id' => $request->municipal_id,
                    'province_id' => $request->province_id,
                    'region_id' => $request->region_id,
                    'user_id' => auth()->user()->id,
                ]);
                if ($submitForm5a_rr) {
                    # code...
                    lnfp_form7::create([
                        'form5_id' => $submitForm5a_rr->id
                    ]);

                    lnfp_lguform5atracking::create([
                        'lnfp_lguform5_id' => $submitForm5a_rr->id,
                        'status' => 1,
                        'barangay_id' => auth()->user()->barangay,
                        'municipal_id' => auth()->user()->city_municipal,
                        'user_id' => auth()->user()->id,
                    ]);
                }

                // return redirect()->back()->with('alert', 'Rate and Remarks Submitted Successfully!');
                return redirect()->route('MellpiProMonitoringIndex.index')->with('success', 'Data stored Successfully!');
            } catch (\Throwable $th) {
                return "An error occured: " . $th->getMessage();
            }
        } elseif ($action == 'draft') {
            try {
                // $submitForm5a_rr = new lnfp_form5a_rr;

                // $submitForm5a_rr->forThePeriod = $request->input('forTheperiod');
                // $submitForm5a_rr->nameofPnao = $request->input('nameOf');
                // $submitForm5a_rr->address = $request->input('address');
                // $submitForm5a_rr->provDeploy = $request->input('provDev');
                // $submitForm5a_rr->numYearPnao = $request->input('numYr');
                // $submitForm5a_rr->fulltime = $request->input('fulltime');
                // $submitForm5a_rr->profAct = $request->input('profAct');
                // $submitForm5a_rr->bdate = $request->input('bday');
                // $submitForm5a_rr->sex = $request->input('sex');
                // $submitForm5a_rr->dateDesignation = $request->input('dateDesig');
                // $submitForm5a_rr->secondedOffice = $request->input('seconded');
                // $submitForm5a_rr->devActnum1 = $request->input('num1');
                // $submitForm5a_rr->devActnum2 = $request->input('num2');
                // $submitForm5a_rr->devActnum3 = $request->input('num3');
                // $submitForm5a_rr->ratingA = $request->input('ratingA');
                // $submitForm5a_rr->ratingB = $request->input('ratingB');
                // $submitForm5a_rr->ratingBB = $request->input('ratingBB');
                // $submitForm5a_rr->ratingC = $request->input('ratingC');
                // $submitForm5a_rr->ratingD = $request->input('ratingD');
                // $submitForm5a_rr->ratingE = $request->input('ratingE');
                // $submitForm5a_rr->ratingF = $request->input('ratingF');
                // $submitForm5a_rr->ratingG = $request->input('ratingG');
                // $submitForm5a_rr->ratingGG = $request->input('ratingGG');
                // $submitForm5a_rr->ratingH = $request->input('ratingH');
                // $submitForm5a_rr->remarksA = $request->input('remarksA');
                // $submitForm5a_rr->remarksB = $request->input('remarksB');
                // $submitForm5a_rr->remarksBB = $request->input('remarksBB');
                // $submitForm5a_rr->remarksC = $request->input('remarksC');
                // $submitForm5a_rr->remarksD = $request->input('remarksD');
                // $submitForm5a_rr->remarksE = $request->input('remarksE');
                // $submitForm5a_rr->remarksF = $request->input('remarksF');
                // $submitForm5a_rr->remarksG = $request->input('remarksG');
                // $submitForm5a_rr->remarksGG = $request->input('remarksGG');
                // $submitForm5a_rr->remarksH = $request->input('remarksH');
                // $submitForm5a_rr->status = 2;

                // $submitForm5a_rr->save();
                $submitForm5a_rr = lnfp_form5a_rr::create([
                    'periodCovereda' => $request->input('periodCovereda'),
                    'dateMonitoring' => $request->input('dateMonitoring'),
                    'nameofPnao' => $request->input('nameOf'),
                    'address' => $request->input('address'),
                    'provDeploy' => $request->input('provDev'),
                    'numYearPnao' => $request->input('numYr'),
                    'fulltime' => $request->input('fulltime'),
                    'profAct' => $request->input('profAct'),
                    'bdate' => $request->input('bday'),
                    'sex' => $request->input('sex'),
                    'dateDesignation' => $request->input('dateDesig'),
                    'secondedOffice' => $request->input('seconded'),
                    'devActnum1' => $request->input('num1'),
                    'devActnum2' => $request->input('num2'),
                    'devActnum3' => $request->input('num3'),
                    'ratingA' => $request->input('ratingA'),
                    'ratingB' => $request->input('ratingB'),
                    'ratingBB' => $request->input('ratingBB'),
                    'ratingC' => $request->input('ratingC'),
                    'ratingD' => $request->input('ratingD'),
                    'ratingE' => $request->input('ratingE'),
                    'ratingF' => $request->input('ratingF'),
                    'ratingG' => $request->input('ratingG'),
                    'ratingGG' => $request->input('ratingGG'),
                    'ratingH' => $request->input('ratingH'),
                    'remarksA' => $request->input('remarksA'),
                    'remarksB' => $request->input('remarksB'),
                    'remarksBB' => $request->input('remarksBB'),
                    'remarksC' => $request->input('remarksC'),
                    'remarksD' => $request->input('remarksD'),
                    'remarksE' => $request->input('remarksE'),
                    'remarksF' => $request->input('remarksF'),
                    'remarksG' => $request->input('remarksG'),
                    'remarksGG' => $request->input('remarksGG'),
                    'remarksH' => $request->input('remarksH'),
                    'status' => 2,
                ]);

                // if ($submitForm5a_rr) {
                //     # code...
                //     lnfp_form7::create([
                //         'form5_id' => $submitForm5a_rr->id
                //     ]);
                // }

                // return redirect()->back()->with('alert', 'Rate and Remarks Submitted Successfully!');
                return redirect()->route('MellpiProMonitoringIndex.index')->with('success', 'Data stored as Draft!');
            } catch (\Throwable $th) {
                return "An error occured: " . $th->getMessage();
            }
        } elseif ($action == 'update') {
            $update = lnfp_form5a::where('id', 2)
                ->update([
                    'elementsA' => $elementsA,
                    'performanceA1' => $performanceA1,
                    'performanceA2' => $performanceA2,
                    'performanceA3' => $performanceA3,
                    'performanceA4' => $performanceA4,
                    'performanceA5' => $performanceA5,
                    'documentSourceA' => $docuSourceA,

                    'elementsB' => $elementsB,
                    'performanceB1' => $performanceB1,
                    'performanceB2' => $performanceB2,
                    'performanceB3' => $performanceB3,
                    'performanceB4' => $performanceB4,
                    'performanceB5' => $performanceB5,
                    'documentSourceB' => $docuSourceB,

                    'elementsBB' => $elementsBB,
                    'performanceBB1' => $performanceBB1,
                    'performanceBB2' => $performanceBB2,
                    'performanceBB3' => $performanceBB3,
                    'performanceBB4' => $performanceBB4,
                    'performanceBB5' => $performanceBB5,
                    'documentSourceBB' => $docuSourceBB,

                    'elementsC' => $elementsC,
                    'performanceC1' => $performanceC1,
                    'performanceC2' => $performanceC2,
                    'performancec3' => $performanceC3,
                    'performanceC4' => $performanceC4,
                    'performanceC5' => $performanceC5,
                    'documentSourceC' => $docuSourceC,

                    'elementsD' => $elementsD,
                    'performanceD1' => $performanceD1,
                    'performanceD2' => $performanceD2,
                    'performanceD3' => $performanceD3,
                    'performanceD4' => $performanceD4,
                    'performanceD5' => $performanceD5,
                    'documentSourceD' => $docuSourceD,

                    'elementsE' => $elementsE,
                    'performanceE1' => $performanceE1,
                    'performanceE2' => $performanceE2,
                    'performanceE3' => $performanceE3,
                    'performanceE4' => $performanceE4,
                    'performanceE5' => $performanceE5,
                    'documentSourceE' => $docuSourceE,

                    'elementsF' => $elementsF,
                    'performanceF1' => $performanceF1,
                    'performanceF2' => $performanceF2,
                    'performanceF3' => $performanceF3,
                    'performanceF4' => $performanceF4,
                    'performanceF5' => $performanceF5,
                    'documentSourceF' => $docuSourceF,

                    'elementsG' => $elementsG,
                    'performanceG1' => $performanceG1,
                    'performanceG2' => $performanceG2,
                    'performanceG3' => $performanceG3,
                    'performanceG4' => $performanceG4,
                    'performanceG5' => $performanceG5,
                    'documentSourceG' => $docuSourceG,

                    'elementsGG' => $elementsGG,
                    'performanceGG1' => $performanceGG1,
                    'performanceGG2' => $performanceGG2,
                    'performanceGG3' => $performanceGG3,
                    'performanceGG4' => $performanceGG4,
                    'performanceGG5' => $performanceGG5,
                    'documentSourceGG' => $docuSourceGG,

                    'elementsH' => $elementsH,
                    'performanceH1' => $performanceH1,
                    'performanceH2' => $performanceH2,
                    'performanceH3' => $performanceH3,
                    'performanceH4' => $performanceH4,
                    'performanceH5' => $performanceH5,
                    'documentSourceH' => $docuSourceH

                ]);

            return redirect()->back()->with('alert', 'Updated Successfully!');
        } elseif ($action == 'updateResponse') {
            // dd($action);
            // $inputs = [
            //     'forThePeriod' => $forTheperiod,
            //                 'nameofPnao' => $nameOf,
            //                 'address' => $address,
            //                 'numYearPnao' => $numYear,
            //                 'fulltime' => $fulltime,
            //                 'profAct' => $profAct,
            //                 'bdate' => $bday,
            //                 'sex' => $sex,
            //                 'dateDesignation' => $dateDesig,
            //                 'secondedOffice' => $seconded,
            //                 'devActnum1' => $num1,
            //                 'devActnum2' => $num2,
            //                 'devActnum3' => $num3,
            //                 'ratingA' => $ratingA,
            //                 'ratingB' => $ratingB,
            //                 'ratingBB' => $ratingBB,
            //                 'ratingC' => $ratingC,
            //                 'ratingD' => $ratingD,
            //                 'ratingE' => $ratingE,
            //                 'ratingF' => $ratingF,
            //                 'ratingG' => $ratingG,
            //                 'ratingGG' => $ratingGG,
            //                 'ratingH' => $ratingH,
            //                 'remarksA' => $remarksA,
            //                 'remarksB' => $remarksB,
            //                 'remarksBB' => $remarksBB,
            //                 'remarksC' => $remarksC,
            //                 'remarksD' => $remarksD,
            //                 'remarksE' => $remarksE,
            //                 'remarksF' => $remarksF,
            //                 'remarksG' => $remarksG,
            //                 'remarksGG' => $remarksGG,
            //                 'remarksH' => $remarksH,
            //                 'status' => $statusSubmit
            // ];

            // dd($inputs);
            
            $rules = [
                'periodCovereda' => 'required',
                'nameOf' => 'required',
                'address' => 'required',
                'numYr' => 'required',
                'fulltime' => 'required',
                'profAct' => 'required',
                'bday' => 'required',
                'sex' => 'required',
                'dateDesig' => 'required',
                'ratingA' => 'required',
                'ratingB' => 'required',
                'ratingBB' => 'required',
                'ratingC' => 'required',
                'ratingD' => 'required',
                'ratingE' => 'required',
                'ratingF' => 'required',
                'ratingG' => 'required',
                'ratingGG' => 'required',
                'ratingH' => 'required',
            ];

            $message = [
                'required' => 'The field is required.',
                'integer' => 'The field must be a integer.',
                'string' => 'The field must be a string.',
                'date' => 'The field must be a valid date.',
                'max' => 'The field may not be greater than :max characters.',
            ];

            // $input = $request->all();

            $validator = Validator::make($rules, $message);

            if ($validator->fails()) {
                Log::error($validator->errors());
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Something went wrong! Please try again.');
            } else {

                // dd($rules);

                try {
                    //code...
                    $updateResponse = lnfp_form5a_rr::where('id', $request->id)
                        ->update([
                            // 'lnfp_lgu_id' => $request->lgu_id,
                            'periodCovereda' => $periodCovereda,
                            'dateMonitoring' => $request->input('dateMonitoring'),
                            'nameofPnao' => $nameOf,
                            'address' => $address,
                            'provDeploy' => $provDev,
                            'numYearPnao' => $numYear,
                            'fulltime' => $fulltime,
                            'profAct' => $profAct,
                            'bdate' => $bday,
                            'sex' => $sex,
                            'dateDesignation' => $dateDesig,
                            'secondedOffice' => $seconded,
                            'devActnum1' => $num1,
                            'devActnum2' => $num2,
                            'devActnum3' => $num3,
                            'ratingA' => $ratingA,
                            'ratingB' => $ratingB,
                            'ratingBB' => $ratingBB,
                            'ratingC' => $ratingC,
                            'ratingD' => $ratingD,
                            'ratingE' => $ratingE,
                            'ratingF' => $ratingF,
                            'ratingG' => $ratingG,
                            'ratingGG' => $ratingGG,
                            'ratingH' => $ratingH,
                            'remarksA' => $remarksA,
                            'remarksB' => $remarksB,
                            'remarksBB' => $remarksBB,
                            'remarksC' => $remarksC,
                            'remarksD' => $remarksD,
                            'remarksE' => $remarksE,
                            'remarksF' => $remarksF,
                            'remarksG' => $remarksG,
                            'remarksGG' => $remarksGG,
                            'remarksH' => $remarksH,
                            'status' => $statusSubmit,

                            'barangay_id' => $request->barangay_id,
                            'municipal_id' => $request->municipal_id,
                            'province_id' => $request->province_id,
                            'region_id' => $request->region_id,
                            'user_id' => auth()->user()->id,

                        ]);
                    // dd($request->lgu_id);
                    # code...
                    $form7 = lnfp_form7::create([
                        'form5_id' => $request->id,
                        'lnfp_lgu_id' => $request->lgu_id
                    ]);
                    // dd($form7);
                    lnfp_lguform5atracking::create([
                        'lnfp_lguform5_id' => $request->id,
                        'status' => 2,
                        'barangay_id' => auth()->user()->barangay,
                        'municipal_id' => auth()->user()->city_municipal,
                        'user_id' => auth()->user()->id,
                    ]);

                    // $user = DB::table('users')
                    //     ->where('id', auth()->user()->id)
                    //     ->first();

                    // if ($user) {
                    //     $fullname = $user->Firstname . ' ' . $user->Middlename . ' ' . $user->Lastname;
                    //     $form8 = lnfp_form8::create([
                    //         'form5_id' => $request->id,
                    //         'lnfp_lgu_id' => $request->lgu_id,
                    //         'lnfp_officer' => $fullname,
                    //         'forThePeriod' => $request->forTheperiod,
                    //         'nameOfPnao' => $request->nameOf,
                    //         'areaOfAssign' => $request->address,
                    //         'dateMonitor' => $request->dateMoni,
                    //         'status' => 2
                    //     ]);

                    //     $interviewForm = lnfp_formInterview::create([
                    //         'form5_id' => $request->id,
                    //         'lnfp_lgu_id' => $request->lgu_id,
                    //         'lnfp_officer' => $fullname,
                    //         'forThePeriod' => $request->forTheperiod,
                    //         'nameOf' => $request->nameOf,
                    //         'areaAssign' => $request->address,
                    //         'question1' => "Tell us something about yourself, personal and professional history.",
                    //         'question4' => "What is your greatest accomplishment and how did it benefit the community/LGU?",
                    //         'status' => 2
                    //     ]);

                    //     $overallScore = lnfp_formOverall::create([
                    //         'lnfp_lgu_id' => $request->lgu_id,
                    //         'form5_id' => $request->id,
                    //         'lnfp_officer' => $fullname,
                    //         'status' => 2
                    //     ]);
                    // }
                    return redirect()->route('MellpiProMonitoringIndex.index')->with('success', 'Data stored successfully!');
                } catch (\Throwable $th) {
                    //throw $th;
                    return "An error occured: " . $th->getMessage();
                }
            }
        } elseif ($action == 'saveDraft') {
            # code...
            try {
                //code...
                $updateResponse = lnfp_form5a_rr::where('id', $request->id)
                    ->update([
                        'periodCovereda' => $periodCovereda,
                        'dateMonitoring' => $request->input('dateMonitoring'),
                        'nameofPnao' => $nameOf,
                        'address' => $address,
                        'provDeploy' => $provDev,
                        'numYearPnao' => $numYear,
                        'fulltime' => $fulltime,
                        'profAct' => $profAct,
                        'bdate' => $bday,
                        'sex' => $sex,
                        'dateDesignation' => $dateDesig,
                        'secondedOffice' => $seconded,
                        'devActnum1' => $num1,
                        'devActnum2' => $num2,
                        'devActnum3' => $num3,
                        'ratingA' => $ratingA,
                        'ratingB' => $ratingB,
                        'ratingBB' => $ratingBB,
                        'ratingC' => $ratingC,
                        'ratingD' => $ratingD,
                        'ratingE' => $ratingE,
                        'ratingF' => $ratingF,
                        'ratingG' => $ratingG,
                        'ratingGG' => $ratingGG,
                        'ratingH' => $ratingH,
                        'remarksA' => $remarksA,
                        'remarksB' => $remarksB,
                        'remarksBB' => $remarksBB,
                        'remarksC' => $remarksC,
                        'remarksD' => $remarksD,
                        'remarksE' => $remarksE,
                        'remarksF' => $remarksF,
                        'remarksG' => $remarksG,
                        'remarksGG' => $remarksGG,
                        'remarksH' => $remarksH,
                        'status' => $statusDraft

                    ]);
                // if ($updateResponse) {
                //     # code...
                //     lnfp_form7::create([
                //         'form5_id' => $request->id
                //     ]);
                // }
                return redirect()->route('MellpiProMonitoringIndex.index')->with('success', 'Data stored as Draft!');
            } catch (\Throwable $th) {
                //throw $th;
                return "An error occured: " . $th->getMessage();
            }
        }

        return response()->json(['message' => 'Invalid Action!', 400]);
    }
    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //

    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(MellpiProForLNFP $mellpiProForLNFP)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(MellpiProForLNFP $mellpiProForLNFP)
    // {
    //     //
    // }
    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, MellpiProForLNFP $mellpiProForLNFP)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteForm5arr(Request $request, $id)
    {

        DB::table('lnfp_lguform5atracking')->where('lnfp_lguform5_id', $request->id)->delete();
        
        $form5a = lnfp_form5a_rr::find($id);
        $form5a->delete();

        return redirect()->back()->with('alert', 'Deleted Successfully!');
    }

    // public function deleteForm5arr($id)
    // {
    //     //
    //     // $deleted = DB::table('lnfp_form5a_rr')->where('id', $request->id)->delete();
    //     // $deleted = lnfp_form5a_rr::where('id', $request->id)->delete();
    //     $deleted = lnfp_form5a_rr::find($id);
    //     // dd($deleted);

    //     if ($deleted) {
    //         $deleted->delete();
    //         // Redirect back with success message if record was deleted
    //         return redirect()->back()->with('alert', 'Deleted Successfully!');
    //     } else {
    //         // Redirect back with error message if record not found
    //         return redirect()->back()->with('alert', 'Record not found!');
    //     }
    // }
}

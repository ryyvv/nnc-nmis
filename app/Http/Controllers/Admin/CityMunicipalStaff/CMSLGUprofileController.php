<?php

namespace App\Http\Controllers\Admin\CityMunicipalStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LguProfile;
use App\Models\barangaytracking;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\LocationController;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class CMSLGUprofileController extends Controller
{

    public function index()
    {

        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $barangay = auth()->user()->barangay;
        //$lguprofile = DB::table('lguprofilebarangay')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        $lguprofile = DB::table('users')
            ->join('lguprofilebarangay', 'users.id', '=', 'lguprofilebarangay.user_id')
            ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
            ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'lguprofilebarangay.*')
            ->get();

        return view('CityMunicipalStaff.lguprofile.index', compact('lguprofile', 'prov', 'mun', 'city', 'brgy'));
    }


    public function edit(LguProfile $LguProfile, Request $request)
    {
        
        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);

        //dd($request->id);
        $row = DB::table('lguprofilebarangay')->where('user_id', auth()->user()->id)->first();
        //dd($lguProfile);
        dd($row);

        return view('CityMunicipalStaff.lguprofile.edit', compact('row', 'prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }

    public function show(Request $request, $id)
    {
        $action = 'edit';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);

        $row = DB::table('lguprofilebarangay')->where('id', $id)->first();
     
       
        return view('CityMunicipalStaff.lguprofile.show', compact('row', 'prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }

    public function create(Request $request)
    {


        $action = 'create';
        $location = new LocationController;
        $prov = $location->getLocationDataProvince(auth()->user()->Region);
        $mun = $location->getLocationDataMuni(auth()->user()->Province);
        $city = $location->getLocationDataCity(auth()->user()->Region);
        $brgy = $location->getLocationDataBrgy(auth()->user()->city_municipal);

        $years = range(date("Y"), 1900);

        return view('CityMunicipalStaff.lguprofile.create', compact('prov', 'mun', 'city', 'brgy', 'years', 'action'));
    }

    public function storeSubmit(Request $request)
    {

    //  dd($request);
        if ($request->formrequest == 'draft') {
            //dd($request);
            $LGUProfileBarangay = LguProfile::create([
                'dateMonitoring' => $request->dateMonitoring,
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
                'food_fortification' => $request->food_fortification,
                'IVAremarks' => $request->IVAremarks,

                'VAsource' => $request->VAsource,
                'VAavailreceived' => $request->VAavailreceived,
                'VAdatereceived' => $request->VAdatereceived,
                'VAvolumepax' => $request->VAvolumepax,
                'VAremarks' => $request->VAremarks,

                'status' => $request->status,

                'barangay_id' => $request->barangay_id,
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
                'user_id' => $request->user_id
            ]);

            return redirect('CityMunicipalStaff/lguprofile')->with('success', 'Data stored as Draft!'); 
        }
        else { 
            // dd($request);
            $requestData = $request->all(); 

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
                'remarksResidential' => 'max:255',

                'landAreaCommercial' => 'required|integer|min:1|max:1000000',
                'remarksCommercial' => 'max:255',

                'landAreaIndustrial' => 'required|integer|min:1|max:1000000',
                'remarksIndustrial' => 'max:255',

                'landAreaAgricultural' => 'required|integer|min:1|max:1000000',
                'remarksAgricultural' => 'max:255',

                'landAreaFLMLNP' => 'required|integer|min:1|max:1000000',
                'remarksFLMLNP' => 'max:255',


                'Iavailreceived' => 'required|string|max:255',
                //'Isource' => 'required|string|max:255',
                // 'Idatereceived' => 'required|date ',
                // 'Ivolumepax' => 'required|integer|min:1|max:100000',
                'Iremarks' => 'max:255',


                'IIAavailreceived' => 'required|string|max:255',
                // 'IIAsource' => 'required|string|max:255',
                // 'IIAdatereceived' => 'required|date ',
                // 'IIAvolumepax' => 'required|integer|min:1|max:100000',
                'IIAremarks' => 'max:255',


                'IIBavailreceived' => 'required|string|max:255',
                // 'IIBsource' => 'required|string|max:255',
                // 'IIBdatereceived' => 'required|date ',
                // 'IIBvolumepax' => 'required|integer|min:1|max:100000',
                'IIBremarks' => 'max:255',


                'IIIAavailreceived' => 'required|string|max:255',
                // 'IIIAsource' => 'required|string|max:255',
                // 'IIIAdatereceived' => 'required|date',
                // 'IIIAvolumepax' => 'required|integer|min:1|max:100000',
                'IIIAremarks' => 'max:255',


                'IIIBavailreceived' => 'required|string|max:255',
                // 'IIIBsource' => 'required|string|max:255',
                // 'IIIBdatereceived' => 'required|date',
                // 'IIIBvolumepax' => 'required|integer|min:1|max:100000',
                'IIIBremarks' => 'max:255',


                'IIICavailreceived' => 'required|string|max:255',
                // 'IIICsource' => 'required|string|max:255',
                // 'IIICdatereceived' => 'required|date',
                // 'IIICvolumepax' => 'required|integer|min:1|max:100000',
                'IIICremarks' => 'max:255',


                'IIIDavailreceived' => 'required|string|max:255',
                // 'IIIDsource' => 'required|string|max:255',
                // 'IIIDdatereceived' => 'required|date ',
                // 'IIIDvolumepax' => 'required|integer|min:1|max:100000',
                'IIIDremarks' => 'max:255',


                'IIIEavailreceived' => 'required|string|max:255',
                // 'IIIEsource' => 'required|string|max:255',
                // 'IIIEdatereceived' => 'required|date ',
                // 'IIIEvolumepax' => 'required|integer|min:1|max:100000',
                'IIIEremarks' => 'max:255',


                'IIIFavailreceived' => 'required|string|max:255',
                // 'IIIFsource' => 'required|string|max:255',
                // 'IIIFdatereceived' => 'required|date ',
                // 'IIIFvolumepax' => 'required|integer|min:1|max:100000',
                'IIIFremarks' => 'max:255',

                'IVAavailreceived' => 'required|string|max:255',
                // 'IVAsource' => 'required|string|max:255',
                // 'IVAdatereceived' => 'required|date ',
                // 'IVAvolumepax' => 'required|integer|min:1|max:100000',
                'food_fortification' => 'required|string',
                'IVAremarks' => 'max:255',


                'VAavailreceived' => 'required|string|max:255',
                // 'VAsource' => 'required|string|max:255',
                // 'VAdatereceived' => 'required|date ',
                // 'VAvolumepax' => 'required|integer|min:1|max:100000',
                'VAremarks' => 'max:255',

                'status' => 'required|integer',
                'barangay_id' => 'required',
                'municipal_id' => 'required',
                'province_id' => 'required',
                'region_id' => 'required',
                'user_id' => 'required',

            ];

            // Iavailreceived
            if ($requestData['Iavailreceived'] === 'Yes') {
                $rules['Isource'] = 'required|string|max:255';
                $rules['Idatereceived'] = 'required|date';
                $rules['Ivolumepax'] = 'required|integer|min:1|max:100000'; 

            } else {
                $rules['Isource'] = 'nullable|string|max:255';
                $rules['Idatereceived'] = 'nullable|date';
                $rules['Ivolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIAavailreceived
            if ($requestData['IIAavailreceived'] === 'Yes') {
                $rules['IIAsource'] = 'required|string|max:255';
                $rules['IIAdatereceived'] = 'required|date';
                $rules['IIAvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIAsource'] = 'nullable|string|max:255';
                $rules['IIAdatereceived'] = 'nullable|date';
                $rules['IIAvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }
            
            // IIBavailreceived
            if ($requestData['IIBavailreceived'] === 'Yes') {
                $rules['IIBsource'] = 'required|string|max:255';
                $rules['IIBdatereceived'] = 'required|date';
                $rules['IIBvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIBsource'] = 'nullable|string|max:255';
                $rules['IIBdatereceived'] = 'nullable|date';
                $rules['IIBvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIIAavailreceived
            if ($requestData['IIIAavailreceived'] === 'Yes') {
                $rules['IIIAsource'] = 'required|string|max:255';
                $rules['IIIAdatereceived'] = 'required|date';
                $rules['IIIAvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIIAsource'] = 'nullable|string|max:255';
                $rules['IIIAdatereceived'] = 'nullable|date';
                $rules['IIIAvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }
            
            // IIIBavailreceived
            if ($requestData['IIIBavailreceived'] === 'Yes') {
                $rules['IIIBsource'] = 'required|string|max:255';
                $rules['IIIBdatereceived'] = 'required|date';
                $rules['IIIBvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIIBsource'] = 'nullable|string|max:255';
                $rules['IIIBdatereceived'] = 'nullable|date';
                $rules['IIIBvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIICavailreceived
            if ($requestData['IIICavailreceived'] === 'Yes') {
                $rules['IIICsource'] = 'required|string|max:255';
                $rules['IIICdatereceived'] = 'required|date';
                $rules['IIICvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIICsource'] = 'nullable|string|max:255';
                $rules['IIICdatereceived'] = 'nullable|date';
                $rules['IIICvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIIDavailreceived
            if ($requestData['IIIDavailreceived'] === 'Yes') {
                $rules['IIIDsource'] = 'required|string|max:255';
                $rules['IIIDdatereceived'] = 'required|date';
                $rules['IIIDvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIIDsource'] = 'nullable|string|max:255';
                $rules['IIIDdatereceived'] = 'nullable|date';
                $rules['IIIDvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIIEavailreceived
            if ($requestData['IIIEavailreceived'] === 'Yes') {
                $rules['IIIEsource'] = 'required|string|max:255';
                $rules['IIIEdatereceived'] = 'required|date';
                $rules['IIIEvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIIEsource'] = 'nullable|string|max:255';
                $rules['IIIEdatereceived'] = 'nullable|date';
                $rules['IIIEvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIIFavailreceived
            if ($requestData['IIIFavailreceived'] === 'Yes') {
                $rules['IIIFsource'] = 'required|string|max:255';
                $rules['IIIFdatereceived'] = 'required|date';
                $rules['IIIFvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIIFsource'] = 'nullable|string|max:255';
                $rules['IIIFdatereceived'] = 'nullable|date';
                $rules['IIIFvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IVAavailreceived
            if ($requestData['IVAavailreceived'] === 'Yes') {
                $rules['IVAsource'] = 'required|string|max:255';
                $rules['IVAdatereceived'] = 'required|date';
                $rules['IVAvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IVAsource'] = 'nullable|string|max:255';
                $rules['IVAdatereceived'] = 'nullable|date';
                $rules['IVAvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // VAavailreceived
            if ($requestData['VAavailreceived'] === 'Yes') {
                $rules['VAsource'] = 'required|string|max:255';
                $rules['VAdatereceived'] = 'required|date';
                $rules['VAvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['VAsource'] = 'nullable|string|max:255';
                $rules['VAdatereceived'] = 'nullable|date';
                $rules['VAvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }



            $message = [
                'required' => 'The field is required.',
                'integer' => 'The field is number.',
                'string' => 'The field must be a string.',
                'date' => 'The field must be a valid date.',
                'max' => 'The field may not be greater than :max characters.',
            ];

            $validator = Validator::make($requestData, $rules, $message);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()->with('error', 'Something went wrong! Please try again.');
            }

            $LGUProfileBarangay = LguProfile::create([
                'dateMonitoring' => $request->dateMonitoring,
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
                'food_fortification' => $request->food_fortification,
                'IVAremarks' => $request->IVAremarks,

                'VAsource' => $request->VAsource,
                'VAavailreceived' => $request->VAavailreceived,
                'VAdatereceived' => $request->VAdatereceived,
                'VAvolumepax' => $request->VAvolumepax,
                'VAremarks' => $request->VAremarks,

                'status' => $request->status,

                'barangay_id' => $request->barangay_id,
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

            return redirect('CityMunicipalStaff/lguprofile')->with('success', 'Data stored successfully!');
        }

        
    }


    public function update(Request $request, $id)
    {
        if ($request->formrequest == 'draft') {
            $lguprofile = LguProfile::find($id);
    
    
            $lguprofile->update([
                'dateMonitoring' => $request->dateMonitoring,
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
                'food_fortification' => $request->food_fortification,
                'IVAremarks' => $request->IVAremarks,

                'VAsource' => $request->VAsource,
                'VAavailreceived' => $request->VAavailreceived,
                'VAdatereceived' => $request->VAdatereceived,
                'VAvolumepax' => $request->VAvolumepax,
                'VAremarks' => $request->VAremarks,

                'status' => $request->status,

                'barangay_id' => $request->barangay_id,
                'municipal_id' => $request->municipal_id,
                'province_id' => $request->province_id,
                'region_id' => $request->region_id,
                'user_id' => $request->user_id,
            ]);

            return redirect('CityMunicipalStaff/lguprofile')->with('success', 'Data stored as draft!');

        }else {

            $requestData = $request->all(); 

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
                'remarksResidential' => 'max:255',

                'landAreaCommercial' => 'required|integer|min:1|max:1000000',
                'remarksCommercial' => 'max:255',

                'landAreaIndustrial' => 'required|integer|min:1|max:1000000',
                'remarksIndustrial' => 'max:255',

                'landAreaAgricultural' => 'required|integer|min:1|max:1000000',
                'remarksAgricultural' => 'max:255',

                'landAreaFLMLNP' => 'required|integer|min:1|max:1000000',
                'remarksFLMLNP' => 'max:255',


                'Iavailreceived' => 'required|string|max:255',
                // 'Isource' => 'required|string|max:255',
                // 'Idatereceived' => 'required|date ',
                // 'Ivolumepax' => 'required|integer|min:1|max:100000',
                'Iremarks' => 'max:255',


                'IIAavailreceived' => 'required|string|max:255',
                // 'IIAsource' => 'required|string|max:255',
                // 'IIAdatereceived' => 'required|date ',
                // 'IIAvolumepax' => 'required|integer|min:1|max:100000',
                'IIAremarks' => 'max:255',


                'IIBavailreceived' => 'required|string|max:255',
                // 'IIBsource' => 'required|string|max:255',
                // 'IIBdatereceived' => 'required|date ',
                // 'IIBvolumepax' => 'required|integer|min:1|max:100000',
                'IIBremarks' => 'max:255',


                'IIIAavailreceived' => 'required|string|max:255',
                // 'IIIAsource' => 'required|string|max:255',
                // 'IIIAdatereceived' => 'required|date',
                // 'IIIAvolumepax' => 'required|integer|min:1|max:100000',
                'IIIAremarks' => 'max:255',


                'IIIBavailreceived' => 'required|string|max:255',
                // 'IIIBsource' => 'required|string|max:255',
                // 'IIIBdatereceived' => 'required|date',
                // 'IIIBvolumepax' => 'required|integer|min:1|max:100000',
                'IIIBremarks' => 'max:255',


                'IIICavailreceived' => 'required|string|max:255',
                // 'IIICsource' => 'required|string|max:255',
                // 'IIICdatereceived' => 'required|date',
                // 'IIICvolumepax' => 'required|integer|min:1|max:100000',
                'IIICremarks' => 'max:255',


                'IIIDavailreceived' => 'required|string|max:255',
                // 'IIIDsource' => 'required|string|max:255',
                // 'IIIDdatereceived' => 'required|date ',
                // 'IIIDvolumepax' => 'required|integer|min:1|max:100000',
                'IIIDremarks' => 'max:255',


                'IIIEavailreceived' => 'required|string|max:255',
                // 'IIIEsource' => 'required|string|max:255',
                // 'IIIEdatereceived' => 'required|date ',
                // 'IIIEvolumepax' => 'required|integer|min:1|max:100000',
                'IIIEremarks' => 'max:255',


                'IIIFavailreceived' => 'required|string|max:255',
                // 'IIIFsource' => 'required|string|max:255',
                // 'IIIFdatereceived' => 'required|date ',
                // 'IIIFvolumepax' => 'required|integer|min:1|max:100000',
                'IIIFremarks' => 'max:255',

                'IVAavailreceived' => 'required|string|max:255',
                // 'IVAsource' => 'required|string|max:255',
                // 'IVAdatereceived' => 'required|date ',
                // 'IVAvolumepax' => 'required|integer|min:1|max:100000',
                'food_fortification' => 'required|string',
                'IVAremarks' => 'max:255',


                'VAavailreceived' => 'required|string|max:255',
                // 'VAsource' => 'required|string|max:255',
                // 'VAdatereceived' => 'required|date ',
                // 'VAvolumepax' => 'required|integer|min:1|max:100000',
                'VAremarks' => 'max:255',

                'status' => 'required|integer',
                'barangay_id' => 'required',
                'municipal_id' => 'required',
                'province_id' => 'required',
                'region_id' => 'required',
                'user_id' => 'required',

            ];

            // Iavailreceived
            if ($requestData['Iavailreceived'] === 'Yes') {
                $rules['Isource'] = 'required|string|max:255';
                $rules['Idatereceived'] = 'required|date';
                $rules['Ivolumepax'] = 'required|integer|min:1|max:100000'; 
            } else {
                $rules['Isource'] = 'nullable|string|max:255';
                $rules['Idatereceived'] = 'nullable|date';
                $rules['Ivolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIAavailreceived
            if ($requestData['IIAavailreceived'] === 'Yes') {
                $rules['IIAsource'] = 'required|string|max:255';
                $rules['IIAdatereceived'] = 'required|date';
                $rules['IIAvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIAsource'] = 'nullable|string|max:255';
                $rules['IIAdatereceived'] = 'nullable|date';
                $rules['IIAvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }
            
            // IIBavailreceived
            if ($requestData['IIBavailreceived'] === 'Yes') {
                $rules['IIBsource'] = 'required|string|max:255';
                $rules['IIBdatereceived'] = 'required|date';
                $rules['IIBvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIBsource'] = 'nullable|string|max:255';
                $rules['IIBdatereceived'] = 'nullable|date';
                $rules['IIBvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIIAavailreceived
            if ($requestData['IIIAavailreceived'] === 'Yes') {
                $rules['IIIAsource'] = 'required|string|max:255';
                $rules['IIIAdatereceived'] = 'required|date';
                $rules['IIIAvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIIAsource'] = 'nullable|string|max:255';
                $rules['IIIAdatereceived'] = 'nullable|date';
                $rules['IIIAvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }
            
            // IIIBavailreceived
            if ($requestData['IIIBavailreceived'] === 'Yes') {
                $rules['IIIBsource'] = 'required|string|max:255';
                $rules['IIIBdatereceived'] = 'required|date';
                $rules['IIIBvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIIBsource'] = 'nullable|string|max:255';
                $rules['IIIBdatereceived'] = 'nullable|date';
                $rules['IIIBvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIICavailreceived
            if ($requestData['IIICavailreceived'] === 'Yes') {
                $rules['IIICsource'] = 'required|string|max:255';
                $rules['IIICdatereceived'] = 'required|date';
                $rules['IIICvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIICsource'] = 'nullable|string|max:255';
                $rules['IIICdatereceived'] = 'nullable|date';
                $rules['IIICvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIIDavailreceived
            if ($requestData['IIIDavailreceived'] === 'Yes') {
                $rules['IIIDsource'] = 'required|string|max:255';
                $rules['IIIDdatereceived'] = 'required|date';
                $rules['IIIDvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIIDsource'] = 'nullable|string|max:255';
                $rules['IIIDdatereceived'] = 'nullable|date';
                $rules['IIIDvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIIEavailreceived
            if ($requestData['IIIEavailreceived'] === 'Yes') {
                $rules['IIIEsource'] = 'required|string|max:255';
                $rules['IIIEdatereceived'] = 'required|date';
                $rules['IIIEvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIIEsource'] = 'nullable|string|max:255';
                $rules['IIIEdatereceived'] = 'nullable|date';
                $rules['IIIEvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IIIFavailreceived
            if ($requestData['IIIFavailreceived'] === 'Yes') {
                $rules['IIIFsource'] = 'required|string|max:255';
                $rules['IIIFdatereceived'] = 'required|date';
                $rules['IIIFvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IIIFsource'] = 'nullable|string|max:255';
                $rules['IIIFdatereceived'] = 'nullable|date';
                $rules['IIIFvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // IVAavailreceived
            if ($requestData['IVAavailreceived'] === 'Yes') {
                $rules['IVAsource'] = 'required|string|max:255';
                $rules['IVAdatereceived'] = 'required|date';
                $rules['IVAvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['IVAsource'] = 'nullable|string|max:255';
                $rules['IVAdatereceived'] = 'nullable|date';
                $rules['IVAvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

            // VAavailreceived
            if ($requestData['VAavailreceived'] === 'Yes') {
                $rules['VAsource'] = 'required|string|max:255';
                $rules['VAdatereceived'] = 'required|date';
                $rules['VAvolumepax'] = 'required|integer|min:1|max:100000';
    
            } else {
                $rules['VAsource'] = 'nullable|string|max:255';
                $rules['VAdatereceived'] = 'nullable|date';
                $rules['VAvolumepax'] = 'nullable|integer|min:1|max:100000'; 
            }

    
            $message = [
                'required' => 'The field is required.',
                'integer' => 'The field is number.',
                'string' => 'The field must be a string.',
                'date' => 'The field must be a valid date.',
                'max' => 'The field may not be greater than :max characters.',
            ];
    
            $validator = Validator::make($request->all(), $rules, $message);
    
            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
            }else {
                $lguprofile = LguProfile::find($id);
    
    
                $lguprofile->update([
                    'dateMonitoring' => $request->dateMonitoring,
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
                    'food_fortification' => $request->food_fortification,
                    'IVAremarks' => $request->IVAremarks,
    
                    'VAsource' => $request->VAsource,
                    'VAavailreceived' => $request->VAavailreceived,
                    'VAdatereceived' => $request->VAdatereceived,
                    'VAvolumepax' => $request->VAvolumepax,
                    'VAremarks' => $request->VAremarks,
    
                    'status' => $request->status,
    
                    'barangay_id' => $request->barangay_id,
                    'municipal_id' => $request->municipal_id,
                    'province_id' => $request->province_id,
                    'region_id' => $request->region_id,
                    'user_id' => $request->user_id,
                ]);
            }
    
            return redirect('CityMunicipalStaff/lguprofile')->with('success', 'Data Updated Successfully!');
        }

   
     
    }

    public function destroy(Request $request)
    {
 
        DB::table('barangaytracking')->where('lguprofilebarangay_id', $request->id)->delete();
        $lguprofile = LguProfile::find($request->id);
        $lguprofile->delete();
        return redirect('CityMunicipalStaff/lguprofile');
    }


    public function downloads(Request $request)
    {

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

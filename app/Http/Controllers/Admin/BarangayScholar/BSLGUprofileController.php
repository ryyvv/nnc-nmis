<?php

namespace App\Http\Controllers\Admin\BarangayScholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LguProfile;
use App\Models\barangaytracking;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\LocationController;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class BSLGUprofileController extends Controller
{

    public function index()
    {
        $lguprofile = DB::table('users')
            ->join('lguprofilebarangay', 'users.id', '=', 'lguprofilebarangay.user_id')
            ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
            ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'lguprofilebarangay.*')
            ->get();

        return view('BarangayScholar.lguprofile.index', compact('lguprofile'));
    }


    public function edit(LguProfile $LguProfile, Request $request)
    {
        $action = 'edit';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $years = range(date("Y"), 1900);

        $row = DB::table('lguprofilebarangay')->where('id', $request->id)->first();         
        
        return view('BarangayScholar.lguprofile.edit', compact('row', 'provinces', 'cities_municipalities', 'barangays', 'years', 'action'));
    }

    public function show(Request $request, $id)
    {
        $action = 'show';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);

        $years = range(date("Y"), 1900);

        $row = DB::table('lguprofilebarangay')->where('id', $request->id)->first();  
     
        return view('BarangayScholar.lguprofile.show', compact('row', 'provinces', 'cities_municipalities', 'barangays', 'years', 'action'));
    }

    public function create(Request $request)
    {

        $action = 'create';
        $location = new LocationController;
        $regCode = auth()->user()->Region;
        $provCode = auth()->user()->Province;
        $citymunCode = auth()->user()->city_municipal;
        $provinces = $location->getProvinces(['reg_code' => $regCode]);
        $cities_municipalities = $location->getCitiesAndMunicipalities(['prov_code' => $provCode]);
        $barangays = $location->getBarangays(['citymun_code' => $citymunCode]);
        
        $years = range(date("Y"), 1900);

        return view('BarangayScholar.lguprofile.create', compact('provinces', 'cities_municipalities', 'barangays', 'years', 'action'));
    }

    public function storeSubmit(Request $request)
    {

        $dataExists = DB::table('lgubarangayreport')
                        ->where('dateMonitoring', $request->dateMonitoring)
                        ->where( 'periodCovereda', $request->periodCovereda,)
                        // ->where( 'barangay_id' , $request->barangay_id,) 
                        ->exists();

        if ($dataExists) {
            return redirect()->back()->withInput()->with('error', 'A record with the same data already exists.');
        }          


        if ($request->formrequest == 'draft') {
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

                'IVAtype' => $request->IVAtype,
                'IVAsource' => $request->IVAsource,
                'IVAavailreceived' => $request->IVAavailreceived,
                'IVAdatereceived' => $request->IVAdatereceived,
                'IVAvolumepax' => $request->IVAvolumepax,
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
        
   
            return redirect('BarangayScholar/lguprofile')->with('success', 'Data stored as Draft!');
        }

        else {
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
                'remarksResidential' => 'nullable|string|max:255',

                'landAreaCommercial' => 'required|integer|min:1|max:1000000',
                'remarksCommercial' => 'nullable|string|max:255',

                'landAreaIndustrial' => 'required|integer|min:1|max:1000000',
                'remarksIndustrial' => 'nullable|string|max:255',

                'landAreaAgricultural' => 'required|integer|min:1|max:1000000',
                'remarksAgricultural' => 'nullable|string|max:255',

                'landAreaFLMLNP' => 'required|integer|min:1|max:1000000',
                'remarksFLMLNP' => 'nullable|string|max:255',

                'Isource' => 'required|string|max:255',
                'Iavailreceived' => 'required|string|max:255',
                'Idatereceived' => 'nullable|date|required_if:Iavailreceived,Yes|filled',
                'Ivolumepax' => 'required|integer|min:1|max:100000',
                'Iremarks' => 'nullable|string|max:255',

                'IIAsource' => 'required|string|max:255',
                'IIAavailreceived' => 'required|string|max:255',
                'IIAdatereceived' => 'nullable|date|required_if:IIAavailreceived,Yes|filled',
                'IIAvolumepax' => 'required|integer|min:1|max:100000',
                'IIAremarks' => 'nullable|string|max:255',

                'IIBsource' => 'required|string|max:255',
                'IIBavailreceived' => 'required|string|max:255',
                'IIBdatereceived' => 'nullable|date|required_if:IIBavailreceived,Yes|filled',
                'IIBvolumepax' => 'required|integer|min:1|max:100000',
                'IIBremarks' => 'nullable|string|max:255',

                'IIIAsource' => 'required|string|max:255',
                'IIIAavailreceived' => 'required|string|max:255',
                'IIIAdatereceived' => 'nullable|date|required_if:IIIAavailreceived,Yes|filled',
                'IIIAvolumepax' => 'required|integer|min:1|max:100000',
                'IIIAremarks' => 'nullable|string|max:255',

                'IIIBsource' => 'required|string|max:255',
                'IIIBavailreceived' => 'required|string|max:255',
                'IIIBdatereceived' => 'nullable|date|required_if:IIIBavailreceived,Yes|filled',
                'IIIBvolumepax' => 'required|integer|min:1|max:100000',
                'IIIBremarks' => 'nullable|string|max:255',

                'IIICsource' => 'required|string|max:255',
                'IIICavailreceived' => 'required|string|max:255',
                'IIICdatereceived' => 'nullable|date|required_if:IIICavailreceived,Yes|filled',
                'IIICvolumepax' => 'required|integer|min:1|max:100000',
                'IIICremarks' => 'nullable|string|max:255',

                'IIIDsource' => 'required|string|max:255',
                'IIIDavailreceived' => 'required|string|max:255',
                'IIIDdatereceived' => 'nullable|date|required_if:IIIDavailreceived,Yes|filled',
                'IIIDvolumepax' => 'required|integer|min:1|max:100000',
                'IIIDremarks' => 'nullable|string|max:255',

                'IIIEsource' => 'required|string|max:255',
                'IIIEavailreceived' => 'required|string|max:255',
                'IIIEdatereceived' => 'nullable|date|required_if:IIIEavailreceived,Yes|filled',
                'IIIEvolumepax' => 'required|integer|min:1|max:100000',
                'IIIEremarks' => 'nullable|string|max:255',

                'IIIFsource' => 'required|string|max:255',
                'IIIFavailreceived' => 'required|string|max:255',
                'IIIFdatereceived' => 'nullable|date|required_if:IIIFavailreceived,Yes|filled',
                'IIIFvolumepax' => 'required|integer|min:1|max:100000',
                'IIIFremarks' => 'nullable|string|max:255',

                'IVAtype' => 'required|string|max:255',
                'IVAsource' => 'required|string|max:255',
                'IVAavailreceived' => 'required|string|max:255',
                'IVAdatereceived' => 'nullable|date|required_if:IVAavailreceived,Yes|filled',
                'IVAvolumepax' => 'required|integer|min:1|max:100000',
                'IVAremarks' => 'nullable|string|max:255',

                'VAsource' => 'required|string|max:255',
                'VAavailreceived' => 'required|string|max:255',
                'VAdatereceived' => 'nullable|date|required_if:VAavailreceived,Yes|filled',
                'VAvolumepax' => 'required|integer|min:1|max:100000',
                'VAremarks' => 'nullable|string|max:255',

                'status' => 'required|integer',
                'barangay_id' => 'required',
                'municipal_id' => 'required',
                'province_id' => 'required',
                'region_id' => 'required',
                'user_id' => 'required',

            ];


            $message = [
                'required' => 'The field is required.',
                'integer' => 'The field is number.',
                'string' => 'The field must be a string.',
                'date' => 'The field must be a valid date.',
                'max' => 'The field may not be greater than :max characters.',
                '*.required_if' => 'The field is required.',
                '*.filled' => 'The field is required.',
            ];

            $validator = Validator::make($request->all(), $rules, $message);

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

                'IVAtype' => $request->IVAtype,
                'IVAsource' => $request->IVAsource,
                'IVAavailreceived' => $request->IVAavailreceived,
                'IVAdatereceived' => $request->IVAdatereceived,
                'IVAvolumepax' => $request->IVAvolumepax,
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

            DB::table('lgubarangayreport')->insert([
                'lguprofilebarangay_id' => $LGUProfileBarangay->id, 
                'barangay_id' => $request->barangay_id,
                'municipal_id' => $request->municipal_id,   
                'dateMonitoring' => $request->dateMonitoring,
                'periodCovereda' => $request->periodCovereda,
                'status' => $request->status,
                'user_id' => $request->user_id,
                'count' =>  1,
                'created_at' => now(), // Optional
                'updated_at' => now(), // Optional
            ]);


            return redirect('BarangayScholar/lguprofile')->with('success', 'Data stored successfully!');
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

                'IVAtype' => $request->IVAtype,
                'IVAsource' => $request->IVAsource,
                'IVAavailreceived' => $request->IVAavailreceived,
                'IVAdatereceived' => $request->IVAdatereceived,
                'IVAvolumepax' => $request->IVAvolumepax,
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

            return redirect('BarangayScholar/lguprofile')->with('success', 'Data stored as draft!');

        }else {

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
                'remarksResidential' => 'nullable|string|max:255',
    
                'landAreaCommercial' => 'required|integer|min:1|max:1000000',
                'remarksCommercial' => 'nullable|string|max:255',
    
                'landAreaIndustrial' => 'required|integer|min:1|max:1000000',
                'remarksIndustrial' => 'nullable|string|max:255',
    
                'landAreaAgricultural' => 'required|integer|min:1|max:1000000',
                'remarksAgricultural' => 'nullable|string|max:255',
    
                'landAreaFLMLNP' => 'required|integer|min:1|max:1000000',
                'remarksFLMLNP' => 'nullable|string|max:255',
    
                'Isource' => 'required|string|max:255',
                'Iavailreceived' => 'required|string|max:255',
                'Idatereceived' => 'nullable|date|required_if:Iavailreceived,Yes|filled',
                'Ivolumepax' => 'required|integer|min:1|max:100000',
                'Iremarks' => 'nullable|string|max:255',
    
                'IIAsource' => 'required|string|max:255',
                'IIAavailreceived' => 'required|string|max:255',
                'IIAdatereceived' => 'nullable|date|required_if:IIAavailreceived,Yes|filled',
                'IIAvolumepax' => 'required|integer|min:1|max:100000',
                'IIAremarks' => 'nullable|string|max:255',
    
                'IIBsource' => 'required|string|max:255',
                'IIBavailreceived' => 'required|string|max:255',
                'IIBdatereceived' => 'nullable|date|required_if:IIBavailreceived,Yes|filled',
                'IIBvolumepax' => 'required|integer|min:1|max:100000',
                'IIBremarks' => 'nullable|string|max:255',
    
                'IIIAsource' => 'required|string|max:255',
                'IIIAavailreceived' => 'required|string|max:255',
                'IIIAdatereceived' => 'nullable|date|required_if:IIIAavailreceived,Yes|filled',
                'IIIAvolumepax' => 'required|integer|min:1|max:100000',
                'IIIAremarks' => 'nullable|string|max:255',
    
                'IIIBsource' => 'required|string|max:255',
                'IIIBavailreceived' => 'required|string|max:255',
                'IIIBdatereceived' => 'nullable|date|required_if:IIIBavailreceived,Yes|filled',
                'IIIBvolumepax' => 'required|integer|min:1|max:100000',
                'IIIBremarks' => 'nullable|string|max:255',
    
                'IIICsource' => 'required|string|max:255',
                'IIICavailreceived' => 'required|string|max:255',
                'IIICdatereceived' => 'nullable|date|required_if:IIICavailreceived,Yes|filled',
                'IIICvolumepax' => 'required|integer|min:1|max:100000',
                'IIICremarks' => 'nullable|string|max:255',
    
                'IIIDsource' => 'required|string|max:255',
                'IIIDavailreceived' => 'required|string|max:255',
                'IIIDdatereceived' => 'nullable|date|required_if:IIIDavailreceived,Yes|filled',
                'IIIDvolumepax' => 'required|integer|min:1|max:100000',
                'IIIDremarks' => 'nullable|string|max:255',
    
                'IIIEsource' => 'required|string|max:255',
                'IIIEavailreceived' => 'required|string|max:255',
                'IIIEdatereceived' => 'nullable|date|required_if:IIIEavailreceived,Yes|filled',
                'IIIEvolumepax' => 'required|integer|min:1|max:100000',
                'IIIEremarks' => 'nullable|string|max:255',
    
                'IIIFsource' => 'required|string|max:255',
                'IIIFavailreceived' => 'required|string|max:255',
                'IIIFdatereceived' => 'nullable|date|required_if:IIIFavailreceived,Yes|filled',
                'IIIFvolumepax' => 'required|integer|min:1|max:100000',
                'IIIFremarks' => 'nullable|string|max:255',
    
                'IVAtype' => 'required|string|max:255',
                'IVAsource' => 'required|string|max:255',
                'IVAavailreceived' => 'required|string|max:255',
                'IVAdatereceived' => 'nullable|date|required_if:IVAavailreceived,Yes|filled',
                'IVAvolumepax' => 'required|integer|min:1|max:100000',
                'IVAremarks' => 'nullable|string|max:255',
    
                'VAsource' => 'required|string|max:255',
                'VAavailreceived' => 'required|string|max:255',
                'VAdatereceived' => 'nullable|date|required_if:VAavailreceived,Yes|filled',
                'VAvolumepax' => 'required|integer|min:1|max:100000',
                'VAremarks' => 'nullable|string|max:255',
    
                'status' => 'required|integer',
                'barangay_id' => 'required',
                'municipal_id' => 'required',
                'province_id' => 'required',
                'region_id' => 'required',
                'user_id' => 'required',
            ];
    
            $message = [
                'required' => 'The field is required.',
                'integer' => 'The field is number.',
                'string' => 'The field must be a string.',
                'date' => 'The field must be a valid date.',
                'max' => 'The field may not be greater than :max characters.',
                '*.required_if' => 'The field is required.',
                '*.filled' => 'The field is required.',
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
                    
                    'IVAtype' => $request->IVAtype,
                    'IVAsource' => $request->IVAsource,
                    'IVAavailreceived' => $request->IVAavailreceived,
                    'IVAdatereceived' => $request->IVAdatereceived,
                    'IVAvolumepax' => $request->IVAvolumepax,
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
    
            return redirect('BarangayScholar/lguprofile')->with('success', 'Data Updated Successfully!');
        }

   
     
    }

    public function destroy(Request $request){
 
        DB::table('barangaytracking')->where('lguprofilebarangay_id', $request->id)->delete();
        $lguprofile = LguProfile::find($request->id);
        $lguprofile->delete();
        return redirect('BarangayScholar/lguprofile');
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
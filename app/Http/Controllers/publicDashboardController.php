<?php

namespace App\Http\Controllers;

use App\Models\LncFunctionality;
use App\Models\PsgcRegion;
use Illuminate\Http\Request;

class publicDashboardController extends Controller
{
    //
    public function index()
    {
    $lncTotals = [
            'totalRegionCount' => 0,
            'totalRegionFullyFunctional' => 0,
            'totalRegionSubstantiallyFunctional' => 0,
            'totalRegionPartiallyFunctional' => 0,
            'totalRegionNonFunctional' => 0,
            'totalProvinceCount' => 0,
            'totalProvinceFullyFunctional' => 0,
            'totalProvinceSubstantiallyFunctional' => 0,
            'totalProvincePartiallyFunctional' => 0,
            'totalProvinceNonFunctional' => 0,
            'totalCityCount' => 0,
            'totalCityFullyFunctional' => 0,
            'totalCitySubstantiallyFunctional' => 0,
            'totalCityPartiallyFunctional' => 0,
            'totalCityNonFunctional' => 0,
            'totalMunicipalityCount' => 0,
            'totalMunicipalityFullyFunctional' => 0,
            'totalMunicipalitySubstantiallyFunctional' => 0,
            'totalMunicipalityPartiallyFunctional' => 0,
            'totalMunicipalityNonFunctional' => 0,
            // Separate totals for HUC, CC, ICC functionalities
            'totalHUCCount' => 0,
            'totalHUCFullyFunctional' => 0,
            'totalHUCSubstantiallyFunctional' => 0,
            'totalHUCPartiallyFunctional' => 0,
            'totalHUCNonFunctional' => 0,
            'totalCCCount' => 0,
            'totalCCFullyFunctional' => 0,
            'totalCCSubstantiallyFunctional' => 0,
            'totalCCPartiallyFunctional' => 0,
            'totalCCNonFunctional' => 0,
            'totalICCCount' => 0,
            'totalICCFullyFunctional' => 0,
            'totalICCSubstantiallyFunctional' => 0,
            'totalICCPartiallyFunctional' => 0,
            'totalICCNonFunctional' => 0, 
            //Indicators
            // Province
            'totalProvinceCDCount' => 0,
            'totalProvincePP1ACount' => 0,
            'totalProvincePP1BCount' => 0,
            'totalProvincePP2ACount' => 0,
            'totalProvincePP2BCount' => 0,
            'totalProvincePP3ACount' => 0,
            'totalProvincePP3BCount' => 0,
            'totalProvincePP4ACount' => 0,
            'totalProvinceNSDCount' => 0,
            'totalProvinceME1Count' => 0,
            'totalProvinceME2Count' => 0,
            'totalProvinceME3Count' => 0,
            // HUC AND ICC
            'totalHUC&ICCCDCount' => 0,
            'totalHUC&ICCPP1ACount' => 0,
            'totalHUC&ICCPP1BCount' => 0,
            'totalHUC&ICCPP2ACount' => 0,
            'totalHUC&ICCPP2BCount' => 0,
            'totalHUC&ICCPP3ACount' => 0,
            'totalHUC&ICCPP3BCount' => 0,
            'totalHUC&ICCPP4ACount' => 0,
            'totalHUC&ICCNSDCount' => 0,
            'totalHUC&ICCME1Count' => 0,
            'totalHUC&ICCME2Count' => 0,
            'totalHUC&ICCME3Count' => 0,
            // CC
            'totalCCCDCount' => 0,
            'totalCCPP1ACount' => 0,
            'totalCCPP1BCount' => 0,
            'totalCCPP2ACount' => 0,
            'totalCCPP2BCount' => 0,
            'totalCCPP3ACount' => 0,
            'totalCCPP3BCount' => 0,
            'totalCCPP4ACount' => 0,
            'totalCCNSDCount' => 0,
            'totalCCME1Count' => 0,
            'totalCCME2Count' => 0,
            'totalCCME3Count' => 0,
            // Municipality
            'totalMunicipalityCDCount' => 0,
            'totalMunicipalityPP1ACount' => 0,
            'totalMunicipalityPP1BCount' => 0,
            'totalMunicipalityPP2ACount' => 0,
            'totalMunicipalityPP2BCount' => 0,
            'totalMunicipalityPP3ACount' => 0,
            'totalMunicipalityPP3BCount' => 0,
            'totalMunicipalityPP4ACount' => 0,
            'totalMunicipalityNSDCount' => 0,
            'totalMunicipalityME1Count' => 0,
            'totalMunicipalityME2Count' => 0,
            'totalMunicipalityME3Count' => 0,
        ];

        $results = LncFunctionality::selectRaw("
                reg_code,
                geographic_level,
                COUNT(*) as total_count,
                SUM(CASE WHEN functionality = 'Fully Functional' THEN 1 ELSE 0 END) as fully_functional,
                SUM(CASE WHEN functionality = 'Substantially Functional' THEN 1 ELSE 0 END) as substantially_functional,
                SUM(CASE WHEN functionality = 'Partially Functional' THEN 1 ELSE 0 END) as partially_functional,
                SUM(CASE WHEN functionality = 'Non-Functional' THEN 1 ELSE 0 END) as non_functional,
                SUM(cd) as cd_count,
                SUM(pp1a) as pp1a_count,
                SUM(pp1b) as pp1b_count,
                SUM(pp2a) as pp2a_count,
                SUM(pp2b) as pp2b_count,
                SUM(pp3a) as pp3a_count,
                SUM(pp3b) as pp3b_count,
                SUM(pp4a) as pp4a_count,
                SUM(nsd) as nsd_count,
                SUM(me1) as me1_count,
                SUM(me2) as me2_count,
                SUM(me3) as me3_count
            ")
            ->whereIn('geographic_level', ['Reg', 'Prov', 'CC', 'HUC', 'ICC', 'Mun'])
            ->groupBy('reg_code', 'geographic_level')
            ->get();

        foreach ($results as $result) {
            switch ($result->geographic_level) {
                case 'Reg':
                    $lncTotals['totalRegionCount'] += $result->total_count;
                    $lncTotals['totalRegionFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalRegionSubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalRegionPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalRegionNonFunctional'] += $result->non_functional;
                    break;
                case 'Prov':
                    $lncTotals['totalProvinceCount'] += $result->total_count;
                    $lncTotals['totalProvinceFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalProvinceSubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalProvincePartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalProvinceNonFunctional'] += $result->non_functional;
                    
                    $lncTotals['totalProvinceCDCount'] += $result->cd_count;
                    $lncTotals['totalProvincePP1ACount'] += $result->pp1a_count;
                    $lncTotals['totalProvincePP1BCount'] += $result->pp1b_count;
                    $lncTotals['totalProvincePP2ACount'] += $result->pp2a_count;
                    $lncTotals['totalProvincePP2BCount'] += $result->pp2b_count;
                    $lncTotals['totalProvincePP3ACount'] += $result->pp3a_count;
                    $lncTotals['totalProvincePP3BCount'] += $result->pp3b_count;
                    $lncTotals['totalProvincePP4ACount'] += $result->pp4a_count;
                    $lncTotals['totalProvinceNSDCount'] += $result->nsd_count;
                    $lncTotals['totalProvinceME1Count'] += $result->me1_count;
                    $lncTotals['totalProvinceME2Count'] += $result->me2_count;
                    $lncTotals['totalProvinceME3Count'] += $result->me3_count;
                    break;
                case 'CC':
                    $lncTotals['totalCityCount'] += $result->total_count;
                    $lncTotals['totalCityFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalCitySubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalCityPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalCityNonFunctional'] += $result->non_functional;

                    $lncTotals['totalCCCount'] += $result->total_count;
                    $lncTotals['totalCCFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalCCSubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalCCPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalCCNonFunctional'] += $result->non_functional;

                    $lncTotals['totalCCCDCount'] += $result->cd_count;
                    $lncTotals['totalCCPP1ACount'] += $result->pp1a_count;
                    $lncTotals['totalCCPP1BCount'] += $result->pp1b_count;
                    $lncTotals['totalCCPP2ACount'] += $result->pp2a_count;
                    $lncTotals['totalCCPP2BCount'] += $result->pp2b_count;
                    $lncTotals['totalCCPP3ACount'] += $result->pp3a_count;
                    $lncTotals['totalCCPP3BCount'] += $result->pp3b_count;
                    $lncTotals['totalCCPP4ACount'] += $result->pp4a_count;
                    $lncTotals['totalCCNSDCount'] += $result->nsd_count;
                    $lncTotals['totalCCME1Count'] += $result->me1_count;
                    $lncTotals['totalCCME2Count'] += $result->me2_count;
                    $lncTotals['totalCCME3Count'] += $result->me3_count;
                    break;
                case 'HUC':
                    $lncTotals['totalCityCount'] += $result->total_count;
                    $lncTotals['totalCityFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalCitySubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalCityPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalCityNonFunctional'] += $result->non_functional;

                    $lncTotals['totalHUCCount'] += $result->total_count;
                    $lncTotals['totalHUCFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalHUCSubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalHUCPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalHUCNonFunctional'] += $result->non_functional;

                    $lncTotals['totalHUC&ICCCDCount'] += $result->cd_count;
                    $lncTotals['totalHUC&ICCPP1ACount'] += $result->pp1a_count;
                    $lncTotals['totalHUC&ICCPP1BCount'] += $result->pp1b_count;
                    $lncTotals['totalHUC&ICCPP2ACount'] += $result->pp2a_count;
                    $lncTotals['totalHUC&ICCPP2BCount'] += $result->pp2b_count;
                    $lncTotals['totalHUC&ICCPP3ACount'] += $result->pp3a_count;
                    $lncTotals['totalHUC&ICCPP3BCount'] += $result->pp3b_count;
                    $lncTotals['totalHUC&ICCPP4ACount'] += $result->pp4a_count;
                    $lncTotals['totalHUC&ICCNSDCount'] += $result->nsd_count;
                    $lncTotals['totalHUC&ICCME1Count'] += $result->me1_count;
                    $lncTotals['totalHUC&ICCME2Count'] += $result->me2_count;
                    $lncTotals['totalHUC&ICCME3Count'] += $result->me3_count;
                    break;
                case 'ICC':
                    $lncTotals['totalCityCount'] += $result->total_count;
                    $lncTotals['totalCityFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalCitySubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalCityPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalCityNonFunctional'] += $result->non_functional;

                    $lncTotals['totalICCCount'] += $result->total_count;
                    $lncTotals['totalICCFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalICCSubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalICCPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalICCNonFunctional'] += $result->non_functional;

                    $lncTotals['totalHUC&ICCCDCount'] += $result->cd_count;
                    $lncTotals['totalHUC&ICCPP1ACount'] += $result->pp1a_count;
                    $lncTotals['totalHUC&ICCPP1BCount'] += $result->pp1b_count;
                    $lncTotals['totalHUC&ICCPP2ACount'] += $result->pp2a_count;
                    $lncTotals['totalHUC&ICCPP2BCount'] += $result->pp2b_count;
                    $lncTotals['totalHUC&ICCPP3ACount'] += $result->pp3a_count;
                    $lncTotals['totalHUC&ICCPP3BCount'] += $result->pp3b_count;
                    $lncTotals['totalHUC&ICCPP4ACount'] += $result->pp4a_count;
                    $lncTotals['totalHUC&ICCNSDCount'] += $result->nsd_count;
                    $lncTotals['totalHUC&ICCME1Count'] += $result->me1_count;
                    $lncTotals['totalHUC&ICCME2Count'] += $result->me2_count;
                    $lncTotals['totalHUC&ICCME3Count'] += $result->me3_count;
                    break;
                case 'Mun':
                    $lncTotals['totalMunicipalityCount'] += $result->total_count;
                    $lncTotals['totalMunicipalityFullyFunctional'] += $result->fully_functional;
                    $lncTotals['totalMunicipalitySubstantiallyFunctional'] += $result->substantially_functional;
                    $lncTotals['totalMunicipalityPartiallyFunctional'] += $result->partially_functional;
                    $lncTotals['totalMunicipalityNonFunctional'] += $result->non_functional;

                    $lncTotals['totalMunicipalityCDCount'] += $result->cd_count;
                    $lncTotals['totalMunicipalityPP1ACount'] += $result->pp1a_count;
                    $lncTotals['totalMunicipalityPP1BCount'] += $result->pp1b_count;
                    $lncTotals['totalMunicipalityPP2ACount'] += $result->pp2a_count;
                    $lncTotals['totalMunicipalityPP2BCount'] += $result->pp2b_count;
                    $lncTotals['totalMunicipalityPP3ACount'] += $result->pp3a_count;
                    $lncTotals['totalMunicipalityPP3BCount'] += $result->pp3b_count;
                    $lncTotals['totalMunicipalityPP4ACount'] += $result->pp4a_count;
                    $lncTotals['totalMunicipalityNSDCount'] += $result->nsd_count;
                    $lncTotals['totalMunicipalityME1Count'] += $result->me1_count;
                    $lncTotals['totalMunicipalityME2Count'] += $result->me2_count;
                    $lncTotals['totalMunicipalityME3Count'] += $result->me3_count;
                    break;
            }
        }

        $lncTotals['grandTotal'] = $lncTotals['totalProvinceCount'] + $lncTotals['totalCityCount'] + $lncTotals['totalMunicipalityCount'];
        $lncTotals['grandTotalFullyFunctional'] = $lncTotals['totalRegionFullyFunctional'] + $lncTotals['totalProvinceFullyFunctional'] + $lncTotals['totalCityFullyFunctional'] + $lncTotals['totalMunicipalityFullyFunctional'];
        $lncTotals['grandTotalSubstantiallyFunctional'] = $lncTotals['totalRegionSubstantiallyFunctional'] + $lncTotals['totalProvinceSubstantiallyFunctional'] + $lncTotals['totalCitySubstantiallyFunctional'] + $lncTotals['totalMunicipalitySubstantiallyFunctional'];
        $lncTotals['grandTotalPartiallyFunctional'] = $lncTotals['totalRegionPartiallyFunctional'] + $lncTotals['totalProvincePartiallyFunctional'] + $lncTotals['totalCityPartiallyFunctional'] + $lncTotals['totalMunicipalityPartiallyFunctional'];
        $lncTotals['grandTotalNonFunctional'] = $lncTotals['totalRegionNonFunctional'] + $lncTotals['totalProvinceNonFunctional'] + $lncTotals['totalCityNonFunctional'] + $lncTotals['totalMunicipalityNonFunctional'];
        
        // dd($lncTotals);
    
        return view('publicDashboardViews', compact('lncTotals'));
    }
}
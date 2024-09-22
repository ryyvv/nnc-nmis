<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Model\User;

class LNFPSeederDNPC extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('form5_fields')->insert([
        //     id,
        //     form5name
        //     form5level


        // ]);

        
        // Seed the form_fields table
        DB::table('form5_fields_content_PNAO')->insert([  
            [
                'survey_id' => 1,  // Reference to survey ID
                'column1' => 'A',
                'column2' => 'Orientation, Promotion and Advocacy',
                'column3' => 'DNPC assists in the conduct of one activity to promote good nutrition',
                'column4' => 'DNPC assists in the conduct of more than one activity to promote good nutrition and nutrition-related national laws and policies and was attended by less than 80% of the target population',
                'column5' => 'DNPC assists in the conduct more than one activity to promote good nutrition and nutrition-related national laws and policies and was attended by 80% of the target population ',
                'column6' => 'DNPC assists in the conduct of more than one activity to promote good nutrition and nutrition-related national laws and policies and was attended by more than 80% of the target population',
                'column7' => 'DNPC assists in the conduct more than one activity to promote good nutrition and nutrition-related national laws and policies and was attended by 100% of the target population',
                'column8' => 'Provincial Nutrition Action Plan Accomplishment report Documentation report',
                'rating' => 'ratingA',
                'remarks' => 'remarksA',
                'belongTo'  => 3,
            ],
            [
                'survey_id' => 2,  // Reference to survey ID
                'column1' => 'B',
                'column2' => 'Planning, Implementation, Monitoring and Evaluation',
                'column3' => 'DNPC provides technical and/or adiministrative assistance in the conduct of nutrition activities in the barangays',
                'column4' => 'DNPC provides technical assistance in the formulation of Local Nutrition Action Plans where less than 80% of municipalities and/or component cities covered by the DNPC formulated their Local Nutrition Action Plans',
                'column5' => 'DNPC technical assistance in the formulation of Local Nutrition Action Plans where 80% of municipalities and/or component cities covered by the DNPC formulated their LNAPs',
                'column6' => 'DNPC provides technical assistance in the formulation of Local Nutrition Action Plans where more than 80% of municipalities and/or component cities covered by the DNPC formulated their LNAPs',
                'column7' => 'DNPC provides technical assistance in the formulation of Local Nutrition Action Plans where 100% of municipalities and/or component cities covered by the DNPC formulated their LNAPs',
                'column8' => 'Provincial Nutrition Action Plan Minutes of Meeting Documentation report City/ Municipal Nutrition Action Plans', 
                'rating' => 'ratingB',
                'remarks' => 'remarksB',
                'belongTo'  => 3,
            ],
            [
                'survey_id' => 3,  // Reference to survey ID
                'column1' => '',
                'column2' => '',
                'column3' => 'DPNC monitors submission of BNS reports',
                'column4' => 'DNPC monitors performance of BNS',
                'column5' => 'DNPC monitors and evaluates performance of BNSs',
                'column6' => 'DNPC monitors and evaluates performance of BNS and provides recommendations to improve performance ',
                'column7' => 'DNPC monitors and evaluates performance of BNS provides recommendations to improve performance and produced at least one oustanding BNS in the past three years',
                'column8' => 'Local Nutrition Action
                                Monitoring report
                                Plan
                                Monitoring report', 
                'rating' => 'ratingBB',
                'remarks' => 'remarksBB',
                'belongTo'  => 3,
            ],
            [
                'survey_id' => 4,  // Reference to survey ID
                'column1' => 'C',
                'column2' => 'Capacity Development',
                'column3' => 'DNPC plans and conducts training activities for BNS',
                'column4' => 'DNPC plans and conducts training and/or continuing education activities for less than 80% of new and/or existing BNS',
                'column5' => 'DNPC plans and conducts training and/or continuing education activities for 80% of new and/or existing BNS',
                'column6' => 'DNPC plans and conducts training and/or continuing education activities for more than 80% of new and/or existing BNS',
                'column7' => 'DNPC plans and conducts training and/or continuing education activities for 100% of new and/or existing BNS and maintains the BNS capacity map',
                'column8' => 'Local Nutrition Action Plan Accomplishment report Documentation report BNS Capacity Map', 
                'rating' => 'ratingC',
                'remarks' => 'remarksC',
                'belongTo'  => 3,
            ],
            [
                'survey_id' => 5,  // Reference to survey ID
                'column1' => '',
                'column2' => '',
                'column3' => 'DNPC conducts one orientation on nutrition progams to various stakeholders',
                'column4' => 'DNPC conducts more than one orientation on nutrition progams to various stakeholders',
                'column5' => 'DNPC conducts more than one orientation on nutrition progams to various stakeholders and provides technical assistance to 80% of the BNCs covered to strengthen functionality',
                'column6' => 'DNPC conducts more than one orientation on nutrition progams to various stakeholders and provides technical assistance to more than 80% of the BNCs covered to strengthen functionality',
                'column7' => 'DNPC conducts more than one orientation on nutrition progams to various stakeholders and provides technical assistance to 100% of the BNCs covered to strengthen functionality',
                'column8' => 'Local Nutrition Action Plan
                                Accomplishment
                                report
                                Documentation report', 
                'rating' => 'ratingCC',
                'remarks' => 'remarksCC',
                'belongTo'  => 3,
            ],
            [
                'survey_id' => 6,  // Reference to survey ID
                'column1' => 'D',
                'column2' => 'Documentation and report-writing',
                'column3' => 'DNPC submits C/MNC reports to Nutrition Action Officer',
                'column4' => 'DNPC reviews OPT
                                Plus reports from
                                C/MNC and submits
                                to Nutrition Action
                                Officer',
                'column5' => 'DNPC reviews all
                                reports from C/MNC
                                covered and submits
                                to Nutrition Action
                                Officer',
                'column6' => 'DNPC reviews all
                                reports from C/MNC
                                covered, submits to
                                Nutrition Action
                                Officer and assists
                                Nutrition Action
                                Officer in collecting
                                data from Provincial
                                Nutrition Committee
                                members',
                'column7' => 'DNPC reviews all
                                reports from C/MNC
                                covered submits to
                                Nutrition Action
                                Officer and assists
                                Nutrition Action
                                Officer in collecting
                                data and analyzing
                                data from Provincial
                                Nutrition Committee
                                members',
                'column8' => 'BNS Reports
                                Consolidated BNS
                                Reports
                                Agency reports
                                Consolidated agency
                                reports', 
                'rating' => 'ratingD',
                'remarks' => 'remarksD',
                'belongTo'  => 3,
            ],
            [
                'survey_id' => 7,  // Reference to survey ID
                'column1' => 'E',
                'column2' => 'Selection and Recruitment of BNS',
                'column3' => 'DNPC maintains the masterlist of BNS by city/ municipality by barangay',
                'column4' => 'DNPC maintains masterlist of BNS by city/ municipality by barangay and advocates for appointment of at least one BNS per barangay',
                'column5' => 'DNPC conducts activities in Level 2 and monitors appointment of at least one BNS per barangay',
                'column6' => 'DNPC conducts activities in Level 3 and monitors appointment of BNS based on requirements in PD 1569 or higher as set by the LGU or barangay',
                'column7' => 'DNPC conducts activities in Level 4 and monitors the honorarium/ incentives/ support received by the BNS from the barangay',
                'column8' => 'Minutes of meeting
                                Monitroing report
                                BNS database', 
                'rating' => 'ratingE',
                'remarks' => 'remarksE',
                'belongTo'  => 3,
            ],
           

            

        ]);

 
    }
}

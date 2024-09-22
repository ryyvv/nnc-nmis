<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Model\User;

class LNFPSeederCMNPC extends Seeder
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
                'column3' => 'CMNPC assists in the conduct of one activity to promote good nutrition',
                'column4' => 'CMNPC assists in the conduct of more than one activity to promote good nutrition and nutrition-related national laws and policies and was attended by less than 80% of the target population',
                'column5' => 'CMNPC assists in the conduct more than one activity to promote good nutrition and nutrition-related national laws and policies and was attended by 80% of the target population ',
                'column6' => 'CMNPC assists in the conduct of more than one activity to promote good nutrition and nutrition-related national laws and policies and was attended by more than 80% of the target population',
                'column7' => 'CMNPC assists in the conduct more than one activity to promote good nutrition and nutrition-related national laws and policies and was attended by 100% of the target population',
                'column8' => 'Local Nutrition Action Plan Accomplishment report Documentation report',
                'rating' => 'ratingA',
                'remarks' => 'remarksA',
                'belongTo'  => 5,
            ],
            [
                'survey_id' => 2,  // Reference to survey ID
                'column1' => 'B',
                'column2' => 'Planning, Implementation, Monitoring and Evaluation',
                'column3' => 'CMNPC provides technical and/or adiministrative assistance in the conduct of nutrition activities in the barangays',
                'column4' => 'CMNPC provides technical assistance in the formulation of Barangay Nutrition Action Plans where less than 80% of barangays covered by the MNPC formulated their Barangay Nutrition Action Plans',
                'column5' => 'CMNPC technical assistance in the formulation of Barangay Nutrition Action Plans where 80% of barangays covered by the MNPC formulated their BNAPs',
                'column6' => 'CMNPC provides technical assistance in the formulation of Barangay Nutrition Action Plans where more than 80% of barangays covered by the MNPC formulated their BNAPs',
                'column7' => 'CMNPC provides technical assistance in the formulation of Barangay Nutrition Action Plans where 100% of barangays covered by the MNPC formulated their BNAPs',
                'column8' => 'Local Nutrition Action Plan Minutes of Meeting Documentation report Barangay Nutrition Action Plans', 
                'rating' => 'ratingB',
                'remarks' => 'remarksB',
                'belongTo'  => 5,
            ],
            [
                'survey_id' => 3,  // Reference to survey ID
                'column1' => '',
                'column2' => '',
                'column3' => 'CMNPC monitors submission of BNS reports',
                'column4' => 'CMNPC monitors performance of BNS',
                'column5' => 'CMNPC monitors and evaluates performance of BNSs',
                'column6' => 'CMNPC monitors and evaluates performance of BNS and provides recommendations to improve performance ',
                'column7' => 'CMNPC monitors and evaluates performance of BNS, provides recommendations to improve performance and produced at least one oustanding BNS in the past three years',
                'column8' => 'Local Nutrition Action
                                Monitoring report
                                Plan
                                Monitoring report', 
                'rating' => 'ratingBB',
                'remarks' => 'remarksBB',
                'belongTo'  => 5,
            ],
            [
                'survey_id' => 4,  // Reference to survey ID
                'column1' => 'C',
                'column2' => 'Capacity Development',
                'column3' => 'CMNPC plans and conducts training activities for BNS',
                'column4' => 'CMNPC plans and conducts training and/or continuing education activities for less than 80% of new and/or existing BNS',
                'column5' => 'CMNPC plans and conducts training and/or continuing education activities for 80% of new and/or existing BNS',
                'column6' => 'CMNPC plans and conducts training and/or continuing education activities for more than 80% of new and/or existing BNS',
                'column7' => 'CMNPC plans and conducts training and/or continuing education activities for 100% of new and/or existing BNS and maintains the BNS capacity map',
                'column8' => 'Local Nutrition Action Plan Accomplishment report Documentation report BNS Capacity Map', 
                'rating' => 'ratingC',
                'remarks' => 'remarksC',
                'belongTo'  => 5,
            ],
            [
                'survey_id' => 5,  // Reference to survey ID
                'column1' => '',
                'column2' => '',
                'column3' => 'CMNPC conducts one orientation on nutrition progams to various stakeholders',
                'column4' => 'CMNPC conducts more than one orientation on nutrition progams to various stakeholders',
                'column5' => 'CMNPC conducts more than one orientation on nutrition progams to various stakeholders and provides technical assistance to 80% of the BNCs covered to strengthen functionality',
                'column6' => 'CMNPC conducts more than one orientation on nutrition progams to various stakeholders and provides technical assistance to more than 80% of the BNCs covered to strengthen functionality',
                'column7' => 'CMNPC conducts more than one orientation on nutrition progams to various stakeholders and provides technical assistance to 100% of the BNCs covered to strengthen functionality',
                'column8' => 'Local Nutrition Action Plan
                                Accomplishment
                                report
                                Documentation report', 
                'rating' => 'ratingCC',
                'remarks' => 'remarksCC',
                'belongTo'  => 5,
            ],
            [
                'survey_id' => 6,  // Reference to survey ID
                'column1' => 'D',
                'column2' => 'Documentation and report-writing',
                'column3' => 'CMNPC submits BNS reports to Nutrition Action Officer',
                'column4' => 'CMNPC reviews BNS reports, consolidates BNS reports and submits to Nutrition Action Officer',
                'column5' => 'CMNPC reviews all reports from BNS covered, consolidates BNS reports and submits to Nutrition Action Officer',
                'column6' => 'CMNPC reviews all reports from BNS covered, consolidates BNS reports and submits to Nutrition Action Officer and assists Nutrition Action Officer in collecting agency reports',
                'column7' => 'CMNPC reviews all reports from BNS covered, consolidates BNS reports and submits to Nutrition Action Officer and assists Nutrition Action Officer in collecting and consolidating agency reports',
                'column8' => 'BNS Reports
                                Consolidated BNS
                                Reports
                                Agency reports
                                Consolidated agency
                                reports', 
                'rating' => 'ratingD',
                'remarks' => 'remarksD',
                'belongTo'  => 5,
            ],
            [
                'survey_id' => 7,  // Reference to survey ID
                'column1' => 'E',
                'column2' => 'Selection and Recruitment of BNS',
                'column3' => 'CMNPC maintains the masterlist of BNS by barangay',
                'column4' => 'CMNPC maintains masterlist of BNS by barangay and advocates for appointment of at least one BNS per barangay',
                'column5' => 'CMNPC conducts activities in Level 2 and monitors appointment of at least one BNS per barangay',
                'column6' => 'CMNPC conducts activities in Level 3 and monitors appointment of BNS based on requirements in PD 1569 or higher as set by the LGU or barangay',
                'column7' => 'CMNPC conducts activities in Level 4 and monitors the honorarium/ incentives/ support received by the BNS from the barangay',
                'column8' => 'Minutes of meeting
                                Monitroing report
                                BNS database', 
                'rating' => 'ratingE',
                'remarks' => 'remarksE',
                'belongTo'  => 5,
            ],
           

            

        ]);

 
    }
}

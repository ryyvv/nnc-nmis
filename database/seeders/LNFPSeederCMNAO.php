<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Model\User;

class LNFPSeederCMNAO extends Seeder
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
                'column2' => 'Coordination',
                'column3' => 'CMNAO ensures conduct
                of annual LNC meetings',
                'column4' => 'CMNAO ensures conduct of LNC meetings biannually and other fora for consultation and dialogue',
                'column5' => 'CMNAO ensures conduct of LNC
                meetings quarterly and facilitates
                conduct of activities for
                government sectors and/or
                partners to support
                implementation of MNAP',
                'column6' => 'CMNAO conducts activities in
                Level 3 and coordinates with LGOO
                for the organization and
                reactivation of Barangay Nutrition
                Committee',
                'column7' => 'CMNAO conduct activities in Level 4 and coordinates with Barangay Nutrition Committees for implementation of PAPs in CMNAP with barangays as implementing unit
                Nutrition Committees',
                'column8' => 'Minutes of meetings
                Local Nutrition Action
                Plan
                Documentation
                Report
                Monitoring report
                Accomplishment Report', 
                'rating' => 'ratingA',
                'remarks' => 'remarksA',
                'belongTo'  => 2,
            ],
            [
                'survey_id' => 2,  // Reference to survey ID
                'column1' => 'B',
                'column2' => 'Orientation, Promotion
                and Advocacy',
                'column3' => 'CMNAO conducts orientation of members of the LNC on recent nutrition-related national laws and policies',
                'column4' => 'CMNAO conducts orientation of the LNC members on erecent nutrition-related national laws and policies including relevant updates and attended by lesss than 50% of LNC members',
                'column5' => 'CMNAO conducts orientation of the LNC members on recent nutrition-related national laws and policies including relevant updates and attended by 50% of
                LNC members',
                'column6' => 'CMNAO conducts orientation of the LNC members on recent nutrition-related national laws and policies including relevant updates and attended by more than 50% of LNC members',
                'column7' => 'CMNAO conducts orientation on recent nutrition-related national laws and policies including relevant updates to more than 50% of LNC members and other stakeholders',
                'column8' => 'Local Nutrition Action
                Plan
                Documentation report
                Attendance sheet', 
                'rating' => 'ratingB',
                'remarks' => 'remarksB',
                'belongTo'  => 2,
            ],
            [
                'survey_id' => 3,  // Reference to survey ID
                'column1' => 'C',
                'column2' => 'Planning',
                'column3' => 'CMNAO facilitates conduct of activities along the Philippine Plan of Action for
                Nutrition',
                'column4' => 'CMNAO initiated the
                formulation of the local
                nutrition action plan',
                'column5' => 'CMNAO facilitates the integration
                of the local nutrition action plan in
                the Annual Investment Program',
                'column6' => 'CMNAO facilitates the integration
                of the local nutrition action plan in
                the Annual Investment Program
                and translates
                nutrition-related policies and laws
                into local nutrition programs',
                'column7' => 'CMNAO facilitates the integration
                of the local nutrition action plan in
                the Annual Investment Program
                and Comprehensive Development
                Plan and translates
                nutrition-related policies and laws
                into local nutrition programs',
                'column8' => 'Local Nutrition Action
                Plan
                Annual Investment
                Program
                Comprehensive
                Development Plan', 
                'rating' => 'ratingC',
                'remarks' => 'remarksC',
                'belongTo'  => 2,
            ],
            [
                'survey_id' => 4,  // Reference to survey ID
                'column1' => 'D',
                'column2' => 'Implementation',
                'column3' => 'CMNAO facilitates
                implementation of
                nutrition-related activities',
                'column4' => 'CMNAO coordinates
                implementation of less
                than 80% of the activities
                in the local nutrition
                action plan',
                'column5' => 'CMNAO coordinates implementation of 80% of the activities in the local nutrition action plan',
                'column6' => 'CMNAO coordinates
                implementation more than 80% of
                the activities in the local nutrition
                action plan',
                'column7' => 'CMNAO coordinates
                implementation of 100% of the
                activities in the local nutrition
                action plan', 
                'column8' => 'Local Nutrition Action
                Plan
                Monitoring reports
                from agencies
                Minutes of meeting
                PPAN Accomplishment Report',
                'rating' => 'ratingD',
                'remarks' => 'remarksD',
                'belongTo'  => 2,
            ],
            [
                'survey_id' => 5,  // Reference to survey ID
                'column1' => 'E',
                'column2' => 'Monitoring and
                Evaluation',
                'column3' => 'CMNAO monitors local
                nutrition programs and the
                delivery of services at the
                barangay level',
                'column4' => 'CMNAO monitors local
                nutrition programs, the
                BNS program and the
                delivery of services at
                the barangay level',
                'column5' => 'CMNAO monitors local nutrition programs and the BNS program and conducts interagency monitoring visits to barangays to assess/ evaluate progress of program implementation',
                'column6' => 'CMNAO conducts the activities in Level 3 and conducts Program Implementation Review at the LGU level',
                'column7' => 'CMNAO conducts the activities in
                Level 3, Program Implementation
                Review at the LGU level and BNS
                evaluation',
                'column8' => 'Local Nutrition Action
                Plan
                Accomplishment
                Report
                LNC Functionality
                Monitoring Report
                PIR Documentation
                Report
                BNS Evaluation', 
                'rating' => 'ratingE',
                'remarks' => 'remarksE',
                'belongTo'  => 2,
            ],
            [
                'survey_id' => 6,  // Reference to survey ID
                'column1' => '',
                'column2' => '',
                'column3' => 'No improvement was observed in any of the indicators of malnutrition from the previous year',
                'column4' => 'One of the indicators of malnutrition improved (wasting/ stunting/ overweight and obesity) from the previous year',
                'column5' => 'Two of the indicators of malnutrition improved (wasting/ stunting/ overweight and obesity) from the previous year',
                'column6' => 'Three of the indicators of malnutrition improved (wasting/ stunting/ overweight and obesity) from the previous year',
                'column7' => 'Three of the indicators of malnutrition improved (wasting/ stunting/ overweight and obesity) and the OPT Plus coverage improved from the previous year or is within the 80-110% coverage ', 
                'column8' => 'OPT Plus Report', 
                'rating' => 'ratingEE',
                'remarks' => 'remarksEE',
                'belongTo'  => 2,
            ],
            [
                'survey_id' => 7,  // Reference to survey ID
                'column1' => 'F',
                'column2' => 'Resource
                Generation',
                'column3' => 'CMNAO assists the LNC in the conduct of one meeting with stakeholders to generate support for the nutrition program',
                'column4' => 'CMNAO assists the LNC in the conduct of more than one meeting with stakeholders to generate support for the nutrition program ',
                'column5' => 'CMNAO assists the LNC in the conduct of more than one meeting with stakeholders and generated support for nutrition from one of the stakeholders',
                'column6' => 'CMNAO assists the LNC in the
                conduct of more than one meeting
                with stakeholders and generated
                support for nutrition from more
                than one of at least one of the
                stakeholders',
                'column7' => 'CMNAO assists the LNC in the
                conduct of more than one meeting
                with stakeholders and coordinated
                the implementation of at least one
                activity supported by a stakeholder',
                'column8' => 'Local Nutrition Action
                Plan
                Minutes of Meeting
                Accomplishment
                report
                Documentation report', 
                'rating' => 'ratingF',
                'remarks' => 'remarksF',
                'belongTo'  => 2,
            ],
            [
                'survey_id' => 7,  // Reference to survey ID
                'column1' => 'G',
                'column2' => 'BNS and LNC members',
                'column3' => 'CMNAO ensures inclusion
                of capacity development
                activities for the BNS in the
                local nutrition action plan',
                'column4' => 'CMNAO ensures
                inclusion of capacity
                development activities
                for the BNS, staff in the
                nutrition office and LNC
                members in the local
                nutrition action plan',
                'column5' => 'CMNAO facilitates
                implementation of capacity
                development activities for the BNS',
                'column6' => 'CMNAO facilitates
                implementation of capacity
                development activities for the BNS
                and staff in the nutrition office',
                'column7' => 'CMNAO facilitates
                implementation of capacity
                development activities for the BNS,
                staff in the nutrition office and
                members of the LNC',
                'column8' => 'Local Nutrition Action
                Plan
                Accomplishment
                report
                Documentation report
                Training certificates', 
                'rating' => 'ratingG',
                'remarks' => 'remarksG',
                'belongTo'  => 2,
            ],
            [
                'survey_id' => 7,  // Reference to survey ID
                'column1' => '',
                'column2' => 'Technical Assistance',
                'column3' => 'CMNAO facilitates
                provision of technical
                assistance to BNSs',
                'column4' => 'CMNAO facilitates
                provision of technical
                assistance to BNSs and
                BNCs',
                'column5' => 'CMNAO facilitates provision of
                technical assistance to BNSs and
                BNCs, and to some members of
                the LNC on integrating nutrition in
                their plans and activities',
                'column6' => 'MNAO facilitates provisions technical assistance to BNSs and BNCs, and to some members of the LNC and to one stakeholder on integrating nutrition in their plans and activities',
                'column7' => 'MNAO facilitates provision of technical assistance to BNSs and BNCs, and to some members of the LNC and to more than one stakeholders in integrating nutrition to their plans and activities',
                'column8' => '', 
                'rating' => 'ratingGG',
                'remarks' => 'remarksGG',
                'belongTo'  => 2,
            ],
            [
                'survey_id' => 7,  // Reference to survey ID
                'column1' => 'H',
                'column2' => 'Documentation
                and record-keeping',
                'column3' => 'CMNAO maintains the
                highlight of LNC meetings',
                'column4' => 'CMNAO maintains
                highlights of LNC
                meetings and maintains
                consolidated OPT',
                'column5' => 'CMNAO maintains highlights of
                LNC meetings and ensures
                accurate reporting and
                documentation of service delivery
                and record keeping of the
                following:
                1. Consolidated OPT Plus reports
                2. BNS reports
                3. Local Nutrition Action Plan
                4. Accomplishment Report
                5. Documentation reports',
                'column6' => 'CMNAO maintains highlights of
                LNC meetings, ensures accurate
                reporting and documentation of
                service delivery and record keeping
                of the documents in Level 3 and
                ensures access to reports from
                LNC members (e.g. data from
                DepED Division, FHSIS, etc.)',
                'column7' => 'CMNAO maintains highlights of
                LNC meetings, ensures accurate
                reporting and documentation of
                service delivery and record keeping
                of the documents in Level 4,
                ensures access to reports from
                LNC members and maintains the
                database of BNS',
                'column8' => 'Minutes of meeting
                Consolidated OPT
                Plus reports
                BNS reports
                Local Nutrition Action
                Plan
                Accomplishment
                Documentation reports
                Agency reports
                BNS database', 
                'rating' => 'ratingH',
                'remarks' => 'remarksH',
                'belongTo'  => 2,
            ],
            [
                'survey_id' => 7,  // Reference to survey ID
                'column1' => 'I',
                'column2' => 'Selection and Recruitment
                of BNS',
                'column3' =>'CMNAO maintains the list
                of barangays with existing
                BNS',
                'column4' => 'CMNAO maintains the
                list of barangays with
                existing BNSs and
                advocates appointment
                of at least one BNS to 
                barangays without BNS',
                'column5' => 'CMNAO conducts activities in Level 2 and monitors appointment of at least one BNS per barangay',
                'column6' => 'CMNAO conducts activities in Level 3 and monitors appointment of BNS based on requirements in PD 1569 or higher as set by the LGU or barangay',
                'column7' => 'CMNAO conducts activities in Level 4 and monitors the honorarium/ incentives/ support received by the BNS from the barangay',
                'column8' => 'Minutes of meeting
                Monitroing report
                BNS database', 
                'rating' => 'ratingI',
                'remarks' => 'remarksI',
                'belongTo'  => 2,
            ],

            

        ]);

 
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Model\User;

class LNFPSeederROBNS extends Seeder
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
                'column3' => 'BNS coordinates with the BNC for the BNC meetings conducted twice a year',
                'column4' => 'BNS coordinates the BNC meetings conducted three times a year and provides printed/ electronic official communication and agenda for the meeting',
                'column5' => 'BNS coordinates the BNC meetings conducted quarterly and maintains the minutes of meetings  ',
                'column6' => 'BNS performs the functions in Level 3 and circulates the printed/electronic copy of the minutes of meeting to the BNC members for approval',
                'column7' => 'BNS performs the functions in Level 4 with a minutes of meeting approved by all BNC members present',
                'column8' => 'Letter to BNC
                                Members
                                BNC Meeting Agenda
                                Minutes of the
                                meeting
                                Attendance
                                BNS Action Plan
                                BNS Accomplishment', 
                'rating' => 'ratingA',
                'remarks' => 'remarksA',
                'belongTo'  => 4,
            ],
            [
                'survey_id' => 1,  // Reference to survey ID
                'column1' => '',
                'column2' => '',
                'column3' => 'BNS coordinates implementation of one nutrition PAP in the BNAP',
                'column4' => 'BNS coordinates
                                implementation of
                                more than one
                                nutrition PAP in the
                                BNAP',
                'column5' => 'BNS coordinates
                                implementation of 80% of the PAPs
                                in the BNAP',
                'column6' => 'BNS coordinates
                                implementation of
                                more than 80% of
                                the PAPs in the BNAP',
                'column7' => 'BNS coordinates implementation of 100% of the PAPs in the BNAP',
                'column8' => 'Barangay Nutrition
                                Action Plan
                                Minutes of meeting
                                Accomplishment
                                report
                                Documentation
                                report
                                BNS Action Plan
                                BNS Accomplishment', 
                'rating' => 'ratingAA',
                'remarks' => 'remarksAA',
                'belongTo'  => 4,
            ],
            [
                'survey_id' => 1,  // Reference to survey ID
                'column1' => 'B',
                'column2' => 'Advocacy and Promotion',
                'column3' => 'BNS informs the BNC
                                members of the
                                objectives, activities,
                                schedule and other
                                relevant information
                                on Operation
                                Timbang Plus',
                'column4' => 'BNS provides BNC members information on the results of Operation Timbang Plus including the specific households with manourished children and proposed interventions for the BNC during BNC meetings',
                'column5' => 'BNS provides BNC members information on OPT Plus results and proposed interventions in Level 2 upon submission of the OPT Plus results and during BNC meetings',
                'column6' => 'BNS performs the functions in Level 3 and provides information on the PPAN prioirities for use in the formulation of the BNAP',
                'column7' => 'BNS performs the functions in Level  4 and provides updates on the PPAN and other city/municipal nutrition PPAs for implementation and cooperation with the BNCs',
                'column8' => 'Minutes of meeting
                                Documentation
                                report
                                BNS diary
                                BNS Action Plan
                                BNS Accomplishment', 
                'rating' => 'ratingB',
                'remarks' => 'remarksB',
                'belongTo'  => 4,
            ],
            [
                'survey_id' => 1,  // Reference to survey ID
                'column1' => 'C',
                'column2' => 'Planning',
                'column3' => 'BNS formulates BNSAP',
                'column4' => 'BNSAP was reviewed by his/her Supervisor (Midwife, Nutrition Program Coordinator or the Nutrition Action Officer)',
                'column5' => 'In addition to Level 2, the BNSAP was signed and approved by the BNC Chairperson',
                'column6' => 'In addition to level 3, BNSAP submitted before the implementation year ',
                'column7' => 'In addition to level 4, the BNSAP was reviewed for adjustments/ changes in targets, if any.',
                'column8' => 'Barangay Nurtition
                                Action Plan
                                Resolution
                                BNS Action Plan
                                BNS Accomplishment',
                'rating' => 'ratingC',
                'remarks' => 'remarksC',
                'belongTo'  => 4,
            ],
            [
                'survey_id' => 1,  // Reference to survey ID
                'column1' => '',
                'column2' => '',
                'column3' => 'BNS assist the BNC Chair for the organization or reorganization, or reactivation of the Barangay Nutrition Committee',
                'column4' => 'BNS assist in the formulation of the BNAP based on relevant evidence',
                'column5' => 'BNS assists in mobilizing at least 50% of the BNC members to formulate and adopt the Barangay Nutrition Action Plan and BNAP through an Exective Order or Resolution',
                'column6' => 'BNS assists in mobilizing more than 50% of the BNC members to formulate, adopt and implement the BNAP',
                'column7' => 'BNS assists in mobilizing all BNC members to formulate, adopt, and monitor and evaluate the BNAP',
                'column8' => 'Barangay Nurtition
                                Action Plan
                                Resolution
                                BNS Action Plan
                                BNS Accomplishment
                                Resolution or EO
                                Monitoring and Evaluation Report', 
                'rating' => 'ratingCC',
                'remarks' => 'remarksCC',
                'belongTo'  => 4,
            ],
            [
                'survey_id' => 1,  // Reference to survey ID
                'column1' => 'D',
                'column2' => 'Implementation',
                'column3' => 'Conducts Operation
                                Timbang Plus among
                                children 0-59 months
                                together with the OPT Plus Team
                                Barangay Health
                                Worker under
                                supervision of the
                                midwife or the designated BNS Supervisor',
                'column4' => 'Conducts OPT Plus among children 0-59 months with less than 80% or more than 110% coverage and provides counseling to parents and caregivers to promote positive nutrition behavior ',
                'column5' => 'Conducts OPT Plus among children 0-59 months with 80%-110% coverage, provides counseling to parents and caregivers and refers malnourished children for appropriate nutrition interventions',
                'column6' => 'Performs activities in
                                Level 3 and conducts
                                or assists in nutrition
                                and health education
                                to mothers especially
                                the pregnant and
                                lactating women',
                'column7' => 'Performs activities in
                                Level 4 and assists in
                                the delivery of
                                nutrition-specific/sensitive and enbaling programs and 
                                services',
                'column8' => 'BNS Action Plan
                                BNS Accomplishment
                                BNS diary
                                Records of referral
                                and follow through
                                Documentation
                                report
                                DOH Projected Population based on PSA or CBMIS based population', 
                'rating' => 'ratingD',
                'remarks' => 'remarksD',
                'belongTo'  => 4,
            ],
            [
                'survey_id' => 1,  // Reference to survey ID
                'column1' => 'E',
                'column2' => 'Monitoring and Evaluation',
                'column3' => 'Monitors the
                            nutritional status of
                            children 0-59 months
                            in areas covered by
                            the BNS through
                            conduct of Operation
                            Timbang Plus and
                            follow-up weighing',
                'column4' => 'Monitors the
                            nutritional status of
                            children 0-59 months
                            and conducts
                            follow-up visits to
                            parents/ caregivers
                            of malnourished
                            children in areas
                            covered by the BNS
                            to improve program
                            participation',
                'column5' => 'Monitors the
                            nutritional status of
                            children, conducts
                            follow-up visits to
                            parents/ caregivers
                            and monitors the
                            implementation of
                            PAPs in the Barangay
                            Nutrition Action Plan
                            in the areas assigned
                            to the BNS',
                'column6' => 'Performs the
                            functions in Level 3
                            and monitors
                            implementation of
                            nutrition-related
                            laws and policies
                            such as ASIN Law,
                            Mandatory Food
                            Fortification Law,
                            Milk Code, etc.',
                'column7' => 'Performs the
                            functions in Level 4
                            and provides results
                            of monitoring and
                            feedback to the
                            Barangay Nutrition
                            Committee,
                            City/Municipal
                            Nutrition Program
                            Coordinators and/or
                            Nutrition Action
                            Officers',
                'column8' => 'Operation Timbang
                                Plus reports
                                BNS Action Plan
                                BNS Accomplishment
                                BNS diary
                                Records of follow-up
                                visits
                                Records of
                                monitoring policies
                                Monitoring report
                                BNAP Quarterly Report', 
                'rating' => 'ratingE',
                'remarks' => 'remarksE',
                'belongTo'  => 4,
            ],
            [
                'survey_id' => 1,  // Reference to survey ID
                'column1' => '',
                'column2' => '',
                'column3' => 'No improvement was observed in at least one of the indicators of malnutrition from the previous year',
                'column4' => 'One indicator of malnutrition improved (wasting/ stunting/ overweight and obesity) from the previous year',
                'column5' => 'Two indicators of malnutrition improved (wasting/ stunting/ overweight and obesity) from the previous year',
                'column6' => 'Three indicators of malnutrition improved (wasting/ stunting/ overweight and obesity) from the previous year',
                'column7' => 'Three of the indicators of malnutrition improved (wasting/ stunting/ overweight and obesity) and the OPT Plus coverage improved from the previous year or is within 80-110%',
                'column8' => 'OPT Plus Report', 
                'rating' => 'ratingEE',
                'remarks' => 'remarksEE',
                'belongTo'  => 4,
            ],
            [
                'survey_id' => 1,  // Reference to survey ID
                'column1' => 'F',
                'column2' => 'Resource Generation',
                'column3' => 'BNS identifies
                                possible resources
                                for nutrition PAPs',
                'column4' => 'BNS conducts
                                resource generation
                                activities for nutrition
                                PAPs',
                'column5' => 'BNS together with
                                BNC mobilizes LGU
                                resources for
                                nutrition PAPs',
                'column6' => 'BNS together with
                                BNC mobilizes LGU
                                resources and
                                conducts resource
                                generation activties
                                for nutrition PAPs',
                'column7' => 'BNS together with BNC mobilizes LGU resources and conducts resource generation activities for nutrition PAPs with partners',
                'column8' => 'BNS Action Plan, Accomplishment Report
                                Barangay Nutrition
                                Action Plan
                                Approved Annual
                                Budget
                                Resolution
                                Minutes of meeting
                                Record of resources
                                generated
                                Documentation
                                report', 
                'rating' => 'ratingF',
                'remarks' => 'remarksF',
                'belongTo'  => 4,
            ],
            [
                'survey_id' => 1,  // Reference to survey ID
                'column1' => 'G',
                'column2' => 'Documentation and record-keeping',
                'column3' => 'BNS  maintains the
                                list of agreements
                                during BNC meetings
                                and masterlist of
                                beneficiaries of
                                nutrition PAPs',
                'column4' => 'BNS maintains a
                                printed and/or
                                electronic copy of the
                                BNC minutes of
                                meetings and
                                masterlist of
                                beneficiaries of
                                nutrition PAPs
                                readily accessible to
                                the BNC',
                'column5' => 'BNS maintains the
                                documents in Level 2
                                and printed and/or
                                electronic copies of
                                the following:
                                1. OPT Plus reports
                                2. Family Profiles
                                3. Nutrition Situation
                                4. Masterlits of
                                beneficiaries
                                5. Barangay
                                Nutrition Action Plan
                                6. Accomplishment
                                Report
                                7. Documentation
                                reports
                                (Should be readily
                                accessible to BNC
                                members)',
                'column6' => 'BNS maintains the
                                documents in Level 3
                                and the following
                                BNS reports:
                                1. BNS Action Plan
                                2. BNS Accomplishment Report
                                3. BNS Diary',
                'column7' => 'BNS maintains
                                documents in Level 4
                                and organized by
                                year, purok/ sitio or
                                as applicable and the following
                                BNS reports:
                                1. BNS Monthly and Semestral/Annual
                                Accomplishment Report',
                'column8' => 'e-OPT Plus reports
                            Family Profiles
                            Nutrition situation
                            Masterlist of
                            beneficiaries
                            Barangay Nutrition
                            Action Plan
                            Accomplishment
                            Documentation
                            report
                            BNS Action Plan
                            BNS Monthly
                            Accomplishment Report
                            BNS Semestral
                            Accomplishment Report
                            BNS Diary
                            Minutes of Meetings
                            ', 
                'rating' => 'ratingG',
                'remarks' => 'remarksG',
                'belongTo'  => 4,
            ],
            
           

            

        ]);

 
    }
}

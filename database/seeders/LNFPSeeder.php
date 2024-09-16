<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Model\User;

class LNFPSeeder extends Seeder
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
                'column3' => 'Provincial Nutrition Action
                Officer ensures conduct of
                annual LNC meetings',
                'column4' => 'PNAO ensures conduct
                of at LNC meetings
                biannually and other fora
                for consultation and
                dialogue',
                'column5' => 'PNAO ensures conduct of LNC
                meetings quarterly and facilitates
                conduct of activities for
                government sectors and/or
                partners to support
                implementation of PNAP',
                'column6' => 'PNAO conducts activities in Level
                3 and coordinates with LGOO for
                the organization and reactivation
                of Local Nutrition Committee
                through conduct of activities',
                'column7' => 'PNAO coordinates with Local
                Nutrition Committees for joint
                activities',
                'column8' => 'Minutes of meetings
                Local Nutrition Action
                Plan
                Documentation
                Report
                Monitoring report', 
                'rating' => 'ratingA',
                'remarks' => 'remarksA',
            ],

            [
                'survey_id' => 2,  // Reference to survey ID
                'column1' => 'B', 
                'column2' => 'Orientation, Promotion and Advocacy',
                'column3' => 'PNAO conducts orientation of members of the Provincial Nutrition Committee on nutrition-related national laws and policies',
                'column4' => 'PNAO conducts orientation of the PNC members on nutrition-related national laws and policies and/or relevant updates by less than 50% of the PNC members',
                'column5' => 'PNAO conducts orientation of the PNC members on nutrition-related national laws and policies and/or relevant updates and attended by 50% of PNC members',
                'column6' => 'PNAO conducts orientation of the LNC members on nutrition-related national laws and policies and/or relevant updates and attended by more than 50% of PNC members',
                'column7' => 'PNAO conducts orientation on nutrition-related national laws and policies and/or relevant updates to more than 50% of PNC members and other stakeholders',
                'column8' => 'Local Nutrition Action Plan Documentation report Attendance sheet',
                'rating' => 'ratingB',
                'remarks' => 'remarksB',
            ],

            [
                'survey_id' => 3,  // Reference to survey ID
                'column1' => '',
                'column2' => 'Orientation, Promotion  and Advocacy',
                'column3' => 'PNAO facilitates conduct of orientation workshops on nutrition-related laws and policies for component cities/ municipalities',
                'column4' => 'PNAO facilitates conduct of orientation workshops on nutrition-related laws and policies and/or relevant updates for component cities and municipalities with representation from lesss than 80% of the target component cities and municipalities',
                'column5' => 'PNAO facilitates conduct of orientation workshops on nutrition-related laws and policies and/or relevant updates for component cities and municipalities with representation from 80% of the target component cities and/or municipalities',
                'column6' => 'PNAO facilitates conduct of orientation workshops on nutrition-related laws and policies and/or relevant updates for component cities and municipalities with representation from more than 80% of the target component cities and/or municipalities',
                'column7' => 'PNAO facilitates conduct of orientation workshops on nutrition-related laws and policies and/or relevant updates for component cities and municipalities with representation from more than 50% of the target component cities and/or municipalities and from Barangay Nutrition Committees',
                'column8' => 'Local Nutrition Action Plan Documentation report Attendance sheet',
                'rating' => 'ratingBB',
                'remarks' => 'remarksBB',
            ],

            [
                'survey_id' => 4,  // Reference to survey ID
                'column1' => 'C',
                'column2' => 'Planning',
                'column3' => 'PNAO facilitates conduct of
                activities along the
                Philippine Plan of Action
                for Nutrition',
                'column4' => 'PNAO initiated the
                formulation of the local
                nutrition action plan',
                'column5' => 'PNAO facilitates the integration of the local nutrition action plan in the Annual Investment Program  ',
                'column6' => 'PNAO facilitates the integration of
                the local nutrition action plan in
                the Annual Investment Program
                and Comprehensive Development
                Plan',
                'column7' =>'PNAO facilitates the integration of
                the local nutrition action plan in
                the Annual Investment Program
                and Comprehensive Development
                Plan and translates
                nutrition-related policies and laws
                into local nutrition programs',
                'column8' => 'Local Nutrition Action
                Plan Annual Investment
                Program Comprehensive
                Development Plan',
                'rating' => 'ratingC',
                'remarks' => 'remarksC',
            ],

            [
                'survey_id' => 5,  // Reference to survey ID
                'column1' => 'D',
                'column2' => 'Implementation',
                'column3' => 'PNAO facilitates
                implementation of
                nutrition-related activities',
                'column4' => 'PNAO coordinates implementation of less than 80% of the activities in the local nutrition action plan',
                'column5' => 'PNAO coordinates implementation of 80% of the activities in the local nutrition action plan',
                'column6' => 'PNAO coordinates
                implementation more than 80% of
                the activities in the local nutrition
                action plan',
                'column7' => 'PNAO initiated strategies to
                improve implementation and/or
                outcomes of nutrition PAPs',
                'column8' => 'Local Nutrition Action Plan Monitoring reports from agencies
                Minutes of meeting',
                'rating' => 'ratingD',
                'remarks' => 'remarksD',
            ],

            [
                'survey_id' => 6,  // Reference to survey ID
                'column1' => 'E',
                'column2' => 'Monitoring and Evaluation',
                'column3' => 'PNAO facilitates
                monitoring of the
                Provincial Nutrition Action
                Plan',
                'column4' => ' PNAO facilitates monitoring
                of the Provincial Nutrition
                Action Plan and local
                nutrition Workers',
                'column5' => 'PNAO facilitates local nutrition
                programs and local nutrition
                workers through conduct of
                monitoring and evaluation visits
                of the Provincial Nutrition
                Evaluation Team to
                municipalities/ component
                cities at least once a year',
                'column6' => 'PNAO facilitates the activities
                in Level 3 and the conduct of
                Program Implementation Review
                of the Provincial Nutrition Action
                Plan',
                'column7' => 'PNAO facilitates the activities in
                Level 3, Program Implementation
                Review of the Provincial Nutrition
                Action Plan and culmination activity
                of the monitoring and evaluation of
                the LGU and the Local Nutrition
                Workers',
                'column8' => 'Local Nutrition Action
                Plan
                Accomplishment
                Report
                LNC Functionality
                Monitoring Report
                PIR Documentation
                Report
                MELLPI Pro reports',
                'rating' => 'ratingE',
                'remarks' => 'remarksE',
            ],

            [
                'survey_id' => 7,  // Reference to survey ID 
                'column1' => 'F',
                'column2' => 'Resource
                Generation',
                'column3' => 'PNAO assists the LNC in the conduct of one meeting with stakeholders to generate support for the nutrition program',
                'column4' => 'PNAO assists the LNC in the conduct of more than one meeting with stakeholders to generate support for the nutrition program',
                'column5' => 'PNAO assists the LNC in the conduct of more than one meeting with stakeholders and generated support for nutrition from one of the stakeholders',
                'column6' => 'PNAO assists the LNC in the conduct of more than one meeting with stakeholders and generated support for nutrition from more than one of the stakeholders',
                'column7' => 'PNAO assists the LNC in the conduct of more than one meeting with stakeholders and coordinated the implementation of at least one activity supported by a stakeholder',
                'column8' => 'Local Nutrition Action
                Plan
                Minutes of Meeting
                Accomplishment
                report
                Documentation report',
                'rating' => 'ratingF',
                'remarks' => 'remarksF',
            ],

            [
                'survey_id' => 8,  // Reference to survey ID
                'column1' => 'G',
                'column2' => 'Capacity development',
                'column3' => 'PNAO maintains the
                highlight of LNC meetings',
                'column4' => 'PNAO maintains highlights
                of LNC, NAOs and DNPC
                meetings and',
                'column5' => 'PNAO maintains highlights of
                meetings and ensures
                accurate reporting and
                documentation of service
                delivery and record keeping of
                the following:
                1. Consolidated OPT Plus reports
                2. Provincial Nutrition Action
                Plan
                3. Accomplishment Reports
                4. Documentation reports',
                'column6' => 'PNAO maintains highlights of
                meetings, ensures accurate
                reporting and documentation of
                service delivery and record
                keeping of the documents in Level
                3 and ensures access to reports
                from LNC members (e.g. data from
                DepED Division, FHSIS, etc.)',
                'column7' => 'PNAO maintains highlights of
                meetings, ensures accurate
                reporting and documentation of
                service delivery and record keeping
                of the documents in Level 4,
                ensures access to reports from LNC
                members and maintains the
                local nutrition workers database
                (NAOs, DNPCs, BNS)',
                'column8' => 'Minutes of meeting
                Consolidated OPT
                Plus reports
                BNS reports
                Local Nutrition Action
                Plan
                Accomplishment
                Documentation reports
                Agency reports
                Database',
                'rating' => 'ratingG',
                'remarks' => 'remarksG',
            ],

            [
                'survey_id' => 9,  // Reference to survey ID
                'column1' => ' ',
                'column2' => 'Technical Assistance',
                'column3' => 'PNAO facilitates provision
                of technical assistance to
                City/ Municipal Nutrition
                Committees',
                'column4' => 'PNAO facilitates provision of technical assistance to City/Municipal Nutrition Committees and Barangay Nutrition Committees as requested',
                'column5' => 'PNAO facilitates provision of
                technical assistance to C/MNCs
                and BNCs and to some members
                of the LNC on integrating
                nutrition in their plans and
                activities',
                'column6' => 'PNAO facilitates provisions technical assistance to C/MNCs of the LNC and to one stakeholder on integrating nutrition in their plans and activities',
                'column7' => 'PNAO facilitates provision of
                technical assistance to C/MNCs and
                BNCs, and to some members of the
                LNC and more than one
                stakeholders on integrating
                nutrition in their plans and
                activities',
                'column8' => 'Minutes of meeting
                Consolidated OPT
                Plus reports
                BNS reports
                Local Nutrition Action
                Plan
                Accomplishment
                Documentation reports
                Agency reports
                Database',
                'rating' => 'ratingGG',
                'remarks' => 'remarksGG',
            ],

            [
                'survey_id' => 10,  // Reference to survey ID
                'column1' => 'H',
                'column2' => 'Documentation and record-keeping',
                'column3' => 'PNAO ensures inclusion
                of capacity development
                activities for the BNS in the
                local nutrition action plan',
                'column4' => 'PNAO ensures inclusion of
                capacity development
                activities for BNS, Nutrition
                Action Officers and District
                Nutrition Program
                Coordinators in the local
                nutrition action plan',
                'column5' => 'PNAO facilitates
                implementation of capacity
                development activities for the
                BNS',
                'column6' => 'PNAO facilitates implementation
                of capacity development activities
                for the BNS and Nutrition Action
                Officers',
                'column7' => 'PNAO facilitates implementation of
                capacity development activities for
                BNS, Nutrition Action Officers and
                District Nutrition Program
                Coordinators',
                'column8' => 'Local Nutrition Action
                Plan
                Accomplishment
                report
                Documentation report
                Training certificates',
                'rating' => 'ratingH',
                'remarks' => 'remarksH',
                'rating' => 'ratingH',
                'remarks' => 'remarksH',
            ],

        ]);

 
    }
}

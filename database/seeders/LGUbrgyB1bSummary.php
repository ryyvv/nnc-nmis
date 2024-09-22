<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LGUbrgyB1bSummary extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lguB1bSummaryform')->insert([
            [ 
                'fid' => '1',
                'cat' => '1',
                'element' => '1a. Presence and knowledge of vision-mission statement',
            ],
            [ 
                'fid' => '2',
                'cat' => '1',
                'element' => '1b. Presence of nutrition-related concerns in the barangay development plan of mission statement.',
            ],
            [ 
                'fid' => '3',
                'cat' => '1',
                'element' => '1c. Presence of nutrition-related concerns in the Annual',
            ],
            [ 
                'fid' => '4',
                'cat' => '2',
                'element' => '2a. Adoption, implementation and monitoring of local nutrition plan.',
            ],
            [ 
                'fid' => '5',
                'cat' => '2',
                'element' => '2b. RA 11148 Kalusugan at Nutrisyon ng Mag-Nanay Act of 2018.',
            ],
            [ 
                'fid' => '6',
                'cat' => '2',
                'element' => '2c. RA 11037 Masustansyang Pagkain para sa Batang Pilipino.',
            ],
            [ 
                'fid' => '7',
                'cat' => '2',
                'element' => '2d. EO 51 National Code of Marketing of Breastfeeding Substitutes, Breastmilk Supplements and related products.',
            ],
            [ 
                'fid' => '8',
                'cat' => '2',
                'element' => '2e. RA 10028 Expanded Breastfeeding Promotion Act ',
            ],
            [ 
                'fid' => '9',
                'cat' => '2',
                'element' => '2f. RA 8172 An Act for Salt Iodization Nationwfide.',
            ],
            [ 
                'fid' => '10',
                'cat' => '2',
                'element' => '2g. RA 8976 Philippine Food Fortification Act.',
            ],
            [ 
                'fid' => '11',
                'cat' => '2',
                'element' => '2h. NNC GB Resolution No. 1 S. 2017 Approving and Adopting the Philippine Plan of Action 2017-2022.',
            ],
            [ 
                'fid' => '12',
                'cat' => '2',
                'element' => '2i. NNC GB Resolutions Nos.  1) 3 S.2012: Approving the Gufidelines on the Fabrication, Verification, and Maintenance of Wooden Height Boards',
            ],
                [ 
                'fid' => '13',
                'cat' => '2',
                'element' => '2i. NNC GB Resolutions Nos.  2) 3 S.2018: Approving the Gufidelines on the Selection of Non-Wood Height and Length Measuring Tool',
            ],
            [ 
                'fid' => '14',
                'cat' => '2',
                'element' => '2j. NNC GB Resolution No. 2 S. 2012 Approving the Revised Implementing Gufidelines on OPT Plus',
            ],
            [ 
                'fid' => '15',
                'cat' => '2',
                'element' => '2k. NNC Governing Board Resolution No.6 series of 2012: Adoption of the 2012 Nutritional Gufidelines for Filipinos',
            ],
            [ 
                'fid' => '16',
                'cat' => '2',
                'element' => '2l. NNC Governing Board Resolution No. 2 series of 2009: Adopting the National Policy on Nutrition Management in Emergencies and Disasters',
            ],
            [ 
                'fid' => '17',
                'cat' => '3',
                'element' => '3a. Presence of Barangay Nutrition Committee',
            ],
            [ 
                'fid' => '18',
                'cat' => '3',
                'element' => '3b. Presence of Nutrition Office and Personnel',
            ],
            [ 
                'fid' => '19',
                'cat' => '3',
                'element' => '3c. Decision-making and leadership of the Barangay Nutrition Committee',
            ],
            [ 
                'fid' => '20',
                'cat' => '4',
                'element' => '4a. Nutrition Assessment',
            ],
            [ 
                'fid' => '21',
                'cat' => '4',
                'element' => '4b. Planning',
            ],
            [ 
                'fid' => '22',
                'cat' => '4',
                'element' => '4c. Resource Generation and Mobilization',
            ],
            [ 
                'fid' => '23',
                'cat' => '4',
                'element' => '4d. Service Delivery',
            ],
            [ 
                'fid' => '24',
                'cat' => '4',
                'element' => '4e. Monitoring and Evaluation',
            ],
            [ 
                'fid' => '25',
                'cat' => '4',
                'element' => '4f. Capacity Buildingsss',
            ],
            [ 
                'fid' => '26',
                'cat' => '5',
                'element' => '5a. Infant and Young Child Feeding',
            ],
            [ 
                'fid' => '27',
                'cat' => '5',
                'element' => '5b. Philippine Integrated Management of Acute Malnutrition',
            ],
            [ 
                'fid' => '28',
                'cat' => '5',
                'element' => '5c. National Dietary Supplementation Program',
            ], 
            [ 
                'fid' => '29',
                'cat' => '5',
                'element' => '5d. National Nutrition Promotion Program for Behavior Change',
            ], 
            [ 
                'fid' => '30',
                'cat' => '5',
                'element' => '5e. Micronutrient Supplementation',
            ], 
            [ 
                'fid' => '31',
                'cat' => '5',
                'element' => '5f. Mandatory Food Fortification',
            ], 
            [ 
                'fid' => '32',
                'cat' => '5',
                'element' => '5g. Nutrition in Emergencies Program',
            ], 
            [ 
                'fid' => '33',
                'cat' => '5',
                'element' => '5h. Overweight and Obesity Management and Prevention Program',
            ], 
            [ 
                'fid' => '34',
                'cat' => '5',
                'element' => '5i. Nutrition-Sensitive Programs',
            ], 
            
        ]);


    }
}

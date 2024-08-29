<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lnfp_formOverall extends Model
{
    use HasFactory;

    protected $fillable = [
        'lnfp_lgu_id',
        'form5_id', 
        'form8_id',
        'lnfp_officer',
        'name',
        'areaOfAssign',
        'date',
        'pointsP1AS',
        'pointsP2AS',
        'weightP1AS',
        'weightP2AS',
        'scoreP1AS',
        'scoreP2AS',
        'totalScoreAS',
        'nameTM1',
        'nameTM2',
        'nameTM3',
        'desigOffice1',
        'desigOffice2',
        'desigOffice3',
        'sigDate1_filePath',
        'sigDate2_filePath',
        'sigDate3_filePath',
        'receivedBy',
        'whatDate',
        'status',
        'header',
        'formInterview_id',
    ];

    protected $guarded = ['id'];

    protected $table = 'lnfp_overall_score_form';
}

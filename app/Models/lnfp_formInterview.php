<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lnfp_formInterview extends Model
{
    use HasFactory;

    protected $fillable = [
        'form5_id',
        'lnfp_lgu_id', 
        'lnfp_officer', 
        'nameOf',
        'areaAssign',
        'dateOfInterview',
        'question1',
        'question2',
        'question3',
        'question4',
        'q1AScore',
        'q2AScore',
        'q3AScore',
        'q4AScore',
        'q1Remarks',
        'q2Remarks',
        'q3Remarks',
        'q4Remarks',
        'subtotalAScore',
        'periodCovereda',
        'dateMonitoring',
        'status',
        'form8_id',
        'header',
        'user_id'
    ];

    protected $guarded = ['id'];

    protected $table = 'lnfp_interview_form';

    public static function updateStatus($lguId, $status = 1)
    {
    return self::where('lnfp_lgu_id', $lguId)->update(['status' => $status]);
    }
}

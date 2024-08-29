<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lnfp_form7 extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'form5_id',
        'lnfp_lgu_id',
        'accomplishmentA',
        'accomplishmentB',
        'accomplishmentC',
        'accomplishmentD',
        'accomplishmentE',
        'accomplishmentF',
        'accomplishmentG',
        'accomplishmentH',
        'accomplishmentI',
        'goodPracA',
        'goodPracB',
        'goodPracC',
        'goodPracD',
        'goodPracE',
        'goodPracF',
        'goodPracG',
        'goodPracH',
        'goodPracI',
        'issuesA',
        'issuesB',
        'issuesC',
        'issuesD',
        'issuesE',
        'issuesF',
        'issuesG',
        'issuesH',
        'issuesI',
        'actionsA',
        'actionsB',
        'actionsC',
        'actionsD',
        'actionsE',
        'actionsF',
        'actionsG',
        'actionsH',
        'actionsI',
        'lnfp_lgu_id',
        'status',
    ];

    protected $guarded = ['id'];

    protected $table = 'lnfp_form7';
}

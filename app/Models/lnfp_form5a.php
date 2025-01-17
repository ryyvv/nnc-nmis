<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lnfp_form5a extends Model
{
    use HasFactory;

    protected $fillable = [
    'YearPeriod',
    'namePNAO',
    'address',
    'provOfDeployment',
    'numOfYears_as',
    'position',
    'fulltime',
    'withContProfAct',
    'capDevAct',
    'trainingAttended',
    'birthday',
    'sex',
    'dateOfDesignation',
    'dateOfAppointment',
    'educationAttainment',
    'secondedFromTheOffice',
    'elementsA',
    'performanceA1',
    'performanceA2',
    'performanceA3',
    'performanceA4',
    'performanceA5',
    'documentSourceA',
    'elementsB',
    'performanceB1',
    'performanceB2',
    'performanceB3',
    'performanceB4',
    'performanceB5',
    'documentSourceB',
    'performanceBB1',
    'performanceBB2',
    'performanceBB3',
    'performanceBB4',
    'performanceBB5',
    'documentSourceBB',
    'elementsC',
    'performanceC1',
    'performanceC2',
    'performancec3',
    'performanceC4',
    'performanceC5',
    'documentSourceC',
    'elementsD',
    'performanceD1',
    'performanceD2',
    'performanceD3',
    'performanceD4',
    'performanceD5',
    'documentSourceD',
    'elementsE',
    'performanceE1',
    'performanceE2',
    'performanceE3',
    'performanceE4',
    'performanceE5',
    'documentSourceE',
    'elementsF',
    'performanceF1',
    'performanceF2',
    'performanceF3',
    'performanceF4',
    'performanceF5',
    'documentSourceF',
    'elementsG',
    'performanceG1',
    'performanceG2',
    'performanceG3',
    'performanceG4',
    'performanceG5',
    'documentSourceG',
    'elementsGG',
    'performanceGG1',
    'performanceGG2',
    'performanceGG3',
    'performanceGG4',
    'performanceGG5',
    'elementsH',
    'performanceH1',
    'performanceH2',
    'performanceH3',
    'performanceH4',
    'performanceH5',
    'documentSourceH',
];

    protected $guarded = ['id'];

    protected $table = 'lnfp_form5a';
}

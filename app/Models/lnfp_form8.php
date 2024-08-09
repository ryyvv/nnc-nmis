<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lnfp_form8 extends Model
{
    use HasFactory;

    protected $fillable = [
        'form5_id',
        'lnfp_lgu_id',
        'lnfp_officer',
        'forThePeriod',
        'nameOfPnao',
        'areaOfAssign',
        'dateMonitor',
        'recoPNAO_A',
        'recoPNAO_B',
        'recoPNAO_C',
        'recoPNAO_D',
        'recoPNAO_E',
        'recoPNAO_F',
        'recoPNAO_G',
        'recoPNAO_H',
        'recoLNC_A',
        'recoLNC_B',
        'recoLNC_C',
        'recoLNC_D',
        'recoLNC_E',
        'recoLNC_F',
        'recoLNC_G',
        'recoLNC_H',
        'nameTM1',
        'nameTM2',
        'nameTM3',
        'desigOffice1',
        'desigOffice2',
        'desigOffice3',
        'sigDate1',
        'sigDate2',
        'sigDate3',
        'receivedBy',
        'whatDate',
        'status',
    ];

    protected $guarded = ['id'];

    protected $table = 'lnfp_form8';
}

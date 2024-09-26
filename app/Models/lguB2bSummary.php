<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lguB2bSummary extends Model
{
    use HasFactory;

    protected $fillable = ['ch1', 
                           'ch2',
                           'ch3',
                           'ch4',
                           'ch5',
                           'ch6',
                           'ch7',
                           'ch8', 
                           'grandtotal',
                           'remarks',
                           'status',
                           'dateMonitoring',
                           'periodCovereda', 
                           'region_id',
                           'province_id',
                           'municipal_id',
                           'barangay_id', 
                           'user_id'
                        ];

    protected $guarded = ['id'];

    protected $table = 'lguB2bSummarydata';
}

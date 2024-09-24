<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lguB1bSummary extends Model
{
    use HasFactory;


    protected $fillable = ['D1', 
                           'totalrating2',
                           'totalrating3',
                           'totalrating4',
                           'totalrating5',
                           'remarks3c',
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

    protected $table = 'lguB1bSummarydata';
}

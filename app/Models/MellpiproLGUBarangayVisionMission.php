<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MellpiproLGUBarangayVisionMission extends Model
{
    use HasFactory;

    protected $table = 'mplgubrgyvisionmissions';
    protected $guarded = ['id'];
    protected $fillable = [
        'barangay_id',
        'municipal_id',
        'province_id',
        'region_id',
        'user_id',
        'rating1a',
        'rating1b',
        'rating1c',
        'remarks1a',
        'remarks1b',
        'remarks1c',  
        'dateMonitoring', 
        'periodCovereda',
        'status',
        'user_id'
    ];

}
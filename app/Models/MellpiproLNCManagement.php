<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MellpiproLNCManagement extends Model
{
    use HasFactory;

    protected $table = 'mplgubrgylncmanagement';
    protected $guarded = ['id'];
    protected $fillable = [
        'barangay_id',
        'municipal_id',
        'province_id',
        'region_id',
        'rating4a',
        'rating4b',
        'rating4c',
        'rating4c2',
        'rating4d',
        'rating4e',
        'rating4f',
        'rating4g',
        'remarks4a',
        'remarks4b',
        'remarks4c',
        'remarks4c2',
        'remarks4d',
        'remarks4e',
        'remarks4f', 
        'remarks4g', 
        'dateCreated',
        'dateUpdates',
        'dateMonitoring', 
        'periodCovereda',
        'periodCoveredb',
        'status',
        'user_id'
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsgcSummary extends Model
{
    use HasFactory;
    protected $table = 'psgc_summary';
    protected $guarded = ['id'];
    protected $fillable = [
        'psgc_code',
        'correspondence_code',
        'geographic_location',
        'provinces',
        'cities',
        'municipalities',
        'barangays',
        'reg_code',
        'prov_code',
        'citymun_code'
    ];
    protected $casts = [
        'psgc_code' => 'string',
        'correspondence_code' => 'string',
        'geographic_location' => 'string',
        'provinces' => 'integer',
        'cities' => 'integer',
        'municipalities' => 'integer',
        'barangays' => 'integer',
        'reg_code' => 'string',
        'prov_code' => 'string',
        'citymun_code' => 'string',
    ];
    
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsgcBarangay extends Model
{
    use HasFactory;
    protected $table = 'psgc_barangays';
    protected $guarded = ['id'];
    protected $fillable = [
        'psgc_code',
        'name',
        'correspondence_code',
        'old_names',
        'urban_rural_classification',
        'population_2020',
        'status',
        'reg_code',
        'prov_code',
        'citymun_code'
    ];
    protected $casts = [
        'psgc_code' => 'string',
        'name' => 'string',
        'correspondence_code' => 'string',
        'old_names' => 'string',
        'urban_rural_classification' => 'string',
        'population_2020' => 'integer',
        'status' => 'string',
        'reg_code' => 'string',
        'prov_code' => 'string',
        'citymun_code' => 'string',
    ];

    public function city()
    {
        return $this->belongsTo(PsgcCity::class, 'citymun_code', 'citymun_code');
    }

    public function municipality()
    {
        return $this->belongsTo(PsgcMunicipality::class, 'citymun_code', 'citymun_code');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsgcComponentCity extends Model
{
    use HasFactory;
    protected $table = 'psgc_component_cities';
    protected $guarded = ['id'];
    protected $fillable = [
        'psgc_code',
        'name',
        'correspondence_code',
        'old_names',
        'city_class',
        'income_classification',
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
        'city_class' => 'string',
        'income_classification' => 'string',
        'population_2020' => 'integer',
        'status' => 'string',
        'reg_code' => 'string',
        'prov_code' => 'string',
        'citymun_code' => 'string',
    ];
    
    
    public function barangays()
    {
        return $this->hasMany(PsgcBarangay::class, 'citymun_code', 'citymun_code');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsgcProvince extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'psgc_provinces';
    protected $guarded = ['id'];
    protected $fillable = [
        'psgc_code',
        'name',
        'correspondence_code',
        'old_names',
        'income_classification',
        'population_2020',
        'reg_code',
        'prov_code'
    ];
    protected $casts = [
        'psgc_code' => 'string',
        'name' => 'string',
        'correspondence_code' => 'string',
        'old_names' => 'string',
        'income_classification' => 'string',
        'population_2020' => 'integer',
        'reg_code' => 'string',
        'prov_code' => 'string',
    ];
    
    
    public function municipalities()
    {
        return $this->hasMany(PsgcMunicipality::class, 'prov_code', 'prov_code');
    }

    public function cities()
    {
        return $this->hasMany(PsgcCity::class, 'prov_code', 'prov_code');
    }

    public function componentCities()
    {
        return $this->hasMany(PsgcComponentCity::class, 'prov_code', 'prov_code');
    }

    public function highlyUrbanizedCities()
    {
        return $this->hasMany(PsgcHighlyUrbanizedCity::class, 'prov_code', 'prov_code');
    }

    public function independentComponentCities()
    {
        return $this->hasMany(PsgcIndependentComponentCity::class, 'prov_code', 'prov_code');
    }
}
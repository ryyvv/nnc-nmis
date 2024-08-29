<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsgcMunicipality extends Model
{
    use HasFactory;
    protected $table = 'psgc_municipalities';
    protected $guarded = ['id'];
    protected $fillable = [
        'psgc_code',
        'name',
        'correspondence_code',
        'old_names',
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

    public function subMunicipalities()
    {
        return $this->hasMany(PsgcSubMunicipality::class, 'citymun_code', 'citymun_code');
    }
}
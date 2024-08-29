<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsgcSubMunicipality extends Model
{
    use HasFactory;
    protected $table = 'psgc_sub_municipalities';
    protected $guarded = ['id'];
    protected $fillable = [
        'psgc_code',
        'name',
        'correspondence_code',
        'population_2020',
        'reg_code',
        'prov_code',
        'citymun_code'
    ];
    protected $casts = [
        'psgc_code' => 'string',
        'name' => 'string',
        'correspondence_code' => 'string',
        'population_2020' => 'integer',
        'reg_code' => 'string',
        'prov_code' => 'string',
        'citymun_code' => 'string',
    ];
    
    public function barangays()
    {
        return $this->hasMany(PsgcBarangay::class, 'citymun_code', 'citymun_code');
    }
}
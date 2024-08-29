<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsgcRegion extends Model
{
    use HasFactory;
    protected $table = 'psgc_regions';
    protected $guarded = ['id'];
    protected $fillable = [
        'psgc_code',
        'name',
        'correspondence_code',
        'population_2020',
        'reg_code'
    ];
    protected $casts = [
        'psgc_code' => 'string',
        'name' => 'string',
        'correspondence_code' => 'string',
        'population_2020' => 'integer',
        'reg_code' => 'string',
    ];
    
    public function provinces()
    {
        return $this->hasMany(PsgcProvince::class, 'reg_code', 'reg_code');
    }
}
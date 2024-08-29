<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsgcEquipmentInventory extends Model
{
    use HasFactory;
    protected $table = 'psgc_equipment_inventory';
    protected $guarded = ['id'];
    protected $fillable = [
        'total_barangay',
        'wooden_hb',
        'non_wooden_hb',
        'defective_hb',
        'total_hb',
        'availability_hb',
        'steel_rules',
        'microtoise',
        'infantometer',
        'remarks_hb',
        'hanging_type',
        'defective_ws',
        'total_ws',
        'availability_ws',
        'infat_scale',
        'beam_balance',
        'remarks_ws',
        'child',
        'defective_muac_child',
        'total_muac_child',
        'availability_muac_child',
        'adults',
        'defective_muac_adults',
        'total_muac_adults',
        'availability_muac_adults',
        'remarks_muac',
        'psgc_code',
        'name',
        'correspondence_code',
        'reg_code',
        'prov_code',
        'citymun_code'
    ];
    protected $casts = [
        'total_barangay' => 'integer',
        'wooden_hb' => 'integer',
        'non_wooden_hb' => 'integer',
        'defective_hb' => 'decimal:2',
        'total_hb' => 'decimal:2',
        'availability_hb' => 'decimal:2',
        'steel_rules' => 'integer',
        'microtoise' => 'integer',
        'infantometer' => 'integer',
        'hanging_type' => 'integer',
        'defective_ws' => 'integer',
        'total_ws' => 'decimal:2',
        'availability_ws' => 'decimal:2',
        'infat_scale' => 'integer',
        'beam_balance' => 'integer',
        'child' => 'integer',
        'defective_muac_child' => 'integer',
        'total_muac_child' => 'decimal:2',
        'availability_muac_child' => 'decimal:2',
        'adults' => 'integer',
        'defective_muac_adults' => 'integer',
        'total_muac_adults' => 'decimal:2',
        'availability_muac_adults' => 'decimal:2',
        'psgc_code' => 'string',
        'name' => 'string',
        'correspondence_code' => 'string',
        'reg_code' => 'string',
        'prov_code' => 'string',
        'citymun_code' => 'string',
        'remarks_hb' => 'string',
        'remarks_ws' => 'string',
        'remarks_muac' => 'string',
    ];
        
    public function city()
    {
        return $this->belongsTo(PsgcCity::class, 'psgc_code', 'psgc_code');
    }

    public function municipality()
    {
        return $this->belongsTo(PsgcMunicipality::class, 'psgc_code', 'psgc_code');
    }
}
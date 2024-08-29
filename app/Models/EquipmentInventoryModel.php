<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentInventoryModel extends Model
{
    use HasFactory;
    protected $table = 'equipment_inventory';
    protected $guarded =  ['id'];
    protected $fillable = [ 'totalBarangay', 'woodenHB', 'nonWoodenHB', 'defectiveHB', 'totalHB', 'availabilityHB', 'steelRules', 'microtoise', 'infantometer', 'remarksHB', 'hangingType', 'defectiveWS', 'totalWS', 'availabilityWS', 'infatScale', 'beamBalance', 'remarksWS', 'child', 'defectiveMUAC_child', 'totalMUAC_Child', 'availabilityMUAC_child', 'adults', 'defectiveMUAC_adults', 'totalMUAC_adults', 'availabilityMUAC_adults', 'remarksMUAC', 'psgccode_id', 'region_id', 'province_id', 'cities_id']; 


    public function psgc()
    {
        return $this->belongsTo(PSGC::class, 'psgccode_id', 'id');
    }
    
    public function municipal()
    {
        return $this->belongsTo(Municipal::class, 'municipal_id', 'id');
    }

    public function psgc_cities() 
    {
        return $this->belongsTo(PsgcCity::class, 'reg_code', 'region_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lnfp_lguform8tracking extends Model
{
    use HasFactory;
    
    protected $table = 'lnfp_lguform8tracking';
    protected $guarded = ['id'];
    protected $fillable = ['user_id','lnfp_form8_id','barangay_id','municipal_id','status'];
   
 

    public function municipal() {
        return $this->belongsTo(lnfp_form8::class);
    }
}

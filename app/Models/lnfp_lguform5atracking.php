<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lnfp_lguform5atracking extends Model
{
    use HasFactory;

    protected $table = 'lnfp_lguform5atracking';
    protected $guarded = ['id'];
    protected $fillable = ['user_id','lnfp_lguform5_id','barangay_id','municipal_id','status'];
   
 

    public function municipal() {
        return $this->belongsTo(lnfp_form5a_rr::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lnfp_lguOveralltracking extends Model
{
    use HasFactory;

    protected $table = 'lnfp_overall_stracking';
    protected $guarded = ['id'];
    protected $fillable = ['user_id','lnfp_lguprofile_id','barangay_id','municipal_id','status'];
   
 

    public function municipal() {
        return $this->belongsTo(lnfp_formOverall::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MellpiproLGUB2bSummaryTracking extends Model
{
    use HasFactory;


    protected $table = 'mplgubrgyLguB2bSummarytracking';
    protected $guarded = ['id'];
    protected $fillable = [
        'mplgubrgyb2bSummary_id',
        'barangay_id',
        'municipal_id', 
        'user_id',
        'status', 
    ];
    public function  lguB2bSummary() {
        return $this->belongsTo(lguB2bSummary::class);
    }
}

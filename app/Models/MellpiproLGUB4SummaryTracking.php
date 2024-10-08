<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MellpiproLGUB4SummaryTracking extends Model
{
    use HasFactory;


    protected $table = 'mplgubrgyLguB4Summarytracking';
    protected $guarded = ['id'];
    protected $fillable = [
        'mplgubrgyb4Summary_id',
        'barangay_id',
        'municipal_id', 
        'user_id',
        'status', 
    ];
    public function  lguB4Summary() {
        return $this->belongsTo(lguB4Summary::class);
    }
}

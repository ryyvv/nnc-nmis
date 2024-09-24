<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MellpiproLGUB1bSummaryTracking extends Model
{
    use HasFactory;


    protected $table = 'mplgubrgychangeNStracking';
    protected $guarded = ['id'];
    protected $fillable = [
        'mplgubrgyb1bSummary_id',
        'barangay_id',
        'municipal_id', 
        'user_id',
        'status', 
    ];
    public function  lguB1bSummary() {
        return $this->belongsTo(lguB1bSummary::class);
    }
}

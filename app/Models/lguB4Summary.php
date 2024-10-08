<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lguB4Summary extends Model
{
    use HasFactory;

    protected $fillable = ['mplgubrgyb1bSummary_id', 
                           'mplgubrgyb2bSummary_id', 
                           'grandtotal',
                           'findings',
                           'recommendation',
                           'status',
                           'dateMonitoring',
                           'periodCovereda', 
                           'region_id',
                           'province_id',
                           'municipal_id',
                           'barangay_id', 
                           'user_id'
                        ];

    protected $guarded = ['id'];

    protected $table = 'lguB4Summarydata';
}

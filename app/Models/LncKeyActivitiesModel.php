<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LncKeyActivitiesModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'sub_activity',
        'created_at',
        'updated_at'
    ];

    protected $guarded = ['id'];

    protected $table = 'lnc_key_activities';
}

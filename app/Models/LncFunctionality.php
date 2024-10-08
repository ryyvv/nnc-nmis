<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LncFunctionality extends Model
{
    use HasFactory;
    protected $table = 'lnc_functionality';
    protected $guarded = ['id'];
    protected $fillable = [
        'psgc_code',
        'correspondence_code',
        'geographic_level',
        'reg_code',
        'prov_code',
        'citymun_code',
        'name',
        'cd',
        'pp1a',
        'pp1b',
        'pp2a',
        'pp2b',
        'pp3a',
        'pp3b',
        'pp4a',
        'nsd',
        'me1',
        'me2',
        'me3',
        'total',
        'functionality'
    ];
    protected $casts = [
        'cd' => 'integer',
        'pp1a' => 'integer',
        'pp1b' => 'integer',
        'pp2a' => 'integer',
        'pp2b' => 'integer',
        'pp3a' => 'integer',
        'pp3b' => 'integer',
        'pp4a' => 'integer',
        'nsd' => 'integer',
        'me1' => 'integer',
        'me2' => 'integer',
        'me3' => 'integer',
        'total' => 'integer',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MellpiproBarangayDiscussionQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'barangay_id',
        'municipal_id',
        'province_id',
        'region_id',

        'practice7aa',
        'practice7ab',
        'practice7ac',
        'practice7ad',
        
        'practice7ba',
        'practice7bb',
        'practice7bc',
        'practice7bd',
        
        'practice7ca',
        'practice7cb',
        'practice7cc',
        'practice7cd', 

        'practice7da',
        'practice7db',
        'practice7dc',
        'practice7dd', 

        'practice7ea',
        'practice7eb',
        'practice7ec',
        'practice7ed', 

        'practice7fa',
        'practice7fb',
        'practice7fc',
        'practice7fd', 

        'dateCreated',
        'dateUpdates',
        'dateMonitoring', 
        'periodCovereda', 
        'status',
        'user_id'
 ];

protected $guarded = ['id'];

protected $table = 'mplgubrgydiscussionquestion';
}

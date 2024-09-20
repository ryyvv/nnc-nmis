<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form5RemarksModel extends Model
{
    use HasFactory;

    protected $table = 'lnfp_form5_remarks';
    protected $guarded =  ['id'];
    protected $fillable = [
       'form5_id',
       'user_id',
       'name',
       'remarks'
    ];
}

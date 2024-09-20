<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form5RatingModel extends Model
{
    use HasFactory;

    protected $table = 'lnfp_form5_rating';
    protected $guarded =  ['id'];
    protected $fillable = [
       'form5_id',
       'user_id',
       'name',
       'rating',
       'remarks',
       'form_content_id',
    ];
}

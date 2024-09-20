<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form5TitleModel extends Model
{
    use HasFactory;

    protected $table = 'form5_title';
    protected $guarded =  ['id'];
    protected $fillable = [
       'name'
    ];
}
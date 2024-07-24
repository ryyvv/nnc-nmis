<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormBuilderC extends Model
{
    use HasFactory;
    protected $table = 'formfields';
    protected $guarded =  ['id'];
    protected $fillable = ['formbuilderA_id','formbuilderB_id', 'label', 'name', 'type','status'];


    public function FormBuilderA (){
        return $this->belongsTo(FormBuilderA::class);
    }

    public function FormBuilderB(){
        return $this->belongsTo(FormBuilderC::class);
    }
    public function FormField(){
        return $this->belongsTo(FormField::class);
    }

}

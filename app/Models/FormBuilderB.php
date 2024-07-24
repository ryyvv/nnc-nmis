<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormBuilderB extends Model
{
    use HasFactory;
    protected $table = 'formbuilderB';
    protected $guarded =  ['id'];
    protected $fillable = ['formbuilderA_id','formBname','status'];

    public function FormBuilderA (){
        return $this->belongsTo(FormBuilderA::class);
    }

    public function FormBuilderC(){
        return $this->belongsTo(FormBuilderC::class);
    }
    public function FormField(){
        return $this->belongsTo(FormField::class);
    }

}

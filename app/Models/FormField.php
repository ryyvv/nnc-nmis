<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;
    protected $fillable = ['form_id', 'label', 'name', 'type','status'];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function FormBuilderA (){
        return $this->belongsTo(FormBuilderA::class);
    }

    public function FormBuilderB(){
        return $this->belongsTo(FormBuilderB::class);
    }

    public function FormBuilderC(){
        return $this->belongsTo(FormBuilderC::class);
    }
}

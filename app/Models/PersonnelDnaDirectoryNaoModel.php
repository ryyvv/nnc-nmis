<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelDnaDirectoryNaoModel extends Model
{
    use HasFactory;

    protected $table = 'naos';
    protected $guarded = ['id'];
    protected $fillable = [
        'namegovmayor',
        'typenao',
        'typedesignation',
        'datedesignation',
        'typeappointment',
        'position',
        'department',
        'personnel_id'
    ];

    public function personnelsFunction()
    {
        return $this->belongsTo(PersonnelDnaDirectoryModel::class, 'personnel_id');
    }
}
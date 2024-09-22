<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelDnaDirectoryNpcModel extends Model
{
    use HasFactory;

    protected $table = 'npcs';
    protected $guarded = ['id'];
    protected $fillable = [
        'namegovmayor',
        'typenpc',
        'typedesignation',
        'datedesignation',
        'typeappointment',
        'position',
        'department',
        'dcnpcapmembership',
        'dcnpcapposition',
        'dcnpcapofficer',
        'personnel_id'
    ];

    public function personnelsFunction()
    {
        return $this->belongsTo(PersonnelDnaDirectoryModel::class);
    }
}
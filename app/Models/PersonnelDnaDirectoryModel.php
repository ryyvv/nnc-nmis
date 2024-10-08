<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelDnaDirectoryModel extends Model
{
    use HasFactory;

    protected $table = 'personnels';
    protected $guarded = ['id'];
    protected $fillable = [
        'id_number',
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'sex',
        'age',
        'birthdate',
        'educationalbackground',
        'degreeCourse',
        'address',
        'civilstatus',
        'email',
        'cellphonenumer',
        'telephonenumber',
        'psgc_code',
        'name',
        'correspondence_code',
        'reg_code',
        'prov_code',
        'citymun_code',
        'directory_type',
        'name_on_id',
    ];

    public function nao()
    {
        return $this->hasMany(PersonnelDnaDirectoryNaoModel::class, 'personnel_id', 'id');
    }

    public function npc()
    {
        return $this->hasMany(PersonnelDnaDirectoryNpcModel::class, 'personnel_id', 'id');
    }

    public function bns()
    {
        return $this->hasMany(PersonnelDnaDirectoryBnsModel::class, 'personnel_id', 'id');
    }
}
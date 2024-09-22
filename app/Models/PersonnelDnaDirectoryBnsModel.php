<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelDnaDirectoryBnsModel extends Model
{
    use HasFactory;

    protected $table = 'bnss';
    protected $guarded = ['id'];
    protected $fillable = [
        'barangay',
        'statusemployment',
        'beneficiaryname',
        'relationship',
        'periodactivefrom',
        'periodactiveto',
        'lastupdate',
        'dcnpcapmembership',
        'bnsstatus',
        'personnel_id'
    ];

    public function personnelsFunction()
    {
        return $this->belongsTo(PersonnelDnaDirectoryModel::class);
    }
}
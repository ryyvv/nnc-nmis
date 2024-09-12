<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Firstname',
        'Middlename',
        'Lastname',
        'Region',
        'Province',
        'city_municipal',
        'agency_office_lgu',
        'Division_unit',
        'barangay',
        'role',
        'designation',
        'email',
        'password',
        'status',
        'userstatus',
        'useractivestatus',
        'otherrole'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function isPending(){
        $this->status == 'pending';
    }

    public function isRejected(){
        $this->status == 'rejected';
    }

    public function isApproved(){
        $this->status == 'rejected';
    }
}

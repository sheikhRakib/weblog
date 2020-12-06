<?php

namespace App\Models;

use App\Libraries\C_Data;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob' => 'datetime',
    ];

    public function articles() {
        return $this->hasMany('App\Models\Article', 'user_id');
    }

    public function setNameAttribute($value) 
    {   
        $value = C_Data::refine($value);
        $value = strtolower($value);
        $value = ucwords($value);
        $this->attributes['name'] = $value;
    }

    public function setEmailAttribute($value) 
    {
        $value = strtolower($value);
        $this->attributes['email'] = $value;
    }

    public function setIntroAttribute($value) 
    {
        $value = C_Data::refine($value);
        $this->attributes['intro'] = $value;
    }

    public function setLocationAttribute($value) {
        $value = C_Data::refine($value);
        $this->attributes['location'] = $value;
    }
    
    public function setEducationAttribute($value) {
        $value = C_Data::refine($value);
        $this->attributes['education'] = $value;
    }
    
    public function setWorkplaceAttribute($value) {
        $value = C_Data::refine($value);
        $this->attributes['workplace'] = $value;
    }

    public function getBirthDateAttribute() {
        return $this->dob->toFormattedDateString();

        // toFormattedDateString
    }

}

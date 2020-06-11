<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function about(){
        return $this->hasOne(About::class);
    }
    public function socials(){
        return $this->hasMany(Social::class);
    }
    public function works(){
        return $this->hasMany(Work::class);
    }
    public function skills(){
        return $this->hasMany(Skill::class);
    }
    public function interests(){
        return $this->hasMany(Interest::class);
    }
    public function profession(){
        return $this->hasOne(Profession::class);
    }
    public function educations(){
        return $this->hasMany(Education::class);
    }
    public function experiences(){
        return $this->hasMany(Experience::class);
    }
    public function credentials(){
        return $this->hasMany(Credential::class);
    }
    public function testimonies(){
        return $this->hasMany(Testimony::class);
    }
}

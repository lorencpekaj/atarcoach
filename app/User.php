<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
     * Returns subjects as an array
     */
    public function subjects()
    {
        return explode(", ", $this->subjects);
        // explode maybe 'subjects'
    }
    
    public function exams() {
        return $this->hasMany('App\Exam');
    }
}

<?php

namespace App\Fivem;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $connection= 'gta5';

    protected $table = 'users';

    public function Job(){
        return $this->belongsTo(Job::class,'job','name');
    }

    public function Member(){
        return $this->belongsTo(User::class,'identifier','steamid');
    }

    public function JobGrade(){
        return $this->belongsTo(Grade::class,'job','job_name')->where('job_grades.grade','=', $this->job_grade)->select('label');
    }

    public function getMoneyTotalAttribute()
    {
        $money = $this->bank + $this->money;
        return "$".number_format("{$money}", 2, ',', ' ');
    }


    public function getFullnameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
}

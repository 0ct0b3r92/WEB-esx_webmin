<?php

namespace App\Fivem;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $connection = "gta5";


    public function Players(){
        return $this->hasMany(Player::class,'job','name')->with('Member');
    }

    public function Grades(){
        return $this->belongsTo(Grade::class,'job_name','name')->with('Players');
    }

    public function Boss(){
        return $this->belongsTo(Player::class,'name','job')
                    ->where('job_grade','=','4')
                    ->orWhere('job_grade','=','3');
    }


    public function getImageAttribute()
    {
        return file_exists('img/jobs/' . $this->name . '.png') ? asset('img/jobs/' . $this->name . '.png') : asset('img/jobs/no-image.png') ;
    }

}

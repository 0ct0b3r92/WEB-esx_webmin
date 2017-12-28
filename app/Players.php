<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $connection= 'gta5';

    protected $table = 'users';

    public function Job(){
        return $this->belongsTo(Jobs::class,'job','name');
    }

    public function JobGrade(){
        return $this->belongsTo(JobGrades::class,'job','job_name');
    }

}

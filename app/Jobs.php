<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $connection= 'gta5';

    protected $table = 'jobs';

    public function Players(){
        return $this->hasMany(Players::class,'id','job');
    }

    public function Grade(){
        return $this->belongsTo(JobGrades::class,'name','job_name');
    }
}

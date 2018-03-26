<?php

namespace App\Fivem;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $connection= 'gta5';

    protected $table = 'job_grades';

    public function Players(){
        return $this->hasMany(Player::class,'job','job_name');
    }

}

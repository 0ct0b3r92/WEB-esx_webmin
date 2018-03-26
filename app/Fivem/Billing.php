<?php
/**
 * Created by PhpStorm.
 * User: mcspa
 * Date: 2018-03-10
 * Time: 14:51
 */

namespace App\Fivem;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $connection = "gta5";

    protected $table = "billing";

    public function By(){
        return $this->belongsTo(Player::class, 'sender','identifier')->with('Member');
    }

    public function To(){
        return $this->belongsTo(Player::class,'identifier','identifier')->with('Member');
    }


    public function getTotalAttribute()
    {
        return "$".number_format("{$this->amount}", 2, ',', ' ');
    }

}
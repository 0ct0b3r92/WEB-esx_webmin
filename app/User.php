<?php

namespace App;

use App\Fivem\Player;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    use Notifiable;

    protected $connection= 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','avatar', 'steamid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function StatusWL(){
        return $this->belongsTo(Whitelist::class,'id','user_id');
    }


    public function Player(){
        return $this->belongsTo(Player::class,'steamid','identifier');
    }

    public function getIsAdminAttribute()
    {
        if($this->owner == 5 || $this->owner == 4){
            return true;
        }

        return false;
    }

    public function getImageAttribute()
    {
        return isset($this->avatar) ? $this->avatar : asset('img/jobs/no-image.png');
    }



    public function getRoleBadgeAttribute()
    {
        if($this->owner == 5){
            return '<span class="label label-danger">Fondateur</span>';
        }elseif ($this->owner == 4){
            return '<span class="label label-primary">Staff</span>';
        }elseif ($this->owner == 3){
            return '<span class="label label-info">Journaliste</span>';
        }elseif ($this->owner == 2){
            return '<span class="label label-warning"><i class="fa fa-diamond"></i> Donateur <i class="fa fa-diamond"></i></span>';
        }elseif ($this->owner == 1){
            return '<span class="label label-default">Banni</span>';
        }else{
            return'<span class="label label-success">Membre</span>';
        }
    }

}

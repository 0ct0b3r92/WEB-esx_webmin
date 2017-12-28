<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Whitelist extends Model
{
    protected $table = "applications";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','rpname','town','experiance','history','birthday','admin_id','sexe'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['created_at', 'updated_at', 'birthday'];

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('Y/m/d', str_replace('-','/', $value));
    }

    public function Member(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Parrain(){
        return $this->belongsTo(User::class,'invited_by','id');
    }

    public function Admin(){
        return $this->belongsTo(User::class,'admin_id','id');
    }
}

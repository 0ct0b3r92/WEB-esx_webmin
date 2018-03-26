<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{
    protected $fillable = [
        'user_id','rpname','town','experiance','history','birthday','admin_id','sexe'
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

    public function Staff(){
        return $this->belongsTo(User::class,'admin_id','id');
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }

    public function getStatusBadgeAttribute()
    {
        if($this->status == 3){
            return '<span class="label label-default">Banni</span>';
        }elseif ($this->status == 2){
            return '<span class="label label-danger">Refusé</span>';
        }elseif ($this->status == 1){
            return '<span class="label label-success">Accepté</span>';
        }else{
            return'<span class="label label-warning">En Attente</span>';
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BugTracker extends Model
{
    protected $table = "bug_tracker";

    public function Member(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Admin(){
        return $this->belongsTo(User::class,'admin_id','id');
    }

    public function Type(){
        return $this->belongsTo(BugType::class,'type_id','id');
    }

    public function Comment(){
        return $this->hasMany(BugComment::class,'tracker_id');
    }

    public function scopeComment($query)
    {
        return $query->orderBy('id','desc');
    }
}

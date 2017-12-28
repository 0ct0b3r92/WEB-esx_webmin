<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BugComment extends Model
{
    protected $fillable = ['content','tracker_id','user_id'];

    protected $table = "bug_comment";

    public function Member(){
        return $this->belongsTo(User::class,'user_id','id');
    }



}

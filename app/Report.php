<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id','name','content','type_id'
    ];

    protected $dates = ['created_at', 'updated_at'];
}

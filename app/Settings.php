<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    public $timestamps = false;

    protected $fillable = ['servername','webhook_general','webhook_staff','whitelisted'];



    public function scopeField($query, $q)
    {
        $field = $query->where(['id' => '1'])->first();
        return $field->$q;
    }
}

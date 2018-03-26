<?php

namespace App;

use App\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'content', 'post_id', 'user_id'];


    public function Author(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Post(){
        return $this->belongsTo(Posts::class,'post_id','id');
    }

    public function getHtmlAttribute() {
        return Markdown::parse(strip_tags($this->content));
    }
}

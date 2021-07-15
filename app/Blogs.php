<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Blogs extends Model
{
    public function getCommentCount()
    {
        return $this->hasMany('App\PostComments','blog_id','id')->count();
    }

    public function getComments()
    {
        return $this->hasMany('App\PostComments','blog_id','id')->get();
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getAuthor()
    {
        return $this->hasOne('App\User','id','user_id')->get()->first();
    }

}

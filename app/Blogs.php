<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Blogs extends Model
{
    public function getComments()
    {
        return $this->hasMany('App\PostComments','blog_id','id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getAuthor()
    {
        return $this->hasOne('App\User','id','user_id');
    }

}

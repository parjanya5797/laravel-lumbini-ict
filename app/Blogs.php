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

}

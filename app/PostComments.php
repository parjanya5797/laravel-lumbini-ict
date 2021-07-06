<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class PostComments extends Model
{
    
    public function dateFormat()
    {
        return Carbon::parse($this->created_at)->format('d,F Y');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogs;
use App\PostComments;

class ResponseController extends Controller
{
    public function text()
    {
        return response('Hello World');
    }
    
    public function array()
    {
        $arr = ['kathmandu','Janakpur','Chitwan','Lumbini'];
        return $arr;
    }
    
    public function object()
    {
        $blogs = Blogs::with('getAuthor')->get();
        foreach($blogs as $blog)
        {
            $blog['comments'] = PostComments::where('blog_id',$blog['id'])->get();
        }
        return $blogs;
    }
    
    public function json()
    {
        $blogs = Blogs::get();
        foreach($blogs as $blog)
        {
            $blog['comments'] = PostComments::where('blog_id',$blog['id'])->get();
        }
        $response = [
            'data' => $blogs,
            'status' => '200',
        ];
        return response()->json($response);
    }
    
    // 200 Success
    //404 Not Found
    //403 Forbidden
    //500 Server Error
}

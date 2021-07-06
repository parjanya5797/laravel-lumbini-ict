<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostComments;
use Session;
class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'blog_id' => 'numeric',
        ]);

        $comment = new PostComments();
        $comment->message = $request->message;
        $comment->blog_id = $request->blog_id;
        $comment->save();
        Session::flash('comment-added','Comment Added Successfully');
        return redirect()->back();
    }
}

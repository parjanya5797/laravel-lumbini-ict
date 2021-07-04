<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogs;
use Session;
class BlogController extends Controller
{
    public function store(Request $request)
    {
       $request->validate([
           'title' => 'required',
           'summary' => 'max:200',
           'description' => 'required',
           'image' => 'required|mimes:jpg,png,jpeg,gif,svg',
           'show' => '',
       ]);
        $blogs = new Blogs();
        $blogs->title = $request->title;
        $blogs->summary = $request->summary;
        $blogs->description = $request->description;
        $blogs->show = $request->has('show')?true:false;

        //Save Image
        $file = $request->image;
        $filename = time().$file->getClientOriginalName();
        $destination = public_path('images');   //root/public/images
        $file->move($destination,$filename);

        $blogs->image = $filename;
        $blogs->save();
        Session::flash('blog-saved','Blog Saved Successfully');
        return redirect()->route('blog.view');
    }

    public function index()
    {
       $blog = Blogs::get();
       return view('blog.view',compact('blog'));
    }
}

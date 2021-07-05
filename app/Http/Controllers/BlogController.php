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

    public function show($id)
    {
        $blog = Blogs::findOrFail($id);
        return view('blog.show',compact('blog'));
    }

    public function edit($id)
    {
        $data = Blogs::findOrFail($id);
        return view('blog.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'max:200',
            'description' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif,svg',
            'show' => '',
        ]);

        $blogs = Blogs::findOrFail($id);
        $blogs->title = $request->title;
        $blogs->summary = $request->summary;
        $blogs->description = $request->description;
        $blogs->show = $request->has('show')?true:false;

        //Save Image
        if($request->has('image'))
        {
            if(file_exists('public/images/'.$blogs['image']))
            {
                unlink('public/images/'.$blogs['image']);
            }

            $file = $request->image;
            $filename = time().$file->getClientOriginalName();
            $destination = public_path('images');   
            $file->move($destination,$filename);
            $blogs->image = $filename;
        }
        

        $blogs->save();
        Session::flash('blog-edited','Blog Edited Successfully');
        return redirect()->route('blog.view');

    }


    public function delete($id)
    {
        $blog = Blogs::findOrFail($id);
        if(file_exists('public/images/'.$blog['image']))
        {
            unlink('public/images/'.$blog['image']);
        }
        $blog->delete();
        Session::flash('blog-deleted','Blog Deleted Successfully');
        return redirect()->back();
    }
}

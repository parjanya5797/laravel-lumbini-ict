<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogs;
use App\PostComments;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Auth;

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
        $blogs->user_id = Auth::user()->id;
        
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
    
    //where,orWhere,orderBy,pluck,skip,take,get,all,findOrFail,paginate
    
    
    
    
    public function index()
    {
        $blog = Blogs::orderBy('id','desc')->paginate(3);
        //In Case of Eloquent  [], -> eg. $blog['title'],$blog->title
        // $blog = DB::table('blogs')->where('show',1)->get();
        //In Case of DB -> eg. $blog->title
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
        if(!($data['user_id'] == Auth::user()->id))
        {
            abort(403);
        }
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
        if(!($blogs['user_id'] == Auth::user()->id))
        {
            abort(403);
        }
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
        if(!($blog['user_id'] == Auth::user()->id))
        {
            abort(403);
        }
        $comments = PostComments::where('blog_id',$blog['id'])->delete();
        if(file_exists('public/images/'.$blog['image']))
        {
            unlink('public/images/'.$blog['image']);
        }
        $blog->delete();
        Session::flash('blog-deleted','Blog Deleted Successfully');
        return redirect()->back();
    }
}

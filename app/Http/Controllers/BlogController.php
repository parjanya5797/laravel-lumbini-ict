<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogs;
use App\PostComments;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    
    public function add()
    {
        Gate::authorize('can-add-blog');
        return view('blog.create');
    }
    public function store(Request $request)
    {
        Gate::authorize('can-add-blog');
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
        $blog = Blogs::with('getAuthor','getComments')->orderBy('id','desc')->paginate(3);
        // $blog = Blogs::orderBy('id','desc')->paginate(3);
        
        // dd($blog);
        //In Case of Eloquent  [], -> eg. $blog['title'],$blog->title
        // $blog = DB::table('blogs')->where('show',1)->get();
        //In Case of DB -> eg. $blog->title
        return view('blog.view',compact('blog'));
    }
    
    public function show($id)
    {   
        $blog = Blogs::with('getAuthor','getComments')->findOrFail($id);
        return view('blog.show',compact('blog'));
    }
    
    public function edit(Blogs $blog)
    {
        //Removed by route Model Binding
        // $data = Blogs::findOrFail($id);
        // Gate::allows('checkBlogUser',$data);
        Gate::authorize('checkBlogUser',$blog);
        // if(Gate::denies('checkBlogUser',[$data]))  //Gate::denies('checkBlogUser'); i.e !Gate::allows('checkBlogUser');
        // {
            //     abort(403);
            // }
            return view('blog.edit',compact('blog'));
        }
        
        public function update(Request $request,$id)
        {
            // dd($request);
            $request->validate([
                'title' => 'required',
                'summary' => 'max:200',
                'description' => 'required',
                'image' => 'mimes:jpg,png,jpeg,gif,svg',
                'show' => '',
            ]);
            
            $blogs = Blogs::findOrFail($id);
            Gate::authorize('checkBlogUser',$blogs);
            $blogs->title = $request->title;
            $blogs->summary = $request->summary;
            $blogs->description = $request->description;
            $blogs->show = $request->has('show')?true:false;
            
            //Save Image
            if(isset($request->image))
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
            Gate::authorize('checkBlogUser',$blog);
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

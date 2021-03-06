<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodosList;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class TodosController extends Controller
{
    public function add()
    {
        // $this->authorize('create',TodosList::class);
        return view('todos.create');
    }
    
    public function store(Request $request)
    {
        // $this->authorize('create',TodosList::class);
        $data = $request->validate([
            'title' => 'required|min:2|max:30',
            'summary' => 'max:20',
            'start_date' => 'after_or_equal:'.date('Y-m-d'),
            'is_completed' => ''
        ]);
        $todo = new TodosList();
        $todo->title = $request['title'];
        $todo->summary = $request['summary'];
        $todo->start_date = $request['start_date'];
        $todo->is_completed = $request->has('is_completed')?true:false;
        $todo->user_id = Auth::user()->id;
        $todo->save();
        Session::flash('todo_created','Todo Has Been created Successfully !');
        return redirect()->route('todo.view');
    }
    
    public function index()
    {
        $allTodos = TodosList::all();
        return view('todos.view',compact('allTodos'));
    }
    
    public function edit($id)
    {
        $editData = TodosList::find($id);
        $this->authorize('edit',$editData);
        return view('todos.edit',compact('editData'));
    }
    
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|min:2|max:30',
            'summary' => 'max:20',
            'start_date' => 'required|after_or_equal:'.date('Y-m-d'),
            'is_completed' => ''
        ]);
        $todo = TodosList::find($id);
        $this->authorize('edit',$todo);
        $todo->title = $request['title'];
        $todo->summary = $request['summary'];
        $todo->start_date = $request['start_date'];
        $todo->is_completed = $request->has('is_completed')?true:false;
        $todo->save();
        Session::flash('todo_edited','Todo Has Been updated Successfully !');
        return redirect()->route('todo.view');
    }
    
    public function delete($id)
    {
        $todo = TodosList::findOrFail($id);
        $this->authorize('delete',$todo);
        $todo->delete();
        Session::flash('todo_deleted','Todo Has been Deleted Successfully');
        return redirect()->back();
    }
    
}

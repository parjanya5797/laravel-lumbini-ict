<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodosList;
class TodosController extends Controller
{
    public function store(Request $request)
    {
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
        $todo->save();
        return "Data Saved";
    }

    public function index()
    {
        $allTodos = TodosList::all();
        return view('todos.view',compact('allTodos'));
    }

    public function edit()
    {
        return view('todos.edit');
    }

}

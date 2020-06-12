<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request){
        $data = $this->validate($request,[
            'description'=>'required',
            'experience_id'=>'required'
        ]);
        \App\Task::create($data);
        return back()->withSuccess('Done!');
    }
    
    public function destroy(\App\Task $task){
        $task->delete();
        return back()->withSuccess('Done!');
    }
}

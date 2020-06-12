<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){ 
        return view('works.index');
    }
    public function store(Request $request){
        $data = $this->validate($request,[
            'title'=>'required',
            'category'=>'required',
            'img'=>'required',
            'client'=>'required',
            'date'=>'required',
            'details'=>'required'
        ]);
        auth()->user()->works()->create($data);
        return back()->withSucess('Done!');
    }
    public function destroy(\App\Work $work){
        $work->delete();
        return back()->withSucess('Done!');
    }
    public function update(Request $request, \App\Work $work){
        $data = $this->validate($request,[
            'title'=>'required',
            'category'=>'required',
            'img'=>'required',
            'client'=>'required',
            'date'=>'required',
            'details'=>'required'
        ]);
        $work->update($data);
        return back()->withSucess('Done!');
    }
    public function show(\App\Work $work){
        return view('works.show',compact('work'));
    }
}

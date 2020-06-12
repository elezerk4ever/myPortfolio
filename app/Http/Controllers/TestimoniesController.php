<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimoniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('testimony.index');
    }
    public function store(Request $request){
        $data = $this->validate($request,[
            'client_name'=>'required',
            'client_job'=>'required',
            'content'=>'required',
            'img'=>'required',
            'contact'=>''
        ]);
        auth()->user()->testimonies()->create($data);
        return back()->withSuccess('Done!');
    }
    public function destroy(\App\Testimony $testimony){
        $testimony->delete();
        return back()->withSuccess('Done!');
    }
}

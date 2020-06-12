<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request){
        $data = $this->validate($request,[
            'course'=>'required',
            'year'=>'required',
            'school'=>'required',
            'description'=>'required'
        ]);

        auth()->user()->educations()->create($data);
        return back()->withSuccess('Done!');

    }
    public function destroy(\App\Education $education){
        $education->delete();
        return back()->withSuccess('Done!');
    }
}

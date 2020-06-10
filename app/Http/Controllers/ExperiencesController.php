<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExperiencesController extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request,[
            'company'=>'required',
            'duration'=>'required',
            'position'=>'required',
            'location'=>'required'
        ]);
        auth()->user()->experiences()->create($data);
        return back()->withSuccess('Done!');
    }
    public function destroy(\App\Experience $experience){
        $experience->delete();
        return back()->withSuccess('Done!');
    }
}

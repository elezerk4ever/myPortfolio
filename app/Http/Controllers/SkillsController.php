<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request,[
            'name'=>'required',
            'rate'=>'required'
        ]);
        auth()->user()->skills()->create($data);
        return back()->withSuccess('Done!');
    }
    public function destroy(\App\Skill $skill){
        $skill->delete();
        return back()->withSuccess('Done!');
    }
}

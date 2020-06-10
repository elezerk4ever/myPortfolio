<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterestsController extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request,[
            'name'=>'required',
            'icon'=>'required'
        ]);

        auth()->user()->interests()->create($data);
        return back()->withSuccess('Done!');
    }

    public function destroy(\App\Interest $interest){
        $interest->delete();
        return back()->withSuccess('Done!');
    }
}

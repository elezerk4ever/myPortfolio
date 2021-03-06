<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update(Request $request){
        $data = $this->validate($request,[
            'name'=>'required',
            'email'=>'required'
        ]);
        auth()->user()->update($data);
        return back()->withSuccess('Done!');
    }
}

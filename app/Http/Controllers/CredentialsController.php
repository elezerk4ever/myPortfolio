<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CredentialsController extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request,[
            'name'=>'required',
            'year'=>'required'
        ]);
        auth()->user()->credentials()->create($data);
        return back()->withSuccess('Done!');
    }
    public function destroy(\App\Credential $credential){
        $credential->delete();
        return back()->withSuccess('Done!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Social;

class SocialsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request){
        $data = $this->validate($request,[
            'icon'=>'required',
            'name'=>'required',
            'url'=>'required'
        ]);
        $data['user_id']=auth()->user()->id;
        Social::create($data);
        return back()->withSuccess('Done!');
    }
    public function destroy(Social $social){
        $social->delete();
        return back()->withSuccess('Done!');
    }
}

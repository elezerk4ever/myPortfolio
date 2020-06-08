<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function update(Request $request){
        $data = $this->validate($request,[
            'intro'=>'required',
            'objectives'=>'required',
            'img'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'bdate'=>'required',
            'website'=>'required',
            'age'=>'required',
            'isFreelance'=>'',
        ]);
        auth()->user()->about()->update($data);
        return back()->withSuccess('done!');
    }
}

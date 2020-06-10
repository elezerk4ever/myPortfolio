<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessionsController extends Controller
{
    public function update(Request $request){
        $data = $this->validate($request,[
            'name'=>'required',
            'country'=>'required'
        ]);
        auth()->user()->profession()->update($data);
        return back()->withSuccess('Done!');
    }
}

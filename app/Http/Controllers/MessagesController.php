<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function store(Request $request){
       $data =  $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);

        $msg  = wordwrap($data['message'].' - '.'\n '.$data['name'].$data['email'],70);
        $email =  \App\User::find(1)->email;
        mail($email,$data['subject'],$msg);
        return 'Your message has been sent. Thank you!';
    }
}

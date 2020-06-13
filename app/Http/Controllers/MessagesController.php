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
        \App\User::find(1)->messages()->create($data);
        return 'Your message has been sent. Thank you!';
    }
    public function index(){
        $messages = auth()->user()->messages()->latest()->paginate(5);
        return view('messages.index',compact('messages'));
    }
    public function show(\App\Message $message){
        $message->update(['unread'=>0]);
        return view('messages.show',compact('message'));
    }
    public function destroy(\App\Message $message){
        $message->delete();
        return back()->withSuccess('Done!');
    }
}

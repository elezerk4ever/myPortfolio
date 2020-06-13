@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <i class="fa fa-envelope"></i> Messages
                    </div>
                    <div>
                        {{count(auth()->user()->messages()->where('unread',true)->get())}} Unread message{{count(auth()->user()->messages()->where('unread',true)->get()) > 1 ? 's':''}}
                    </div>
                </div>
                <div class="card-body">
                    @forelse ($messages as $message)
                        <div class="card card-body mt-1 " style="background:{{$message->unread ? '#CCE6FF':'#fff'}}">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <i class="fa fa-id-card"></i> {{$message->email}}
                                </div>
                                <div>
                                <i class="fa {{$message->unread ? 'fa-envelope':'fa-envelope-open-o'}}"></i>
                                </div>
                            </div>
                            <div >
                                <div>
                                    <i class="fa fa-file"></i> {{$message->subject}}
                                </div>
                                
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    {{$message->created_at->diffForHumans()}}
                                </div>
                                <div>
                                <form action="{{route('messages.destroy',$message->id)}}" method="POST" id="del{{$message->id}}" style="display:none">
                                    @csrf
                                    @method("DELETE")
                                </form>
                                <a href="{{route('messages.show',$message->id)}}">view message</a> |
                                    <a href="#" class="text-danger" onclick="del{{$message->id}}.submit()">delete message</a>
                                </div>
                            </div>
                        </div>
                        
                    @empty
                        <div class="card card-body">
                            No Messages
                        </div>
                    @endforelse
                    <div class="mt-1">
                        {{$messages->links()}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

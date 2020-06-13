@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    From {{$message->name}} - < {{$message->email}} >
                </div>
                <div class="card-body">
                    <div>
                        <strong>Subject : </strong> {{$message->subject}}
                    </div>
                    <div class="p-2" style="background:#ddd">
                        {{$message->message}}
                    </div>
                </div>
                <div class="card-footer">
                <a href="{{route('messages.index')}}"><i class="fa fa-arrow-left"></i> Back to messages</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

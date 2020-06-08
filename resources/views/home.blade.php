@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-dashboard"></i> Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row text-center">
                        <div class="col-md-3">
                            <img src="https://via.placeholder.com/150" alt="placeholder">
                        </div>
                        <div class="col-md-9 text-md-left">
                            <div class="h3  ">
                                {{auth()->user()->name}}
                            </div>
                            <div>
                                {{auth()->user()->email}}
                            </div>
                            <a href="#"><i class="fa fa-edit"></i>Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header"><i class="fa fa-user"></i> About Me</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

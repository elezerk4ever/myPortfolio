@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
       <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-graduation-cap"></i> Educations
            </div>
            <div class="card-body">
            <form method="POST" action="{{route('educations.store')}}">
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="course">Course</label>
                                <input id="course" class="form-control" type="text" name="course" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input id="year" class="form-control" type="text" name="year" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="school">School</label>
                                <input id="school" class="form-control" type="text" name="school" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description" class="form-control" type="text" name="description" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block">Add Education</button>
                </form>
            </div>
        </div>
       </div>
    </div>
</div>
@endsection

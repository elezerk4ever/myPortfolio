@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- works page --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <div>
                        <i class="fa fa-tasks"></i> My works
                    </div>
                    <a href="#" type="button" data-toggle="modal" data-target="#new-work-form"><i class="fa fa-plus"></i> Add new works</a>
                    <div class="modal fade" id="new-work-form" tabindex="-1" role="dialog" aria-labelledby="new-work-form" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="new-work-form">New Work</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="{{route('works.store')}}">
                                @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input id="title" class="form-control" type="text" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input id="category" class="form-control" type="text" name="category" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Img url</label>
                                        <input id="img" class="form-control" type="text" name="img" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="client">Client</label>
                                        <input id="client" class="form-control" type="text" name="client" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input id="date" class="form-control" type="text" name="date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Details</label>
                                        <textarea id="details" class="form-control" name="details" rows="3" required></textarea>
                                    </div>
                                    <button class="btn btn-block btn-primary">
                                        Add new work
                                    </button>
                              </form>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                </div>

                <div class="card-body">
                    @forelse (auth()->user()->works as $work)
                    <div class="card card-body mb-1">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{$work->img}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-9">
                                <div>
                                    <strong>Project Category: </strong> {{$work->category}}
                                </div>
                                <div>
                                    <strong>Project Name: </strong> {{$work->title}}
                                </div>
                                <div>
                                    <strong>Client: </strong> {{$work->client}}
                                </div>
                                <div>
                                    <strong>Date: </strong> {{$work->date}}
                                </div>
                                <div>
                                    <strong>Details: </strong> {{$work->details}}
                                </div>
                                <div>
                                    <form action="{{route('works.destroy',$work->id)}}" id="work{{$work->id}}" style="display: none" method="POST">@csrf @method('DELETE')</form>
                                <a href="#" type="button" data-toggle="modal" data-target="#{{$work->title}}-edit-form"><i class="fa fa-edit"></i> Edit</a>
                                <div class="modal fade" id="{{$work->title}}-edit-form" tabindex="-1" role="dialog" aria-labelledby="{{$work->title}}-edit-form" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="{{$work->title}}-edit-form">Edit {{$work->title}}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                        <form method="POST" action="{{route('works.update',$work->id)}}">
                                              @csrf
                                              @method('PUT')
                                              
                                              <div class="form-group">
                                                <label for="title">Title</label>
                                                <input id="title" class="form-control" type="text" name="title" value="{{$work->title}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <input id="category" class="form-control" type="text" value="{{$work->category}}" name="category" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="img">Img url</label>
                                                <input id="img" class="form-control" type="text" name="img" value="{{$work->img}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="client">Client</label>
                                                <input id="client" class="form-control" type="text" value="{{$work->client}}"name="client" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                            <input id="date" class="form-control" type="text" value="{{$work->date}}" name="date" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="details">Details</label>
                                            <textarea id="details" class="form-control" name="details" rows="3" required>{{$work->details}}</textarea>
                                            </div>
                                            <button class="btn btn-block btn-primary">
                                                Save Changes
                                            </button>
                                          </form>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div> | 
                                    <a href="#" class="text-danger" 
                                    onclick="work{{$work->id}}.submit()"><i class="fa fa-times"></i> Remove</a>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="card card-body">
                        No works found!
                    </div>
                    @endforelse
                </div>
            </div>
           
        </div>
        {{-- end of works page --}}

    </div>
</div>
@endsection

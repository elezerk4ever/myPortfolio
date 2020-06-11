@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <i class="fa fa-quote-left"></i> Testimonies
                    </div>
                    <div>
                        <a href="#" type="button" data-toggle="modal" data-target="#add-tes-form"><i class="fa fa-plus"></i> Add new Testimony</a>
                        <div class="modal fade" id="add-tes-form" tabindex="-1" role="dialog" aria-labelledby="exampleModaadd-tes-formlLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="add-tes-form">New Testimony</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="{{route('testimony.store')}}">
                                    @csrf
                                    <div class="form-group">
                                      <label for="client_name">Name of client</label>
                                      <input id="client_name" class="form-control" type="text" name="client_name" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="client_job">Job of client</label>
                                      <input id="client_job" class="form-control" type="text" name="client_job" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="content">Content</label>
                                      <textarea id="content" class="form-control" name="content" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label for="contact">Contact</label>
                                      <input id="contact" class="form-control" type="text" name="contact">
                                    </div>
                                    <div class="form-group">
                                      <label for="img">Image URL</label>
                                      <input id="img" class="form-control" type="text" name="img" required>
                                    </div>
                                    <button class="btn btn-primary btn-block">Add Testimonies</button>
                                  </form>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="card-body">
                  @forelse (auth()->user()->testimonies as $tes)
                      <div class="card card-body">
                        <div class="row">
                          <div class="col-2">
                          <img src="{{$tes->img}}" alt="" class="img-fluid rounded-circle">
                          </div>
                          <div class="col-10">
                            <div>
                              <strong>
                                {{$tes->client_name}} | {{$tes->client_job}} | {{$tes->contact}}
                              </strong>

                            </div>
                            <div>
                              "
                                {{$tes->content}}
                              "
                            </div>
                            <div>
                              <a href="#" class="text-danger">Remove</a>
                            </div>
                          </div>
                        </div>
                      </div>
                  @empty
                      
                  @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

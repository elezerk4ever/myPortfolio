@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- Profile and about page --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><i class="fa fa-fire"></i> Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-3 text-md-left">
                            <img src="{{auth()->user()->about->img}}" alt="placeholder" class="img-fluid rounded-circle">
                        </div>
                        <div class="col-md-9 text-md-left">
                            <div class="h3  ">
                                {{auth()->user()->name}}
                            </div>
                            <div>
                                {{auth()->user()->email}}
                            </div>
                            <a href="#" type="button" data-toggle="modal" data-target="#profile-edit-form"><i class="fa fa-edit"></i>Edit</a>
                            <div class="modal fade" id="profile-edit-form" tabindex="-1" role="dialog" aria-labelledby="profile-edit-form" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="#">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-group">
                                              <label for="name">Name</label>
                                          <input id="name" class="form-control" type="text" name="name" value="{{auth()->user()->name}}" required> 
                                          </div>
                                          <div class="form-group">
                                            <label for="email">Email</label>
                                        <input id="email" class="form-control" type="text" name="email" value="{{auth()->user()->email}}" required>
                                        </div>
                                        <button class="btn btn-block btn-primary">
                                            Update now!
                                        </button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- about  --}}
            <div class="card mt-1" >
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <i class="fa fa-user"></i> About Me
                    </div>
                    <a href="#" type="button" data-toggle="modal" data-target=".edit-form-about"><fa class="fa fa-edit"></fa>  Edit</a>
                </div>
                <div class="modal fade edit-form-about" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit About</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <div class="modal-body">
                        <form method="POST" action="{{route('about.update')}}">@csrf @method("PUT")
                                <div class="form-group">
                                    <label for="intro">Introduction</label>
                                    <textarea id="intro" class="form-control @error('intro') is-invalid @enderror" type="text" required  name="intro">{{auth()->user()->about->intro}}</textarea>
                                    @error('intro') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="objective">Objectives</label>
                                    <textarea id="objective" class="form-control @error('objectives') is-invalid @enderror"  required type="text" name="objectives">{{auth()->user()->about->objectives}}</textarea>
                                    @error('objectives') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="img">Image url</label>
                                    <input id="img" class="form-control @error('img') is-invalid @enderror" type="text" name="img" value="{{auth()->user()->about->img}}" required >
                                    @error('img') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="bdate">Birthdate</label>
                                    <input id="bdate" class="form-control @error('bdate') is-invalid @enderror" type="text" name="bdate" value="{{auth()->user()->about->bdate}}" required >
                                    @error('bdate') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="website">Website url</label>
                                    <input id="website" class="form-control @error('website') is-invalid @enderror" type="text" name="website" value="{{auth()->user()->about->website}}" required >
                                    @error('website') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{auth()->user()->about->phone}}" required >
                                    @error('phone') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input id="city" class="form-control @error('city') is-invalid @enderror" type="text" name="city" value="{{auth()->user()->about->city}}" required >
                                    @error('city') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input id="age" class="form-control @error('age') is-invalid @enderror" type="text" name="age" value="{{auth()->user()->about->age}}" required >
                                    @error('age') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="isfreelance">Freelance</label>
                                    <select id="isfreelance" class="form-control" name="isFreelance">
                                        <option value="1" {{auth()->user()->about->isFreelance ? "selected":""}}>Available</option>
                                        <option value="0" {{!auth()->user()->about->isFreelance ? "selected":""}}>Not Available</option>
                                    </select>
                                </div>
                                <button class="btn btn-block btn-primary">Update Now!</button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="card-body">

                    {{-- intro --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-info-circle"></i> Introduction
                    </div>
                    <div >
                      *  {{auth()->user()->about->intro}}
                    </div>
                   </div>
                   {{-- end intro --}}
                   {{-- objectives  --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-trophy"></i> Objectives
                    </div>
                    <div >
                      *  {{auth()->user()->about->objectives}}
                    </div>
                   </div>
                   {{-- end of objectives --}}
                   {{-- img --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-image"></i> Image url
                    </div>
                    <div >
                      *  <a href="{{auth()->user()->about->img}}">{{auth()->user()->about->img}}</a>
                    </div>
                   </div>
                   {{-- end of img --}}
                   {{-- bdate --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-birthday-cake"></i> Birthdate
                    </div>
                    <div >
                      *  {{auth()->user()->about->bdate}}
                    </div>
                   </div>
                   {{-- end of bdate --}}
                   {{-- website --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-globe"></i> Website url
                    </div>
                    <div >
                      *  <a href="{{auth()->user()->about->website}}">{{auth()->user()->about->website}}</a>
                    </div>
                   </div>
                   {{-- end of website --}}
                   {{-- phone --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-phone"></i> Phone
                    </div>
                    <div >
                       * {{auth()->user()->about->phone}}
                    </div>
                   </div>
                   {{-- end of phone --}}
                   {{-- city --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-building"></i> City
                    </div>
                    <div >
                       * {{auth()->user()->about->city}}
                    </div>
                   </div>
                   {{-- end of city --}}
                   {{-- age --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-child"></i> Age
                    </div>
                    <div >
                        {{auth()->user()->about->age}} years old
                    </div>
                   </div>
                   {{-- end of age --}}
                   {{-- freelance --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-meetup"></i> Freelance
                    </div>
                    <div >
                        {{auth()->user()->about->isFreelance ? "Available":"Not Available"}} 
                    </div>
                   </div>
                   {{-- end of freelance --}}
                </div>

            </div>
            {{-- end of about --}}
        </div>
        {{-- end of profile and about page --}}
    </div>
</div>
@endsection

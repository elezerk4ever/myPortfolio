@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- Profile and about page --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div><i class="fa fa-fire"></i> Profile</div>
                    <a href="#" type="button" data-toggle="modal" data-target="#profile-edit-form"><i class="fa fa-edit"></i>Edit</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-3 text-md-left">
                            <img src="{{auth()->user()->about->img}}" alt="placeholder" class="img-fluid rounded-circle">
                        </div>
                        <div class="col-9 text-md-left">
                            <div class="h3  ">
                                {{auth()->user()->name}}
                            </div>
                            <div>
                                {{auth()->user()->email}}
                            </div>
                            
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
                                    <form method="POST" action="{{route('user.update')}}">
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
                       {{auth()->user()->about->intro}}
                    </div>
                   </div>
                   {{-- end intro --}}
                   {{-- objectives  --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-trophy"></i> Objectives
                    </div>
                    <div >
                       {{auth()->user()->about->objectives}}
                    </div>
                   </div>
                   {{-- end of objectives --}}
                   {{-- img --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-image"></i> Image url
                    </div>
                    <div >
                       <a href="{{auth()->user()->about->img}}">{{auth()->user()->about->img}}</a>
                    </div>
                   </div>
                   {{-- end of img --}}
                   {{-- bdate --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-birthday-cake"></i> Birthdate
                    </div>
                    <div >
                       {{auth()->user()->about->bdate}}
                    </div>
                   </div>
                   {{-- end of bdate --}}
                   {{-- website --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-globe"></i> Website url
                    </div>
                    <div >
                       <a href="{{auth()->user()->about->website}}">{{auth()->user()->about->website}}</a>
                    </div>
                   </div>
                   {{-- end of website --}}
                   {{-- phone --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-phone"></i> Phone
                    </div>
                    <div >
                        {{auth()->user()->about->phone}}
                    </div>
                   </div>
                   {{-- end of phone --}}
                   {{-- city --}}
                   <div class="card card-body mt-1">
                    <div class="strong">
                        <i class="fa fa-building"></i> City
                    </div>
                    <div >
                       {{auth()->user()->about->city}}
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

        {{--skills and interest --}}
        <div class="col-md-5">
            {{-- skills --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <i class="fa fa-cogs"></i> Skills
                    </div>
                    <div>
                        <a href="#" type="button" data-toggle="modal" data-target="#skill-add-form">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="modal fade" id="skill-add-form" tabindex="-1" role="dialog" aria-labelledby="skill-add-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="skill-add-form">Add new Skill</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{route('skills.store')}}" method="POST">
                                      @csrf
                                      <div class="form-group">
                                          <label for="name">Skill Name</label>
                                          <input id="name" class="form-control" type="text" name="name" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="rate">Skill Rate</label>
                                          <div id="skillpercentage">
                                              50%
                                          </div>
                                          <input id="rate" oninput="skillpercentage.innerHTML=this.value+'%'" value="50" class="custom-range" type="range" name="rate" min="0" max="100">
                                      </div>
                                      <button class="btn btn-block btn-primary">Add new Skill</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse (auth()->user()->skills as $skill)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>
                                        {{$skill->name}}
                                    </span>
                                    <div>
                                        <a href="#" class="text-danger" onclick="skill{{$skill->id}}.submit()">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    <form action="{{route('skills.destroy',$skill->id)}}" method="POST" id="skill{{$skill->id}}" style="display: none">@csrf @method("DELETE") </form>
                                    </div>
                                </div>
                                <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{$skill->rate}}%;" aria-valuenow="{{$skill->rate}}" aria-valuemin="0" aria-valuemax="100">{{$skill->rate}}%</div>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">
                                No Skill
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            {{-- end of skills --}}
            {{-- interest --}}
            <div class="card mt-1">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <i class="fa fa-thumbs-up"></i> Interest
                    </div>
                    <div>
                        <a href="#" type="button" data-toggle="modal" data-target="#interest-add-form">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="modal fade" id="interest-add-form" tabindex="-1" role="dialog" aria-labelledby="interest-add-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="interest-add-form">Add new Interest</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{route('interests.store')}}" method="POST">
                                      @csrf
                                      <div class="form-group">
                                          <label for="name">Interest Name</label>
                                          <input id="name" class="form-control" type="text" name="name" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="icon">Icon</label>
                                          <input id="icon" class="form-control" type="text" name="icon" required>
                                      </div>
                                      <button class="btn btn-block btn-primary">Add new Skill</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse (auth()->user()->interests as $interest)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>
                                    <i class="fa {{$interest->icon}}"></i> {{$interest->name}}
                                    </span>
                                    <div>
                                        <a href="#" class="text-danger" onclick="interest{{$interest->id}}.submit()">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    <form action="{{route('interests.destroy',$interest->id)}}" method="POST" id="interest{{$interest->id}}" style="display: none">@csrf @method("DELETE") </form>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">
                                No Interest
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            {{-- end of interest --}}
        </div>
        {{-- end skills and interest --}}

        {{-- social links , profession and  more--}}
        <div class="col-md-3">
            {{-- social links --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <i class="fa fa-link"></i> Social links
                    </div>
                    <a href="#" type="button" data-toggle="modal" data-target="#social-form"><i class="fa fa-plus"></i></a>
                            <div class="modal fade" id="social-form" tabindex="-1" role="dialog" aria-labelledby="profile-edit-form" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Add Social Media links</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="POST" action="{{route('socials.store')}}">
                                          @csrf
                                          <div class="form-group">
                                              <label for="name">Name</label>
                                          <input id="name" class="form-control" type="text" name="name" required> 
                                          </div>
                                          <div class="form-group">
                                            <label for="icon">Icon</label>
                                        <input id="icon" class="form-control" type="text" name="icon"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="url">Url</label>
                                        <input id="url" class="form-control" type="text" name="url"  required>
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
                <div class="card-body">
                    <ul class="list-group">
                        @forelse (auth()->user()->socials as $social)
                        <li class="list-group-item d-flex justify-content-between">
                        <form style="display:none" action="{{route('socials.destroy',$social->id)}}" method="POST" id="social{{$social->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                           <span> <i class="fa {{$social->icon}}"></i> <a href="{{$social->url}}">{{$social->name}}</a></span> <a href="#" onclick="social{{$social->id}}.submit()"><i class="fa fa-times text-danger"></i></a>
                        </li>
                        @empty
                            <li class="list-group-item">No Link</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            
            {{-- end of social link --}}
            {{-- profession --}}
            <div class="card mt-1">
                <div class="card-header">
                    <i class="fa fa-briefcase"></i> Current Profession
                </div>
                <div class="card-body">
                <form method="POST" action="{{route('professions.update')}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Description</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{auth()->user()->profession->name}}">
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                        <input id="country" class="form-control" type="text" name="country" value="{{auth()->user()->profession->country}}">
                        </div>
                        <button class="btn btn-light btn-block">Update now</button>
                    </form>
                </div>
            </div>
            {{-- end of profession --}}
        </div>
        {{-- end of social link , profession and more --}}
    </div>
</div>
@endsection

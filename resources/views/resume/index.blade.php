@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        {{-- education --}}
       <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-graduation-cap"></i> Educations
            </div>
            <div class="card-body">
            @if(count(auth()->user()->educations))<table class="  w-100 table-bordered">
                <thead>
                    <tr>
                        <th>
                            Course
                        </th>
                        <th>
                            School
                        </th>
                        <th>
                            Year
                        </th>
                        <th>
                            Description
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>@endif
                    @forelse(auth()->user()->educations as $education)
                        <tr>
                            <td>
                            {{$education->course}}
                            </td>
                            <td>
                            {{$education->school}}
                            </td>
                            <td>
                            {{$education->year}}
                            </td>
                            <td>
                            {{$education->description}}
                            </td>
                            <td>
                            <form action="{{route('educations.destroy',$education->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn text-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
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
       {{-- end of education --}}
       {{-- experience --}}
       <div class="col-md-8">
        <div class="card mt-1">
            <div class="card-header">
                <i class="fa fa-history"></i> Job Experience
            </div>
            <div class="card-body">
            @forelse (auth()->user()->experiences as $exp)
                <div class="card card-body">
                    <div class="text-right">
                        <form method="post" action="{{route('exp.destroy',$exp->id)}}" style="display: none" id="exp{{$exp->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="#" class="text-danger" onclick="exp{{$exp->id}}.submit()">remove</a>
                        </div>
                    <div>
                        <span class="bg-primary p-1">
                            Position :<span class="text-white"> {{$exp->position}}</span>
                        </span>
                        <span class="bg-secondary p-1">
                            Company: <span class="text-white">{{$exp->company}} </span>
                        </span>
                        <span class="bg-success p-1">
                            Duration: <span class="text-white">{{$exp->duration}} </span>
                        </span>
                        <span class="bg-warning p-1">
                            Location: <span class="text-white">{{$exp->location}} </span>
                        </span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Tasks</strong>
                        <div>
                        <a href="#" type="button" data-toggle="modal" data-target="#task-add-{{$exp->id}}-form"><i class="fa fa-plus"></i> Add Task</a>
                        <div class="modal fade" id="task-add-{{$exp->id}}-form" tabindex="-1" role="dialog" aria-labelledby="task-add-{{$exp->id}}-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="task-add-{{$exp->id}}-form">New Task</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="{{route('tasks.store')}}">
                                      @csrf
                                <input type="hidden" name="experience_id" value="{{$exp->id}}">
                                      <div class="form-group">
                                        <label for="description">Details </label>
                                        <textarea id="description" class="form-control" name="description" rows="3" required></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-block">Add new Task</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <ul>
                        @forelse ($exp->tasks as $task)
                            <li>
                            <form action="{{route('tasks.destroy',$task->id)}}" id="task{{$task->id}}" style="display: none" method="post">@csrf @method('DELETE')</form>{{$task->description}} <a href="#" class="text-danger" onclick="task{{$task->id}}.submit()">remove</a>
                            </li>
                        @empty
                            <li>
                                No Task
                            </li>
                        @endforelse
                    </ul>
                </div>
            @empty
            @endforelse
            <form method="POST" action="{{route('exp.store')}}">
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input id="company" class="form-control" type="text" name="company" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input id="duration" class="form-control" type="text" name="duration" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input id="position" class="form-control" type="text" name="position" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input id="location" class="form-control" type="text" name="location" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block">Add Experiences</button>
                </form>
            </div>
        </div>
       </div>
       {{-- end of experience --}}
    </div>
</div>
@endsection

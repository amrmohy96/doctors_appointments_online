@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            {{--                <div class="card">--}}
            {{--                    <div class="card-header bg-dark text-white">Doctor information</div>--}}
            {{--                    <div class="card-body">--}}
            {{--                        <div class="row">--}}
            {{--                            <img width="80px;" style="border-radius: 50%" src="{{asset('storage/'.$doctor->image)}}">--}}
            {{--                            <br>--}}
            {{--                            <div style="background-color: transparent" class="card-footer">--}}
            {{--                                <p> name:{{$doctor->name}}</p>--}}
            {{--                                <p>address:{{$doctor->address}}</p>--}}
            {{--                                <p> edu:{{$doctor->education}}</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            <!-- user profile nav tabs feed left section info card start -->
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="user-profile-images">
                                <img src="{{asset('storage/'.$doctor->image)}}" class="user-profile-image rounded"
                                     alt="user profile image" height="140" width="140">
                            </div>
                            <div class="user-profile-text">
                                <h4 class="mb-0 text-bold-500 profile-text-color">{{$doctor->name}}</h4>
                            </div>

                            <h5 class="card-title mb-1">Department
                                <span class="badge badge-success"><a>&nbsp;</a>{{$doctor->department}}</span>
                            </h5>
                            <h5 class="card-title mb-1">Email
                                <span class="badge badge-success"><a>&nbsp;</a>{{$doctor->email}}</span>
                            </h5>

                            <h5 class="card-title mb-1">Education
                                <span class="badge badge-success"><a>&nbsp;</a>{{$doctor->education}}</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-dark text-white">Appointment</div>
                    <div class="card-body">

                        <form action="{{route('appointment.book')}}" method="post">
                            @csrf
                            @method('post')
                            <div class="row">
                                <input type="hidden" name="doctorId" value="{{$doctor->id}}">
                                <input type="hidden" name="appointmentId" value="{{$time->appointment_id}}">
                                <input type="hidden" name="date" value="{{$date}}">
                                <div class="col-md-4">
                                    <label class="btn btn-outline-dark">
                                        <input type="radio" name="time" value="{{$time->from}}">
                                        <span>{{$time->from}}</span>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="btn btn-outline-dark">
                                        <input type="radio" name="time" value="{{$time->to}}">
                                        <span>{{$time->to}}</span>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    @if(auth()->check())
                                    <button type="submit" class="btn btn-primary">Book</button>
                                    @else
                                        First:
                                        <div>
                                            <a href="{{route('login')}}" class="btn btn-primary">login</a>
                                            <a href="{{route('register')}}" class="btn btn-success">Register as Patient</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

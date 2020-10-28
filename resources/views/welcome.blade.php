@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="img-fluid card-img-top"
                     src="{{asset('app-assets/images/online-doctor-appointment-medical-problems_23-2148518021.jpg')}}">
            </div>
            <div class="col-md-8">
                <h1>create appointment..., register</h1>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <div class="mt-5">
                    @if(auth()->check())
                    @else
                        <a href="{{route('login')}}" class="btn btn-primary">login</a>
                        <a href="{{route('register')}}" class="btn btn-success">Register as Patient</a>
                    @endif
                </div>

            </div>
        </div>
        <hr>
        <form method="get" action="{{route('front.index')}}">
            <div class="card">
                <div class="card-header">
                    ## find doctors by date
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p><input name="date" class="form-control" type="text" id="datepicker-13"></p>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary">Find Doctors</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Zero configuration table -->
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Doctors</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered ">
                                <thead class="bg-dark text-white">
                                <tr>
                                    <th>name</th>
                                    <th>avatar</th>
                                    <th>education</th>
                                    <th>Book</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($doctors) > 0)
                                    @foreach($doctors as $doctor)
                                        <tr>
                                            <td>{{$doctor->doctor->name}}</td>
                                            <td><img alt="{{$doctor->doctor->name}}" width="50px;" height="50px;"
                                                     src="{{'storage/'.$doctor->doctor->image}}"></td>
                                            <td>{{$doctor->doctor->education}}</td>
                                            <td>
                                                <a href="{{route('front.show',[$doctor->id,$doctor->doctor->id,$doctor->date])}}"
                                                   class="btn btn-primary">book appointment</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>
                                            <p class="lead">No Data Available</p>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Zero configuration table -->
    </div>
@endsection


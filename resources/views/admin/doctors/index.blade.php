@extends('admin.layouts.dashboard')
@section('content')
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Doctors</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text"><a class="btn btn-outline-secondary"
                                                    href="{{route('doctors.create')}}">
                                    <i class="bx bxs-user-plus"></i>
                                </a></p>
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>role</th>
                                        <th>avatar</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($doctors as $doctor)
                                        <tr>
                                            <td>{{$doctor->name}}</td>
                                            <td>
                                                @if($doctor->role_id == 1)
                                                    <span class="badge badge-success text-white">{{$doctor->role->name}}</span>
                                                @else
                                                    <span class="badge badge-info text-white">{{$doctor->role->name}}</span>
                                                @endif
                                            </td>
                                            <td><img width="50px;" height="50px;" src="{{'storage/'.$doctor->image}}"
                                                     alt="{{$doctor->image}}"></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="modal-dark mr-1 mb-1 d-inline-block">
                                                            <!-- Button trigger for dark modal -->
                                                            <a href="javascript:void(0)" class="btn  btn-sm"
                                                               data-toggle="modal" data-target="#dark{{$doctor->id}}">
                                                                <i class="bx bxs-user-detail"></i>
                                                            </a>
                                                            <!--Dark theme Modal -->
                                                            <div class="modal fade text-left" id="dark{{$doctor->id}}" tabindex="-1"
                                                                 role="dialog" aria-labelledby="myModalLabel150"
                                                                 aria-hidden="true">
                                                                <div
                                                                    class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-dark white">
                                                                            <span class="modal-title"
                                                                                  id="myModalLabel150">{{$doctor->name}}</span>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <i class="bx bx-x"></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                          <div>
                                                                              <span class="badge badge-success badge-glow text-white"> address </span>
                                                                              <strong> {{$doctor->address}}</strong>
                                                                          </div>
                                                                            <hr>
                                                                          <div>
                                                                              <span class="badge badge-success badge-glow text-white">department </span>
                                                                              <strong>{{$doctor->department}}</strong>
                                                                          </div>
                                                                            <hr>
                                                                           <div>
                                                                               <span class="badge badge-success badge-glow text-white"> email</span>
                                                                               <strong>
                                                                                   {{$doctor->email}}
                                                                               </strong>
                                                                           </div>
                                                                            <hr>
                                                                            <div>
                                                                                <span class="badge badge-success badge-glow text-white"> phone number</span>
                                                                               <strong> {{$doctor->phone_number}}</strong>
                                                                            </div>
                                                                            <hr>
                                                                           <div>
                                                                               <span class="badge badge-success badge-glow text-white"> description </span>
                                                                             <strong>  {{$doctor->description}}</strong>
                                                                           </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-light-secondary"
                                                                                    data-dismiss="modal">
                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                <span
                                                                                    class="d-none d-sm-block">Close</span>
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="btn btn-dark ml-1"
                                                                                    data-dismiss="modal">
                                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                                <span
                                                                                    class="d-none d-sm-block">Accept</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a class="btn" href="{{route('doctors.edit',$doctor->id)}}">
                                                            <i class="bx bxs-edit-alt "></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <form style="display: inline-block;" method="post"
                                                              action="{{route('doctors.destroy',$doctor->id)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn"><i class="bx bxs-user-minus"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>name</th>
                                        <th>avatar</th>
                                        <th>address</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->
@endsection

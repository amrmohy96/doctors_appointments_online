@extends('admin.layouts.dashboard')
@section('content')
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Appointments</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text"><a class="btn btn-outline-secondary"
                                                    href="{{route('appointments.create')}}">
                                    <i class="bx bxs-calendar-plus"></i>
                                </a></p>
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>date</th>
                                        <th>from</th>
                                        <th>to</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>{{$appointment->date}}</td>
                                            @foreach ($appointment->times as $time)

                                                <td>{{$time->from}}</td>
                                                <td>{{$time->to}}</td>
                                                <td>
                                                    <a class="btn" href="{{route('appointments.edit',$time->id)}}">
                                                        <i class="bx bxs-edit "></i>
                                                    </a>
                                                    <form style="display: inline-block;" method="post"
                                                          action="{{route('appointments.destroy',$time->id)}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn"><i class="bx bxs-calendar-x"></i>
                                                        </button>
                                                    </form>
                                                </td>

                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>date</th>
                                        <th>from</th>
                                        <th>to</th>
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

@extends('admin.layouts.dashboard')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Create Appointment</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text"><a class="btn btn-outline-secondary"
                                                    href="{{route('appointments.index')}}">
                                    <i class="bx bx-calendar"></i>
                                </a></p>
                            <form class="form" action="{{route('appointments.store')}}" method="post"
                            >
                                @csrf
                                @method('post')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <div class="mb-1">
                                                    <fieldset class="form-group position-relative">
                                                        <input type="date" name="date" value="{{old('date')}}"
                                                               class="form-control  @error('date') is-invalid @enderror"
                                                               placeholder="Select Date">
                                                        @error('date')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" name="from" value="{{old('from')}}"
                                                       class="form-control pickatime @error('from') is-invalid @enderror"
                                                       placeholder="Time From">
                                                <div class="form-control-position">
                                                    <i class='bx bx-history'></i>
                                                </div>
                                                @error('from')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                         </span>
                                                @enderror
                                            </fieldset>
                                        </div>

                                        <div class="col-12">
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" name="to" value="{{old('to')}}"
                                                       class="form-control pickatime  @error('to') is-invalid @enderror"
                                                       placeholder="Time To">
                                                <div class="form-control-position">
                                                    <i class='bx bx-history'></i>
                                                </div>
                                                @error('to')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                         </span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">
                                                save
                                            </button>
                                            <button type="reset"
                                                    class="btn btn-light-secondary mr-1 mb-1">Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
@endsection


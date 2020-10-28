@extends('admin.layouts.dashboard')
@section('content')

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Create Doctor</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text"><a class="btn btn-outline-secondary"
                                                    href="{{route('doctors.index')}}">
                                    <i class="bx bx-group"></i>
                                </a></p>
                            <form class="form" action="{{route('doctors.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       placeholder="name" value="{{old('name')}}"
                                                       name="name">
                                                <label for="first-name-column">name</label>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="last-name-column"
                                                       class="form-control  @error('address') is-invalid @enderror"
                                                       placeholder="address" value="{{old('address')}}"
                                                       name="address">
                                                <label for="last-name-column">address</label>
                                            </div>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="city-column"
                                                       class="form-control @error('phone_number') is-invalid @enderror"
                                                       placeholder="phone number" value="{{old('phone_number')}}"
                                                       name="phone_number">
                                                <label for="city-column">phone number</label>
                                            </div>
                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="country-floating"
                                                       class="form-control @error('education') is-invalid @enderror"
                                                       name="education" value="{{old('education')}}"
                                                       placeholder="education">
                                                <label for="country-floating">education</label>
                                            </div>

                                            @error('education')
                                            <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="password" id="company-column"
                                                       class="form-control  @error('password') is-invalid @enderror"
                                                       name="password" value="{{old('password')}}"
                                                       placeholder="password">
                                                <label for="company-column">password</label>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="email" id="email-id-column"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{old('email')}}"
                                                       placeholder="Email">
                                                <label for="email-id-column">Email</label>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <select id="gender-id-column"
                                                        class="form-control @error('gender') is-invalid @enderror"
                                                        name="gender">
                                                    <option value="">select gender</option>
                                                    <option value="male">male</option>
                                                    <option value="female">female</option>
                                                </select>
                                                <label for="gender-id-column">gender</label>
                                            </div>
                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <select type="" id="role-id-column"
                                                        class="form-control @error('role_id') is-invalid @enderror"
                                                        name="role_id">
                                                    <option value="">select role</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                                <label for="role-id-column">gender</label>
                                            </div>

                                            @error('role_id')
                                            <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <label for="basicInputFile">With Browse button</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image"
                                                           class="custom-file-input @error('image') is-invalid @enderror"
                                                           id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="department-id-column"
                                                       class="form-control @error('department') is-invalid @enderror"
                                                       name="department" value="{{old('department')}}"
                                                       placeholder="department">
                                                <label for="department-id-column">department</label>
                                            </div>
                                            @error('department')
                                            <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <textarea name="description"
                                                          class="form-control  @error('description') is-invalid @enderror"
                                                          id="label-textarea"
                                                          rows="3" placeholder="description"></textarea>
                                                <label for="label-textarea">description</label>
                                            </div>


                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
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

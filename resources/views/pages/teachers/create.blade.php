@extends('layouts.app')

@section('title-meta')
    <title>{{ config('app.name') }} | Teacher Create</title>

    <meta name="description" content="this is description">
@endsection

@section('other-css')
@endsection

@section('content')
    <div id="page-wrapper" class="gray-bg">

        <div class="row border-bottom">
            @include('partials.header')
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Teacher Management</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('teachers.index') }}">Teacher</a>
                    </li>
                    <li class="active">
                        <strong>Create</strong>
                    </li>
                </ol>
            </div>
            <div class="col-sm-8">
                <div class="title-action">
                    <a href="{{ route('teachers.index') }}" class="btn btn-primary">Show List</a>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content ">

            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">

                        <div class="ibox-title">
                            <h5><small>Fill out this form to create a new </small>Teacher.</h5>
                            {{-- <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-class">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div> --}}
                        </div>

                        <div class="ibox-content">
                            <form method="POST" class="form-horizontal" action="{{ route('teachers.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-4 @error('name') has-error @enderror">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Designation</label>

                                    <div class="col-sm-4 @error('designation') has-error @enderror">
                                        <input type="text" class="form-control" name="designation"
                                            value="{{ old('designation') }}" required>
                                        @error('designation')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Gender</label>

                                    <div class="col-sm-4 @error('gender') has-error @enderror">
                                        <select name="gender" id="" class="form-control m-b">
                                            <option disabled selected>Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Date Of Birth</label>

                                    <div class="col-sm-4 @error('date_of_birth') has-error @enderror">
                                        <input type="date" class="form-control" name="date_of_birth"
                                            value="{{ old('date_of_birth') }}" required>
                                        @error('date_of_birth')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Major Subject</label>

                                    <div class="col-sm-4 @error('major_subject') has-error @enderror">
                                        <input type="text" class="form-control" name="major_subject"
                                            value="{{ old('major_subject') }}" placeholder="Optional">
                                        @error('major_subject')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-4 @error('email') has-error @enderror">
                                        <input type="text" class="form-control" name="email"
                                            value="{{ old('email') }}" placeholder="Optional">
                                        @error('email')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Date of Joining</label>

                                    <div class="col-sm-4 @error('date_of_joining') has-error @enderror">
                                        <input type="date" class="form-control" name="date_of_joining"
                                            value="{{ old('date_of_joining') ?? date('Y-m-d') }}" placeholder="Optional">
                                        @error('date_of_joining')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Profile Image</label>

                                    <div class="col-sm-4 @error('profile_image') has-error @enderror">
                                        <input type="file" class="form-control" name="profile_image"
                                            value="{{ old('profile_image') }}" placeholder="Optional">
                                        @error('profile_image')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Phone 1</label>

                                    <div class="col-sm-4 @error('phone_1') has-error @enderror">
                                        <input type="text" class="form-control" name="phone_1"
                                            value="{{ old('phone_1') }}">
                                        @error('phone_1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Phone 2</label>

                                    <div class="col-sm-4 @error('phone_2') has-error @enderror">
                                        <input type="text" class="form-control" name="phone_2"
                                            value="{{ old('phone_2') }}" placeholder="Optional">
                                        @error('phone_2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Qualification</label>

                                    <div class="col-sm-4 @error('qualification') has-error @enderror">
                                        <input type="text" class="form-control" name="qualification"
                                            placeholder="Optional" value="{{ old('qualification') }}">
                                        @error('qualification')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Description</label>

                                    <div class="col-sm-4 @error('description') has-error @enderror">
                                        <input type="text" class="form-control" name="description"
                                            value="{{ old('description') }}" placeholder="Optional">
                                        @error('description')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Address</label>

                                    <div class="col-sm-4 @error('address') has-error @enderror">
                                        <input type="text" class="form-control" name="address" placeholder="Optional"
                                            value="{{ old('address') }}">
                                        @error('address')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">National Identity #</label>

                                    <div class="col-sm-4 @error('national_identity_no') has-error @enderror">
                                        <input type="text" class="form-control" name="national_identity_no"
                                            placeholder="Optional" value="{{ old('national_identity_no') }}">
                                        @error('national_identity_no')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group ">

                                    <label class="col-sm-2 control-label">Salary</label>

                                    <div class="col-sm-4 @error('salary') has-error @enderror">
                                        <input type="number" class="form-control" name="salary"
                                            value="{{ old('salary') }}">
                                        @error('salary')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group ">

                                    <label class="col-sm-2 control-label">Facebook</label>

                                    <div class="col-sm-4 @error('facebook') has-error @enderror">
                                        <input type="string" class="form-control" name="facebook"
                                            placeholder="Optional" value="{{ old('facebook') }}">
                                        @error('facebook')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Instagram</label>

                                    <div class="col-sm-4 @error('instagram') has-error @enderror">
                                        <input type="string" class="form-control" name="instagram"
                                            placeholder="Optional" value="{{ old('instagram') }}">
                                        @error('instagram')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Twitter</label>

                                    <div class="col-sm-4 @error('twitter') has-error @enderror">
                                        <input type="string" class="form-control" name="twitter" placeholder="Optional"
                                            value="{{ old('twitter') }}">
                                        @error('twitter')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary disabledbutton" id="submitbtn"
                                            type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')

    </div>
@endsection

@section('custom-script')
    <script>
        var Success = `{{ \Session::has('success') }}`;
        var Error = `{{ \Session::has('error') }}`;

        if (Success) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 3200
                };
                toastr.success('Success Message', `{{ \Session::get('success') }}`);
            }, 1300);
        } else if (Error) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 3200
                };
                toastr.error('Failure Message', `{{ \Session::get('error') }}`);
            }, 1300);
        }
    </script>
@endsection

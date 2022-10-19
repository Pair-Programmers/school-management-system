@extends('layouts.app')

@section('title-meta')
    <title>{{ config('app.name') }} | Academic Year Edit</title>

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
                <h2>Academic Year Management</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('classes.index') }}">Academic Year</a>
                    </li>
                    <li class="active">
                        <strong>Edit</strong>
                    </li>
                </ol>
            </div>
            <div class="col-sm-8">
                <div class="title-action">
                    <a href="{{ route('academic-years.index') }}" class="btn btn-primary">Show List</a>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content ">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">

                        <div class="ibox-title">
                            <h5>Fill out this form to update Academic Year.</h5>
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
                            <form method="POST" class="form-horizontal" action="{{ route('academic-years.update', $academicYear) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Title</label>

                                    <div class="col-sm-4 @error('title') has-error @enderror">
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $academicYear->title }}" required>
                                        @error('title')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Start Date</label>

                                    <div class="col-sm-4 @error('start_date') has-error @enderror">
                                        <input type="date" class="form-control" name="start_date"
                                            value="{{ $academicYear->start_date }}" required>
                                        @error('start_date')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">End Date</label>

                                    <div class="col-sm-4 @error('end_date') has-error @enderror">
                                        <input type="date" class="form-control" name="end_date"
                                            value="{{ $academicYear->end_date }}" required>
                                        @error('end_date')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Status</label>

                                    <div class="col-sm-4 @error('is_active') has-error @enderror">
                                        <div class="radio radio-inline">
                                            <input type="radio" id="inlineRadio1" value="1" name="is_active" {{ $academicYear->is_active? 'checked' : '' }}>
                                            <label for="inlineRadio1"> Active </label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" id="inlineRadio2" value="0" name="is_active" {{ $academicYear->is_active? '' : 'checked' }}>
                                            <label for="inlineRadio2"> InActive </label>
                                        </div>

                                        @error('is_active')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Open for Admission</label>

                                    <div class="col-sm-4 @error('is_open_for_admission') has-error @enderror">
                                        <div class="radio radio-inline">
                                            <input type="radio" id="inlineRadio11" value="1" name="is_open_for_admission" {{ $academicYear->is_open_for_admission? 'checked' : '' }}>
                                            <label for="inlineRadio11"> Yes </label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" id="inlineRadio22" value="0" name="is_open_for_admission" {{ $academicYear->is_open_for_admission? '' : 'checked' }}>
                                            <label for="inlineRadio22"> No </label>
                                        </div>

                                        @error('is_open_for_admission')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
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

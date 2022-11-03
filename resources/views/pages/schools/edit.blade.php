@extends('layouts.app')

@section('title-meta')
    <title>{{ config('app.name') }} | School Edit</title>

    <meta name="description" content="this is description">
@endsection

@section('other-css')
    <link href="{{ asset('assets') }}/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/plugins/dropzone/dropzone.css" rel="stylesheet">
@endsection

@section('content')
    <div id="page-wrapper" class="gray-bg">

        <div class="row border-bottom">
            @include('partials.header')
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>School Management</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('classes.index') }}">School</a>
                    </li>
                    <li class="active">
                        <strong>Settting</strong>
                    </li>
                </ol>
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
                            <h5>Fill out this form to edit School Setting.</h5>
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
                            <form method="POST" class="form-horizontal" action="{{ route('schools.update', $school) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">School Name</label>

                                    <div class="col-sm-4 @error('name') has-error @enderror">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $school->name }}" required>
                                        @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Campus Name</label>

                                    <div class="col-sm-4 @error('campus_name') has-error @enderror">
                                        <input type="text" class="form-control" name="campus_name"
                                            value="{{ $school->campus_name }}" required>
                                        @error('campus_name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Campus Address</label>

                                    <div class="col-sm-4 @error('address') has-error @enderror">
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $school->address }}" placeholder="Optional">
                                        @error('address')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Tagline</label>

                                    <div class="col-sm-4 @error('tagline') has-error @enderror">
                                        <input type="text" class="form-control" name="tagline"
                                            value="{{ $school->tagline }}" placeholder="Optional">
                                        @error('tagline')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-4 @error('phone') has-error @enderror">
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $school->phone }}" placeholder="Optional">
                                        @error('phone')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-4 @error('email') has-error @enderror">
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $school->email }}" placeholder="Optional">
                                        @error('email')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Started/Establish In</label>

                                    <div class="col-sm-4 @error('established_in_date') has-error @enderror">
                                        <input type="date" class="form-control" name="established_in_date"
                                            value="{{ $school->established_in_date }}" placeholder="Optional">
                                        @error('established_in_date')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>



                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">School Logo</label>

                                    <div class="col-sm-4 @error('logo') has-error @enderror">
                                        <input type="file" class="form-control" name="logo" value=""
                                            placeholder="Optional">
                                        @error('logo')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Voucher Logo</label>

                                    <div class="col-sm-4 @error('voucher_logo') has-error @enderror">
                                        <input type="file" class="form-control" name="voucher_logo" value=""
                                            placeholder="Optional">
                                        @error('voucher_logo')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Fees Subm. Last Day</label>

                                    <div class="col-sm-4 @error('fee_submission_last_day') has-error @enderror">
                                        <select name="fee_submission_last_day" id="" class="form-control m-b">
                                            <option selected disabled>Select</option>
                                            @for ($i = 1; $i <= 28; $i++)
                                                @if ($i == $school->fee_submission_last_day)
                                                    <option selected value="{{ $i }}">{{ $i }}
                                                    </option>
                                                @else
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                        @error('fee_submission_last_day')
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
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            $("#isUserCheckBox").on("ifChecked", function hideUserEmailSection() {
                $("#userEmailSection").show();
            });
            $("#isUserCheckBox").on("ifUnchecked", function hideUserEmailSection() {
                $("#userEmailSection").hide();
            });
        });
    </script>
    <!-- DROPZONE -->
    <script src="{{ asset('assets') }}/js/plugins/dropzone/dropzone.js"></script>
    <script>
        $(document).ready(function() {

            Dropzone.options.myAwesomeDropzone = {

                autoProcessQueue: false,
                uploadMultiple: false,
                parallelUploads: 100,
                maxFiles: 1,

                // Dropzone settings
                init: function() {
                    var myDropzone = this;

                    this.element.querySelector("button[type=submit]").addEventListener("click", function(
                        e) {
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    });
                    this.on('error', function(file, errorMessage) {
                        console.log(errorMessage);
                        var errorDisplay = document.querySelectorAll('[data-dz-errormessage]');
                        errorDisplay[errorDisplay.length - 1].innerHTML = errorMessage;
                    });
                    // this.on('success', function(file, errorMessage) {
                    //     // console.log(errorMessage);
                    //     // if (errorMessage.indexOf('Error 404') !== -1) {
                    //     //     var errorDisplay = document.querySelectorAll('[data-dz-errormessage]');
                    //     //     errorDisplay[errorDisplay.length - 1].innerHTML = 'Error 404: The upload page was not found on the server';
                    //     // }
                    // });
                }

            }

        });
    </script>
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

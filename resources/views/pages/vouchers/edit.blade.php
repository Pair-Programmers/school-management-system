@extends('layouts.app')

@section('title-meta')
    <title>{{ config('app.name') }} | Student Create</title>

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
                <h2>Student Management</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('classes.index') }}">Student</a>
                    </li>
                    <li class="active">
                        <strong>Create</strong>
                    </li>
                </ol>
            </div>
            <div class="col-sm-8">
                <div class="title-action">
                    <a href="{{ route('students.index') }}" class="btn btn-primary">Show List</a>
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
                            <h5>Fill out this form to create a new Student.</h5>
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
                            <form method="POST" class="form-horizontal" action="{{ route('students.update', $student) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-4 @error('name') has-error @enderror">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $student->name }}" required>
                                        @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Father Name</label>

                                    <div class="col-sm-4 @error('father_name') has-error @enderror">
                                        <input type="text" class="form-control" name="father_name"
                                            value="{{ $student->father_name }}" required>
                                        @error('father_name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Gender</label>

                                    <div class="col-sm-4 @error('gender') has-error @enderror">
                                        <div class="radio radio-inline">
                                            <input type="radio" id="inlineRadio1" value="male" name="gender"
                                                {{ $student->gender=='male' ? 'checked' : ''}}>
                                            <label for="inlineRadio1"> Male </label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" id="inlineRadio2" value="female" name="gender"
                                                {{ $student->gender=='female' ? 'checked' : '' }}>
                                            <label for="inlineRadio2"> Female </label>
                                        </div>

                                        <div class="radio radio-inline">
                                            <input type="radio" id="inlineRadio2" value="other" name="gender"
                                                {{ $student->gender=='other' ? 'checked' : '' }}>
                                            <label for="inlineRadio2"> Other </label>
                                        </div>
                                        @error('gender')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Date Of Birth</label>

                                    <div class="col-sm-4 @error('date_of_birth') has-error @enderror">
                                        <input type="date" class="form-control" name="date_of_birth"
                                            value="{{ $student->date_of_birth }}" required>
                                        @error('date_of_birth')
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
                                            value="{{ $student->phone }}" placeholder="Optional">
                                        @error('phone')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-4 @error('email') has-error @enderror">
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $student->email }}" placeholder="Optional">
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
                                            value="{{ $student->date_of_joining }}" placeholder="Optional">
                                        @error('date_of_joining')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Image</label>

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
                                    <label class="col-sm-2 control-label">Father/Gaurdian Phone 1</label>

                                    <div class="col-sm-4 @error('father_gaurdian_phone_1') has-error @enderror">
                                        <input type="text" class="form-control" name="father_gaurdian_phone_1"
                                            value="{{ $student->father_gaurdian_phone_1 }}">
                                        @error('father_gaurdian_phone_1')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Father/Gaurdian Phone 2</label>

                                    <div class="col-sm-4 @error('father_gaurdian_phone_2') has-error @enderror">
                                        <input type="text" class="form-control" name="father_gaurdian_phone_2"
                                            value="{{ $student->father_gaurdian_phone_2 }}" placeholder="Optional">
                                        @error('father_gaurdian_phone_2')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Address</label>

                                    <div class="col-sm-4 @error('address') has-error @enderror">
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $student->address }}">
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
                                            value="{{ $student->national_identity_no }}">
                                        @error('national_identity_no')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Father National Identity #</label>

                                    <div class="col-sm-4 @error('father_national_identity_no') has-error @enderror">
                                        <input type="text" class="form-control" name="father_national_identity_no"
                                            value="{{ $student->father_national_identity_no }}" placeholder="Optional">
                                        @error('father_national_identity_no')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Class</label>

                                    <div class="col-sm-4 @error('date_of_joining') has-error @enderror">
                                        <select name="class_id" id="classSelect" class="form-control m-b">
                                            <option selected disabled>Select</option>
                                            @foreach ($classes as $class)
                                                @if ($class->id == $student->class_id)
                                                <option selected value="{{ $class->id }}">{{ $class->name }}</option>
                                                @else
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Section</label>

                                    <div class="col-sm-4 @error('section_id') has-error @enderror">
                                        <select name="section_id" id="sectionSelect" class="form-control m-b">
                                            <option selected disabled>Select</option>
                                            @foreach ($sections as $section)
                                                @if ($section->class_id == $student->class_id)
                                                <option selected value="{{ $section->id }}">{{ $section->name }}</option>
                                                @else
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('section_id')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Academic Year</label>

                                    <div class="col-sm-4 @error('academic_year_id') has-error @enderror">
                                        <select name="academic_year_id" id="" class="form-control m-b">
                                            <option selected disabled>Select</option>
                                            @foreach ($academicYears as $academicYear)
                                                @if ($student->academic_year_id == $academicYear->id)
                                                <option selected value="{{ $academicYear->id }}">{{ $academicYear->title }}
                                                </option>
                                                @else
                                                <option value="{{ $academicYear->id }}">{{ $academicYear->title }}
                                                </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('academic_year_id')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Fees Type</label>

                                    <div class="col-sm-4 @error('fees_period') has-error @enderror">
                                        <select name="fees_period" id="" class="form-control m-b">
                                            <option @if ($student->fees_period == 'monthaly') selected @endif value="monthaly">Monthaly</option>
                                            <option @if ($student->fees_period == 'quarterly') selected @endif value="quarterly">Quarterly</option>
                                            <option @if ($student->fees_period == 'yearly') selected @endif value="yearly">Yearly</option>
                                        </select>
                                        @error('fees_period')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Fees</label>

                                    <div class="col-sm-4 @error('fees') has-error @enderror">
                                        <input type="number" class="form-control" name="fees"
                                            value="{{ $student->fees }}">
                                        @error('fees')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group" id="userEmailSection" style="display: none">
                                    <label class="col-sm-2 control-label">User Email</label>

                                    <div class="col-sm-4 @error('user_email') has-error @enderror">
                                        <input type="email" class="form-control" name="user_email"
                                            value="{{ old('user_email') }}">
                                        @error('user_email')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label">Password</label>

                                    <div class="col-sm-4 @error('user_password') has-error @enderror">
                                        <input type="text" class="form-control" name="user_password"
                                            value="{{old('user_password') ?? Str::random(10)}}">
                                        @error('user_password')
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
                                            type="submit">Save Changes</button>
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
            var classes = @json($classes);
            var sections = @json($sections);
            var student = @json($student);
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

            $('#classSelect').on('change', function() {
                $('#sectionSelect').html('');
                var classId = this.value;

                sections.forEach(section => {
                    if (classId == section.class_id) {
                        $('#sectionSelect').append($('<option>', {
                            value: section.id,
                            text: section.name
                        }));
                    }
                });

            });

            $("#sectionSelect").val(student.section_id);
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

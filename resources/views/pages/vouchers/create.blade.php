@extends('layouts.app')

@section('title-meta')
    <title>{{ config('app.name') }} | Voucher Generate</title>

    <meta name="description" content="this is description">
@endsection

@section('other-css')
    <link href="{{ asset('assets') }}/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- datatable -->
    <link href="{{ asset('assets') }}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
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
                            <form method="POST" class="form-horizontal" action="{{ route('students.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Academic Year</label>

                                    <div class="col-sm-4 @error('academic_year_id') has-error @enderror">
                                        <select name="academic_year_id" id="" class="form-control m-b">
                                            <option selected disabled>Select</option>
                                            @foreach ($academicYears as $academicYear)
                                                <option value="{{ $academicYear->id }}">{{ $academicYear->title }}
                                                </option>
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
                                    <label class="col-sm-2 control-label">Due Date</label>

                                    <div class="col-sm-4 @error('due_date') has-error @enderror">
                                        <input type="date" class="form-control" name="due_date"
                                            value="{{ old('due_date') ?? date('Y-m-d') }}" placeholder="Optional">
                                        @error('due_date')
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
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
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
                                            {{-- @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('section_id')
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

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>here is the list of Students.</h5>
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

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Reg. No.</th>
                                            <th>Name</th>
                                            <th>Father Name</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Fees</th>
                                            <th>Fees Status</th>
                                            <th>Phone #</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vouchers as $voucher)
                                            <tr class="gradeX" id="row-{{ $student->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $voucher->id }}</td>
                                                <td>{{ $voucher->total_amount }}</td>
                                                <td>{{ $voucher->status }}</td>
                                                <td>{{ $voucher->student->name }}</td>
                                                <td>{{ $voucher->created_at }}</td>
                                                <td>{{ $voucher->due_date }}</td>
                                                <td>{{ $voucher->creator() }}</td>

                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('vouchers.voucher', $voucher) }}"
                                                        class="btn-white btn btn-xs">Voucher</a>
                                                        <a href="{{ route('vouchers.show', $voucher) }}"
                                                        class="btn-white btn btn-xs">View</a>
                                                        <a href="{{ route('vouchers.edit', $voucher) }}"
                                                            class="btn-white btn btn-xs">Edit</a>
                                                        <button onclick="deleteRecord({{ $voucher->id }})"
                                                            class="btn-white btn btn-xs">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Reg. No.</th>
                                            <th>Name</th>
                                            <th>Father Name</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Fees</th>
                                            <th>Fees Status</th>
                                            <th>Phone #</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

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

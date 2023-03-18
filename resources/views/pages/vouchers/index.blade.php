@extends('layouts.app')

@section('title-meta')
    <title>{{ config('app.name') }} | Student List</title>

    <meta name="description" content="this is description">
@endsection

@section('other-css')
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
                <h2>Voucher Management</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Voucher</a>
                    </li>
                    <li class="active">
                        <strong>List</strong>
                    </li>
                </ol>
            </div>
            <div class="col-sm-8">
                {{-- <div class="title-action">
                    <a href="{{ route('students.create') }}" class="btn btn-primary">+ Create New</a>
                </div> --}}
            </div>
        </div>

        <form action="{{ route('vouchers.index') }}" method="GET">
            @csrf
            <div class="wrapper wrapper-content animated fadeInRight ecommerce" style="padding-bottom: 0px !important;">
                <div class="ibox-content m-b-sm border-bottom">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label" for="product_name">Academic Year</label>
                                <select name="academic_year_id" id="" class="form-control m-b">
                                    {{-- <option selected disabled>Select</option> --}}
                                    @foreach ($academicYears as $academicYear)
                                        @if (old('academic_year_id') == $academicYear->id)
                                            <option selected value="{{ $academicYear->id }}">{{ $academicYear->title }}
                                            </option>
                                        @else
                                            <option value="{{ $academicYear->id }}">{{ $academicYear->title }}</option>
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
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label" for="product_name">Class</label>
                                <select name="class_id" id="classSelect" class="form-control">
                                    <option selected value="all">All</option>
                                    @foreach ($classes as $class)
                                        @if (old('class_id') == $class->id)
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
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label" for="product_name">Section</label>
                                <select value="all" name="section_id" id="sectionSelect" class="form-control">
                                    <option selected>All</option>
                                    @foreach ($sections as $section)
                                        @if (old('section_id') == $section->id)
                                            <option selected value="{{ $section->id }}">{{ $section->name }}</option>
                                        @else
                                            {{-- <option value="{{ $section->id }}">{{ $section->name }}</option> --}}
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label" for="fee_month">Fee Month</label>
                                <select name="fee_month" id="status" class="form-control">
                                    @foreach ($feeMonths as $row)
                                        @if (old('fee_month') == $row['date'])
                                            <option selected value="{{ $row['date'] }}">{{ $row['fee_month'] }}</option>
                                        @else
                                            <option value="{{ $row['date'] }}">{{ $row['fee_month'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1" style="align-content: right">
                            <div class="form-group">
                                <label class="control-label" for="product_name">---</label>
                                <div class="input-group date">
                                    <button name="button" type="submit" value="search"
                                        class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2" style="align-content: right">
                            <div class="form-group">
                                <label class="control-label" for="product_name">---</label>
                                <div class="input-group date">
                                    <button name="button" type="submit" value="search"
                                        class="btn btn-danger">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>here is the list of Vouchers.</h5>
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
                                            <th>Voucher. No.</th>
                                            <th>Std. Reg. #</th>
                                            <th>Student</th>
                                            <th>Class</th>
                                            <th>Amount</th>
                                            <th>Arears</th>
                                            <th>Status</th>
                                            <th>Issued Date</th>
                                            {{-- <th>Due Date</th> --}}
                                            {{-- <th>Issued By</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vouchers as $voucher)
                                        <tr class="gradeX" id="row-{{ $voucher->id }}">
                                            <td>{{ $voucher->id }}</td>
                                            <td>{{ $voucher->student->registration_no }}</td>
                                            <td>{{ $voucher->student->name }}</td>
                                            <td>{{ $voucher->student->class->name }}</td>
                                            <td>{{ $voucher->total_amount }}</td>
                                            <td>{{ $voucher->student->arears }}</td>
                                            <td>{{ $voucher->status }}</td>
                                            <td>{{ $voucher->created_at }}</td>
                                            {{-- <td>{{ $voucher->due_date }}</td> --}}
                                            {{-- <td>{{ $voucher->author->name }}</td> --}}

                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('vouchers.download', $voucher) }}"
                                                        class="btn-white btn btn-xs">Download</a>
                                                    <a href="{{ route('vouchers.show', $voucher) }}"
                                                        class="btn-white btn btn-xs">View</a>
                                                    {{-- <a href="{{ route('vouchers.edit', $voucher) }}"
                                                        class="btn-white btn btn-xs">Edit</a>
                                                    <button onclick="deleteRecord({{ $voucher->id }})"
                                                        class="btn-white btn btn-xs">Delete</button> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Voucher. No.</th>
                                            <th>Std. Reg. #</th>
                                            <th>Student</th>
                                            <th>Class</th>
                                            <th>Amount</th>
                                            <th>Arears</th>
                                            <th>Status</th>
                                            <th>Issued Date</th>
                                            {{-- <th>Due Date</th> --}}
                                            {{-- <th>Issued By</th> --}}
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
    <!-- Sweet alert -->
    <script src="{{ asset('assets') }}/js/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- datatables -->
    <script src="{{ asset('assets') }}/js/plugins/dataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            var classes = @json($classes);
            var sections = @json($sections);

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
    <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'ExampleFile'
                    },
                    {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

        function deleteRecord(id) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this record !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    method: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    url: "{{ route('students.destroy', '') }}/" + id,
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            swal("Deleted!", "Your record has been deleted.", "success");
                            $("#row-" + id).remove();
                        } else if (response.error) {
                            swal("Error !", response.error, "error");
                        } else {
                            log.
                            swal("Error !", "Not Authorize | Logical Error", "error");
                        }
                    },
                    error: function(response) {
                        swal("Error!", "Cannot delete !", "error");
                    }
                });

            });

        }
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
                    timeOut: 7000
                };
                toastr.success('Success Message', `{{ \Session::get('success') }}`);
            }, 1300);
        } else if (Error) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('Failure Message', `{{ \Session::get('error') }}`);
            }, 1300);
        }
    </script>
@endsection

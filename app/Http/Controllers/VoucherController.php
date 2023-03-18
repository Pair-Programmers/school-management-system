<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\Student;

use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Models\AcademicYear;
use App\Models\Clas;
use App\Models\School;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {//return $vouchers = Voucher::join('students', 'vouchers.student_id', 'students.id')->get();
        $vouchers = Voucher::join('students', 'vouchers.student_id', 'students.id')->when($request->has('class_id'), function ($query) use($request) {
            if($request->class_id != 'all'){
                if($request->has('section_id')){
                    if($request->section_id != 'all'){
                        return $query->where('class_id', $request->class_id)->where('section_id', $request->section_id);
                    }
                } else{
                    return $query->where('class_id', $request->class_id);
                }
            } else {
                return $query;
            }
        })->where('students.academic_year_id', $request->academic_year_id)->get();

        // $students = Student::when($request->has('class_id'), function ($query) use($request) {
        //     if($request->class_id != 'all'){
        //         if($request->has('section_id')){
        //             if($request->section_id != 'all'){
        //                 return $query->where('class_id', $request->class_id)->where('section_id', $request->section_id);
        //             }
        //         } else{
        //             return $query->where('class_id', $request->class_id);
        //         }
        //     } else {
        //         return $query;
        //     }
        // })->where('academic_year_id', $request->academic_year_id)->get();

        $feeMonths = array();
        for ($i=0; $i < 12; $i++) {
            array_push($feeMonths, array('date'=>Carbon::now()->subMOnths($i)->format('Y-m-1'), 'fee_month'=>Carbon::now()->subMOnths($i)->format('F-Y')));
        }
        // return $feeMonths;
        $academicYears = AcademicYear::where('is_active', true)->orWhere('is_open_for_admission', true)->get();
        $classes = Clas::all();
        $sections = Section::all();
        $request->flash();
        return view('pages.vouchers.index', compact('vouchers','classes','sections', 'academicYears', 'feeMonths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academicYears = AcademicYear::where('is_active', true)->orWhere('is_open_for_admission', true)->get();
        $classes = Clas::all();
        $sections = Section::all();
        $vouchers = Voucher::all();
        return view('pages.vouchers.create', compact('classes', 'sections', 'academicYears', 'vouchers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVoucherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVoucherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        // return $voucher->particulars;
        $student = Student::find($voucher->student->id);
        $school = School::find(1);
        return view('pages.vouchers.show', compact('voucher', 'student', 'school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVoucherRequest  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVoucherRequest $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }

    public function downloadVoucher(Voucher $voucher)
    {
        $student = Student::find($voucher->student->id);
        $school = School::find(1);
        $pdf = Pdf::loadView('pages.vouchers.show', compact('voucher', 'student', 'school'))->setPaper('a4', 'landscape');
        $pdf->loadView('pages.vouchers.show', compact('voucher', 'student', 'school'))->setPaper('a4', 'landscape');
        return $pdf->download('voucher_' . $voucher->student_registration_no. '_(' . date('F-Y',strtotime($voucher->created_at)) . ')' .'.pdf');
    }
}

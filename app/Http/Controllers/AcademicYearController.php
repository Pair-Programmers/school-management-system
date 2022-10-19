<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicYears = AcademicYear::all();
        return view('pages.academic-years.index', compact('academicYears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.academic-years.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'is_active' => 'required|boolean',
            'is_open_for_admission' => 'required|boolean',
        ]);

        AcademicYear::create([
            'title' => $request->input('title'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'slug' => Str::slug($request->input('title')),
            'is_active' => $request->input('is_active'),
            'is_open_for_admission' => $request->input('is_open_for_admission'),
        ]);

        return redirect()->back()->with(['success'=>'Academic Year Successfully Saved.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicYear $academicYear)
    {
        return view('pages.academic-years.show', compact('academicYear'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicYear $academicYear)
    {
        return view('pages.academic-years.edit', compact('academicYear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'start_date' => 'required|string',
            'end_date' => 'nullable|string',
            'is_active' => 'required|boolean',
            'is_open_for_admission' => 'required|boolean',
        ]);

        $academicYear->title = $request->input('title');
        $academicYear->start_date = $request->input('start_date');
        $academicYear->end_date = $request->input('end_date');
        $academicYear->is_active = $request->input('is_active');
        $academicYear->is_open_for_admission = $request->input('is_open_for_admission');
        $academicYear->slug = Str::slug($request->input('title'));
        $academicYear->save();

        return redirect()->back()->with(['success'=>'Academic Year Successfully Saved.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicYear $academicYear)
    {
        try {
            $academicYear->delete();
            return response()->json(['success'=>'Record deleted successfully !']);
        } catch (\Throwable $th) {
            return response()->json(['error'=>'Record not found !']);
        }
    }
}

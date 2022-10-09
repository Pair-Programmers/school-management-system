<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Clas;
use App\Models\Section;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('pages.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Clas::all();
        $sections = Section::all();
        return view('pages.students.create', compact('classes', 'sections'));
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
            'name' => 'required|string|max:50',
            'father_name' => 'required|string|max:50',
            'profile_image' => 'nullable',
            'gender' => 'required|string|in:male,female,other',
            'email' => 'nullable|email|max:50',
            'phone' => 'nullable|string|max:20',
            'father_gaurdian_phone_1' => 'required|string|max:20',
            'father_gaurdian_phone_2' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:100',
            'date_of_birth' => 'required|string',
            'date_of_joining' => 'nullable|string',
            'national_identity_no' => 'nullable|string|max:30',
            'father_national_identity_no' => 'nullable|string|max:30',
            'fees_period' => 'nullable|string|in:monthaly,quarterly,yearly',
            'fees' => 'required|numeric',
            // 'is_user' => 'required|numeric|in:0,1',
            'class_id' => 'required',
            'section_id' => 'required',
        ]);

        $student = new Student();

        $student->name = $request->input('name');
        $student->father_name = $request->input('father_name');
        $student->gender = $request->input('gender');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->father_gaurdian_phone_1 = $request->input('father_gaurdian_phone_1');
        $student->father_gaurdian_phone_2 = $request->input('father_gaurdian_phone_2');
        $student->address = $request->input('address');
        $student->date_of_birth = $request->input('date_of_birth');
        $student->date_of_joining = $request->input('date_of_joining');
        $student->national_identity_no = $request->input('national_identity_no');
        $student->father_national_identity_no = $request->input('father_national_identity_no');
        $student->fees_period = $request->input('fees_period');
        $student->fees = $request->input('fees');
        $student->fees_status = $request->input('fees_status');
        // $student->is_user = $request->input('is_user');
        $student->user_id = $request->input('user_id');
        $student->class_id = $request->input('class_id');
        $student->section_id = $request->input('section_id');

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = Str::slug($student->name) . '_' . time() . '_'. $profileImage->getClientOriginalName();
            $profileImage->move(public_path() . '/storage/images/students', $profileImageName);
            $student->profile_image = $profileImageName;

        }

        if($student->save()){

            
            return redirect()->back()->with(['success'=>'Class Successfully Saved.']);
        } else {
            return redirect()->back()->with(['success'=>'Class Successfully Saved.']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('pages.students.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('pages.students.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:20',
        ]);

        $class->name = $request->input('name');
        $class->slug = Str::slug($request->input('name'));
        $class->save();

        return redirect()->back()->with(['success'=>'Class Successfully Saved.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try {
            $class->delete();
            return response()->json(['success'=>'Record deleted successfully !']);
        } catch (\Throwable $th) {
            return response()->json(['error'=>'Record not found !']);
        }
    }
}

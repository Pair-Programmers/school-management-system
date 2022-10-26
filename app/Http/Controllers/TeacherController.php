<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('pages.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.teachers.create');
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
            'designation' => 'nullable|string|max:50',
            'profile_image' => 'nullable',
            'gender' => 'required|string|in:male,female,other',
            'email' => 'nullable|email|max:50',
            'phone_1' => 'required|string|max:20',
            'phone_2' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|string',
            'date_of_joining' => 'required|string',
            'national_identity_no' => 'nullable|string|max:30',
            'major_subject' => 'nullable|string|max:50',
            'qualification' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:30',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'twitter' => 'nullable|string',
            'salary' => 'required|numeric',
            'is_user' => 'nullable|numeric|in:0,1',
            'user_email' => 'required_if:is_user,==,1|email|max:50',
            'user_password' => 'required_if:is_user,==,1|string|min:8',
        ]);

        $teacher = new Teacher();

        $teacher->name = $request->input('name');
        $teacher->designation = $request->input('designation');
        $teacher->gender = $request->input('gender');
        $teacher->email = $request->input('email');
        $teacher->phone_1 = $request->input('phone_1');
        $teacher->phone_2 = $request->input('phone_2');
        $teacher->address = $request->input('address');
        $teacher->date_of_birth = $request->input('date_of_birth');
        $teacher->date_of_joining = $request->input('date_of_joining');
        $teacher->national_identity_no = $request->input('national_identity_no');
        $teacher->major_subject = $request->input('major_subject');
        $teacher->qualification = $request->input('qualification');
        $teacher->salary = $request->input('salary');
        $teacher->description = $request->input('description');
        if($request->filled('is_user')){
            if($request->input('is_user') == '1'){
                $teacher->is_user = true;
                User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('user_email'),
                    'phone' => $request->input('phone'),
                    'role' => 'teacher',
                    'password' => Hash::make($request->input('user_password')),
                ]);
            }
        }
        $teacher->facebook = $request->input('facebook');
        $teacher->twitter = $request->input('twitter');
        $teacher->instagram = $request->input('instagram');

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = Str::slug($teacher->name) . '_' . time() . '_'. $profileImage->getClientOriginalName();
            $profileImage->move(public_path() . '/storage/images/teachers', $profileImageName);
            $teacher->profile_image = $profileImageName;
        }

        if($teacher->save()){
            return redirect()->back()->with(['success'=>'Teacher Successfully Saved.']);
        } else {
            return redirect()->back()->with(['error'=>'Error while saving user.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('pages.teachers.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('pages.teachers.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
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
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        try {
            $class->delete();
            return response()->json(['success'=>'Record deleted successfully !']);
        } catch (\Throwable $th) {
            return response()->json(['error'=>'Record not found !']);
        }
    }
}

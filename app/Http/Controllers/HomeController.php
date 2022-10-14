<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUsers = User::count('id');
        $totalStudents = Student::count('id');
        $totalTeachers = Teacher::count('id');
        $totalClasses = Clas::count('id');
        return view('home', compact('totalUsers', 'totalStudents', 'totalTeachers', 'totalClasses'));
    }
}

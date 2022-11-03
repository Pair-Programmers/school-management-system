<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSchoolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchoolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('pages.schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSchoolRequest  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        $school->name = $request->input('name');
        $school->campus_name = $request->input('campus_name');
        $school->tagline = $request->input('tagline');
        $school->address = $request->input('address');
        $school->phone = $request->input('phone');
        $school->email = $request->input('email');
        $school->established_in_date = $request->input('established_in_date');
        $school->fee_submission_last_day = $request->input('fee_submission_last_day');

        if ($request->hasFile('logo')) {
            Storage::delete($school->logo);
            $path = Storage::putFile('public/images', $request->file('logo'));
            $school->logo = $path;
        }

        if ($request->hasFile('voucher_logo')) {
            Storage::delete($school->voucher_logo);
            $path = Storage::putFile('public/images', $request->file('voucher_logo'));
            $school->voucher_logo = $path;
        }

        $school->save();

        return redirect()->back()->with(['success'=>'Setting Successfully Updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }
}

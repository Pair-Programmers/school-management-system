<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Clas;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('pages.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Clas::all();
        return view('pages.sections.create', compact('classes'));
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
            'name' => 'required|string|max:20',
            'class_id' => 'required|integer|exists:classes,id',
        ]);

        Section::create([
            'name' => $request->input('name'),
            'class_id' => $request->input('class_id'),
        ]);

        return redirect()->back()->with(['success'=>'Section Successfully Saved.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return view('pages.sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $classes = Clas::all();
        return view('pages.sections.edit', compact('section', 'classes', 'section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'class_id' => 'required|integer|exists:classes,id',
        ]);

        $section->name = $request->input('name');
        $section->class_id = $request->input('class_id');
        $section->save();

        return redirect()->back()->with(['success'=>'Class Successfully Saved.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        try {
            $section->delete();
            return response()->json(['success'=>'Record deleted successfully !']);
        } catch (\Throwable $th) {
            return response()->json(['error'=>'Record not found !']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Clas::all();
        return view('pages.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.classes.create');
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
        ]);

        Clas::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'))
        ]);

        return redirect()->back()->with(['success'=>'Class Successfully Saved.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function show(Clas $class)
    {
        return view('pages.classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function edit(Clas $class)
    {
        return view('pages.classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clas $class)
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
     * @param  \App\Models\Clas  $clas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clas $class)
    {
        try {
            $class->delete();
            return response()->json(['success'=>'Record deleted successfully !']);
        } catch (\Throwable $th) {
            return response()->json(['error'=>'Record not found !']);
        }
    }
}

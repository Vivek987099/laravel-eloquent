<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::withCount('students') -> get();
        // return $courses;
        return view('courses',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'=>'required',
            'duration'=>'required'
        ]);

        $course = new Course();
        $course -> name = $request -> name;
        $course -> duration = $request -> duration;
        $course -> description = $request -> description;
        
        if($course -> save()){
            return redirect() -> route('courses.index') -> with('status','New course added successfully');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);
        return view('update-course-form',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'name' => 'required',
            'duration' => 'required'
        ]);
        $course = Course::find($id);
        $course -> name = $request -> name;
        $course -> duration = $request -> duration;
        $course -> description = $request -> description;
        if($course -> save()){
            return redirect() -> route('courses.index') -> with('status','Course Updated successfully');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        if($course -> delete()){
            return redirect() -> route('courses.index') -> with('status','Course deleted successfully');
        }else{
            return back();
        }
    }
}

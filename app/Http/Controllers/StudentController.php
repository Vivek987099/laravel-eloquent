<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;
use App\Models\Course;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $students = student::with('course') -> get();
        return view('welcome',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $courses = Course::all();
        return view('add-student',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {   
        $filePath = $request -> file('file') -> store('image','public');
        $course = Course::find($request -> course);
        $student = new student();
        $student -> name = $request -> name;
        $student -> email = $request -> email;
        $student -> age = $request -> age;
        $student -> file = $filePath;
        $student -> course_id = $course -> id;
        $student -> save();
       return redirect() -> route('students.index') -> with('status','New user added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {   
        $student = student::find($student -> id);
        // return $student;
        return view('single-student',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        $courses = Course::all();
        return view('update-user-form',compact(['student','courses']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, student $student)
    {   
        $std = student::find($student -> id);
        $course = Course::find($request -> course);

        $filePath = $std -> file;

       
        // delete old file if it is
        if($request -> file('file')){
            if(!empty($std -> file && $student->file != null)){
                $oldFilePath = public_path('storage/'). $std ->file;
                if(file_exists($oldFilePath)){
                    unlink($oldFilePath);
                }
                $filePath = $request -> file('file') -> store('image','public');
            }
        }
        $std -> name = $request -> name;
        $std -> age = $request -> age;
        $std -> email = $request -> email;
        $std -> course_id = $course -> id;
        $std -> file = $filePath;
        
        $std -> save();
        return redirect() -> route('students.index') -> with('status','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        if($student -> file){
            $filePath =  public_path('storage/').$student -> file;
            if(file_exists($filePath)){
                unlink($filePath);
            }
        }
        $status = student::where('id',$student -> id) -> delete();
        if($status){
            return redirect() -> route('students.index') -> with('status','Student deleted successfully');
        }else{
            return redirect() -> route('students.index') -> with('status','Failed to delete student');
        }
    }
}

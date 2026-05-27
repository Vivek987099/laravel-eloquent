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
        // return $students ;
        return view('welcome',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $courses = Course::all();
        return view('add-user',compact('courses'));
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
        return student::find($student -> id);
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


        $newFilePath = null;
        $std = student::find($student -> id);
        $course = Course::find($student -> course_id);
        if(!empty($std -> file)){
            $oldFilePath = public_path('storage/'). $std ->file;
            unlink($oldFilePath);
        }
        if($request -> file('file')){
            $newFilePath = $request -> file('file') -> store('image','public');
        }


        
        $std -> name = $request -> name;
        $std -> age = $request -> age;
        $std -> email = $request -> email;
        $std -> course_id = $course -> id;
        $std -> file = $newFilePath;
        
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

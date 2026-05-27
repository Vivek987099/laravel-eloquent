<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return 'ye path nhi hai bawakoof';
});

Route::resource('students',StudentController::class) ;
Route::resource('courses',CourseController::class) ;
Route::resource('users',UserController::class) ;

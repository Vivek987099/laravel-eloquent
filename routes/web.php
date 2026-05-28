<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleCheckMiddleware;




Route::get('/', function () {
   return view('login');
}) -> name('login');

Route::controller(LoginController::class) -> group(function(){
   Route::post('/login-process','login') -> name('login-process');
   Route::post('/logout','logout') -> name('logout');
});

Route::middleware(['auth']) -> group(function(){
   Route::resource('students',StudentController::class);
});

Route::middleware(['auth',RoleCheckMiddleware::class . ':user']) -> group(function(){
   Route::resource('courses',CourseController::class) ;
   Route::resource('users',UserController::class);
});


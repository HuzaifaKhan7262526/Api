<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// view all students
Route::get('/student',[StudentController::class, 'index'])->name('students.view');

// create a new student
Route::get('/create',[StudentController::class, 'student_create'])->name('student.create');
Route::post('/store',[StudentController::class,'store'])->name('student.store');

// update student
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('student/update/{id}', [StudentController::class, 'update'])->name('student.update');

// delete
Route::delete('/student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');

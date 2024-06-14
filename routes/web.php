<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ProgramController;
use App\Http\Controllers\Auth\DepartmentController;
use App\Http\Controllers\Auth\DeanController;
use App\Http\Controllers\Auth\CourseController;
use App\Http\Controllers\Auth\FacultyController;
use App\Http\Middleware\checkUserType;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('student.dashboard');
});

// admin routes
Route::middleware(['auth', 'checkUserType:admin'])->group(function () {
    Route::get('admin/dashboard', function () {  return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('admin_profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('admin_profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('admin_profile.destroy');


   Route::get('admin/dashboard', function () {  return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('admin_profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('admin_profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('admin_profile.destroy');

// Program Routes
    Route::resource('program', ProgramController::class)->names([
        'index' => 'program.index',
        'create' => 'program.create',
        'store' => 'program.store',
        'edit' => 'program.edit',
        'update' => 'program.update'
    ]);
    Route::delete('program', [ProgramController::class, 'deleteSelected'])->name('program.deleteSelected');

// Department Routes
    Route::resource('department', DepartmentController::class)->names([
        'index' => 'department.index',
        'create' => 'department.create',
        'store' => 'department.store',
        'edit' => 'department.edit',
        'update' => 'department.update'
    ]);
    Route::delete('deparment', [DepartmentController::class, 'deleteSelected'])->name('department.deleteSelected');

// Dean Routes
    Route::resource('dean', DeanController::class)->names([
        'index' => 'dean.index',
        'create' => 'dean.create',
        'store' => 'dean.store',
        'edit' => 'dean.edit',
        'update' => 'dean.update'
    ]);
    Route::delete('dean', [DeanController::class, 'deleteSelected'])->name('dean.deleteSelected');

// Course Routes
    Route::resource('course', CourseController::class)->names([
        'index' => 'course.index',
        'create' => 'course.create',
        'store' => 'course.store',
        'edit' => 'course.edit',
        'update' => 'course.update',
    ]);
    Route::delete('course', [CourseController::class, 'deleteSelected'])->name('course.deleteSelected');

// Instructor Routes
    Route::resource('faculty', FacultyController::class)->names([
        'index' => 'faculty.index',
        'create' => 'faculty.create',
        'store' => 'faculty.store',
        'edit' => 'faculty.edit',
        'update' => 'faculty.update',
    ]);
    Route::delete('faculty', [FacultyController::class, 'deleteSelected'])->name('faculty.deleteSelected');
    


});

//instructor routes
Route::middleware(['auth', 'checkUserType:teacher'])->group(function () {
    Route::get('teacher/dashboard', function () {  return view('teacher.dashboard'); })->name('teacher.dashboard');
    Route::get('instructor/profile', [ProfileController::class, 'edit'])->name('instructor_profile.edit');
    Route::patch('instructor/profile', [ProfileController::class, 'update'])->name('instructor_profile.update');
    Route::delete('instructor/profile', [ProfileController::class, 'destroy'])->name('instructor_profile.destroy');
});

require __DIR__.'/auth.php';

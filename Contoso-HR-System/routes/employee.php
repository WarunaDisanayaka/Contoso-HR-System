<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;

// Route::get('/attendance', [EmployeeController::class, 'index'])->name('employee.attendance');;

Route::post('/mark-attendance',[AttendanceController::class,'markAttendance'])->name('mark-attendance');
Route::get('/attendance', [AttendanceController::class,'showAttendance'])->name('employee.attendance');

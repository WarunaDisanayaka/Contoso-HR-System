<?php

use App\Http\Controllers\EmployeeController;

Route::get('/attendance', [EmployeeController::class, 'index'])->name('employee.attendance');;

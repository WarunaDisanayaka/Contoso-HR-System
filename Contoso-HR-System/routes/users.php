<?php

use App\Http\Controllers\UserController;


// Users routes
Route::get('/addingusers', function () { return view('hr.addingusers');})->middleware('auth')->name('hr.addingusers');
Route::post('/addingusers', [UserController::class, 'store'])->name('user.store');

Route::get('/allusers', [UserController::class, 'allUsers'])->name('hr.users');

Route::get('/edit/{id}/', [UserController::class, 'edit'])->name('user.edit');
Route::put('/edit/{user}/', [UserController::class, 'update'])->name('user.update');

Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
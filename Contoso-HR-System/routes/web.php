<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Redirect based on user role
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->hasRole('Employee')) {
            return view('employee.index');
        } elseif ($user->hasRole('HR')) {
            return view('hr.index');
        } elseif ($user->hasRole('Director')) {
            return view('director.index');
        }
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});

Route::get('/users', function () {
    return view('hr.addingusers');
})->middleware('auth')->name('hr.addingusers');

Route::get('/hr/addingusers', function () {
    return view('hr.addingusers');
})->name('hr.addingusers');

Route::get('/hr/addingusers', [UserController::class, 'create'])->name('user.create');
Route::post('/hr/addingusers', [UserController::class, 'store'])->name('user.store');





require __DIR__.'/auth.php';

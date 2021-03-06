<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;


// CONTROLLER LOGIN
Route::post('postLogin', [PublicController::class, 'getLogin'])->name('postLogin');
Route::get('logout', [PublicController::class, 'logout'])->name('logout');

//END OF CONTROLLER LOGIN

Route::post('addDataKaryawan', [PublicController::class, 'addDataKaryawan'])->name('addDataKaryawan');
Route::post('addDataAbsensi', [PublicController::class, 'addDataAbsensi'])->name('addDataAbsensi');
Route::post('addDataCuti', [PublicController::class, 'addDataCuti'])->name('addDataCuti');

//VIEW

Route::get('homedashboard', [PublicController::class, 'showDashboard'])->name('dashboard');
Route::get('profile', [PublicController::class, 'showProfile'])->name('profile');
Route::get('cuti', [PublicController::class, 'showCuti'])->name('cuti');
Route::get('gaji', [PublicController::class, 'showGaji'])->name('gaji');
Route::get('user', [PublicController::class, 'showUser'])->name('user');
Route::get('absensi', [PublicController::class, 'showAbsensi'])->name('absensi');





Route::get('/', function () {
    return view('login');
})->name('login');


Route::get('/blank', function () {
    return view('blank');
})->name('blank');


Route::get('/profile', function () {
    return view('profile');
})->name('profile');


Route::get('/fontawesome', function () {
    return view('fontawesome');
});


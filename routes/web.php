<?php

use Illuminate\Support\Facades\Route; 

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




Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/leads-in-progress', 'leads-in-progress')
    ->middleware(['auth', 'verified'])
    ->name('LeadsInProgress');
  
Route::view('/new-leads', 'new-leads')
    ->middleware(['auth', 'verified'])
    ->name('NewLeads');
 
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



Route::middleware(['auth'])->group(function () {

    Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware('role:super-user');
    Route::resource('users', App\Http\Controllers\UserController::class)->middleware('role:super-user'); 
    

});




require __DIR__.'/auth.php';

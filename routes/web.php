<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuperAdmin;
use App\Http\Controllers\HR_Admin\HR_Admin;
use App\Http\Controllers\IT_Admin\IT_Admin;
use App\Http\Controllers\Director\Director;
use App\Http\Controllers\Client\Client;
use App\Http\Controllers\Employee\Employee;
use App\Http\Controllers\UserProfile;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/tasks', function () {
//     return view('tasks');
// })->name('tasks');

Route::get('/tasks', [UserProfile::class, 'index'])->name('tasks');
Route::get('/add-user', [UserProfile::class, 'create']);
Route::post('/add-user', [UserProfile::class, 'store']);

Route::get('/tasks/{id}', [UserProfile::class, 'show'])->name('tasks.show');
Route::get('/tasks/{id}/edit', [UserProfile::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}/edit', [UserProfile::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{id}', [UserProfile::class, 'destroy'])->name('tasks.destroy');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:Super Admin', 'prefix' => 'superAdmin', 'as' => 'superAdmin.'], function () {
        Route::resource('dashboard', SuperAdmin::class);
    });

    Route::group(['middleware' => 'role:HR Admin', 'prefix' => 'hrAdmin', 'as' => 'hrAdmin.'], function () {
        Route::resource('dashboard', HR_Admin::class);
    });

    Route::group(['middleware' => 'role:IT Admin', 'prefix' => 'itAdmin', 'as' => 'itAdmin.'], function () {
        Route::resource('dashboard', IT_Admin::class);
    });

    Route::group(['middleware' => 'role:Director', 'prefix' => 'director', 'as' => 'director.'], function () {
        Route::resource('dashboard', Director::class);
    });

    Route::group(['middleware' => 'role:Client', 'prefix' => 'client', 'as' => 'client.'], function () {
        Route::resource('dashboard', Client::class);
    });

    Route::group(['middleware' => 'role:Employee', 'prefix' => 'employee', 'as' => 'employee.'], function () {
        Route::resource('dashboard', Employee::class);
    });
});

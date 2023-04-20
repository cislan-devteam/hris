<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuperAdmin;
use App\Http\Controllers\HR_Admin\HR_Admin;
use App\Http\Controllers\IT_Admin\IT_Admin;
use App\Http\Controllers\Director\Director;
use App\Http\Controllers\Client\Client;
use App\Http\Controllers\Employee\Employee;

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

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:Super Admin', 'prefix' => 'superAdmin', 'as' => 'superAdmin.'], function() {
        Route::resource('dashboard', SuperAdmin::class);
    });

    Route::group(['middleware' => 'role:HR Admin', 'prefix' => 'hrAdmin', 'as' => 'hrAdmin.'], function() {
        Route::resource('dashboard', HR_Admin::class);
    });

    Route::group(['middleware' => 'role:IT Admin', 'prefix' => 'itAdmin', 'as' => 'itAdmin.'], function() {
        Route::resource('dashboard', IT_Admin::class);
    });

    Route::group(['middleware' => 'role:Director', 'prefix' => 'director', 'as' => 'director.'], function() {
        Route::resource('dashboard', Director::class);
    });

    Route::group(['middleware' => 'role:Client', 'prefix' => 'client', 'as' => 'client.'], function() {
        Route::resource('dashboard', Client::class);
    });

    Route::group(['middleware' => 'role:Employee', 'prefix' => 'employee', 'as' => 'employee.'], function() {
        Route::resource('dashboard', Employee::class);
    });
});



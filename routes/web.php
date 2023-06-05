<?php

use Dcblogdev\Xero\Facades\Xero;
use Dcblogdev\LaravelXero\Http\Controllers\XeroAuthController;
use App\Http\Controllers\UserProfile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\Client;
use App\Http\Controllers\ClockItController;
use App\Http\Controllers\XeroController;
use App\Http\Controllers\Director\Director;
use App\Http\Controllers\Employee\Employee;
use App\Http\Controllers\HR_Admin\HR_Admin;
use App\Http\Controllers\IT_Admin\IT_Admin;
use App\Http\Controllers\TimeOffController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\SuperAdmin\SuperAdmin;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\EmployeeInformation;

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
    return view('auth.login');
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

// Time Off Controller
Route::get('/timeoff', [TimeOffController::class, 'index'])->name('timeoff');
Route::get('/create-time-off', [TimeOffController::class, 'create']);
Route::post('/create-time-off', [TimeOffController::class, 'store'])->name('timeoff.store');

Route::get('/view-timeoff/{id}', [TimeOffController::class, 'show'])->name('timeoff.shows');;

Route::get('/timeoff/{id}/edit', [TimeOffController::class, 'edit'])->name('timeoff.edit');
Route::put('/timeoff/{id}/edit', [TimeOffController::class, 'update'])->name('timeoff.update');

Route::delete('/timeoff/{id}', [TimeOffController::class, 'destroy'])->name('timeoff.destroy');
//directorsview
Route::get('/timeoff/{id}/directors_edit', [TimeOffController::class, 'statusview'])->name('directors.edit');
Route::put('/timeoff/{id}/directors_edit', [TimeOffController::class, 'statusStore'])->name('directors.update');

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

    Route::post('/register', [RegisteredUserController::class, 'store']);

// Route::group(['middleware' => ['web', 'XeroAuthenticated']], function(){
//     Route::match(['get', 'post'], 'xero', function () {
//         return Xero::contacts()->find('406e9eba-9939-48de-a300-57853bb1a6a4');
//     });
// });

Route::get('/clockit', [ClockItController::class, 'index'])->name('clockit.index');
Route::post('clockit/clockin', [ClockItController::class, 'clockIn'])->name('clockit.clockin');
Route::post('clockit/clockout', [ClockItController::class, 'clockOut'])->name('clockit.clockout');
Route::resource('clockit', ClockItController::class)->except(['create', 'store', 'show', 'edit', 'update', 'destroy']);

Route::get('/template/employeeview', [ManageUserController::class, 'index'])->name('manage.users.index');
Route::get('/template/add-user', [ManageUserController::class, 'create']);
Route::post('/template/add-user', [ManageUserController::class,'store']);

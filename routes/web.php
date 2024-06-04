<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JobController as AdminJobController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsController;
use Illuminate\Routing\Route as RoutingRoute;

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

//route login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'process']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/category', function () {
    return view('category');
});

Route::resource('jobs', JobsController::class);


Route::get('/admin/jobs', function () {
    return view('master.jobs.index');
});


//admin
Route::middleware('admin')->name('admin.')->prefix('admin2')->group(function() {
    Route::get('/',[AdminController::class,'index'])->name('index');
     Route::resource('/jobs',AdminJobController::class);
});
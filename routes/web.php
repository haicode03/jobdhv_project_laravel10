<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\JobsController as AdminJobsController;
use App\Http\Controllers\Admin\AdminController as AdminAdminController; 
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController; 
use App\Http\Controllers\Admin\CompanyController as AdminCompanyController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

use App\Http\Controllers\FrontEnd\HomeController as FrontEndHomeController;
use App\Http\Controllers\FrontEnd\JobsController as FrontEndJobsController;
use App\Http\Controllers\FrontEnd\MemberController as FrontEndMemberController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
 
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/category', function () {
    return view('category');
});
Route::get('/feedback', function () {
    return view('feedback');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


//Users Routes List
Route::middleware(['auth', 'user-access:1,2,3'])->group(function () {
    Route::get('/home', [FrontEndHomeController::class, 'index'])->name('home');
    Route::post('/search', [FrontEndHomeController::class, 'search'])->name('search');
    Route::get('/jobs/index', [FrontEndJobsController::class, 'index'])->name('jobs/index');
    Route::get('/jobs/show/{id}', [FrontEndJobsController::class, 'show'])->name('jobs/show');
    Route::post('/jobs/apply', [FrontEndJobsController::class, 'apply'])->name('jobs/apply');

    Route::get('/member/application', [FrontEndMemberController::class, 'application'])->name('member/application');
    Route::get('/member/showResume/{user_id}', [FrontEndMemberController::class, 'showResume'])->name('member/showResume');
});
 
//Admin
Route::middleware(['auth', 'user-access:1'])->group(function () {
    Route::get('/admin/index', [AdminAdminController::class, 'index'])->name('admin/index');
    Route::get('/admin/profile', [AdminAdminController::class, 'profilepage'])->name('admin/profile');


    //Ngành nghề
    Route::get('/admin/category/index', [AdminCategoryController::class, 'index'])->name('admin/category/index');
    Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('admin/category/create');
    Route::post('/admin/category/store', [AdminCategoryController::class, 'store'])->name('admin/category/store');
    // Route::get('/admin/category/show/{id}', [AdminCategoryController::class, 'show'])->name('admin/category/show');
    Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin/category/edit');
    Route::put('/admin/category/edit/{id}', [AdminCategoryController::class, 'update'])->name('admin/category/update');
    Route::delete('/admin/category/destroy/{id}', [AdminCategoryController::class, 'destroy'])->name('admin/category/destroy');

    //Công ty
    Route::get('/admin/company/index', [AdminCompanyController::class, 'index'])->name('admin/company/index');
    Route::get('/admin/company/create', [AdminCompanyController::class, 'create'])->name('admin/company/create');
    Route::post('/admin/company/store', [AdminCompanyController::class, 'store'])->name('admin/company/store');
    // Route::get('/admin/company/show/{id}', [AdminCompanyController::class, 'show'])->name('admin/company/show');
    Route::get('/admin/company/edit/{id}', [AdminCompanyController::class, 'edit'])->name('admin/company/edit');
    Route::put('/admin/company/edit/{id}', [AdminCompanyController::class, 'update'])->name('admin/company/update');
    Route::delete('/admin/company/destroy/{id}', [AdminCompanyController::class, 'destroy'])->name('admin/company/destroy');

    //Quản lý Jobs
    Route::get('/admin/jobs/index', [AdminJobsController::class, 'index'])->name('admin/jobs/index');
    Route::get('/admin/jobs/create', [AdminJobsController::class, 'create'])->name('admin/jobs/create');
    Route::post('/admin/jobs/store', [AdminJobsController::class, 'store'])->name('admin/jobs/store');
    Route::get('/admin/jobs/show/{id}', [AdminJobsController::class, 'show'])->name('admin/jobs/show');
    Route::get('/admin/jobs/edit/{id}', [AdminJobsController::class, 'edit'])->name('admin/jobs/edit');
    Route::put('/admin/jobs/edit/{id}', [AdminJobsController::class, 'update'])->name('admin/jobs/update');
    Route::delete('/admin/jobs/destroy/{id}', [AdminJobsController::class, 'destroy'])->name('admin/jobs/destroy');

    //Quản lý người dùng
    Route::get('/admin/users/index', [AdminUserController::class, 'index'])->name('admin/users/index');
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin/users/create');
    Route::post('/admin/users/store', [AdminUserController::class, 'store'])->name('admin/users/store');
    Route::get('/admin/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin/users/edit');
    Route::put('/admin/users/edit/{id}', [AdminUserController::class, 'update'])->name('admin/users/update');
    Route::delete('/admin/users/destroy/{id}', [AdminUserController::class, 'destroy'])->name('admin/users/destroy');
});
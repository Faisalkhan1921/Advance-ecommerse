<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfile;
use App\Http\Controllers\Frontend\HomeController;



Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// admin section routes 

Route::get('/admin',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfile::class,'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit/view',[AdminProfile::class,'ProfileEditView'])->name('edit.profile.pic');
Route::post('/store/profile_image',[AdminProfile::class,'storeprofile'])->name('store.profile_image');
Route::get('/change/password/view',[AdminProfile::class,'ChangePasswordViwe'])->name('change.password.view');
Route::post('/update/password',[AdminProfile::class,'UpdatePassword'] )->name('update.password');



Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// user section routes 
Route::get('/',[HomeController::class,'index']);
Route::get('/user/logout',[HomeController::class,'UserLogout'])->name('user.logout');
Route::get('/user/profile',[HomeController::class,'UserProfile'])->name('user.profile');
Route::post('/user/profile/update',[HomeController::class,'UpdateProfile'])->name('user.profile.update');

Route::get('/user/change/password',[HomeController::class,'ChangePassword'])->name('user.change.password');
Route::post('/user/update/password',[HomeController::class,'PasswordUpdate'])->name('user.password.update');



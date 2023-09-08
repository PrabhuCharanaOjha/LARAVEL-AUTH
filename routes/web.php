<?php

use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('index'); });
Route::get('/login', function () { return view('login'); })->name('loginpage');
Route::get('/registration', function () { return view('registration'); })->name('registrationpage');

Route::post('/login', [authController::class, 'login'])->name('userLogin');
Route::post('/register', [authController::class, 'registerUser'])->name('registration');
Route::post('/getToken', [authController::class, 'getToken'])->name('getToken');


// supper admin routes
Route::group(['prefix' => 'super-admin', 'middleware' => ['web', 'isSuperAdmin']], function () {
    Route::get('/dashboard', function () { return view('super-admin.dashboard'); })->name('superAdminDashboard');
    Route::get('/create-admin', function () { return view('super-admin.createAdmin'); })->name('superAdminCreateAdmin');
    Route::get('/dynamic/banner', function () { return view('super-admin.bannerDynamic'); })->name('superAdminBanner');
    Route::get('/dynamic/events', function () { return view('super-admin.eventsDynamic'); })->name('superAdminEvents');
    Route::get('/dynamic/gallery', function () { return view('super-admin.galleryDynamic'); })->name('superAdminGallery');
    Route::get('/dynamic/team', function () { return view('super-admin.teamDynamic'); })->name('superAdminTeam');
    Route::get('/dynamic/testimonial', function () { return view('super-admin.testimonialDynamic'); })->name('superAdminTestimonial');
    Route::get('/dynamic/contact', function () { return view('super-admin.contactDynamic'); })->name('superAdminContact');
    Route::get('/dynamic/footer', function () { return view('super-admin.footerDynamic'); })->name('superAdminFooter');
    Route::get('/admin-permission', function () { return view('super-admin.adminPermission'); })->name('superAdminPermission');
});


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'isAdmin']], function(){
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('adminDashboard');
});

Route::group(['middleware' => ['web']], function () {
    Route::post('/logout', [authController::class, 'logout'])->name('logout');
});
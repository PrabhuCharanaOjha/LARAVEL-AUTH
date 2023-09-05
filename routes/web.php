<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\superAdminController;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('login');
})->name('loginpage');
Route::get('/registration', function () {
    return view('registration');
})->name('registrationpage');
// Route::post('/login', [authController::class, 'login'])->name('userLogin');
// Route::post('/register', [authController::class, 'registerUser'])->name('registration');


// Route::get('/viewBanner', [superAdminController::class, 'viewBanner'])->name('viewBanner');
// Route::get('/viewEvent', [superAdminController::class, 'viewEvent'])->name('viewEvent');
// Route::get('/viewGallery', [superAdminController::class, 'viewGallery'])->name('viewGallery');
// Route::get('/viewTeam', [superAdminController::class, 'viewTeam'])->name('viewTeam');
// Route::get('/viewTestimonial', [superAdminController::class, 'viewTestimonial'])->name('viewTestimonial');
// Route::get('/viewDynamicTableDetails', [superAdminController::class, 'viewDynamicTableDetails'])->name('viewDynamicTableDetails');



// supper admin routes
Route::group(['prefix' => 'super-admin', 'middleware' => ['web', 'isSuperAdmin']], function () {
    Route::get('/dashboard', function () {
        return view('super-admin.dashboard');
    })->name('superAdminDashboard');
    Route::get('/create-admin', function () {
        return view('super-admin.createAdmin');
    })->name('superAdminCreateAdmin');
    Route::get('/dynamic/banner', function () {
        return view('super-admin.bannerDynamic');
    })->name('superAdminBanner');
    Route::get('/dynamic/events', function () {
        return view('super-admin.eventsDynamic');
    })->name('superAdminEvents');
    Route::get('/dynamic/gallery', function () {
        return view('super-admin.galleryDynamic');
    })->name('superAdminGallery');
    Route::get('/dynamic/team', function () {
        return view('super-admin.teamDynamic');
    })->name('superAdminTeam');
    Route::get('/dynamic/testimonial', function () {
        return view('super-admin.testimonialDynamic');
    })->name('superAdminTestimonial');
    Route::get('/dynamic/contact', function () {
        return view('super-admin.contactDynamic');
    })->name('superAdminContact');
    Route::get('/dynamic/footer', function () {
        return view('super-admin.footerDynamic');
    })->name('superAdminFooter');
    Route::get('/admin-permission', function () {
        return view('super-admin.adminPermission');
    })->name('superAdminPermission');



    // // admin CRUD start
    // Route::post('/create-admin', [superAdminController::class, 'createAdmin'])->name('superAdminCreateAdmin');
    // Route::get('/viewAllAdmin', [superAdminController::class, 'viewAllAdmin'])->name('superAdminViewAllAdmin');
    // Route::Post('/updateAdmin', [superAdminController::class, 'updateAdmin'])->name('updateAdmin');
    // Route::Post('/deleteAdmin', [superAdminController::class, 'deleteAdmin'])->name('deleteAdmin');
    // // admin CRUD end

    // // banner CRUD start
    // Route::post('/addBanner', [superAdminController::class, 'addBanner'])->name('superAdminAddBanner');
    // Route::get('/viewBanner', [superAdminController::class, 'viewBanner'])->name('superAdminViewBanner');
    // Route::Post('/updateBanner', [superAdminController::class, 'updateBanner'])->name('updateBanner');
    // Route::Post('/deleteBanner', [superAdminController::class, 'deleteBanner'])->name('deleteBanner');
    // // banner CRUD end

    // // Event CRUD start
    // Route::post('/addEvent', [superAdminController::class, 'addEvent'])->name('superAdminAddEvent');
    // Route::get('/viewEvent', [superAdminController::class, 'viewEvent'])->name('superAdminViewEvent');
    // Route::Post('/updateEvent', [superAdminController::class, 'updateEvent'])->name('updateEvent');
    // Route::Post('/deleteEvent', [superAdminController::class, 'deleteEvent'])->name('deleteEvent');
    // // Event CRUD end


    // // Gallery CRUD start
    // Route::post('/addGallery', [superAdminController::class, 'addGallery'])->name('superAdminAddGallery');
    // Route::get('/viewGallery', [superAdminController::class, 'viewGallery'])->name('superAdminViewGallery');
    // Route::Post('/updateGallery', [superAdminController::class, 'updateGallery'])->name('updateGallery');
    // Route::Post('/deleteGallery', [superAdminController::class, 'deleteGallery'])->name('deleteGallery');
    // // Gallery CRUD end

    // // Team CRUD start
    // Route::post('/addTeam', [superAdminController::class, 'addTeam'])->name('superAdminAddTeam');
    // Route::get('/viewTeam', [superAdminController::class, 'viewTeam'])->name('superAdminViewTeam');
    // Route::Post('/updateTeam', [superAdminController::class, 'updateTeam'])->name('updateTeam');
    // Route::Post('/deleteTeam', [superAdminController::class, 'deleteTeam'])->name('deleteTeam');
    // // Team CRUD end

    // // Testimonial CRUD start
    // Route::post('/addTestimonial', [superAdminController::class, 'addTestimonial'])->name('superAdminAddTestimonial');
    // Route::get('/viewTestimonial', [superAdminController::class, 'viewTestimonial'])->name('superAdminViewTestimonial');
    // Route::Post('/updateTestimonial', [superAdminController::class, 'updateTestimonial'])->name('updateTestimonial');
    // Route::Post('/deleteTestimonial', [superAdminController::class, 'deleteTestimonial'])->name('deleteTestimonial');
    // // Testimonial CRUD end

    // Route::post('/addDynamicTableDetails', [superAdminController::class, 'addDynamicTableDetails'])->name('superAdminAddDynamicTableDetails');
    // Route::get('/viewDynamicTableDetails', [superAdminController::class, 'viewDynamicTableDetails'])->name('superAdminViewDynamicTableDetails');
    // Route::Post('/updateDynamicTableDetails', [superAdminController::class, 'updateDynamicTableDetails'])->name('updateDynamicTableDetails');
    // Route::Post('/deleteDynamicTableDetails', [superAdminController::class, 'deleteDynamicTableDetails'])->name('deleteDynamicTableDetails');

});

<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\superAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/login', [authController::class, 'login'])->name('userLogin');
// Route::post('/register', [authController::class, 'registerUser'])->name('registration');
// Route::post('/getToken', [authController::class, 'getToken'])->name('getToken');

Route::get('/viewBanner', [superAdminController::class, 'viewBanner'])->name('viewBanner');
Route::get('/viewProductDetail', [adminController::class, 'viewProductDetails'])->name('viewProductDetail');
Route::get('/viewEvent', [superAdminController::class, 'viewEvent'])->name('viewEvent');
Route::get('/viewGallery', [superAdminController::class, 'viewGallery'])->name('viewGallery');
Route::get('/viewTeam', [superAdminController::class, 'viewTeam'])->name('viewTeam');
Route::get('/viewTestimonial', [superAdminController::class, 'viewTestimonial'])->name('viewTestimonial');
Route::get('/viewDynamicTableDetails', [superAdminController::class, 'viewDynamicTableDetails'])->name('viewDynamicTableDetails');
Route::get('/plainTextMail', [superAdminController::class, 'plainTextMail'])->name('plainTextMail');
Route::get('/htmlTextMail', [superAdminController::class, 'htmlTextMail'])->name('htmlTextMail');
Route::get('/sendAttachedMail', [superAdminController::class, 'sendAttachedMail'])->name('sendAttachedMail');
Route::Post('/super-admin/restoreAdmin', [superAdminController::class, 'restoreAdmin'])->name('restoreAdmin');
Route::Post('/super-admin/sendWhatsSMSUsingCurl', [superAdminController::class, 'sendWhatsSMSUsingCurl'])->name('sendWhatsSMSUsingCurl');


// supper admin routes
Route::group(['prefix' => 'super-admin', 'middleware' => ['auth:sanctum', 'isSuperAdmin']], function () {
    // admin CRUD start
    Route::post('/create-admin', [superAdminController::class, 'createAdmin'])->name('superAdminCreateAdmin');
    Route::get('/viewAllAdmin', [superAdminController::class, 'viewAllAdmin'])->name('superAdminViewAllAdmin');
    Route::Post('/updateAdmin', [superAdminController::class, 'updateAdmin'])->name('updateAdmin');
    Route::Post('/deleteAdmin', [superAdminController::class, 'deleteAdmin'])->name('deleteAdmin');
    // admin CRUD end

    // banner CRUD start
    Route::post('/addBanner', [superAdminController::class, 'addBanner'])->name('superAdminAddBanner');
    Route::get('/viewBanner', [superAdminController::class, 'viewBanner'])->name('superAdminViewBanner');
    Route::Post('/updateBanner', [superAdminController::class, 'updateBanner'])->name('updateBanner');
    Route::Post('/deleteBanner', [superAdminController::class, 'deleteBanner'])->name('deleteBanner');
    // banner CRUD end

    // Event CRUD start
    Route::post('/addEvent', [superAdminController::class, 'addEvent'])->name('superAdminAddEvent');
    Route::get('/viewEvent', [superAdminController::class, 'viewEvent'])->name('superAdminViewEvent');
    Route::Post('/updateEvent', [superAdminController::class, 'updateEvent'])->name('updateEvent');
    Route::Post('/deleteEvent', [superAdminController::class, 'deleteEvent'])->name('deleteEvent');
    // Event CRUD end


    // Gallery CRUD start
    Route::post('/addGallery', [superAdminController::class, 'addGallery'])->name('superAdminAddGallery');
    Route::get('/viewGallery', [superAdminController::class, 'viewGallery'])->name('superAdminViewGallery');
    Route::Post('/updateGallery', [superAdminController::class, 'updateGallery'])->name('updateGallery');
    Route::Post('/deleteGallery', [superAdminController::class, 'deleteGallery'])->name('deleteGallery');
    // Gallery CRUD end

    // Team CRUD start
    Route::post('/addTeam', [superAdminController::class, 'addTeam'])->name('superAdminAddTeam');
    Route::get('/viewTeam', [superAdminController::class, 'viewTeam'])->name('superAdminViewTeam');
    Route::Post('/updateTeam', [superAdminController::class, 'updateTeam'])->name('updateTeam');
    Route::Post('/deleteTeam', [superAdminController::class, 'deleteTeam'])->name('deleteTeam');
    // Team CRUD end

    // Testimonial CRUD start
    Route::post('/addTestimonial', [superAdminController::class, 'addTestimonial'])->name('superAdminAddTestimonial');
    Route::get('/viewTestimonial', [superAdminController::class, 'viewTestimonial'])->name('superAdminViewTestimonial');
    Route::Post('/updateTestimonial', [superAdminController::class, 'updateTestimonial'])->name('updateTestimonial');
    Route::Post('/deleteTestimonial', [superAdminController::class, 'deleteTestimonial'])->name('deleteTestimonial');
    // Testimonial CRUD end

    Route::post('/addDynamicTableDetails', [superAdminController::class, 'addDynamicTableDetails'])->name('superAdminAddDynamicTableDetails');
    Route::get('/viewDynamicTableDetails', [superAdminController::class, 'viewDynamicTableDetails'])->name('superAdminViewDynamicTableDetails');
    Route::Post('/updateDynamicTableDetails', [superAdminController::class, 'updateDynamicTableDetails'])->name('updateDynamicTableDetails');
    Route::Post('/deleteDynamicTableDetails', [superAdminController::class, 'deleteDynamicTableDetails'])->name('deleteDynamicTableDetails');


    Route::Post('/testDataAdd', [superAdminController::class, 'testDataAdd'])->name('testDataAdd');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'isAdmin']], function(){
    Route::post('/addProductDetails', [adminController::class, 'addProductDetails'])->name('addProductDetails');
    Route::get('/viewProductDetails', [adminController::class, 'viewProductDetails'])->name('viewProductDetails');
    Route::post('/updateProductDetails', [adminController::class, 'updateProductDetails'])->name('updateProductDetails');
    Route::post('/deleteProductDetails', [adminController::class, 'deleteProductDetails'])->name('deleteProductDetails');
    // Route::get('/logout', [authController::class, 'logout'])->name('logout');    
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [authController::class, 'logout'])->name('logout');
});
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\LogRegisterController;
use App\Http\Controllers\PropertyListingController;
use App\Http\Controllers\PropertyAlertController;
use App\Http\Controllers\PropertyCompareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MortgageCalculatorController;
use App\Http\Controllers\ManageProfileController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\UserqueryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AjaxRequestMiddleware;

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
Route::middleware('auth')->group(function(){
    Route::resource('/property',PropertyController::class);
    Route::resource('/alertproperty',PropertyAlertController::class);
    Route::get('/logout',[LogRegisterController::class,'logout']);
    Route::get('/userprofile',[ManageProfileController::class,'index']);
    Route::get('/profile-edit',[ManageProfileController::class,'editProfile']);
    Route::put('/update-user',[ManageProfileController::class,'updateProfile']);
    Route::get('/user-property-show',[ManageProfileController::class,'userPropertyShow']);
    Route::post('/contact-agent/{property}',[UserqueryController::class,'userQuery']);
    Route::get('/userquery-show',[UserqueryController::class,'userQueryShow']);
    Route::delete('/user-query/{query}',[UserqueryController::class,'userQueryDelete']);
    Route::get('/user-query/{id}/reply',[UserqueryController::class,'userQueryReply']);
    Route::post('/sendcustomerquery-mail/{id}',[UserqueryController::class,'userSendMail']);
    Route::middleware(['permission:customer view'])->group(function () {
        Route::get('/userdetail',[AdminController::class,'index']);
        Route::delete('/user-delete/{id}',[AdminController::class,'userDelete']);
    });
    Route::middleware(['permission:approval view'])->group(function () {
        Route::get('/approve/property',[AdminController::class,'approvePropertyPage']);
        Route::get('/property/{id}/approve',[AdminController::class,'approveProperty']);
        Route::post('/property/{id}/unapprove/{userid}',[AdminController::class,'approveUnProperty']);
    });
   
    Route::middleware(['ajax'])->group(function () {
        Route::post('/property/review',[PropertyController::class,'storeReview'])->name('property.review');
       
    });
    Route::post('/property/favorite',[PropertyController::class,'storeFavorite'])->name('property.favorite');
    Route::post('/userproperty/favorite',[PropertyController::class,'userstoreFavorite'])->name('user.property.favorite');
    Route::get('/user-unapproval/property',[AdminController::class,'userUnApproveProperty']);
    Route::get('/property-listing/favorite',[PropertyListingController::class,'viewFavoriteProperty']);
    Route::post('/property/custom/compare',[PropertyListingController::class,'customCompare']);
    Route::get('checkout',[CheckoutController::class,'checkout']);
Route::post('checkout',[CheckoutController::class,'afterpayment'])->name('checkout.credit-card');



});

Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::get('/property-listing',[PropertyListingController::class,'propertyListing']);
Route::post('/property/customfilter',[PropertyListingController::class,'propertyCustomFilter']);
Route::post('/property/search',[PropertyListingController::class,'propertySearch']);
Route::get('/property/{property}/view',[PropertyListingController::class,'propertyView']);
Route::get('/compare',[PropertyListingController::class,'propertyCompareView']);
Route::post('/compare-property',[PropertyListingController::class,'propertyCompareShow']);


Route::middleware('guest')->group(function() {
    Route::get('/register',[LogRegisterController::class,'registerView']);
    Route::get('/login',[LogRegisterController::class,'loginView'])->name('login');
    Route::post('/userregister',[LogRegisterController::class,'register']);
    Route::post('/userlogin',[LogRegisterController::class,'login']);
});
// Route::post('/calculate-mortgage', [MortgageCalculatorController::class, 'calculateMortgage'])->name('calculate-mortgage');


// routes/web.php

Route::post('/property/rate',[PropertyController::class,'storeRating'])->name('store.rating');
Route::post('/property/review',[PropertyController::class,'storeReview'])->name('property.review');
Route::get('/alertproperty/notify',[PropertyController::class,'alertNotify']);
Route::get('/get',[PropertyController::class,'alert']);
Route::get('/',[HomeController::class,'index']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/agent',[HomeController::class,'agent']);
Route::get('/sitemap',[HomeController::class,'siteMap']);




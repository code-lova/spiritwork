<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cleared!";
});

Auth::routes();

// route for email verification code
Route::get('/verification', [App\Http\Controllers\Auth\RegisterController::class, 'verifyPage']);
Route::post('/verification', [App\Http\Controllers\Auth\RegisterController::class, 'verifyNow'])->name('verifyuser');


//Handling The Form Submission and returning a success message
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('custom.password.email');

//Updating the Users password
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(\App\Http\Controllers\Homepage\HomePageController::class)->group(function (){
    Route::get('/', 'index')->name('homepage');

    Route::get('/about-us', 'aboutUs')->name('about.us');

    Route::get('/contact-us', 'contactUs')->name('contact.us');

    Route::get('/property', 'propertyPage')->name('properties');

    Route::get('/property-details/{catslug}/{propertyslug}', 'propertyDetailsPage')->name('properties.detail');

    Route::get('privacy-policy', 'PrivacyPolicy')->name('privacy.policy');

    Route::get('terms-conditions', 'termsPage')->name('terms');

    Route::get('agreement', 'agreementPage')->name('agreement');

    Route::get('/properties/filter', 'filter')->name('property.filter');

    Route::post('/schedule-tour', 'storeTourBooking')->name('tour.schedule');


});


Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::controller(App\Http\Controllers\User\UserController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('user.dashboard');

        Route::delete('/delete-property/{id}', 'deleteProperty')->name('user.property.destroy');

        Route::get('/reports', 'allReport')->name('user.reports');
        Route::get('/create-reports', 'createReport')->name('user.create.reports');
        Route::post('/create-reports', 'storeReport')->name('user.store.reports');

        Route::get('/edit-report/{report}', 'EditReport')->name('edit.user.report');
        Route::put('/update-report/{report}', 'updateReport')->name('update.user.report');
        Route::delete('/report/{report}', 'deleteReport')->name('reports.destroy');
        Route::get('/report-image/{report}', 'deleteReportImg')->name('delete.report.image');

        Route::get('/report-reply/{report_id}', 'fetchReply')->name('user.report.reply');

        Route::get('/profile', 'UserAccount')->name('user.profile');
        Route::put('/profile', 'UpdateProfile')->name('user.update.profile');
        Route::put('/update-password}', 'UpdatePassword')->name('user.update.password');

        Route::get('/agreement', 'userAgreement')->name('user.agreement');
        Route::post('/agreement', 'storeAgreement')->name('user.agreement.store');
        Route::get('/sign-agreement/{uuid}', 'signAgreement')->name('user.agreement.signature');
        Route::put('/sign-agreement', 'submitUpdateAgreement')->name('user.agreement.submit');

        //View user agreement
        Route::get('/view-agreement/{uuid}', 'viewAgreement')->name('user.view.agreement');




    });
});


//Group Route for Admin Profile
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);



    Route::controller(\App\Http\Controllers\Admin\ResidentController::class)->group(function (){
        Route::get('residents', 'residentPage')->name('residents');
        Route::get('/edit-resident/{id}', 'EditUser');
        Route::get('/block-resident/{id}', 'BlockResident');
        Route::get('/unblock-resident/{id}', 'UnBlockResident');
        Route::post('/destroy-resident/{id}', 'destroyResident');
        Route::get('/verify-identity/{id}', 'verifyIdentity');
        Route::get('/unverify-identity/{id}', 'UnverifyIdentity');

    });


    //Product Category controller
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {

        // Main Category
        Route::get('/category', 'index')->name('category');
        Route::post('/category', 'StoreCategory');
        Route::put('/category/{id}', 'EditCategory');
        Route::delete('/delete-category/{id}', 'destroyCat');

    });

    Route::controller(App\Http\Controllers\Admin\PropertyController::class)->group(function (){
        Route::get('/properties', 'index')->name('admin.properties');
        Route::get('/property', 'CreateProperty')->name('add.property');
        Route::post('/property', 'StoreProperty');
        Route::get('/property/{propertyId}/edit', 'EditProperty')->name('property.edit');
        Route::put('/property/{propertyId}', 'UpdateProperty');
        Route::get('/property/{productId}/delete', 'DestroyProperty');
        Route::get('/property-image/{productImageId}/delete', 'DestroyPropertyImage');
    });


    Route::controller(App\Http\Controllers\Admin\ReportController::class)->group(function (){
        Route::get('/report', 'index')->name('report');
        Route::post('/report', 'replyReport');

        //implement view and route for replied report

    });


    Route::controller(App\Http\Controllers\Admin\SettingsController::class)->group(function () {
        Route::get('/site-setting', 'index')->name('settings');
        Route::post('/store_site_setting', 'StoreSiteSettings');

        //On and Off settings
        //Route::get('/on-ff-setting', 'SwitcherSettings');

        Route::get('/payment-method', 'paymentFunction')->name('admin.payment.method');
        Route::post('/add-paymentmethod', 'StorePaymentMethod');
        Route::delete('/delete-payemntmehod/{payment_id}', 'DestroyPayment');
        Route::put('/edit-payment/{payment_id}','UpdatePayment');


        //Logo and favicon
        Route::get('/logo-favicon', 'logoPage')->name('admin.logos');
        Route::post('store-logofav', 'StoreLogofav')->name('admin.store.logos');

    });

    Route::controller(App\Http\Controllers\Admin\FrontendController::class)->group(function () {
        Route::get('/gallery', 'galleryPagx')->name('gallery');
        Route::post('/gallery', 'Store');

        //Slider settings
        Route::get('/slider-settings', 'sliderPage')->name('hero.slider');
        Route::post('/store-slider', 'StoreTopSlider');

        //About Us Page
        Route::get('/about-us', 'AboutusPage')->name('admin.about.us');
        Route::post('/store-about', 'StoreAbout');


        //Terms and services page setting
        Route::get('/privacy', 'PrivacyPolicy')->name('admin.privacy');
        Route::post('/store-privacy', 'StorePrivacy');

        //Terms and services page setting
        Route::get('/terms_services', 'TermsServices')->name('admin.terms');
        Route::post('/store-terms', 'StoreTerms');

        Route::get('/agreeent-doc', 'agreementDoc')->name('admin.agreement.doc');

    });


    Route::controller(App\Http\Controllers\Admin\AgreementController::class)->group(function (){
        Route::get('/agreenents', 'index')->name('admin.agreement');

        Route::get('/generate-agreement/{id}', 'generateAgreement')->name('admin.generate.agreement');

        Route::put('/agreenents/{agreement}', 'updatePaymentStatus')->name('admin.update.payment.status');

    });


});


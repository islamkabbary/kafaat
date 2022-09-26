<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

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

define('CODE_LENGTH', 4);

Auth::routes();

Route::post('/verifyCodes', 'UserController@checkCodes')->name('verification');
Route::post('/verifyCodes2', 'UserController@checkCodes2')->name('verification2');

Route::post('/RegisterUser', 'UserController@RegisterUsers')->name('registerUser');

Route::post('/resendCodeForUser/{phone}', 'UserController@resendCode')->name('resendCodes');

Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');
Route::get('/admin/logout', 'Auth\LoginController@adminLogout')->name('admin-logout');
Route::get('/admin/login', 'Auth\LoginController@showAdminLoginForm')->name('admin-login');
Route::group(['middleware' => 'admin-auth', 'prefix' => 'admin', 'namespace' => 'admin'], function () {
    Route::get('/', 'DashboardController@dashboard');
    //Achievements CRUD System
    Route::get('/achievements', 'AchievementController@index')->name('achievements.index');
    Route::get('/achievements/create', 'AchievementController@create')->name('achievements.create');
    Route::get('/achievements/edit/{id}', 'AchievementController@edit')->name('achievements.edit');
    Route::get('/achievements/delete/{id}', 'AchievementController@destroy')->name('achievements.destroy');

    Route::group(['middleware' => 'optimizeImages'], function () {
        Route::post('/achievements/store', 'AchievementController@store')->name('achievements.store');
        Route::put('/achievements/update/{id}', 'AchievementController@update')->name('achievements.update');
    });
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/create', 'UsersController@create')->name('users.create');
    Route::post('/users/store', 'UsersController@store')->name('users.store');
    Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::get('/users/delete/{id}', 'UsersController@destroy')->name('users.destroy');
    Route::put('/users/update/{id}', 'UsersController@update')->name('users.update');

    Route::get('/admins', 'AdminsController@index')->name('admins.index');
    Route::get('/admins/create', 'AdminsController@create')->name('admins.create');
    Route::post('/admins/store', 'AdminsController@store')->name('admins.store');
    Route::get('/admins/edit/{id}', 'AdminsController@edit')->name('admins.edit');
    Route::get('/admins/delete/{id}', 'AdminsController@destroy')->name('admins.destroy');
    Route::put('/admins/update/{id}', 'AdminsController@update')->name('admins.update');

    //Ads CRUD System
    Route::get('/ads', 'AdsController@index')->name('ads.index');
    Route::get('/ads/create', 'AdsController@create')->name('ads.create');
    Route::get('/ads/edit/{id}', 'AdsController@edit')->name('ads.edit');
    Route::get('/ads/delete/{id}', 'AdsController@destroy')->name('ads.destroy');
    Route::get('/ads/hide/{id}', 'AdsController@hide')->name('ads.hide');

    Route::group(['middleware' => 'optimizeImages'], function () {
        Route::post('/ads/store', 'AdsController@store')->name('ads.store');
        Route::put('/ads/update/{id}', 'AdsController@update')->name('ads.update');
    });

    Route::get('/ads-messages', 'AdsMessageController@index')->name('ads-messages.index');
    Route::get('/ads-messages/create', 'AdsMessageController@create')->name('ads-messages.create');
    Route::post('/ads-messages', 'AdsMessageController@store')->name('ads-messages.store');
    Route::get('/ads-messages/show/{id}', 'AdsMessageController@show')->name('ads-messages.show');
    Route::get('/getPhoneOfUser/{id}', 'AdsMessageController@getPhoneOfUser');


    //Business_Area CRUD System
    Route::get('/business_area', 'BusinessAreaController@index')->name('business_area.index');
    Route::get('/business_area/create', 'BusinessAreaController@create')->name('business_area.create');
    Route::get('/business_area/edit/{id}', 'BusinessAreaController@edit')->name('business_area.edit');
    Route::get('/business_area/delete/{id}', 'BusinessAreaController@destroy')->name('business_area.destroy');

    Route::group(['middleware' => 'optimizeImages'], function () {
        Route::post('/business_area/store', 'BusinessAreaController@store')->name('business_area.store');
        Route::put('/business_area/update/{id}', 'BusinessAreaController@update')->name('business_area.update');
    });

    Route::get('/about_us', 'PageController@aboutSections')->name('about_us.index');
    Route::get('/about_us/edit/{section_id}', 'PageController@edit')->name('about_us.edit');
    Route::post('/about_us/edit/{section_id}', 'PageController@edit')->name('about_us.update');

    Route::get('/pages', 'PageController@pages')->name('pages.index');
    Route::get('/page/edit/{page_id}', 'PageController@page_edit')->name('page.edit');
    Route::post('/page/edit/{page_id}', 'PageController@page_edit')->name('page.update');
    //Contacts CRUD System
    Route::get('/contacts', 'ContactController@index')->name('contacts.index');
    Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');
    Route::post('/contacts/store', 'ContactController@store')->name('contacts.store');
    Route::get('/contacts/show/{id}', 'ContactController@show')->name('contacts.show');
    Route::get('/contacts/edit/{id}', 'ContactController@edit')->name('contacts.edit');
    Route::put('/contacts/update/{id}', 'ContactController@update')->name('contacts.update');
    Route::get('/contacts/delete/{id}', 'ContactController@destroy')->name('contacts.destroy');
    Route::post('/contacts/replay', 'ContactController@replay')->name('contacts.replay');

    //coupons
    Route::get('/coupons', 'CouponController@index')->name('coupons.index');
    Route::get('/coupons/create', 'CouponController@create')->name('coupons.create');
    Route::get('/coupons/show/{id}', 'CouponController@show')->name('coupons.show');
    Route::get('/coupons/edit/{id}', 'CouponController@edit')->name('coupons.edit');
    Route::get('/coupons/delete/{id}', 'CouponController@destroy')->name('coupons.destroy');

    Route::group(['middleware' => 'optimizeImages'], function () {
        Route::post('/coupons/store', 'CouponController@store')->name('coupons.store');
        Route::put('/coupons/update/{id}', 'CouponController@update')->name('coupons.update');
    });
    // subscriptions

    Route::get('/subscriptions', 'SubscriptionController@index')->name('subscriptions.index');
    Route::get('/subscriptions/show/{id}', 'SubscriptionController@show')->name('subscriptions.show');
    Route::get('/subscriptions/delete/{id}', 'SubscriptionController@destroy')->name('subscriptions.destroy');

    // certificates

    Route::get('/certificates', 'CertificateController@index')->name('certificates.index');
    Route::get('/certificates/show/{id}', 'CertificateController@show')->name('certificates.show');
    Route::get('/certificates/delete/{id}', 'CertificateController@destroy')->name('certificates.destroy');
    Route::get('/certificatesRequested', 'CertificateController@indexCertificateRequested')->name('certificatesRequested');
    Route::get('/certificates/extract/{id}', 'CertificateController@extract')->name('certificates.extract');

    Route::group(['middleware' => 'optimizeImages'], function () {
        Route::put('/certificates/update/{id}', 'CertificateController@update')->name('certificates.update');
    });

    //courses CRUD System

    Route::get('/courses', 'CourseController@index')->name('courses.index');
    Route::get('/courses/purchased/20212120', 'CourseController@purchasedCourses')->name('courses.purchased');
    Route::get('/courses/students/{course_id}', 'CourseController@courseStudents')->name('courses.students');
    Route::get('/courses/date-expired/msfa20212120', 'CourseController@expiredCourses')->name('courses.expired');




    Route::get('/courses/create', 'CourseController@create')->name('courses.create');
    Route::get('/courses/edit/{id}', 'CourseController@edit')->name('courses.edit');
    // Route::get('/courses/copy/{id}', 'CourseController@copyToNewCourse')->name('courses.copy');
    Route::get('/courses/show/{id}', 'CourseController@show')->name('courses.show');;
    Route::get('/courses/delete/{id}', 'CourseController@destroy')->name('courses.destroy');
    Route::get('/courses/hide/{id}', 'CourseController@hide')->name('courses.hide');
    Route::group(['middleware' => 'optimizeImages'], function () {
        Route::post('/courses/store', 'CourseController@store')->name('courses.store');
        Route::put('/courses/update/{id}', 'CourseController@update')->name('courses.update');

        Route::post('/courses/copy/{id}', 'CourseController@copyToNewCourse')->name('courses.copy');
    });
    Route::get('/course/content_media/delete/{id}', 'CourseController@courseContentMediaDelete');
    Route::get('/course/media/delete/{id}', 'CourseController@courseMediaDelete');


    //services CRUD System
    Route::get('/services', 'ServiceController@index')->name('services.index');
    Route::get('/services/orders', 'ServiceController@orders')->name('services.orders');
    Route::get('/services/orders/delete/{id}', 'ServiceController@orderDelete')->name('services.orders.delete');
    Route::get('/services/orders/edit/{id}', 'ServiceController@orderEdit')->name('services.orders.edit');
    Route::put('/services/orders/update/{id}', 'ServiceController@orderUpdate')->name('services.orders.update');
    Route::get('/services/orders/show/{id}', 'ServiceController@orderShow')->name('services.orders.show');

    Route::get('/services/create', 'ServiceController@create')->name('services.create');
    Route::get('/services/edit/{id}', 'ServiceController@edit')->name('services.edit');
    Route::get('/services/delete/{id}', 'ServiceController@destroy')->name('services.destroy');

    //    Route::group(['middleware' => 'optimizeImages'] ,function () {
    Route::post('/services/store', 'ServiceController@store')->name('services.store');
    Route::put('/services/update/{id}', 'ServiceController@update')->name('services.update');


    //    });

    Route::get('/specialists', 'SpecialistController@index');
    Route::get('/specialist/create', 'SpecialistController@create');
    Route::get('/specialist/edit/{id}', 'SpecialistController@edit');
    Route::get('/specialist/delete/{id}', 'SpecialistController@destroy');

    Route::group(['middleware' => 'optimizeImages'], function () {
        Route::post('/specialist/store', 'SpecialistController@store');
        Route::put('/specialist/update/{id}', 'SpecialistController@update');
    });

    //HeadQuartersCourse CRUD System
    Route::get('/headquarterCourse', 'HeadQuartersCourseController@index')->name('headquarterCourse.index');
    Route::get('/headquarterCourse/create', 'HeadQuartersCourseController@create')->name('headquarterCourse.create');
    Route::post('/headquarterCourse/store', 'HeadQuartersCourseController@store')->name('headquarterCourse.store');
    Route::get('/headquarterCourse/edit/{id}', 'HeadQuartersCourseController@edit')->name('headquarterCourse.edit');
    Route::put('/headquarterCourse/update/{id}', 'HeadQuartersCourseController@update')->name('headquarterCourse.update');
    Route::get('/headquarterCourse/delete/{id}', 'HeadQuartersCourseController@destroy')->name('headquarterCourse.destroy');

    //OnlineCourse CRUD System
    Route::get('/onlineCourse', 'OnlineCoursesController@index')->name('onlineCourse.index');
    Route::get('/onlineCourse/create', 'OnlineCoursesController@create')->name('onlineCourse.create');
    Route::post('/onlineCourse/store', 'OnlineCoursesController@store')->name('onlineCourse.store');
    Route::get('/onlineCourse/edit/{id}', 'OnlineCoursesController@edit')->name('onlineCourse.edit');
    Route::put('/onlineCourse/update/{id}', 'OnlineCoursesController@update')->name('onlineCourse.update');
    Route::get('/onlineCourse/delete/{id}', 'OnlineCoursesController@destroy')->name('onlineCourse.destroy');

    Route::get('/partners', 'PartnerController@index')->name('partners.index');
    Route::get('/partners/create', 'PartnerController@create')->name('partners.create');
    Route::post('/partners/store', 'PartnerController@store')->name('partners.store');
    Route::get('/partners/edit/{id}', 'PartnerController@edit')->name('partners.edit');
    Route::put('/partners/update/{id}', 'PartnerController@update')->name('partners.update');;
    Route::get('/partners/delete/{id}', 'PartnerController@destroy')->name('partners.delete');

    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::put('/settings/update', 'SettingController@updateSettings')->name('settings.update');
    Route::get('/bank_transactions', 'CourseController@bankTransactions')->name('bank_transaction-checkout');
    Route::get('/bank_transaction/receipt/{id}', 'CourseController@bankTransactionReceipt')->name('bank_transaction-receipt');
    Route::get('/bank_transaction/confirm/{id}', 'CourseController@bankTransactionConfirm')->name('bank_transaction-confirm');
    Route::get('/credit_transactions', 'CourseController@creditTransactions')->name('credit_transaction-checkout');
});

// Courses Routes - (USER ROUTES)
Route::group(['namespace' => 'user'], function () {
    Route::get('courses', 'CourseController@courses');
    Route::get('course-details/{course_id}', 'CourseController@courseDetails')->name('course-details');
    Route::get('course-details2/{course_id}', 'CourseController@courseDetails2')->name('course-details2');
    Route::get('/page/policy_privacy/ABCLOBBY2021/P_0{page_id}', 'HomeController@pages');
    Route::get('/getDataCourse', 'CourseController@getDataOfCourse');
    Route::get('/getAllCourseAjax', 'CourseController@getAllCoursesAjax');
    Route::get('/showPageEnroll/{id}', 'CourseController@checkOut');
    Route::get('/storeCartFromCourse/{course_id}', 'CourseController@addToCart');
    Route::post('/storeCourseStudent', 'CourseController@storeStudentCourse')->name('storeCourseStd');
    Route::get('/', 'HomeController@index');
    Route::get('business-areas', 'BusinessAreaController@index');
    Route::get('business-areas/{id}', 'BusinessAreaController@getBusinessAreaById');
    Route::get('/about-us', 'HomeController@aboutUs');
    Route::get('achievements', 'AchievementController@index');
    Route::get('/achievementDetails/{id}', 'AchievementController@achievementDetails');
    Route::get('contact', 'ContactController@contact');
    Route::post('contact', 'ContactController@storeContact')->name('userContact');
    Route::post('contactFooter', 'ContactController@storeContactFooter')->name('userContactFooter');
    Route::get('services', 'ServiceController@services');
    Route::get('service-details/{service_id}', 'ServiceController@getServiceById');
    Route::post('service-order', 'ServiceController@serviceOrder')->name('service-order');
    Route::get('subscribe', 'SubscriptionController@subscribe');
    Route::get('specialist-id/courses/{specialist_id}', 'CourseController@specialistCourses');
    Route::get('type-id/courses/{type_id}', 'CourseController@typeCourses');
    Route::get('/advertisementDetails/{ads_id}', 'AdvertisementController@getAdsDetails');
    Route::get('/partners', 'PartnerController@index');
    Route::get('/getTypeOfAchievements/{type}', 'AchievementController@getAchievementWithType');
    Route::get('/getAllAchievementsAjax', 'AchievementController@getAllAchievementAjax');
    Route::post('/subscribeForUsers', 'HomeController@subscribeForWebsite')->name('subscribeUser');
    Route::get('courses/filter/byTags/{by}', 'CourseController@filterCoursesByType');
    Route::post('courses/filter', 'CourseController@filterCourses');
    Route::post('courses/filter/date_from_to', 'CourseController@filterCoursesByDate');
    Route::get('/getAchievementWithHisType/{type}', 'HomeController@getAchievementsWihtHisType');
    Route::post('/fast/register/guest', 'CourseController@fastRegister');
    Route::get('/pay/status/{checkoutWizard}/{ids}', 'CourseController@coursePaymentConfirm')->name('pay-status');
    Route::get('/pay2/status/{checkoutWizard}/{ids}', 'CourseController@coursePaymentConfirm2');
    Route::post('/bank_transaction/checkout/{ids}', 'CourseController@courseBankTransctionConfirm')->name('pay-status2');
    Route::get('/getCouponsForUsers/{code}', 'CourseController@couponsForUser');

    Route::group(['middleware' => 'auth'], function () {
        //        Route::get('course-enroll' , 'CourseController@courseEnrollment')->name('course-enroll');
        Route::get('add-to-cart', 'CartController@pushToCart')->name('add-to-cart');
        Route::get('profile', 'ProfileController@profile');
        Route::post('profile/update', 'ProfileController@updateUserInfo')->name('update-user-info');
        Route::get('/my-courses', 'CourseController@myCourses');

        Route::get('/deleteCourseFromMyCourses/{course_id}', 'CourseController@removeCourseFromMyCourses');
        Route::get('/finished-courses', 'CourseController@coursesFinished');
        Route::get('/favourites-courses', 'CourseController@favouriteCourses');
        Route::get('/storeFavourites/{course_id}', 'CourseController@addToFavourites');
        Route::get('/removeFavs/{course_id}', 'CourseController@removeFavourites');
        Route::get('/getFavouritesJavascripts', 'CourseController@getFavouritesForUserJavascript');
        Route::get('/getCourseFromFavouritesPay/{course_id}', 'CourseController@buyFromFavourite');
        Route::get('/allCoursesFavourites', 'CourseController@getAllFavouriteCourses');
        Route::get('/cart-courses', 'CourseController@getCoursesInCart');
        Route::get('/cartsNoProfile', 'CourseController@getCartWithoutProfile');
        Route::post('/getCertificateToAdmin', 'CourseController@postCertificateAdmin');
        Route::get('/checkCertificates/{course_id}', 'CourseController@checkIfCertificateRequested');
        Route::get('/checkIfFilePdfOrLink/{id}', 'CourseController@checkIfPdfOrLinkDownload');
        Route::get('/pageDownload/{course_id}', 'CourseController@openPageDownload');
        Route::get('/downloadCertificateUsers/{id}', 'CourseController@DownloadCertificates');
        Route::post('/postNewPaymentCourses', 'CourseController@addNewPaymentCourses')->name('addToPayments');
        Route::get('/checkIfCourseInThere/{course_id}', 'CourseController@checkIfCourseInPaymentList');
        Route::get('/getPaymentForCourses', 'CourseController@getPaymentListCourses')->name('getListOfPayments');
        Route::get('/deleteCourseFromPaymentList/{course_id}', 'CourseController@removeCoursesFromPaymentList');

        Route::get('/getTypeOfCourseInProfile/{type_id}', 'CourseController@getCoursesType');
    });
    Route::get('logs', [LogViewerController::class, 'index']);
});

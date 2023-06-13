<?php

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
Route::get('/login',[\App\Http\Controllers\AuthController::class,'index'])->name('login');
Route::post('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login.authenticate');
Route::get('/forgot-password',[\App\Http\Controllers\AuthController::class,'forgot_request'])->name('password.request');
Route::post('/forgot-password',[\App\Http\Controllers\AuthController::class,'forgot_password'])->name('password.email');
Route::get('/reset-password/{token}',[\App\Http\Controllers\AuthController::class,'reset_password'] )->name('password.reset');
Route::post('/reset-password/',[\App\Http\Controllers\AuthController::class,'password_update'] )->name('password.update');
Route::get('/logout/',[\App\Http\Controllers\AuthController::class,'logout'] )->name('logout');
Route::get('/privacy-policy',  [\App\Http\Controllers\GuidelineController::class, 'privacyPolicy']);
Route::get('/fb-data-deletion',  [\App\Http\Controllers\GuidelineController::class, 'fbDataDeletion']);
Route::get('/about',  [\App\Http\Controllers\GuidelineController::class, 'about']);

Route::group(['middleware'=> ['auth:admin']],function() {
    Route::get('/',  [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/',  [\App\Http\Controllers\UserController::class, 'index'])->name('index');
        Route::get('/viewload',  [\App\Http\Controllers\UserController::class, 'viewload'])->name('viewload');
        Route::delete('/delete/{id}',  [\App\Http\Controllers\UserController::class, 'delete'])->name('delete');
        Route::post('/disable/{id}',  [\App\Http\Controllers\UserController::class, 'disable'])->name('disable');
        Route::post('/activate/{id}',  [\App\Http\Controllers\UserController::class, 'activate'])->name('activate');

        Route::get('/list_ajax/',  [\App\Http\Controllers\UserController::class, 'users_ajax'])->name('ajax');
    });
    Route::prefix('challenges')->name('challenges.')->group(function () {
        Route::get('/',  [\App\Http\Controllers\ChallengeController::class, 'index'])->name('index');
        Route::post('/create',  [\App\Http\Controllers\ChallengeController::class, 'create'])->name('create');
        Route::get('/list',  [\App\Http\Controllers\ChallengeController::class, 'challengeList'])->name('list');
        Route::post('/disable/{id}',  [\App\Http\Controllers\ChallengeController::class, 'disable'])->name('disable');
        Route::post('/activate/{id}',  [\App\Http\Controllers\ChallengeController::class, 'activate'])->name('activate');
        Route::delete('/delete/{id}',  [\App\Http\Controllers\ChallengeController::class, 'delete'])->name('delete');
    });
    Route::prefix('support')->name('support.')->group(function () {
        Route::get('/',  [\App\Http\Controllers\SupportController::class, 'index'])->name('index');
        Route::get('/get',  [\App\Http\Controllers\SupportController::class, 'get'])->name('get');
        Route::post('/sendReply',  [\App\Http\Controllers\SupportController::class, 'sendReply'])->name('reply.submit');
        Route::get('/message/search',  [\App\Http\Controllers\SupportController::class, 'message_search'])->name('message.search');
        Route::get('/load_single_message_list/',  [\App\Http\Controllers\SupportController::class, 'load_single_message_list'])->name('load_single_message_list');
        Route::post('/update_status/',  [\App\Http\Controllers\SupportController::class, 'update_status'])->name('update_status');
    });
    Route::prefix('guidelines')->name('guidelines.')->group(function () {
        Route::get('/',  [\App\Http\Controllers\GuidelineController::class, 'index'])->name('index');
        Route::post('/store-terms-and-condition',  [\App\Http\Controllers\GuidelineController::class, 'store_terms_and_condition'])->name('store.terms_and_condition');
        Route::post('/store-about-us',  [\App\Http\Controllers\GuidelineController::class, 'store_aboutUs'])->name('store.about_us');
        Route::post('/store-faqs',  [\App\Http\Controllers\GuidelineController::class, 'store_faqs'])->name('store.faqs');
    });
    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('/',  [\App\Http\Controllers\SettingController::class, 'index'])->name('index');
        Route::post('/',  [\App\Http\Controllers\SettingController::class, 'store_share_app'])->name('store.share_app');
    });
    Route::post('/profile/update/{id}',  [\App\Http\Controllers\AuthController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/test',  [\App\Http\Controllers\AuthController::class, 'test']);

});

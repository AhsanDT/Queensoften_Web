<?php

use App\Http\Controllers\AuthController;
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
Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/billing',[\App\Http\Controllers\HomeController::class,'billing'])->name('billing');
Route::get('/tutorial',[\App\Http\Controllers\HomeController::class,'tutorial'])->name('tutorial');
Route::get('/story',[\App\Http\Controllers\HomeController::class,'story'])->name('story');
Route::get('/signup',[\App\Http\Controllers\HomeController::class,'signup'])->name('signup');
Route::get('/signin',[\App\Http\Controllers\HomeController::class,'signin'])->name('signin');
Route::get('/product',[\App\Http\Controllers\HomeController::class,'product'])->name('product');
Route::get('/mywallet/{id}',[\App\Http\Controllers\HomeController::class,'mywallet'])->name('mywallet');
Route::get('/reachaudience',[\App\Http\Controllers\HomeController::class,'reachaudience'])->name('reachaudience');
Route::get('/cross-advertisement',[\App\Http\Controllers\HomeController::class,'crossAdvertisement'])->name('cross-advertisement');
Route::get('/performance',[\App\Http\Controllers\HomeController::class,'performance'])->name('performance');
Route::get('/terms',[\App\Http\Controllers\HomeController::class,'terms'])->name('terms');
Route::get('/manageaccount/{id}',[\App\Http\Controllers\HomeController::class,'manageaccount'])->name('manageaccount');
Route::get('/editprofile',[\App\Http\Controllers\HomeController::class,'editprofile'])->name('editprofile');
Route::get('/contactus',[\App\Http\Controllers\HomeController::class,'contactus'])->name('contactus');
Route::post('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login.authenticate');
Route::get('/forgot-password',[\App\Http\Controllers\AuthController::class,'forgot_request'])->name('password.request');
Route::post('/forgot-password',[\App\Http\Controllers\AuthController::class,'forgot_password'])->name('password.email');
Route::get('/reset-password/{token}',[\App\Http\Controllers\AuthController::class,'reset_password'] )->name('password.reset');
Route::post('/reset-password/',[\App\Http\Controllers\AuthController::class,'password_update'] )->name('password.update');
Route::get('/logout/',[\App\Http\Controllers\AuthController::class,'logout'] )->name('logout');
Route::get('/privacy-policy',  [\App\Http\Controllers\GuidelineController::class, 'privacyPolicy']);
Route::get('/fb-data-deletion',  [\App\Http\Controllers\GuidelineController::class, 'fbDataDeletion']);
Route::get('/about',  [\App\Http\Controllers\GuidelineController::class, 'about']);
Route::post('/contact',  [\App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
Route::get('/auth/redirect/{driver}',[AuthController::class,'socialRedirect']);
Route::get('/auth/redirect-apple',[AuthController::class,'socialRedirectApple']);
Route::get('/auth/callback/{driver}',[AuthController::class,'socialCallback']);
Route::any('/auth/callback-apple',[AuthController::class,'socialCallbackApple']);

Route::group(['middleware'=> ['auth:admin']],function() {
    Route::get('/dashboard',  [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/',  [\App\Http\Controllers\UserController::class, 'index'])->name('index');
        Route::get('/premium',  [\App\Http\Controllers\UserController::class, 'premium'])->name('premium');
        Route::get('/viewload',  [\App\Http\Controllers\UserController::class, 'viewload'])->name('viewload');
        Route::delete('/delete/{id}',  [\App\Http\Controllers\UserController::class, 'delete'])->name('delete');
        Route::post('/disable/{id}',  [\App\Http\Controllers\UserController::class, 'disable'])->name('disable');
        Route::post('/activate/{id}',  [\App\Http\Controllers\UserController::class, 'activate'])->name('activate');
        Route::post('/subscription-winner',  [\App\Http\Controllers\SubscriptionWinnerController::class, 'winner'])->name('winner');

        Route::get('/list_ajax/',  [\App\Http\Controllers\UserController::class, 'users_ajax'])->name('ajax');
    });
    Route::prefix('challenges')->name('challenges.')->group(function () {
        Route::get('/',  [\App\Http\Controllers\ChallengeController::class, 'index'])->name('index');
        Route::get('/create',  [\App\Http\Controllers\ChallengeController::class, 'create'])->name('create');
        Route::post('/store',  [\App\Http\Controllers\ChallengeController::class, 'store'])->name('store');
        Route::get('/list',  [\App\Http\Controllers\ChallengeController::class, 'challengeList'])->name('list');
        Route::post('/disable/{id}',  [\App\Http\Controllers\ChallengeController::class, 'disable'])->name('disable');
        Route::post('/activate/{id}',  [\App\Http\Controllers\ChallengeController::class, 'activate'])->name('activate');
        Route::delete('/delete/{id}',  [\App\Http\Controllers\ChallengeController::class, 'delete'])->name('delete');
    });
    Route::prefix('e-store')->name('e-store.')->group(function () {
        Route::get('/',  [\App\Http\Controllers\EStoreController::class, 'index'])->name('index');
        Route::post('deck',[\App\Http\Controllers\EStoreController::class, 'addDeck'])->name('deck');
        Route::get('/design-card',  [\App\Http\Controllers\EStoreController::class, 'designCard'])->name('design-card');
        Route::post('shuffle',[\App\Http\Controllers\EStoreController::class, 'addShuffle'])->name('shuffle');
        Route::get('shuffle-list',[\App\Http\Controllers\EStoreController::class, 'shuffleList'])->name('shuffle-list');
        Route::delete('shuffle-delete/{id}',[\App\Http\Controllers\EStoreController::class, 'shuffleDelete'])->name('shuffle-delete');
        Route::post('joker',[\App\Http\Controllers\EStoreController::class, 'addJoker'])->name('joker');
        Route::get('joker-list',[\App\Http\Controllers\EStoreController::class, 'jokerList'])->name('joker-list');
        Route::delete('joker-delete/{id}',[\App\Http\Controllers\EStoreController::class, 'jokerDelete'])->name('joker-delete');
        Route::post('suit',[\App\Http\Controllers\EStoreController::class, 'addSuit'])->name('suit');
        Route::get('suit-list',[\App\Http\Controllers\EStoreController::class, 'suitList'])->name('suit-list');
        Route::delete('suit-delete/{id}',[\App\Http\Controllers\EStoreController::class, 'suitDelete'])->name('suit-delete');
        Route::post('skin',[\App\Http\Controllers\EStoreController::class, 'addSkin'])->name('skin');
        Route::get('skin-list',[\App\Http\Controllers\EStoreController::class, 'skinList'])->name('skin-list');
        Route::delete('skin-delete/{id}',[\App\Http\Controllers\EStoreController::class, 'skinDelete'])->name('skin-delete');
        Route::post('coin',[\App\Http\Controllers\EStoreController::class, 'addCoin'])->name('coin');
        Route::get('coin-list',[\App\Http\Controllers\EStoreController::class, 'coinList'])->name('coin-list');
        Route::delete('coin-delete/{id}',[\App\Http\Controllers\EStoreController::class, 'coinDelete'])->name('coin-delete');
        Route::post('deck-attachment',[\App\Http\Controllers\EStoreController::class, 'addDeckAttachment'])->name('deck_attachments');
        Route::get('deck-list',[\App\Http\Controllers\EStoreController::class, 'deckList'])->name('deck-list');
        Route::delete('deck-delete/{id}',[\App\Http\Controllers\EStoreController::class, 'deckDelete'])->name('deck-delete');
    });
    Route::prefix('storymode')->name('storymode.')->group(function () {
        Route::get('/',  [\App\Http\Controllers\StoryModeController::class, 'index'])->name('index');
        Route::get('/detail/{id}',  [\App\Http\Controllers\StoryModeController::class, 'storyModeDetail'])->name('detail');
        Route::get('/create',  [\App\Http\Controllers\StoryModeController::class, 'storyModeCreate'])->name('create');
        Route::get('/search',  [\App\Http\Controllers\StoryModeController::class, 'search'])->name('search');
        Route::post('/store',  [\App\Http\Controllers\StoryModeController::class, 'storyModeStory'])->name('store');
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
    Route::prefix('tutorials')->name('tutorials.')->group(function () {
        Route::get('/index',  [\App\Http\Controllers\TutorialController::class, 'index'])->name('index');
        Route::get('/list',  [\App\Http\Controllers\TutorialController::class, 'tutorialsList'])->name('list');
        Route::post('/store',  [\App\Http\Controllers\TutorialController::class, 'store'])->name('store');
        Route::get('/edit/{id}',  [\App\Http\Controllers\TutorialController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',  [\App\Http\Controllers\TutorialController::class, 'update'])->name('update');
        Route::delete('/delete/{id}',  [\App\Http\Controllers\TutorialController::class, 'destroy'])->name('delete');
    });
    Route::prefix('coin-reward')->name('coin-reward.')->group(function () {
        Route::get('/index',  [\App\Http\Controllers\CoinRewardController::class, 'index'])->name('index');
    });
    Route::prefix('spin-wheel')->name('spin-wheel.')->group(function () {
        Route::get('/index',  [\App\Http\Controllers\SpinTheWheelController::class, 'index'])->name('index');
        Route::post('/store',  [\App\Http\Controllers\SpinTheWheelController::class, 'store'])->name('store');
        Route::get('/list',  [\App\Http\Controllers\SpinTheWheelController::class, 'list'])->name('list');
        Route::delete('/delete/{id}',  [\App\Http\Controllers\SpinTheWheelController::class, 'destroy'])->name('delete');
    });
    Route::post('/profile/update/{id}',  [\App\Http\Controllers\AuthController::class, 'profileUpdate'])->name('profile.update');
});

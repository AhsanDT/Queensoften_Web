<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\UserApiController;
//use App\Http\Controllers\Api\AuthController;
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
Route::prefix('v1')->group(function () {
    Route::post('/login', [UserApiController::class, 'login']);
    Route::post('/auth-login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::get('/guidelines', [\App\Http\Controllers\GuidelineController::class, 'guidelines']);
    Route::get('getShareLink', [ShareAppApiController::class, 'getLink']);
    Route::get('/store/items', [\App\Http\Controllers\Api\StoreController::class, 'items']);

    Route::middleware(['auth:sanctum'])->group(function () {

        Route::post('/customer-redirect', [UserApiController::class, 'customerDataDelete']);
        Route::get('/differ-drop-hand/{id}', [UserApiController::class, 'differ']);
        Route::prefix('stats')->group(function () {
            Route::post('/{userId}/create', [\App\Http\Controllers\Api\StatisticsController::class, 'create']);
            Route::get('/{userId}/list/{gameType}', [\App\Http\Controllers\Api\StatisticsController::class, 'list']);
            Route::get('/top-ten', [\App\Http\Controllers\Api\StatisticsController::class, 'topTen']);
        });
        Route::prefix('store')->group(function () {
            Route::get('/{userId}/items', [\App\Http\Controllers\Api\StoreController::class, 'userItems']);
            Route::post('/{userId}/purchase', [\App\Http\Controllers\Api\StoreController::class, 'purchase']);
            Route::post('/{userId}/item/use', [\App\Http\Controllers\Api\StoreController::class, 'itemUse']);
            Route::post('/{userId}/skin/use', [\App\Http\Controllers\Api\StoreController::class, 'skinUse']);
        });
        Route::prefix('user')->group(function (){
           Route::get('/{id}',[UserApiController::class,'getUser']);
           Route::post('/update-password',[UserApiController::class,'updatePassword']);
           Route::post('/update-gamertag',[UserApiController::class,'updateGamerTag']);
           Route::post('/update-profile-image',[UserApiController::class,'updateProfileImage']);
        });
        Route::prefix('challenges')->group(function () {
            Route::get('/list', [\App\Http\Controllers\Api\ChallengeApiController::class, 'list']);
            Route::get('/{userId}/get', [\App\Http\Controllers\Api\ChallengeApiController::class, 'get']);
        });
        Route::prefix('storymode')->group(function () {
            Route::get('/list', [\App\Http\Controllers\Api\StoryModeApiController::class, 'list']);
        });
        Route::prefix('tutorial')->group(function () {
            Route::get('/list', [\App\Http\Controllers\Api\TutorialApiController::class, 'list']);
        });
        Route::prefix('e-store')->group(function () {
            Route::get('/list', [\App\Http\Controllers\Api\EstoreApiController::class, 'list']);
        });
        Route::prefix('subscription')->group(function () {
            Route::get('/list', [\App\Http\Controllers\Api\SubscriptionController::class, 'list']);
            Route::post('/subscribe', [\App\Http\Controllers\Api\SubscriptionController::class, 'subscribe']);
        });
        Route::prefix('achievement')->group(function () {
            Route::get('{userId}/get', [AchievementController::class, 'getAchievement']);
            Route::post('/update', [UserApiController::class, 'achievementUpdate']);
            Route::post('/unlock-check', [UserApiController::class, 'achievementUnlock']);
        });
        Route::prefix('support')->group(function () {
            Route::post('create', [SupportApiController::class, 'create']);
        });
        Route::prefix('spin-wheel')->group(function () {
            Route::get('/this-month/{id}', [SpinWheelApiController::class, 'thisMonth']);
        });
        Route::prefix('reward')->group(function () {
            Route::post('/store', [UserRewardApiController::class, 'store']);
        });
        Route::post('/auth-logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
        Route::post('/add-fund', [WalletApiController::class, 'addFund']);
        Route::post('/buy-coins', [WalletApiController::class, 'buyCoins']);
        Route::post('/buy-estore-item', [WalletApiController::class, 'buyEstoreItem']);
    });
});

//Route::middleware(['auth:sanctum'])->get('/testing', function (Request $request) {
//    dd('here');
//});

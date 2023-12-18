<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TopicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);

});

Route::group(['middleware' => 'api', 'namespace' => 'App\Http\Controllers'], function ($router) {

    // account routes
    Route::post('create/account', [AccountController::class, 'createAccount']);
    Route::get('check/email/exist/{email}', [AccountController::class, 'checkEmailExist']);
    Route::get('check/username/exist/{username}', [AccountController::class, 'checkUsernameExist']);

    // notification routes
    Route::get('get/unread/notifications', [NotificationController::class, 'getUnreadNotifications']);
    Route::get('get/flash/notifications', [NotificationController::class, 'getFlashNotifications']);
    Route::get('get/all/notifications', [NotificationController::class, 'getAllNotifications']);
    Route::get('set/read/notifications', [NotificationController::class, 'setReadNotifications']);

    // topic routes
    Route::get('get/all/topics', [TopicController::class, 'getAllTopics']);
    Route::get('get/topic/{id}', [TopicController::class, 'getTopic']);

    // comment routes
    Route::get('get/topic/comments/{id}', [CommentController::class, 'getTopicComments']);

});

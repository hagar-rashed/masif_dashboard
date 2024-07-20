<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\OfferController;

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


Route::namespace('Api')->group(function () {

    // Home Routes
    Route::get('home', 'HomeController@index');
    Route::post('mail-list', 'HomeController@mailList');
    Route::get('search', 'HomeController@search');

    // Books Routes
    Route::get('books', 'BookController@index');
    Route::get('books/{id}', 'BookController@show');
    // Route::post('download-book/{id}', 'BookController@downloadBook');

    // Contact Routes
    Route::post('send-contact', 'ContactController@sendContact');

    // Article & Research Routes
    Route::get('articles', 'ArticleController@index');
    Route::get('show-article/{id}', 'ArticleController@showArticle');
    Route::get('show-research/{id}', 'ArticleController@showResearch');

    // Videos Routes
    Route::get('videos', 'VideoController@index');
});

 
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});


// 
Route::middleware('auth:sanctum')->group(function () {
    Route::get('notifications', [NotificationController::class, 'getSettings']);
    Route::post('notifications', [NotificationController::class, 'updateSettings']);
    
});
<?php



use App\Http\Controllers\Api\Dashboard\ServiceController;
use App\Http\Controllers\Api\Site\ServiceController as SiteServiceController;
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

    // services Route dashboard
    Route::get('services', [ServiceController::class,'index']);

    Route::post('services', [ServiceController::class,'store']);

    Route::get('services/{id}', [ServiceController::class,'show']);

    Route::put('services/{id}', [ServiceController::class,'update']);

    Route::delete('services/{id}', [ServiceController::class,'destroy']);


    // services Route site
Route::get('site/services/{village_id}', [SiteServiceController::class, 'getByVillage']);

Route::get('site/services/{id}', [SiteServiceController::class,'show']);

Route::get('site/services', [SiteServiceController::class,'index']);

<?php

use App\Http\Controllers\Dashboard\AuthController;
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


// Localization Routes
Route::get('language/{locale}', function ($locale) {

    app()->setLocale($locale);

    session()->put('locale', $locale);

    return redirect()->back();
})->name('language');

Route::middleware('localization')->group(function () {



    Route::prefix('admin')->namespace('Dashboard')->group(function () {

        /* Auth Routes */
        Route::get('login', 'AuthController@showLoginForm')->name('admin.login');
        Route::post('login', 'AuthController@login')->name('admin.login.post');
        Route::get('logout', 'AuthController@logout')->name('admin.logout');
        Route::get('reset-password', 'AuthController@reset')->name('admin.reset');
        Route::post('send-link', 'AuthController@sendLink')->name('admin.sendLink');
        Route::get('changePassword/{code}', 'AuthController@changePassword')->name('admin.changePassword');
        Route::post('update-password', 'AuthController@updatePassword')->name('admin.updatePassword');
    });

    Route::prefix('admin')->middleware('auth')->namespace('Dashboard')->name('admin.')->group(function () {

        Route::get('/', 'DashboardController@home')->name('home');

        Route::resource('books', 'BookController');

        Route::resource('categories', 'CategoryController');

        Route::resource('articles', 'ArticleController');

        Route::resource('scraps', 'ScrapController');

        Route::resource('talks', 'TalkController');

        Route::resource('videos', 'VideoController');

        Route::resource('about', 'AboutController');

        Route::resource('services', 'ServiceController');

        Route::resource('values', 'ValueController');

        Route::resource('solutions', 'SolutionController');

        Route::resource('brands', 'BrandController');

        Route::resource('partners', 'PartnerController');

        Route::resource('customers', 'CustomerController');

        Route::resource('jobs', 'JobVacancyController');

        Route::resource('sectors', 'SectorController');

        Route::get('settings/edit', 'SettingController@edit')->name('settings.edit');
        Route::patch('settings/update', 'SettingController@update')->name('settings.update');

        Route::get('contacts', 'ContactController@index')->name('contacts.index');

        Route::get('contacts/{id}', 'ContactController@show')->name('contacts.show');

        Route::get('contacts/{id}/reply', 'ContactController@showReplyForm')->name('contacts.reply');

        Route::post('contacts/send-reply', 'ContactController@sendReply')->name('contacts.sendReply');

        Route::delete('contacts/{id}', 'ContactController@deleteMsg')->name('contacts.deleteMsg');

        Route::get('mail-list', 'MailListController@index')->name('mail.index');

        Route::delete('mail-list/{id}', 'MailListController@deleteMail')->name('mail.deleteMail');

        Route::get('profile', 'ProfileController@getProfile')->name('profile');

        Route::post('update-profile', 'ProfileController@updateProfile')->name('update_profile');
    });



    Route::namespace('Site')->name('site.')->group(function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::get('about-us', 'HomeController@about')->name('about');

        Route::get('solutions', 'HomeController@solutions')->name('solutions');

        // Books Routes
        Route::get('books', 'BookController@index')->name('books.index');
        Route::get('book-details/{id}', 'BookController@show')->name('books.show');
        Route::get('book-download/{id}', 'BookController@downloadBook')->name('books.downloadBook');

        // Articles Routes
        Route::get('blog', 'ArticleController@index')->name('articles.index');
        Route::get('blog-details/{id}', 'ArticleController@show')->name('articles.show');
        Route::get('scrap-details/{id}', 'ArticleController@scrap')->name('articles.scrap');

        // Videos Routes
        Route::get('videos', 'VideoController@index')->name('videos.index');
        Route::get('video-details/{id}', 'VideoController@show')->name('videos.show');

        // Contact Routes
        Route::get('contact', 'ContactController@showForm')->name('contact');
        Route::post('contact/send', 'ContactController@sendContact')->name('contact.sendContact');

        // Mail List Routes
        Route::post('mail-list', 'HomeController@mailList')->name('mail');

        // search
        Route::get('search', 'HomeController@search')->name('search');
    });
});

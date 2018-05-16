<?php


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


// Set locale based on prefix value
if( in_array(Request::segment(1), ['en', 'ar']) ) {
    App::setLocale(Request::segment(1));
    Session::put('locale', Request::segment(1));
} else {
    App::setLocale('en');
}

// first route
Route::get('/', function () {
    return redirect('/login');
});

// login form route
Route::get('/login', function($lang = null) {
    App::setlocale('en');

    return view('auth.login');
});

// custom login/logout
Route::post('/login' , 'Auth\LoginController@login')->name('login'); // override authentication urls to manually use languages
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');   // for testing purposes


Route::group(['middleware' => 'auth'], function() {
    Route::post('/main/about/edit/{id}', '\Modules\Main\Http\Controllers\MainController@update_fixed')->name('about.edit');
    Route::post('/main/terms/edit/{id}', '\Modules\Main\Http\Controllers\MainController@update_fixed')->name('terms.edit');
    Route::post('/main/privacy/edit/{id}', '\Modules\Main\Http\Controllers\MainController@update_fixed')->name('privacy.edit');
    Route::post('/main/contact/edit', '\Modules\Main\Http\Controllers\MainController@update_contact')->name('contact.edit');

});

// ONLY VIEWS WITH MENDATORY LANGUAGE PREFIX
Route::group( ['prefix' => '{lang?}', 'middleware' => 'auth'], function($lang = null) {

    App::setLocale(Request::segment(1));
    Session::put('locale', Request::segment(1));

    // about us
    Route::get('/about', '\Modules\Main\Http\Controllers\MainController@about');    

    // terms & conditions
    Route::get('/terms', '\Modules\Main\Http\Controllers\MainController@terms')->name('main.terms');

    // privacy & policy
    Route::get('/privacy', '\Modules\Main\Http\Controllers\MainController@privacy')->name('main.privacy');

    // contact us
    Route::get('/contact', '\Modules\Main\Http\Controllers\MainController@contact')->name('main.contact');

});


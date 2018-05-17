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
Route::get('/test_connection', 'HomeController@test_connection')->name('test_connection');   // for testing purposes
// custom login/logout
Route::post('/login' , 'Auth\LoginController@login')->name('login'); // override authentication urls to manually use languages
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');   // for testing purposes


Route::group(['middleware' => 'auth'], function() {
    Route::post('/main/about/edit/{id}', '\Modules\Main\Http\Controllers\MainController@update_fixed')->name('about.edit');
    Route::post('/main/terms/edit/{id}', '\Modules\Main\Http\Controllers\MainController@update_fixed')->name('terms.edit');
    Route::post('/main/privacy/edit/{id}', '\Modules\Main\Http\Controllers\MainController@update_fixed')->name('privacy.edit');
    Route::post('/main/contact/edit', '\Modules\Main\Http\Controllers\MainController@update_contact')->name('contact.edit');

    // Event Category
    Route::post('/event/add', '\Modules\Main\Http\Controllers\MainController@event_store')->name('event.add');
    Route::post('/event/edit', '\Modules\Main\Http\Controllers\MainController@event_update')->name('event.edit');
    Route::post('/event/delete/single', '\Modules\Main\Http\Controllers\MainController@event_delete')->name('event.delete');
    Route::post('/event/delete/selected', '\Modules\Main\Http\Controllers\MainController@event_deleteSelected')->name('event.deleteSelected');

    // Famous Attractions
    Route::post('/famous/add', '\Modules\Main\Http\Controllers\MainController@famous_store')->name('famous.add');
    Route::post('/famous/edit', '\Modules\Main\Http\Controllers\MainController@famous_update')->name('famous.edit');
    Route::post('/famous/delete/single', '\Modules\Main\Http\Controllers\MainController@famous_delete')->name('famous.delete');
    Route::post('/famous/delete/selected', '\Modules\Main\Http\Controllers\MainController@famous_deleteSelected')->name('famous.deleteSelected');

});

// ONLY VIEWS WITH MENDATORY LANGUAGE PREFIX
Route::group( ['prefix' => '{lang?}', 'middleware' => 'auth'], function($lang = null) {

    App::setLocale(Request::segment(1));
    Session::put('locale', Request::segment(1));

    // about us
    Route::get('/about', '\Modules\Main\Http\Controllers\MainController@about');    

    // terms & conditions
    Route::get('/terms', '\Modules\Main\Http\Controllers\MainController@terms');

    // privacy & policy
    Route::get('/privacy', '\Modules\Main\Http\Controllers\MainController@privacy');

    // contact us
    Route::get('/contact', '\Modules\Main\Http\Controllers\MainController@contact');
    
    // event categories
    Route::get('/event/categories', '\Modules\Main\Http\Controllers\MainController@event_category');

    // famous attraction
    Route::get('/famous/attraction', '\Modules\Main\Http\Controllers\MainController@famous');

    //users.mobile
    Route::get('/users_mobile', '\Modules\UsersModule\Http\Controllers\UsersController@index')->name('users.mobile');


});


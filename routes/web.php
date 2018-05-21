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

    // Sponsor
    Route::post('/sponsor/add', '\Modules\Main\Http\Controllers\MainController@sponsor_store')->name('sponsor.add');
    Route::post('/sponsor/edit', '\Modules\Main\Http\Controllers\MainController@sponsor_update')->name('sponsor.edit');
    Route::post('/sponsor/delete/single', '\Modules\Main\Http\Controllers\MainController@sponsor_delete')->name('sponsor.delete');
    Route::post('/sponsor/delete/selected', '\Modules\Main\Http\Controllers\MainController@sponsor_deleteSelected')->name('sponsor.deleteSelected');

    // Trends
    Route::post('/trends/add', '\Modules\Main\Http\Controllers\MainController@trends_store')->name('trends.add');
    Route::post('/trends/edit', '\Modules\Main\Http\Controllers\MainController@trends_update')->name('trends.edit');
    Route::post('/trends/delete/single', '\Modules\Main\Http\Controllers\MainController@trends_delete')->name('trends.delete');
    Route::post('/trends/delete/selected', '\Modules\Main\Http\Controllers\MainController@trends_deleteSelected')->name('trends.deleteSelected');

    // Notifications
    Route::post('/notifications/add', '\Modules\Main\Http\Controllers\MainController@notifications_store')->name('notifications.add');
    Route::post('/notifications/edit', '\Modules\Main\Http\Controllers\MainController@notifications_update')->name('notifications.edit');
    Route::post('/notifications/delete/single', '\Modules\Main\Http\Controllers\MainController@notifications_delete')->name('notifications.delete');
    Route::post('/notifications/delete/selected', '\Modules\Main\Http\Controllers\MainController@notifications_deleteSelected')->name('notifications.deleteSelected');

    Route::post('/mobile_destroy/{id}', '\Modules\UsersModule\Http\Controllers\UsersController@destroy')->name('mobile_destroy');
    Route::post('/mobile_destroy_all', '\Modules\UsersModule\Http\Controllers\UsersController@destroy_all')->name('mobile_destroy_all');

    Route::post('/mobile_status/{id}', '\Modules\UsersModule\Http\Controllers\UsersController@mobile_status')->name('mobile_status');

    Route::post('/mobile_filter', '\Modules\UsersModule\Http\Controllers\UsersController@mobile_filter')->name('mobile_filter');

    Route::post('/backend_store', '\Modules\UsersModule\Http\Controllers\UsersController@backend_store')->name('backend_store');
    Route::post('/backend_edit/{id}', '\Modules\UsersModule\Http\Controllers\UsersController@backend_edit')->name('backend_edit');


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

    // sponsors
    Route::get('/sponsors', '\Modules\Main\Http\Controllers\MainController@sponsors');

    // Trending searches
    Route::get('/trends', '\Modules\Main\Http\Controllers\MainController@trends');

    // Notifications
    Route::get('/notifications', '\Modules\Main\Http\Controllers\MainController@notifications');

    //users.mobile
        Route::get('/users_mobile', '\Modules\UsersModule\Http\Controllers\UsersController@index')->name('users_mobile');
        Route::get('/users_backend', '\Modules\UsersModule\Http\Controllers\UsersController@index_backend')->name('users_backend');
});


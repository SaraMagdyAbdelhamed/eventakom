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

// change language
Route::post('/change/language', 'ChangeLanguage@changeLang')->name('changeLang');


// custom login/logout
Route::post('/login' , 'Auth\LoginController@login')->name('login'); // override authentication urls to manually use languages
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');   // for testing purposes


// App URLs
Route::group( ['middleware' => ['auth', 'locale'] ], function($lang = null) {

    // about us
    Route::get('/about', '\Modules\Main\Http\Controllers\MainController@about')->name('about');
    Route::post('/main/about/edit/{id}', '\Modules\Main\Http\Controllers\MainController@update_fixed')->name('about.edit');

    // terms & conditions
    Route::get('/terms', '\Modules\Main\Http\Controllers\MainController@terms')->name('terms');
    Route::post('/main/terms/edit/{id}', '\Modules\Main\Http\Controllers\MainController@update_fixed')->name('terms.edit');


    // privacy & policy
    Route::get('/privacy', '\Modules\Main\Http\Controllers\MainController@privacy')->name('privacy');
    Route::post('/main/privacy/edit/{id}', '\Modules\Main\Http\Controllers\MainController@update_fixed')->name('privacy.edit');


    // contact us
    Route::get('/contact', '\Modules\Main\Http\Controllers\MainController@contact')->name('contact');
    Route::post('/main/contact/edit', '\Modules\Main\Http\Controllers\MainController@update_contact')->name('contact.edit');


    // event categories
    Route::get('/event/categories', '\Modules\Main\Http\Controllers\MainController@event_category')->name('event.categories');
    Route::post('/event/add', '\Modules\Main\Http\Controllers\MainController@event_store')->name('event.add');
    Route::post('/event/edit', '\Modules\Main\Http\Controllers\MainController@event_update')->name('event.edit');
    Route::post('/event/delete/single', '\Modules\Main\Http\Controllers\MainController@event_delete')->name('event.delete');
    Route::post('/event/delete/selected', '\Modules\Main\Http\Controllers\MainController@event_deleteSelected')->name('event.deleteSelected');

    // famous attraction
    Route::get('/famous/attraction', '\Modules\Main\Http\Controllers\MainController@famous')->name('famous.attraction');
    Route::post('/famous/add', '\Modules\Main\Http\Controllers\MainController@famous_store')->name('famous.add');
    Route::post('/famous/edit', '\Modules\Main\Http\Controllers\MainController@famous_update')->name('famous.edit');
    Route::post('/famous/delete/single', '\Modules\Main\Http\Controllers\MainController@famous_delete')->name('famous.delete');
    Route::post('/famous/delete/selected', '\Modules\Main\Http\Controllers\MainController@famous_deleteSelected')->name('famous.deleteSelected');

    // sponsors
    Route::get('/sponsors', '\Modules\Main\Http\Controllers\MainController@sponsors')->name('sponsors');
    Route::post('/sponsor/add', '\Modules\Main\Http\Controllers\MainController@sponsor_store')->name('sponsor.add');
    Route::post('/sponsor/edit', '\Modules\Main\Http\Controllers\MainController@sponsor_update')->name('sponsor.edit');
    Route::post('/sponsor/delete/single', '\Modules\Main\Http\Controllers\MainController@sponsor_delete')->name('sponsor.delete');
    Route::post('/sponsor/delete/selected', '\Modules\Main\Http\Controllers\MainController@sponsor_deleteSelected')->name('sponsor.deleteSelected');

    // Trending searches
    Route::get('/trends', '\Modules\Main\Http\Controllers\MainController@trends')->name('trends');
    Route::post('/trends/add', '\Modules\Main\Http\Controllers\MainController@trends_store')->name('trends.add');
    Route::post('/trends/edit', '\Modules\Main\Http\Controllers\MainController@trends_update')->name('trends.edit');
    Route::post('/trends/delete/single', '\Modules\Main\Http\Controllers\MainController@trends_delete')->name('trends.delete');
    Route::post('/trends/delete/selected', '\Modules\Main\Http\Controllers\MainController@trends_deleteSelected')->name('trends.deleteSelected');

    // Notifications
    Route::get('/notifications', '\Modules\Main\Http\Controllers\MainController@notifications')->name('notifications');
    Route::post('/notifications/add', '\Modules\Main\Http\Controllers\MainController@notifications_store')->name('notifications.add');
    Route::post('/notifications/edit', '\Modules\Main\Http\Controllers\MainController@notifications_update')->name('notifications.edit');
    Route::post('/notifications/delete/single', '\Modules\Main\Http\Controllers\MainController@notifications_delete')->name('notifications.delete');
    Route::post('/notifications/delete/selected', '\Modules\Main\Http\Controllers\MainController@notifications_deleteSelected')->name('notifications.deleteSelected');

    //users.mobile
    Route::get('/users_mobile', '\Modules\UsersModule\Http\Controllers\UsersController@index')->name('users_mobile');
    Route::get('/users_backend', '\Modules\UsersModule\Http\Controllers\UsersController@index_backend')->name('users_backend');
    Route::get('/mobile_filter', '\Modules\UsersModule\Http\Controllers\UsersController@mobile_filter')->name('mobile_filter');
    Route::post('/mobile_destroy/{id}', '\Modules\UsersModule\Http\Controllers\UsersController@destroy')->name('mobile_destroy');
    Route::post('/mobile_destroy_all', '\Modules\UsersModule\Http\Controllers\UsersController@destroy_all')->name('mobile_destroy_all');

    Route::post('/mobile_status/{id}', '\Modules\UsersModule\Http\Controllers\UsersController@mobile_status')->name('mobile_status');

    Route::get('/test','\Modules\UsersModule\Http\Controllers\UsersController@test');
    Route::post('/backend_store', '\Modules\UsersModule\Http\Controllers\UsersController@backend_store')->name('backend_store');
    Route::post('/backend_edit/{id}', '\Modules\UsersModule\Http\Controllers\UsersController@backend_edit')->name('backend_edit');

    // Events: Back-end
    Route::get('/events/backend', '\Modules\Events\Http\Controllers\EventsController@index')->name('event_backend');
    Route::get('/events/backend/add', '\Modules\Events\Http\Controllers\EventsController@create')->name('event_backend.add');
    Route::post('/events/backend/store', '\Modules\Events\Http\Controllers\EventsController@store')->name('event_backend.store');
    Route::get('/events/backend/edit/{id}', '\Modules\Events\Http\Controllers\EventsController@edit')->name('event_backend.edit');
    Route::post('/events/backend/update', '\Modules\Events\Http\Controllers\EventsController@update')->name('event_backend.update');
    Route::get('/events/backend/show/{id}', '\Modules\Events\Http\Controllers\EventsController@show')->name('event_backend.show');
    Route::get('/events/backend/edit/{id}', '\Modules\Events\Http\Controllers\EventsController@edit')->name('event_backend.edit');
    Route::post('/events/backend/destroy', '\Modules\Events\Http\Controllers\EventsController@destroy')->name('event_backend.destroy');
    Route::post('/events/backend/destroy_selected', '\Modules\Events\Http\Controllers\EventsController@destroySelected')->name('event_backend.destroySelected');
    Route::get('/events/backend/filter', '\Modules\Events\Http\Controllers\EventsController@filter')->name('event_backend.filter');



 // Events: Mobile
    Route::get('/events/mobile', '\Modules\Events\Http\Controllers\EventsMobileController@index')->name('event_mobile');
    Route::get('/events/mobile/add', '\Modules\Events\Http\Controllers\EventsMobileController@create')->name('event_mobile.add');
    Route::post('/events/mobile/store', '\Modules\Events\Http\Controllers\EventsMobileController@store')->name('event_mobile.store');
    Route::post('/event_filter', '\Modules\Events\Http\Controllers\EventsMobileController@event_filter')->name('event_filter');
    Route::post('/event_destroy/{id}', '\Modules\Events\Http\Controllers\EventsMobileController@destroy')->name('event_destroy');
    Route::post('/event_destroy_all', '\Modules\Events\Http\Controllers\EventsMobileController@destroy_all')->name('event_destroy_all');
    Route::post('/event_accept/{id}', '\Modules\Events\Http\Controllers\EventsMobileController@accept')->name('event_accept');
    Route::post('/event_accept_all', '\Modules\Events\Http\Controllers\EventsMobileController@accept_all')->name('event_accept_all');
    Route::post('/event_reject/', '\Modules\Events\Http\Controllers\EventsMobileController@reject')->name('event_reject');
     Route::post('/event_pending/{id}', '\Modules\Events\Http\Controllers\EventsMobileController@pending')->name('event_pending');
    Route::post('/event_pending_all', '\Modules\Events\Http\Controllers\EventsMobileController@pending_all')->name('event_pending_all');
    Route::get('/events/mobile/view/{id}', '\Modules\Events\Http\Controllers\EventsMobileController@view')->name('event_mobile_view');
    Route::post('/post_destroy/{id}', '\Modules\Events\Http\Controllers\EventsMobileController@post_destroy')->name('post_destroy');
    Route::post('/post_destroy_all', '\Modules\Events\Http\Controllers\EventsMobileController@post_destroy_all')->name('post_destroy_all');
    Route::get('events/mobile/edit/{id}', '\Modules\Events\Http\Controllers\EventsMobileController@edit')->name('event_edit');
    Route::post('/events/mobile/update', '\Modules\Events\Http\Controllers\EventsMobileController@update')->name('event_mobile.update');

// Big Events
    Route::get('/events/big_events', '\Modules\Events\Http\Controllers\EventsController@big_events')->name('big_events');
    Route::post('/bigevents_post/', '\Modules\Events\Http\Controllers\EventsController@bigevents_post')->name('bigevents_post');
    Route::post('/bigevents_select/{value}', '\Modules\Events\Http\Controllers\EventsController@bigevents_select')->name('bigevents_select');

});

<?php

Route::group(['middleware' => 'web', 'prefix' => 'event', 'namespace' => 'Modules\Home\Http\Controllers'], function()
{
    Route::get('/{id}', 'EventsController@index')->name('event_view');
    Route::get('/ar/{id}', 'EventsController@indexAr')->name('event_view_ar');
    Route::get('subscribe/{id}','EventsController@subscribe')->name('event_subscribe');
    Route::get('subscribers/{id}','EventsController@getSubscribers')->name('event_subscribers');

});

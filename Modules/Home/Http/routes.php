<?php

Route::group(['middleware' => 'web','namespace' => 'Modules\Home\Http\Controllers'], function()
{
    Route::get('subscribers/{id}','EventsController@getSubscribers')->name('event_subscribers');
    Route::get('fillevents','EventsController@fillevents')->name('event_fill');
});



Route::group(['middleware' => 'web', 'prefix' => 'subscribe', 'namespace' => 'Modules\Home\Http\Controllers'], function()
{
    Route::get('/{id}', 'EventsController@index')->name('event_view');
    Route::get('/ar/{id}', 'EventsController@indexAr')->name('event_view_ar');
    Route::get('subtoevent/{id}','EventsController@subscribe')->name('event_subscribe');
    

});

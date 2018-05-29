<?php

Route::group(['middleware' => 'web', 'prefix' => 'eventsmobile', 'namespace' => 'Modules\EventsMobile\Http\Controllers'], function()
{
    Route::get('/', 'EventsMobileController@index');
});

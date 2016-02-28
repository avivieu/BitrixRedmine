<?php
Route::group(['prefix' => 'redmine'], function () {
    Route::post('user/create', '\avivieu\bitrixRedmine\Http\Controllers\UserController@create');
    Route::post('user/update/{id}', '\avivieu\bitrixRedmine\Http\Controllers\UserController@update');
    Route::post('user/destroy/{id}', '\avivieu\bitrixRedmine\Http\Controllers\UserController@destroy');
   // Route::get('user', '\avivieu\bitrixRedmine\Http\Controllers\UserController@index');
});


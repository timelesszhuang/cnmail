<?php
Route::get('index','Cnmail\IndexController@index');
Route::get('list/{tableName}/{page}.html','Cnmail\IndexController@getlist');
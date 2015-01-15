<?php

Route::add('/', 'HomeController->index')->method('get')->filters(['auth']);
Route::add('test', 'HomeController->index')->method('get');
Route::add('home', 'HomeController->home')->method('get');

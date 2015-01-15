<?php

Route::add('/', 'HomeController->index')->method('get')->filters(['auth']);
Route::add('home', 'HomeController->home')->method('get');
Route::add('home', 'HomeController->homer', ['id', 'nee']);

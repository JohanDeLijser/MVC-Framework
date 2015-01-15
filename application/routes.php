<?php

Route::add('/', 'HomeController->index')->httpMethod('get')->filters(['auth']);

Route::add('test', 'HomeController->index')->httpMethod('get');

Route::add('test', function ($name) {
	View::render('index', compact('name'));
}, ['id'])->httpMethod('get');

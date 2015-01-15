<?php

/**
 *
 */
class HomeController {
	public function index() {
		$name = 'Max Verboom';
		View::render('index', compact('name'));
	}

	public function home() {
		$name = 'Max';
		View::render('index', ['name' => $name]);
	}
}
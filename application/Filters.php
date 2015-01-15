<?php

/**
 *
 */
class Filters {

	public static function auth() {
		if (!isset($_SESSION['user'])) {
			header("Location: test");
		}
	}
}
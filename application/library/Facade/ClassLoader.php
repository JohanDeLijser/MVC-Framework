<?php

/**
 *
 */
class ClassLoader {

	public static function Controllers($class) {
		$file = CONTROLLERS . $class . '.php';
		if (file_exists($file)) {
			require $file;
		}
	}

	public static function Models($class) {
		$file = MODELS . $class . '.php';
		if (file_exists($file)) {
			require $file;
		}
	}
}
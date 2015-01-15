<?php

/**
 *
 */
class ClassLoader {

	public static function Controllers($class) {
		$file = PATH . 'application/controllers/' . $class . '.php';
		if (file_exists($file)) {
			require $file;
		}
	}
}
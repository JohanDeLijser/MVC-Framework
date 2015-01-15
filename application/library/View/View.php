<?php

namespace application\library\View;

/**
 *
 */
class View {
	public static function render($view, array $data = null) {
		if (!is_null($data)) {
			foreach ($data as $key => $value) {
				if (is_string($key)) {
					${$key} = $value;
				}
			}
		}

		$path = VIEWS . $view . '.php';
		if (file_exists($path)) {
			require $path;
		}
	}
}
<?php

namespace application\library\Routing;

/**
 *
 */
class Controller {
	public static function init() {
		$url = (isset($_GET['url'])) ? $_GET['url'] : '/';
		$url = trim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);
		Router::match($url);
	}
}

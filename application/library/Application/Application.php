<?php

namespace application\library\Application;

use application\library\Routing\Controller as Controller;

/**
 * Application
 */
class Application {

	public static function run() {
		require CONFIG . 'url.php';
		require APP . 'routes.php';
		require APP . 'Filters.php';
		Controller::init();
	}

}

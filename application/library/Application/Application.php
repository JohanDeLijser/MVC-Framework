<?php

namespace application\library\Application;

use application\library\Routing\Controller as Controller;

/**
 * Application
 */
class Application {

	public static function run() {
		require PATH . 'application/routes.php';
		require PATH . 'application/Filters.php';
		Controller::init();
	}

}

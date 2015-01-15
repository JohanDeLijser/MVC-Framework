<?php

namespace application\library\Application;

use application\library\Routing\Controller as Controller;

/**
 * Application
 */
class Application {

	public static function run() {
		Controller::init();
	}

}

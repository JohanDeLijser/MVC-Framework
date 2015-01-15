<?php

/* CONSTANTS */
define('PATH', dirname(__DIR__) . '/');
define('PUB', PATH . 'public/');

define('APP', PATH . 'application/');
define('LIB', APP . 'library/');

define('VIEWS', APP . 'views/');
define('CONTROLLERS', APP . 'controllers/');
define('MODELS', APP . 'models/');

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

require PATH . '/vendor/autoload.php';

require LIB . 'Facade/autoload.php';

App::run();
<?php

/* CONSTANTS */
define('PATH', dirname(__DIR__) . '/');
define('PUB', PATH . 'public/');

define('APP', PATH . 'application/');
define('LIB', APP . 'library/');
define('CONFIG', LIB . 'config/');

define('VIEWS', APP . 'views/');
define('CONTROLLERS', APP . 'controllers/');
define('MODELS', APP . 'models/');

require PATH . '/vendor/autoload.php';
require LIB . 'Facade/autoload.php';

App::run();
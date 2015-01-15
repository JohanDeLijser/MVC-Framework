<?php

define('URL_PUB', 'public');
define('URL_PTC', 'http://');
define('URL_DOM', $_SERVER['HTTP_HOST']);
define('URL_SUB_DIR', str_replace(URL_PUB, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PTC . URL_DOM . URL_SUB_DIR);
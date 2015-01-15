<?php

namespace application\library\Routing;

use Exception;
use Filters;

/**
 * Router
 */
class Router {
	public static function match($url) {
		if ($url[0] == '') {
			$url[0] = '/';
		}
		$urlToMatch = implode('/', $url);
		foreach (Route::$routes as $route) {
			if (preg_match($route->regex, $urlToMatch, $match)) {
				if (isset($route->httpmethod)) {
					if (strtolower($route->httpmethod) !== strtolower($_SERVER['REQUEST_METHOD'])) {
						throw new Exception("Invalid HTTP Method");
					}
				}
				if (isset($route->filters)) {
					foreach ($route->filters as $filter) {
						Filters::$filter();
					}
				}
				if (isset($route->controller) && isset($route->method)) {
					if (!class_exists($route->controller)) {
						throw new Exception("The controller '" . $route->controller . "' does not exist");
					}
					if (!method_exists($route->controller, $route->method)) {
						throw new Exception("The controller '" . $route->controller . "' does not have a valid method called: '" . $route->method . "'");
					}
					if ($route->params != null) {
						$params = explode('/', trim(str_replace($route->url, '', $urlToMatch), '/'));
						return self::call([new $route->controller, $route->method], $params, $route);
					} else {
						return self::call([new $route->controller, $route->method], null, $route);
					}
				} else {
					if ($route->params != null) {
						$params = explode('/', trim(str_replace($route->url, '', $urlToMatch), '/'));
						return self::call($route->action, $params, $route);
					} else {
						return self::call($route->action, null, $route);
					}
				}
			}

		}
	}

	public static function call($action, $params = null, $route) {
		if ($params != null) {
			Route::$currentRoute = $route;
			return call_user_func_array($action, $params);
		} else {
			Route::$currentRoute = $route;
			return call_user_func($action);
		}
	}
}

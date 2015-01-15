<?php

namespace application\library\Routing;

use Exception;

class Route {

	static $routes = Array();
	static $methods = ['get', 'put', 'post', 'head', 'delete', 'trace', 'options', 'connect', 'patch'];
	static $currentRoute;

	public static function filterGroup($closure) {
		call_user_func($closure);
	}

	public static function add($url, $action, $params = null) {
		$route = new self;
		$route->url = $url;

		if (is_object($action)) {
			$route->action = $action;
		} else {
			$action = explode('->', $action);
			$route->controller = $action[0];
			$route->method = $action[1];
		}
		$route->params = $params;
		$route->regex = $route->generateRegex();
		if (is_null($params)) {
			array_unshift(static::$routes, $route);
		} else {
			array_push(static::$routes, $route);
		}
		return $route;
	}

	public static function current() {
		return static::$currentRoute;
	}

	public function filters($filters) {
		if (!is_array($filters)) {
			throw new Exception("Filters must be defined as an array");
		}
		$this->filters = $filters;
		return $this;
	}

	public function httpMethod($method) {
		if (in_array($method, static::$methods)) {
			$this->httpmethod = $method;
			return $this;
		}
		throw new Exception("Unknown http request method");
	}

	private function generateRegex() {
		$regcenter = $this->url;
		if (!is_null($this->params)) {
			foreach ($this->params as $param) {
				$regcenter .= '/[0-9A-Za-z]*';
			}
		}
		return '#^' . $regcenter . '$#';
	}

}
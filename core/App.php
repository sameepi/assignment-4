<?php

class App {
    protected $controller;
    protected $method;
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        if (isset($_COOKIE['token'])) {
            $this->controller = 'Reminders';
            $this->method = 'index';
        } else {
            $this->controller = 'AuthController';
            $this->method = 'login';
        }

        if (isset($url[0]) && file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        if (method_exists($this->controller, $this->method)) {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            echo "404 Not Found";
        }
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        } else {
            return []; 
        }
    }
}

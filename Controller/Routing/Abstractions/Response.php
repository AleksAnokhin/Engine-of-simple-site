<?php
namespace Controller\Routing\Abstractions;
use \ReflectionClass;
abstract class Response {
    private function dispatch($request) {
        if(empty($request['route'])) return 'NotExisting';
        $routeArray = explode('/', $request['route']);
        $controller = '';
        foreach($routeArray as $part) {
            if(!is_numeric($part)) {
                $controller .= ucfirst(strtolower($part)) . '/';
            }
        }
        // $controller = ucwords(strtolower($request['route']));
        $controller = preg_replace('/[0-9]*$/', '', $controller);
        $controller = rtrim($controller, '/');

        return $controller;
    }
    private function getMethod() {
        return ucwords(strtolower($_SERVER['REQUEST_METHOD']));
    }
    protected function match($request) {
        $method = $this->getMethod();
        $controller = $this->dispatch($request);
        $basePath = __DIR__ . "/../../../Pages/$controller";
        if(file_exists("$basePath/$method.php")) {
			$namespace = 'Pages\\' . preg_replace('/\//', '\\', $controller);
            $class = new ReflectionClass("$namespace\\$method");
            return $class->newInstance();
        }
        return false;
    }
    abstract protected function getResponse($request);
}
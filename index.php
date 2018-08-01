<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once('./config.php');
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    include_once(dirname(__FILE__) . '/' . $class . '.php');
});
session_start();
$R = new Controller\Routing\Router;
$R->dispatchURI();
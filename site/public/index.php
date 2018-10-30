<?php

require_once '../conf/config.php';
spl_autoload_register(function ($class_name) {
    require_once "../core/" . $class_name . '.php';
});

$controller = isset($_GET['page']) ? ucfirst($_GET['page']) . "Controller" : "IndexController";
$controller = file_exists("../controllers/" . $controller . ".php") ? $controller : "IndexController";
$action = isset($_GET['action']) ? $_GET['action'] . "Action" : "defaultAction";
include "../controllers/" . ucfirst($controller) . ".php";
$action = method_exists($controller, $action) ? $action : "defaultAction";
$controller::$action();
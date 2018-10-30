<?php
header("Content-Type: application/json");

require_once '../conf/config.php';
spl_autoload_register(function ($class_name) {
    require_once "../app/" . $class_name . '.php';
});

$action = isset($_GET['action']) ? $_GET['action'] . "Action" : "defaultAction";
$action = method_exists(new API, $action) ? $action : "defaultAction";
API::$action();
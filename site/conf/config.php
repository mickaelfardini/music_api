<?php

require_once '../core/PDOConnection.php';

$array['dbname'] = "database_music";
$array['host'] = "127.0.0.1";
$array['user'] = "root";
$array['pwd'] = "root";

$pdo = new PDOConnection($array);
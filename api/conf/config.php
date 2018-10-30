<?php
require_once '../app/PDOConnect.php';
$array['dbname'] = "database_music";
$array['host'] = "127.0.0.1";
$array['user'] = "root";
$array['pwd'] = "";
$pdo = new PDOConnect($array);

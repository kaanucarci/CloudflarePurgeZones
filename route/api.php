<?php
session_start();
require_once __DIR__."/../autoload.php";

use Route\Web;
$web = new Web();
$response = "";

if (isset($_POST['username']) && isset($_POST['password']))
    $web->login($_POST);

if (isset($_GET['page']))
    $response = $web->request($_GET['page']);

if (isset($_POST['zone_id']))
    $response = $web->purge_cache($_POST['zone_id']);

echo ($response);
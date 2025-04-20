<?php
session_start();
require_once "autoload.php";
use App\Controller\LoginController;
use App\Helpers\CommonHelper;

$login = new LoginController();
$helper = new CommonHelper();
if ($login->is_logged_in())
    include "public/home.php";
else
    include "public/login.php";
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//date_default_timezone_set("Europe/Moscow");
define('ROOT', dirname(__FILE__));
session_start();


require_once(ROOT.'/components/Router.php');
require_once (ROOT.'/components/Autoload.php');

$router = new Router();
$router->run();
?>

<?php



/*По своей сути это главный файл, который выводит всю информацию на странице и обрабатывает её используя url и post запросы*/




//Выводит ошибки php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Задать значение корня файлов в константу ROOT
define('ROOT', dirname(__FILE__));
// запуск сессии
session_start();
// подключение файла Router.php
require_once(ROOT.'/components/Router.php');
// подключение файла Autoload.php отвечающий за подключение всех файлов контроллеров и моделей
require_once (ROOT.'/components/Autoload.php');
// создание обекта класса Router из файла Router.php
$router = new Router();
// запуск метода run
$router->run();
?>

<?php

require_once (ROOT.'/controllers/UserController.php');
class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

// Return type

    private function geturi()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {

//            $trim = trim($trim, '/');$trim = substr($trim, strpos($trim, '/'));
//            $trim = trim($trim, '/');
//            $trim = substr($trim, strpos($trim, '/'));
//            $trim = trim($trim, '/');
//            $trim = substr($trim, strpos($trim, '/'));
//            $trim = trim($trim, '/');
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->geturi();

        foreach ($this->routes as $uriPattern => $path) {
            if(preg_match("~$uriPattern~", $uri)) {
//			    echo preg_match("~$uriPattern~", $uri);
//			    echo '<br>Где ищем (запрос который набрал пользователь) : '.$uri;
//               echo '<br> Что ищем (Совпадение из правила) : '.$uriPattern;
//			    echo '<br>Кто обрабатывает: : '.$path;
                $internalRoute= preg_replace("~$uriPattern~",$path,$uri);


//			    echo '<br><br>Нужно сформировать: '.$internalRoute;


                $segments = explode('/', $internalRoute);


                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst((array_shift($segments)));
//				echo '<br><br> controller name : '.$controllerName;
//				echo ' <br><br> action name : '.$actionName;
                $parameters=$segments;
                //print_r($parameters);

                $controllerFile = ROOT . '/controllers/' .$controllerName. '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject,$actionName),$parameters);

                if ($result != null) {
                    break;
                }
            }
        }
    }
}
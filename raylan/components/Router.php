<?php

/*Это класс отвечающий за подключение нужного контроллера и нужного метода по url страници или какому нибуть ajax запросу*/


class Router
{
    //Переменная хранящая в себе в последствии ассоциативный массив данных из файла routes.php
    private $routes;

    // Конструктор в котором и заполняется наша переменная $routes.
    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }


    //Эта функция Берет текущий url страницы
    private function geturi()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            // обрезает текущий  url страницы до первого /
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }



    /*Опишу этот метод по подробнее. Суть метода взять из ассоциативного массива routes значение обычно оно состоит из примерно таого: 'contacts' => 'site/contacts'
    Тоесть щелкая по ссылки Контакты у нас будет такой путь "http://raylan/contacts" но мы его обризаем до contacts после чего сравниваем с первым значением ассоциативного массива в данном случае
    'contacts', если они совподают по патерну то мы берем вторую часть массива в данном  случае 'site/contacts'. Эта часть будет служить тем какой контроллер(класс) и какой метод запускать.
    Тоесть SiteController и actionContacts.
    В случае если нам надо передать переменную нашему методу. Допустим для того что бы он понял что надо выводить стрницу с новостью id которой равен 1. То наш патерн будет такой
    'news\/([0-9]+)' => 'news/item/$1',  для стрницы с url ="/news/1", тоесть он так же находит совподение по левой части 'news\/([0-9]+)'=="/news/1" и подключает контроллер NewsController и
    далее узнает сколько переменных и передает в метода actionItem

    далее покажу с примером
    */


    public function run()
    {
        //берем наш текущий url без домена ну допустим news/1
        $uri = $this->geturi();

        //здесь мы перебираем все значения routes пока не найдем совпадения с news/1.
        foreach ($this->routes as $uriPattern => $path) {
            //далее предположим что мы дошли по массиву до нам нужного похожего значения. Это 'news\/([0-9]+)' => 'news/item/$1'
            // Таким образом наш $uriPattern будет 'news\/([0-9]+)'
            // а $path 'news/item/$1'
            if( preg_match("/$uriPattern/u", $uri) ) { // теперь мы сравниваем на совпадение текущий $uri = news/1 и $uriPattern = 'news\/([0-9]+)' и понимаем что они совпадают.




                $internalRoute= preg_replace("~$uriPattern~",$path,$uri);
                // заменяем в нашей переменной $path = 'news/item/$1' значение  $1 на то которое совпадает в скобках патерна $uriPattern='news\/([0-9]+)' тоесть она равна 1 это видно из нашего $uri =news/1
                // и $internalRoute становится 'news/item/1'

                $segments = explode('/', $internalRoute);

                // разбирает нашу $internalRoute на сегменты тоесть [0] = news, [1] = item [2] = 1



                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
                // Делаем правильное имя контроллера. Тоесть из news делаем NewsController и так же из $segments извлекаем(удаляем первый элемент)



                $actionName = 'action'.ucfirst((array_shift($segments)));
                // Переменная для хранения правильного имени метода тоесть из $segments мы извлекаем первый это в данный момент item и создаем $actionName= actionItem

               $parameters=$segments;
               //дальше остаются только параметры(переменные передаваемые методу), поэтому присваеваем их  $parameters

                $controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
                //Создаем переменную для хранения пути до файла контроллепа в данном случае = D:\OpenServer\domains\raylan/controllers/NewsController.php

                // Проверка на существования файла
                if (file_exists($controllerFile)) {
                    //подключение файла контроллера
                    include_once($controllerFile);
                }


                // Создание обьекта класса нашего контроллера
                $controllerObject = new $controllerName;
                // Задействуем наш метода с переданными в него параметрами)
                $result = call_user_func_array(array($controllerObject,$actionName),$parameters);


                if ($result != null) {
                    break;
                }
            }
        }
    }
}
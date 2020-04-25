<?php


class CabinetController
{
    public function actionIndex(){
        if (isset($_SESSION['user'])) {
            $userID = User::checkLogged();
            $user = User::getUserById($userID);
            $films1 = Film::getFilmListUser($_SESSION['user'], 1);
            $films2 = Film::getFilmListUser($_SESSION['user'], 2);
            require_once(ROOT . '/views/cabinet/index.php');
        }
        else{
            header('/');
        }
        return true;
    }
}
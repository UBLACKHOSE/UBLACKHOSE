<?php


class CabinetController
{
    public function actionIndex(){
        $userID = User::checkLogged();
        $user = User::getUserById($userID);
        $films1 = Film::getFilmListUser($_SESSION['user'],1);
        $films2 = Film::getFilmListUser($_SESSION['user'],2);
        require_once (ROOT.'/views/cabinet/index.php');
        return true;
    }
}
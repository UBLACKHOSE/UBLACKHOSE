<?php

require_once (ROOT.'/models/Film.php');

class SiteController
{
    public function actionIndex(){


        $films = array();
        $films =Film::getFilmsListInMainPage();
        require_once(ROOT.'/views/index.php');
        return true;
    }

}
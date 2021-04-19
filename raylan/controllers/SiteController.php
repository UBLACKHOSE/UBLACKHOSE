<?php

require_once(ROOT . '/models/News.php');

class SiteController
{
    public function actionIndex(){
        $news = array();
        $news =News::getNewsListInMainPage();
        $act =1;
        //print_r($news);
        require_once(ROOT.'/views/index.php');
        return true;
    }

    public function actionAbout(){
        $act = 2;
        require_once(ROOT.'/views/about.php');
        return true;
    }

    public function actionContacts(){

        $act = 5;
        require_once(ROOT.'/views/contacts.php');
        return true;
    }
}
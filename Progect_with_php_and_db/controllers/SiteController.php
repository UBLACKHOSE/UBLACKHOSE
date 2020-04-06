<?php

require_once (ROOT.'/models/Film.php');

class SiteController
{
    public function actionIndex(){


        $films = array();
        $films =Film::getFilmsListInMainPage();
        $search ='';
        require_once(ROOT.'/views/index.php');
        return true;
    }

    public function actionSearch(){

        $search= $_GET['search'];
        if($search) {
            $search_films = Search::searchFilms($search);
        }
        if(!isset($_SESSION['i'])) {
            $_SESSION['i']=0;
        }
        if (isset($_POST['name'])){
            $_SESSION['i']++;
            if($_SESSION['i']%2 == 0){
                $search_films= Search::searchFilms($search,'name');
                $_SESSION['i']=0;
                $_SESSION['method']='Названию вниз';
            }
            else{
                $search_films= Search::searchFilms($search,'name','DESC');
                $_SESSION['method']='Названию вверх';
            }
        }
        if (isset($_POST['age'])){
            if($_SESSION['i']%2 == 0){
                $search_films= Search::searchFilms($search,'year');
                $_SESSION['i']++;
                $_SESSION['method']='Году вниз';
            }
            else{
                $search_films= Search::searchFilms($search,'year','DESC');
                $_SESSION['i']=0;
                $_SESSION['method']='Году вверх';
            }
        }

        require_once(ROOT.'/views/search/search.php');
        return true;
    }
}
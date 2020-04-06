<?php


class FilmController
{
    public function actionView($idFilm){

        $film=Film::getFilmById($idFilm);
        $reting = round(Film::checkReitingFilm($idFilm));
        require_once (ROOT.'/views/film/view.php');
        return true;
    }

    public function actionView2($idFilm,$q)
    {

        if(Film::checkFilmByUserStatus($idFilm,$_SESSION['user'])){
                Film::addFilmInUser($idFilm,$_SESSION['user'],$q);
        }
        else {
            Film::updateFilmInUser($idFilm,$_SESSION['user'],$q);
        }
        echo $q;
        return true;
    }
    public function actionView_reiting($idFilm,$q){
        if (Film::checkFilmByUserReiting($idFilm,$_SESSION['user'])){
            Film::addFilmReting($idFilm,$_SESSION['user'],$q);
        }
        else{
            Film::updateFilmReiting($idFilm,$_SESSION['user'],$q);
        }

        echo $q;
        return true;
    }

    public function actionView_reting($idFilm){
        if (Film::checkFilmByUserReiting($idFilm,$_SESSION['user'])){
            echo 0;
        }
        else {
            echo Film::getFilmUserReiting($idFilm,$_SESSION['user']);
        }
        return true;
    }
}
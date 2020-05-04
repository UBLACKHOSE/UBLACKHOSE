<?php


class FilmController
{
    public function actionView($idFilm){

        $film=Film::getFilmById($idFilm);
        $reting = round(Film::checkReitingFilm($idFilm));
        $comments =  Film::getCommentsList($idFilm);
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
    public function actionView_comment($idFilm,$id_comment_answer = 0,$id_parent = 0){
        $text = $_POST['text'];
        $date = date("Y-m-d H:i:s");
        $text = str_ireplace("<",'&lt',$text);
        if(Film::sendComment($_SESSION['user'],$idFilm,$text,$date,$id_comment_answer,$id_parent)) {
            echo '<div class="col-sm-offset-1 col-md-10" style="  border-radius: 10px;background:#ebe8ec;padding: 10px;margin-bottom: 10px">
                <div class="col-sm-1" style="padding: 0px">
                    <img src="/template/img/img_user/'. $_SESSION['userImg'] .'" style="height: 45px; width: 45px;border-radius: 100%;">
                </div>
                <div class=" col-sm-11" style="padding: 0px">
                    <div class="row" style="">
                        <h4 style="float: left;">' . $_SESSION['userLogin'] . '</h4>
                        <h5 style="float: left; color:#3e4649;padding-left: 10px;padding-top: 3px">' . $date . '</h5>
                    </div>
                    <div class="row" style="border-radius: 10px;background: white;padding: 5px">
                        <p>' . $text . ' </p>
                    </div>
                    <div class="row">
                        <a href="#">
                            <h4 style="float: right;">Ответить</h4>
                        </a>
                    </div>
                </div>
            </div>';
        }
        return true;
    }
}
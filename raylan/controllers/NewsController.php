<?php


class NewsController
{

    public function actionIndex($page=1){


        $news = array();
        $news =News::getNewsListPage($page);


        $total = News::getTotalNews();

        $pagination = new Pagination($total,$page,6,'page-');

        $act = 3;
        require_once(ROOT.'/views/news.php');
        return true;
    }


    public function actionItem($id){
        $new = array();
        $new = News::getNewsByID($id);
        $comments =  News::getCommentsList($id);
        $act = 3;
        require_once(ROOT.'/views/new.php');
        return true;
    }


    public function actionView_comment($idNews){
        $text = $_POST['text'];
        $date = date("Y:m:d H:i:s");

        $text = str_ireplace("<",'&lt',$text);

        if(News::sendComment($_SESSION['user'],$idNews,$text,$date)) {
            echo '
                   <div class="sided-90x">

                        <div class="mb-20 brdr-grey-1 opacty-6"></div>
                        <div class="sided-90x">
                            <div class="s-left br-3 oflow-hidden">
                                <img src="/template/img/img_user/'.$_SESSION['userImg'].'" alt="">
                            </div><!-- s-left -->

                            <div class="s-right">
                                <h5><b>'.$_SESSION['userLogin'].'</b><span class="ml-10 color-ash font-8">  '.$date.'</span></h5>
                                <p class="mt-5 mb-10">'.$text.'
                                </p>
                                <a class="mr-20" href="#"><b>Лайк</b></a>
                            </div><!-- s-left -->
                        </div>
                    </div>
							';
        }
        return true;
    }
}
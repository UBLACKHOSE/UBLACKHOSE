<?php


class SiteController
{
    //Выводит главную страничку
    public function actionIndex(){
        $news = array();
        //Берет массив данных новостей из бд
        $news =News::getNewsListInMainPage(6);
        //берет массив данных категорий
        $news_category=array();
        $news_category = News::getNewsListByCategory(4);
        //Подключает представление главной странички
        require_once(ROOT.'/views/index.php');
        return true;
    }

    public function actionSearch(){

        $search= $_GET['search'];
        if($search) {
            $search_news = News::searchNews($search);
        }

        require_once(ROOT.'/views/search.php');
        return true;
    }

}
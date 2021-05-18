<?php

class  CatalogController{

    public  function actionCategory($categoryId, $page=1){

        $categ = Category::GetCategoryById($categoryId);

        $categoryNews = array();
        $categoryNews = News::getNewsList2ByCategory($categoryId, $page);


        $total = News::getTotalNewsInCategory($categoryId);

        $pagination = new Pagination($total,$page,6,'page-');

        require_once (ROOT.'/views/categories.php');
        return true;
    }
}

<?php


class Category
{
    public static function GetCategoryById($categoryId){
            $db =db::getConnection();

            $CategoryList = array();

            $result = $db->query("SELECT * FROM `category_news`  WHERE `id_categ`=".$categoryId." ORDER BY `id_categ` ASC");

            $i=0;
            while ($row = $result->fetch_assoc()){
                $CategoryList[$i]['id_categ'] = $row['id_categ'];
                $CategoryList[$i]['name'] = $row['name'];
                $CategoryList[$i]['description'] = $row['description'];
                $i++;
            }
            return $CategoryList[0];
    }

}
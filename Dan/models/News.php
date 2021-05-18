<?php


class News
{

    public static function getNewsListInMainPage($count){
        //Задаем количество новостей
        $count = intval($count);
        //подключаемся к бд
        $db =db::getConnection();
        //создаем массив
        $newsList = array();

        //производим SQL запрос в бд, для получения из таблицы news данных о новотях
        $result = $db->query("SELECT * FROM news ORDER BY `id` ASC LIMIT ".$count);

        $i=0;
        //заполняем массив новостями
        while ($row = $result->fetch_assoc()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['headline'] = $row['headline'];
            $newsList[$i]['description'] = $row['description'];
            $newsList[$i]['date_time'] = $row['date_time'];
            $newsList[$i]['img'] = $row['img'];
            $i++;
        }
        //возвращаем массив
        return $newsList;
    }


    public static function getNewsListByCategory($count){

        $count = intval($count);
        $db =db::getConnection();

        $newsList = array();


        $result = $db->query("SELECT * FROM `news` INNER JOIN `category_news` ON `news`.`catedory_id`=`category_news`.`id_categ` ORDER BY `date_time` DESC LIMIT ".$count);

        $i=0;
        while ($row = $result->fetch_assoc()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['headline'] = $row['headline'];
            $newsList[$i]['description'] = $row['description'];
            $newsList[$i]['date_time'] = $row['date_time'];
            $newsList[$i]['img'] = $row['img'];
            $newsList[$i]['name'] = $row['name'];
            $i++;
        }
        return $newsList;
    }

    public static function getNewsList2ByCategory($categoryId,$page){

        if ($categoryId) {

            $page = intval($page);
            $offset = ($page -1)*6;

            $db = db::getConnection();
            $news = array();
            $result = $db->query("SELECT * FROM news INNER JOIN `category_news` ON `news`.`catedory_id`=`category_news`.`id_categ` WHERE `catedory_id`=".$categoryId." ORDER BY `news`.`date_time` ASC LiMIT 6 OFFSET ".$offset );
            $i=0;
            while ($row = $result->fetch_assoc()){
                $news[$i]['id'] = $row['id'];
                $news[$i]['headline'] = $row['headline'];
                $news[$i]['img'] = $row['img'];
                $news[$i]['description'] = $row['description'];
                $news[$i]['date_time'] = $row['date_time'];
                $i++;
            }
            return $news;
        }
    }

    public static function getTotalNewsInCategory($categoryId){
        $db = db::getConnection();
        $result = $db -> query('SELECT COUNT(id) AS count FROM news WHERE `catedory_id`="'.$categoryId.'"');
        $row = $result->fetch_assoc();
        return $row['count'];
    }
    public static function getCategorys(){
        $db =db::getConnection();

        $CategoryList = array();


        $result = $db->query("SELECT * FROM `category_news` ORDER BY `id_categ` ASC ");

        $i=0;
        while ($row = $result->fetch_assoc()){
            $CategoryList[$i]['id_categ'] = $row['id_categ'];
            $CategoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $CategoryList;
    }

    public static function getNewsByID($id){
        $id = intval($id);

        if ($id){
            $db = db::getConnection();
            $result = $db->query('SELECT * FROM news INNER JOIN `category_news` ON `news`.`catedory_id`=`category_news`.`id_categ` WHERE `news`.`id`= '.$id);
            // $result ->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch_assoc();
        }
        return false;
    }


    public static  function sendComment($id_user,$id_news,$content,$data_and_time){
        $db = db::getConnection();
        $sql = 'INSERT INTO `user/comment`(`id_user`, `id_news`, `content`, `date_and_time`) VALUES (?,?,?,?)';
        $result = $db->prepare($sql);
        $result->bind_param("ssss",$id_user,$id_news,$content,$data_and_time);
        return $result->execute();
    }


    public static function getCommentsList($id_news){
        $db = db::getConnection();

        $sql ='SELECT `content`,`date_and_time`,login,`id_comment` FROM `user/comment` INNER JOIN `users` ON `users`.`id`=`user/comment`.`id_user` WHERE id_news='.$id_news.' 
 ORDER BY `user/comment`.`date_and_time`  DESC';
        $result = $db->query($sql);
        $commentList = array();
        $i=0;
        while ($row = $result->fetch_assoc()){
            $commentList[$i]['content'] = $row['content'];
            $commentList[$i]['date_and_time'] = $row['date_and_time'];
            $commentList[$i]['login'] = $row['login'];
            $commentList[$i]['id_comment'] = $row['id_comment'];
            $i++;
        }
        return $commentList;
    }

    public static function searchNews($search){

        $db =db::getConnection();

        $newsList = array();

        $result = $db->query("SELECT * FROM news WHERE headline like'%".$search."%' LIMIT 6");

        $i=0;
        while ($row = $result->fetch_assoc()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['headline'] = $row['headline'];
            $newsList[$i]['description'] = $row['description'];
            $newsList[$i]['date_time'] = $row['date_time'];
            $newsList[$i]['img'] = $row['img'];
            $i++;
        }
        return $newsList;
    }


    public static function getRecomendNewsList($search,$id){

        $count = 5;
        $db =db::getConnection();

        $newsList = array();


        $result = $db->query("SELECT `id`, `headline`, `description`, `date_time`, `img`, `catedory_id` FROM `news` WHERE `catedory_id`= ".$search." AND `id`!=".$id);

        $i=0;
        while ($row = $result->fetch_assoc()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['headline'] = $row['headline'];
            $newsList[$i]['description'] = $row['description'];
            $newsList[$i]['date_time'] = $row['date_time'];
            $newsList[$i]['img'] = $row['img'];
            $i++;
        }
        return $newsList;
    }

}
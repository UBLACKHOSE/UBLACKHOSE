<?php


class News
{
    public static function getNewsListInMainPage($count = 5)
    {
        $count = intval($count);
        $db = db::getConnection();

        $newsList = array();

        $result = $db->query("SELECT * FROM
 news ORDER BY `id` DESC LIMIT " . $count);

        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];

            $newsList[$i]['description'] = $row['description'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['avtor'] = $row['avtor'];
            $newsList[$i]['img'] = $row['img'];
            $i++;
        }
        return $newsList;
    }


    public static function getTotalNews()
    {
        $db = db::getConnection();
        $result = $db->query('SELECT COUNT(id) AS count FROM news');
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public static function getNewsListPage($page){
        $page = intval($page);
        $offset = ($page -1)*6;

        $db = db::getConnection();
        $news = array();
        $result = $db->query("SELECT * FROM news ORDER BY `news`.`date` ASC LiMIT 6 OFFSET ".$offset );
        $i=0;
        while ($row = $result->fetch_assoc()){
            $news[$i]['id'] = $row['id'];
            $news[$i]['title'] = $row['title'];
            $news[$i]['img'] = $row['img'];
            $news[$i]['description'] = $row['description'];
            $news[$i]['date'] = $row['date'];

            $news[$i]['avtor'] = $row['avtor'];
            $news[$i]['img'] = $row['img'];
            $i++;
        }
        return $news;
    }
    public static function getNewsByID($id){

            $id = intval($id);
            if ($id){
                $db = db::getConnection();
                $result = $db->query('SELECT * FROM news WHERE `news`.`id`= '.$id);
                return $result->fetch_assoc();
            }
            return false;
    }


    public static function getCommentsList($id_news){
        $db = db::getConnection();

        $sql ='SELECT `content`,`date_and_time`,login,`id_comment`,`users`.`img` FROM `user/comment` INNER JOIN `users` ON `users`.`id`=`user/comment`.`id_user` WHERE id_news='.$id_news.' 
 ORDER BY `user/comment`.`date_and_time`  DESC';
        $result = $db->query($sql);
        $commentList = array();
        $i=0;
        while ($row = $result->fetch_assoc()){
            $commentList[$i]['content'] = $row['content'];
            $commentList[$i]['date_and_time'] = $row['date_and_time'];
            $commentList[$i]['login'] = $row['login'];
            $commentList[$i]['id_comment'] = $row['id_comment'];
            $commentList[$i]['img'] = $row['img'];
            $i++;
        }
        return $commentList;
    }

    public static  function sendComment($id_user,$id_news,$content,$data_and_time){
        $db = db::getConnection();
        $sql = 'INSERT INTO `user/comment`(`id_user`, `id_news`, `content`, `date_and_time`) VALUES (?,?,?,?)';
        $result = $db->prepare($sql);
        $result->bind_param("ssss",$id_user,$id_news,$content,$data_and_time);
        return $result->execute();
    }
}
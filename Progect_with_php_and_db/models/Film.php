<?php

require_once (ROOT.'/components/db.php');

class Film
{
    public static function getFilmsListInMainPage($count = 5){
        $count = intval($count);
        $db =Db::getConnection();

        $filmList = array();

        $result = $db->query("SELECT * FROM
 films ORDER BY `id` DESC LIMIT ".$count);

        $i=0;
        while ($row = $result->fetch_assoc()){
            $filmList[$i]['id'] = $row['id'];
            $filmList[$i]['name'] = $row['name'];
            $filmList[$i]['year'] = $row['year'];
            $filmList[$i]['country'] = $row['country'];
            $filmList[$i]['producer_r+'] = $row['producer_r+'];
            $filmList[$i]['producer'] = $row['producer'];
            $filmList[$i]['scenario'] = $row['scenario'];
            $filmList[$i]['operator'] = $row['operator'];
            $filmList[$i]['composer'] = $row['composer'];
            $filmList[$i]['premiere'] = $row['premiere'];
            $filmList[$i]['возраст'] = $row['возраст'];
            $filmList[$i]['description'] = $row['description'];
            $filmList[$i]['genre'] = $row['genre'];
            $filmList[$i]['img'] = $row['img'];
            $i++;
        }
        return $filmList;
    }

}
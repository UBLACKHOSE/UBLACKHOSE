<?php


class Search
{
    public static function searchFilms($search,$by = 'name',$spos='ASC'){
        $db =db::getConnection();
        $result = $db->query("SELECT * FROM films WHERE name like'%".$search."%' ORDER BY ".$by.' '.$spos);
        // $result ->setFetchMode(PDO::FETCH_ASSOC);
        $filmList = array();
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
            $filmList[$i]['age'] = $row['age'];
            $filmList[$i]['description'] = $row['description'];
            $filmList[$i]['genre'] = $row['genre'];
            $filmList[$i]['img'] = $row['img'];
            $i++;
        }
        return $filmList;
    }
}
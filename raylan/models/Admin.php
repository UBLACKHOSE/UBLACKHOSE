<?php


class Admin
{
    public static function addBills($id_house,$number,$date_start,$date_stop,$type,$base,$reason,$name,$sum){

        $db =db::getConnection();
        $sql = "INSERT INTO `invoices`(`id_street`,`number`, `date_start`, `date_stop`, `type`, `base`, `reason`, `name`,`price`) 
VALUES (?,?,?,?,?,?,?,?,?)";
        $result = $db->prepare($sql);
        $result->bind_param("sssssssss",$id_house,$number,$date_start,$date_stop,$type,$base,$reason,$name,$sum);
        return $result->execute();
    }



    public static function addNew($title,$description,$date,$user,$img){

        $db =db::getConnection();
        $sql = "INSERT INTO `news`( `title`, `description`, `date`, `avtor`, `img`) VALUES (?,?,?,?,?)";
        $result = $db->prepare($sql);
        $result->bind_param("sssss",$title,$description,$date,$user,$img);
        return $result->execute();
    }
}
<?php


class db
{
    public static function getConnection(){
        $paramsPath =ROOT.'/config/db_params.php';
        $params = include($paramsPath);

        // $db = new mysqli("localhost","root","","mvc_site");
        $dsn = "{$params['host']}";
        $db = new mysqli($dsn,$params['user'],$params['password'],$params['dbname']);
        return $db;
    }
}
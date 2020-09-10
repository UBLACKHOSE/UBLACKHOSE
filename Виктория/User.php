<?php
require 'db.php';

class User
{
    public static function checkName($name){
        if(strlen($name)>=4){
            return true;
        }
        return false;
    }

    public static function checkEmail($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
    public static function checkPassword($password){
        if(strlen($password)>=6){
            return true;
        }
        return false;
    }
    public static function checkEmailExists($email){
        $db =db::getConnection();

        $sql = "SELECT COUNT(*) as count FROM users WHERE email =?";
        $result = $db->prepare($sql);
        $result->bind_param("s",$email);
        $result->execute();
        $result->bind_result($row);

        $result->fetch();

        if($row)
        {
            return true;
        };
        return false;
    }
    public static function checkPasswordRepeat($password,$password_repeat){
        if ($password==$password_repeat){
            return true;
        }
        return false;
    }

    public static function register($login,$email,$password){
        $db =Db::getConnection();
        $sql = "INSERT INTO users (login,email,password) VALUE (?,?,?)";
        $result = $db->prepare($sql);
        $result->bind_param("sss",$login,$email,$password);
        return $result->execute();
    }

    public static function checkUserData($login,$password){
        $db =Db::getConnection();

        $sql = 'SELECT * FROM users WHERE login = ? and password = ?';
        $result = $db->prepare($sql);
        $result->bind_param("ss",$login,$password);
        $result->execute();
        $result->bind_result($row,$row2,$row3,$row4);
        $result ->fetch();

        if($row4==null){
            $row4 = 0;
        }
        if($row)
        {
            $arr = array('id'=>$row,'name'=>$row2);
            return $arr;
        };
        return false;
    }


    public static function auth($userID,$userLogin){
        $_SESSION['user'] = $userID;
        $_SESSION['userLogin'] = $userLogin;
    }

    public static function isGuest(){
        if (isset($_SESSION['user'])){
            return false;
        }
        return true;
    }
}
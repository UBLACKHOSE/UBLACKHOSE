<?php


class User
{
    public static function checkName($name){
        if(strlen($name)>=2){
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


        $db =db::getConnection();

        //формирование sql запроса
        $sql = "INSERT INTO users (login,email,password) VALUE (?,?,?)";
        $result = $db->prepare($sql);

        //Вставка значений
        $result->bind_param("sss",$login,$email,$password);
        //возвращение о отправки данных.true/false.
        return $result->execute();
    }



    public static function checkUserData($email,$password){
        $db =db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = ? and password = ?';
        $result = $db->prepare($sql);
        $result->bind_param("ss",$email,$password);
        $result->execute();
        $result->bind_result($row,$row2,$row3,$row4);
        $result ->fetch();

        if($row)
        {
            $arr = array('id'=>$row,'login'=>$row2);
            return $arr;
        };
        return false;
    }

    public static function auth($userID,$userLogin){
        $_SESSION['user'] = $userID;
        $_SESSION['userLogin'] = $userLogin;
    }

    public static function checkLogged(){

        if (isset($_SESSION['user'])){
            return $_SESSION['user'];
        }

        header("Location:/user/login");
    }


    public static function isGuest(){
        if (isset($_SESSION['user'])){
            return false;
        }
        return true;
    }


    public static function getUserById($id_user){
        if($id_user){
            $db = db::getConnection();
            $sql = "SELECT * FROM users WHERE id = ?";
            $result = $db->prepare($sql);
            $result ->bind_param("s",$id_user);
            $result->execute();
            $result->bind_result($row,$row2,$row3,$row4,$row5,$row6);
            $result->fetch();
            $arr = array('id'=>$row,'login'=>$row2,'email'=>$row3,'password'=>$row4);

            return $arr;
        }
    }
}
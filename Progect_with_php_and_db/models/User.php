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
        $db =Db::getConnection();
        $sql = "INSERT INTO users (login,email,password) VALUE (?,?,?)";
        $result = $db->prepare($sql);
        $result->bind_param("sss",$login,$email,$password);
        return $result->execute();
    }

    public static function checkUserData($email,$password){
        $db =Db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = ? and password = ?';
        $result = $db->prepare($sql);
        $result->bind_param("ss",$email,$password);
        $result->execute();
        $result->bind_result($row,$row2,$row3,$row4,$row5,$row6);
        $result ->fetch();

        if($row5==null){
            $row5 = 0;
        }
        if($row)
        {
            $arr = array('id'=>$row,'name'=>$row2,'img'=>$row5);
            return $arr;
        };
        return false;
    }
    public static function auth($userID,$userLogin,$userImg){
        $_SESSION['user'] = $userID;
        $_SESSION['userLogin'] = $userLogin;
        $_SESSION['userImg'] = $userImg;
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
            $arr = array('id'=>$row,'name'=>$row2,'email'=>$row3,'password'=>$row4,'img' =>$row5,'admin_rights'=>$row6);

            return $arr;
        }
    }

    public static function updateImgUser($id_user,$name_file){
        $_SESSION['userImg']=$name_file;
        $db = db::getConnection();
        $sql = "UPDATE `users` SET `img`=? WHERE id=?";
        $result = $db->prepare($sql);
        $result->bind_param("ss",$name_file,$id_user);
        $result->execute();
        return true;
    }
    public static function EditUserLogin($login,$id_user){

        $db = db::getConnection();
        $sql = "UPDATE `users` SET `login`=? WHERE `id`=?";
        $result = $db->prepare($sql);
        $result->bind_param("ss",$login,$id_user);
        return   $result->execute();;
    }

    public static function EditUserEmail($email,$id_user){
        $db = db::getConnection();
        $sql = "UPDATE `users` SET `email`=? WHERE `id`=?";
        $result = $db->prepare($sql);
        $result->bind_param("ss",$email,$id_user);
        return $result->execute();;

    }

    public static function checkPasswordUser($old_password,$id_user){
        $db = db::getConnection();

        $sql = "SELECT COUNT(*) as count FROM users WHERE password =? and id = ?";
        $result = $db->prepare($sql);
        $result->bind_param("ss",$old_password, $id_user);
        $result->execute();
        $result->bind_result($row);
        $result->fetch();

        if($row)
        {
            return true;
        }
        return false;
    }
    public static function EditUserPassword($password,$id_user){
        $db = db::getConnection();
        $sql = "UPDATE `users` SET `password`=? WHERE `id`=?";
        $result = $db->prepare($sql);
        $result->bind_param("ss",$password,$id_user);
        return $result->execute();;
    }


    public static function checkAdminRights($id_user){

        $db = db::getConnection();
        $sql = "SELECT admin_rights FROM users WHERE id = ?";
        $result = $db->prepare($sql);
        $result ->bind_param("s",$id_user);
        $result->execute();
        $result->bind_result($row);
        $result->fetch();
        return $row;

    }
}
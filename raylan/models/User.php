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
        $sql = "INSERT INTO users (login,email,password) VALUE (?,?,?)";
        $result = $db->prepare($sql);
        $result->bind_param("sss",$login,$email,$password);
        return $result->execute();
    }



    public static function checkUserData($email,$password){
        $db =db::getConnection();

        $sql = 'SELECT * FROM users WHERE email = ? and password = ?';
        $result = $db->prepare($sql);
        $result->bind_param("ss",$email,$password);
        $result->execute();
        $result->bind_result($row,$row2,$row3,$row4,$row5,$row6);
        $result ->fetch();

        if($row)
        {
            $arr = array('id'=>$row,'login'=>$row2,'img'=>$row5);
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
            $arr = array('id'=>$row,'login'=>$row2,'email'=>$row3,'password'=>$row4,$row5=>'img');
            return $arr;
        }
    }


    public static function getUserListInvoicesById($id_user){

        $db = db::getConnection();

        $InvoicesList = array();

        $result = $db->query("SELECT * FROM 
              invoices WHERE id_user = ".$id_user." ORDER BY `id`");

        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $InvoicesList[$i]['id'] = $row['id'];
            $InvoicesList[$i]['price'] = $row['price'];
            $InvoicesList[$i]['number'] = $row['number'];
            $InvoicesList[$i]['date_start'] = $row['date_start'];
            $InvoicesList[$i]['date_stop'] = $row['date_stop'];
            $InvoicesList[$i]['type'] = $row['type'];
            $InvoicesList[$i]['base'] = $row['base'];
            $InvoicesList[$i]['reason'] = $row['reason'];
            $InvoicesList[$i]['name'] = $row['name'];
            $InvoicesList[$i]['category'] = $row['category'];
            $i++;
        }
        return $InvoicesList;

    }

    public static function getPrice($id_user){

        if($id_user){
            $db = db::getConnection();
            $sql = "SELECT * FROM users WHERE id = ?";
            $result = $db->prepare($sql);
            $result ->bind_param("s",$id_user);
            $result->execute();
            $result->bind_result($row,$row2,$row3,$row4,$row5,$row6);
            $result->fetch();
            return $row6;
        }
    }

    public static function getOrder($id_order){

        if($id_order){
            $db = db::getConnection();
            $sql = "SELECT * FROM invoices WHERE id = ?";
            $result = $db->prepare($sql);
            $result ->bind_param("s",$id_order);
            $result->execute();
            $result->bind_result($row,$row2,$row3,$row4,$row5,$row6,$row7,$row8,$row9,$row10,$row11);
            $result->fetch();
            $arr = array('id'=>$row,'id_user'=>$row2,'price'=>$row3,'number'=>$row4,'date_start'=>$row5,'date_stop'=>$row6,'type'=>$row7,'base'=>$row8,'reason'=>$row9,'name'=>$row10,'category'=>$row11);
            return $arr;
        }

    }
}
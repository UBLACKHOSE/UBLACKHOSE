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
        $result->bind_result($row,$row2,$row3,$row4,$row5,$row6,$row7,$row8);
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




    public static function isGuest(){
        if (isset($_SESSION['user'])){
            return false;
        }
        return true;
    }


    public static function isAdmin(){
        if(isset($_SESSION['user'])) {
            $db = db::getConnection();
            $sql = "SELECT `status` FROM `users` WHERE id = ? ";
            $result = $db->prepare($sql);
            $result->bind_param("s", $_SESSION['user']);
            $result->execute();
            $result->bind_result($status);
            $result->fetch();
            if($status>0){
                return true;
            }
            else{
                return false;
            }
        }else {
            return false;
        }
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


    public static function getUserListInvoicesById($id_user_street){

        $db = db::getConnection();

        $InvoicesList = array();

        $result = $db->query("SELECT * FROM 
              invoices WHERE status = 0 and id_street = ".$id_user_street." ORDER BY `id`");

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


    public static function getUserStreet($id_str){

        if($id_str){
            $db = db::getConnection();
            $sql = "SELECT street.street,hous.house,`house/hous`.`id` FROM `house/hous`INNER JOIN `hous` ON `house/hous`.`id_hous`=`hous`.`id` INNER JOIN `street` ON `house/hous`.`id_street`=`street`.`id` WHERE `house/hous`.`id`= ?";
            $result = $db->prepare($sql);
            $result ->bind_param("s",$id_str);
            $result->execute();
            $result->bind_result($street,$house,$id_street);
            $result->fetch();
            $arr = array('id'=>$id_street,'street'=>$street,'house'=>$house);
            return $arr;
        }else{
            return null;
        }

    }




    public static function getPrice($id_user){

        if($id_user){
            $db = db::getConnection();
            $sql = "SELECT * FROM users WHERE id = ?";
            $result = $db->prepare($sql);
            $result ->bind_param("s",$id_user);
            $result->execute();
            $result->bind_result($row,$row2,$row3,$row4,$row5,$row6,$row7,$row8);
            $result->fetch();
            return $row6;
        }
    }

    public static function getOrder($id_order){

        if($id_order){
            $db = db::getConnection();
            $sql = "SELECT * FROM invoices WHERE id = ? and status = 0";
            $result = $db->prepare($sql);
            $result ->bind_param("s",$id_order);
            $result->execute();
            $result->bind_result($row,$row2,$row3,$row4,$row5,$row6,$row7,$row8,$row9,$row10,$row11,$row12);
            $result->fetch();
            $arr = array('id'=>$row,'id_user'=>$row2,'price'=>$row3,'number'=>$row4,'date_start'=>$row5,'date_stop'=>$row6,'type'=>$row7,'base'=>$row8,'reason'=>$row9,'name'=>$row10,'category'=>$row11);
            return $arr;
        }

    }

    public static function AddMoneyForProfil($id_user,$sum){
        if($id_user){
            $db = db::getConnection();
            $sql = "SELECT `balance` FROM `users` WHERE `id`= ?";
            $result = $db->prepare($sql);
            $result ->bind_param("s",$id_user);
            $result->execute();
            $result->bind_result($balance);
            $result->fetch();

            $balance = $balance+$sum;


            $db = db::getConnection();
            $sql = "UPDATE `users` SET `balance`= ? WHERE `id`=?";
            $result = $db->prepare($sql);
            $result->bind_param("ss",$balance,$id_user);
            return $result->execute();
        }
    }

    public static function OrderCart($id_order){
        if($id_order){
            $db = db::getConnection();
            $sql = "UPDATE `invoices` SET `status`=1 WHERE `id`=?";
            $result = $db->prepare($sql);
            $result->bind_param("s",$id_order);
            return $result->execute();
        }
    }
    public static function OrderSCH($id_order){
        if($id_order){

            $db = db::getConnection();
            $sql = "SELECT `balance` FROM `users` WHERE `id`= ?";
            $result = $db->prepare($sql);
            $result ->bind_param("s",$_SESSION['user']);
            $result->execute();
            $result->bind_result($balance);
            $result->fetch();

            $db = db::getConnection();
            $sql = "SELECT `price` FROM `invoices` WHERE `id`=?";
            $result = $db->prepare($sql);
            $result ->bind_param("s",$id_order);
            $result->execute();
            $result->bind_result($price);
            $result->fetch();

            if($price<=$balance){
                $db = db::getConnection();
                $sql = "UPDATE `invoices` SET `status`=1 WHERE `id`=?";
                $result = $db->prepare($sql);
                $result->bind_param("s",$id_order);
                $result->execute();

                $balance = $balance - $price;

                $db = db::getConnection();
                $sql = "UPDATE `users` SET `balance`= ? WHERE `id`=?";
                $result = $db->prepare($sql);
                $result->bind_param("ss",$balance,$_SESSION['user']);
                return $result->execute();
            }else{
                return "На вашем балансе недостаточно средств";
            }

        }
    }


    public static function getUserListInvoicesById2($id_street){

        $db = db::getConnection();

        $InvoicesList = array();

        $result = $db->query("SELECT * FROM invoices WHERE status = 1 and id_street = ".$id_street." ORDER BY `id`");
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


    public static function getStreetsList(){

        $db = db::getConnection();
        $arr = array();
        $result = $db->query("SELECT * FROM `street`");
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $arr[$i]['id'] = $row['id'];
            $arr[$i]['street'] = $row['street'];
            $i++;
        }


        return $arr;
    }

    public static function СheckHouse($id_street,$id_house){

        $db = db::getConnection();
        $result = $db->query("SELECT COUNT(*) as count FROM `house/hous` WHERE id_hous=".$id_house." AND id_street = ".$id_street);
        $row = $result->fetch_assoc();

        if ($row['count'] == 0){
            return false;
        }else {
            return true;
        }

    }

    public static function setStreetAndHouse($id_user,$id_street,$id_house){

        $db = db::getConnection();
        $sql = "SELECT id FROM `house/hous` WHERE `id_hous`=? and `id_street` = ? ";
        $result = $db->prepare($sql);
        $result ->bind_param("ss",$id_house,$id_street);
        $result->execute();
        $result->bind_result($id_hose_street);
        $result->fetch();

        $db = db::getConnection();
        $sql = "UPDATE `users` SET `street_id`=? WHERE `id` = ?";
        $result = $db->prepare($sql);
        $result->bind_param("ss",$id_hose_street,$id_user);
        $result->execute();
    }

    public static function getUserStreetId($id_user){

        $db = db::getConnection();
        $sql = "SELECT `street_id` FROM `users` WHERE id = ? ";
        $result = $db->prepare($sql);
        $result ->bind_param("s",$id_user);
        $result->execute();
        $result->bind_result($id_hose_street);
        $result->fetch();

        return $id_hose_street;
    }

    public static function updateImgUser($id_user,$img){
        $db = db::getConnection();
        $sql = "UPDATE `users` SET `img`= ? WHERE `id` = ?";
        $result = $db->prepare($sql);
        $result->bind_param("ss",$img,$id_user);
        $result->execute();
        $_SESSION['userImg'] =$img;
    }

    public static function getHouse($id_street,$id_house){

        $db = db::getConnection();
        $result = $db->query("SELECT id FROM `house/hous` WHERE id_hous=".$id_house." AND id_street = ".$id_street);
        $row = $result->fetch_assoc();
        return $row['id'];
    }

}
<?php


class UserController
{
    public function actionRegister(){
        $login = '';
        $email = '';
        $password = '';
        $password_repeat = '';
        $result = false;
        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $email = $_POST['Email'];
            $password = $_POST['password'];
            $password_repeat = $_POST['password_repeat'];
            $errors = false;
            if (!User::checkName($login)){
                $errors[] = "Логин не должен быть корочк 2х символов";
            }
            if (!User::checkEmail($email)){
                $errors[] = "Неправильный email";
            }
            if(!User::checkPassword($password)){
                $errors[] = 'Пароль не должен быть таким коротким';
            }
            if(User::checkEmailExists($email)){
                $errors[] = 'Такой Email уже используется';
            }
            if (!User::checkPasswordRepeat($password,$password_repeat)){
                $errors[] = 'Пароли должны совпадать';
            }
            if ($errors== false){
                $result = User::register($login,$email,$password);
            }
        }
        $act=6;
        require_once(ROOT . '/views/register.php');
        return true;
    }


    public function actionLogout(){
        unset($_SESSION['user']);
        unset($_SESSION['userLogin']);
        unset($_SESSION['userImg']);
        header("Location: /");
    }


    public function actionLogin(){


        $email = '';
        $password = '';
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId['id'],$userId['login'],$userId['img']);
                header("Location: /");
            }

        }
        $act=7;
        require_once (ROOT.'/views/login.php');
        return true;


    }

    public function actionCabinet(){
        if(!User::isGuest()){
        $id = $_SESSION['user'];
        $errors = false;
        $id_house_street = User::getUserStreetId($id);
        $street = User::getUserStreet($id_house_street);
        if($street == null){
            $errors = "Вы не указали улицу и дом в вашем профиле, нажмите на изменить профиль для указания";
        }else {
            $InvoicesList = array();
            $InvoicesList = User::getUserListInvoicesById($id_house_street);
            if($InvoicesList == null){
                $errors2 = "У вас пока нету не оплаченных счетов";
            }
        }

        $balance = User::getPrice($id);
        $act=8;
        require_once (ROOT.'/views/cabinet.php');
        }
        return true;
    }


    public function actionOrder($id_order){
        $item = array();
        $item = User::getOrder($id_order);
        $errors2 = false;
        if(!User::isGuest()) {
            $street = User::getUserStreet($_SESSION['user']);
            if ($street == null) {
                $errors = "Вы не указали улицу и дом в вашем профиле, нажмите на изменить профиль для указания";
            } else {
                $balance = User::getPrice($_SESSION['user']);
            }

            if (isset($_POST['submit'])) {
                $type = $_POST['type'];
                $errors2 = false;
                    if ($type == "cart") {
                        $errors2 = User::OrderCart($id_order);
                    }
                    if($type == "sch"){
                        $errors2 = User::OrderSCH($id_order);
                    }
                    if($errors2){
                        $errors2 = "Оплата прошла успешно";
                        header("Location: /user");
                    }
            }

        }

        require_once (ROOT.'/views/order.php');
        return true;
    }

    public function actionUp_balance(){
        if(!User::isGuest()) {
            $balance = User::getPrice($_SESSION['user']);
            $street = User::getUserStreet($_SESSION['user']);
            if ($street == null) {
                $errors = "Вы не указали улицу и дом в вашем профиле, нажмите на изменить профиль для указания";
            }else{
                $balance = User::getPrice($_SESSION['user']);
            }
            $errors = false;
            if (isset($_POST['submit'])) {
                $sum = $_POST['sum'];
                $type = $_POST['type'];
                if($sum!=null){
                    User::AddMoneyForProfil($_SESSION['user'],$sum);
                    header("Location: /user/up_balance");
                }else{
                    $errors = "Введите правильно данные";
                }

            }
        }

        require_once (ROOT.'/views/up_balance.php');
        return true;
    }


    public function actionHistory(){
        if(!User::isGuest()) {

            $id_house_street = User::getUserStreetId($_SESSION['user']);
            $street = User::getUserStreet($id_house_street);
            $balance = User::getPrice($_SESSION['user']);
            print_r( $street);
            if ($street == null) {
                $errors = "Вы не указали улицу и дом в вашем профиле, нажмите на изменить профиль для указания";
            }
            else
            {
                $balance = User::getPrice($_SESSION['user']);
                $InvoicesList = User::getUserListInvoicesById2(User::getUserStreetId($_SESSION['user']));
                if($InvoicesList==null){
                    $errors2 = "У вас пока нету оплаченных счетов";
                }
            }
            require_once(ROOT . '/views/history.php');
        }
        return true;
    }


    public function actionEdit(){
        if(!User::isGuest()){
            $id = $_SESSION['user'];
            $errors = false;
            $street = User::getUserStreet($id);
            if($street == null){
                $errors = "Вы не указали улицу и дом в вашем профиле, нажмите на изменить профиль для указания";
            }else {

            }

            $streets = User::getStreetsList();
            $balance = User::getPrice($id);

            if (isset($_POST['submit'])) {
                $id_street_input = $_POST['street'];
                $house = $_POST['house'];

                if(User::СheckHouse($id_street_input,$house)){

                    $errors2 = "Улица профиля изменина";
                    User::setStreetAndHouse($id,$id_street_input,$house);
                    header("Location: /user/edit");
                }else{
                    $errors2 = "Неправильно введена улица или дом";
                }
            }


            if(isset($_POST['submit2'])) {
                if (!empty($_FILES['myfile']['tmp_name'])) {

                        $upload_path = ROOT . "/template/img/img_user/";
                        $user_filename = $_FILES['myfile']['name'];
                        $userfile_basename = pathinfo($user_filename, PATHINFO_FILENAME);
                        $userfile_extension = pathinfo($user_filename, PATHINFO_EXTENSION);


                        $server_filename = $userfile_basename . ".png";
                        $server_filepath = $upload_path . $server_filename;


                        if (copy($_FILES['myfile']['tmp_name'], $server_filepath)) {
                            User::updateImgUser($_SESSION['user'], $server_filename);
                            $response['myfile'] = $server_filename;
                            $response['status'] = 'ok';
                        }
                    $response['text'] = 'file exist';
                    header("Location: /user/edit");
                }
            }
            $act=8;
            require_once (ROOT.'/views/edit.php');
        }
        return true;
    }
}
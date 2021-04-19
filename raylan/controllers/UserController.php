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

    public function actionCabinet($id){

        $InvoicesList = array();
        $InvoicesList = User::getUserListInvoicesById($id);
        $balance = User::getPrice($id);
        $act=8;
        require_once (ROOT.'/views/cabinet.php');
        return true;
    }


    public function actionOrder($id_order){
        $item = array();
        $item = User::getOrder($id_order);
        require_once (ROOT.'/views/order.php');
        return true;
    }

}
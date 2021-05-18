<?php


class UserController
{
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
                User::auth($userId['id'],$userId['login']);

                //перебрасываем на главную
                header("Location: /");
            }
        }

        require_once (ROOT.'/views/login.php');
        return true;
    }




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
            // Проверка на существования такого email
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

        require_once(ROOT . '/views/register.php');
        return true;
    }

    public function actionLogout(){
        unset($_SESSION['user']);
        header("Location: /");
    }
}
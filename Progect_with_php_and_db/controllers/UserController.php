<?php


require_once (ROOT.'/models/User.php');


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
                User::auth($userId['id'],$userId['name'],$userId['img']);
                header("Location: /");
            }

        }

        require_once (ROOT.'/views/user/login.php');
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

        require_once(ROOT . '/views/user/register.php');
        return true;
    }





    public function actionLogout(){
        unset($_SESSION['user']);
        header("Location: /");
    }



    public  function actionEdit(){
        if (isset($_SESSION['user'])) {
            $userID = User::checkLogged();
            $user = User::getUserById($userID);
            if(isset($_POST['login_text'])&& $_POST['login_text']!='' && isset($_POST['login'])){

                $login = $_POST['login_text'];
                $errors_login = false;

                if (!User::checkName($login)){
                    $errors_login[] = "Логин не должен быть корочк 2х символов";
                }
                if ($errors_login== false){
                    User::EditUserLogin($login,$_SESSION['user']);
                    $_SESSION['userLogin'] = $login;
                    header('location: /user/edit/');
                }
            }
            if(isset($_POST['email_text'])&& $_POST['email_text']!='' && isset($_POST['email'])){

                $email = $_POST['email_text'];
                $errors_email = false;

                if (!User::checkEmail($email)){
                    $errors_email[] = "Логин не должен быть корочк 2х символов";
                }
                if(User::checkEmailExists($email)){
                    $errors_email[] = 'Такой Email уже используется';
                }
                if ($errors_email== false){
                    $success_email[] = 'Успешная смена Email';
                    User::EditUserEmail($email,$_SESSION['user']);
                    header('location: /user/edit/');
                }
            }
            if(isset($_POST['password'])){
                $old_password = $_POST['old_password'];
                $new_password =  $_POST['new_password'];
                $errors_password = false;
                if(User::checkPasswordUser($old_password,$_SESSION['user'])){

                if(!User::checkPassword($new_password)){
                    $errors_password[] = 'Пароль не должен быть таким коротким';
                }
                    if ($errors_password== false){
                        if (User::EditUserPassword($new_password,$_SESSION['user'])){
                            $success_password[] = 'Успешная смена Пароля';
                            header('location: /user/edit/');
                        }
                    }
                }
                else
                    {
                    $errors_password[] = 'Старый пароль не совпадает';
                }
            }
            require_once(ROOT . '/views/user/edit.php');
        }
        else{
            header('/login/');
        }
        return true;
    }




    public function actionEdit_img(){
        header('Content-Type: application/json; charset=utf-8');
        $response = array();
        $response['status']='bad';

        if(!empty($_FILES['file']['tmp_name'])){
            for($key=0;$key<count($_FILES['file']['tmp_name']);$key++){
                $upload_path = ROOT."/template/img/img_user/";
                $user_filename = $_FILES['file']['name'][$key];
                $userfile_basename = pathinfo($user_filename,PATHINFO_FILENAME);
                $userfile_extension = pathinfo($user_filename,PATHINFO_EXTENSION);


                $server_filename = $userfile_basename .".png";
                $server_filepath = $upload_path. $server_filename;

//               $i=0;
//                while(file_exists($server_filepath)){
//                    $i++;
//                    $server_filepath = $upload_path.$userfile_basename."($i)".'.png';
//                }
                if(copy($_FILES['file']['tmp_name'][$key],$server_filepath)){
                    User::updateImgUser($_SESSION['user'],$server_filename);
                    $response['file'] = $server_filename;
                    $response['status'] ='ok';
                }
            }
            $response['text'] = 'file exist';
        }


        echo json_encode($response);
        return true;
    }




}
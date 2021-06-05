<?php


class UserController
{
    public function actionRegister()
    {
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
            if (!User::checkName($login)) {
                $errors[] = "Логин не должен быть корочк 2х символов";
            }
            if (!User::checkEmail($email)) {
                $errors[] = "Неправильный email";
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть таким коротким';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой Email уже используется';
            }
            if (!User::checkPasswordRepeat($password, $password_repeat)) {
                $errors[] = 'Пароли должны совпадать';
            }
            if ($errors == false) {
                $result = User::register($login, $email, $password);
            }
        }
        $act = 6;
        require_once(ROOT . '/views/register.php');
        return true;
    }


    public function actionLogout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['userLogin']);
        unset($_SESSION['userImg']);
        header("Location: /");
    }


    public function actionLogin()
    {


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
                User::auth($userId['id'], $userId['login'], $userId['img']);
                header("Location: /");
            }

        }
        $act = 7;
        require_once(ROOT . '/views/login.php');
        return true;


    }

    public function actionCabinet()
    {
        if (!User::isGuest()) {
            $id = $_SESSION['user'];
            $cart = User::getCart($_SESSION['user']);
            $errors = false;


            if (isset($_SESSION["ec"]) && $_SESSION["ec"] == 2) {
                $_SESSION["errors3"] = NULL;
                $_SESSION["ec"] = NULL;
            } else {
                $_SESSION["ec"] = 2;
            }


            $id_house_street = User::getUserStreetId($id);
            $street = User::getUserStreet($id_house_street);
            if ($street == null) {
                $errors = "Вы не указали улицу и дом в вашем профиле, нажмите на изменить профиль для указания";
            } else {
                if (isset($_POST['submit'])) {
                    if($_POST['cod']==321456){
                    $id_order = $_POST['id_order'];
                    $id_number = $_POST['id_number'];
                    if (!User::OrderCart($id_order)) {
                        $_SESSION["errors3"] = "Что то пошло не так";
                    } else {
                        $_SESSION["errors3"] = "Счет № " . $id_number . " оплачен";
                        $_SESSION["ec"] = 1;
                    }
                    header("Location: /user/");
                    }else{
                        $_SESSION["errors3"] = "Что то пошло не так";
                    }
                }
                $InvoicesList = array();
                $InvoicesList = User::getUserListInvoicesById($id_house_street);
                if ($InvoicesList == null) {
                    $errors2 = "У вас пока нету не оплаченных счетов";
                }

            }

            $act = 8;
            require_once(ROOT . '/views/cabinet.php');

        }
        return true;

    }


    public function actionOrder($id_order)
    {
        $item = array();
        $item = User::getOrder($id_order);
        $errors2 = false;
        if (!User::isGuest()) {
            $street = User::getUserStreet($_SESSION['user']);
            if ($street == null) {
                $errors = "Вы не указали улицу и дом в вашем профиле, нажмите на изменить профиль для указания";
            }

            if (isset($_POST['submit'])) {
                $type = $_POST['type'];
                $errors2 = false;
                if ($type == "cart") {
                    $errors2 = User::OrderCart($id_order);
                }
                if ($type == "sch") {
                    $errors2 = User::OrderSCH($id_order);
                }
                if ($errors2 != "На вашем балансе недостаточно средств") {
                    $errors2 = "Оплата прошла успешно";
                }
            }

        }

        require_once(ROOT . '/views/order.php');
        return true;
    }


    public function actionHistory()
    {
        if (!User::isGuest()) {
            $id_house_street = User::getUserStreetId($_SESSION['user']);
            $cart = User::getCart($_SESSION['user']);
            $street = User::getUserStreet($id_house_street);
            if ($street == null) {
                $errors = "Вы не указали улицу и дом в вашем профиле, нажмите на изменить профиль для указания";
            } else {
                $InvoicesList = User::getUserListInvoicesById2(User::getUserStreetId($_SESSION['user']));
                if ($InvoicesList == null) {
                    $errors2 = "У вас пока нету оплаченных счетов";
                }
            }
            require_once(ROOT . '/views/history.php');
        }
        return true;
    }


    public function actionEdit()
    {
        if (!User::isGuest()) {
            $id = $_SESSION['user'];
            $errors = false;
            $id_house_street = User::getUserStreetId($_SESSION['user']);
            $street = User::getUserStreet($id_house_street);

            $cart = User::getCart($_SESSION['user']);

            if ($street == null) {
                $errors = "Вы не указали улицу и дом в вашем профиле, нажмите на изменить профиль для указания";
            }
            $streets = User::getStreetsList();

            if (isset($_POST['submit'])) {
                $id_street_input = $_POST['street'];
                $house = $_POST['house'];

                if (User::СheckHouse($id_street_input, $house)) {

                    $errors2 = "Улица профиля изменина";
                    User::setStreetAndHouse($id, $id_street_input, $house);
                    header("Location: /user/edit");
                } else {
                    $errors2 = "Неправильно введена улица или дом";
                }
            }


            if (isset($_POST['submit2'])) {
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

            if (isset($_POST['cart_sub'])) {
                $num_cart = $_POST['num_cart'];
                if (User::checkPassword($num_cart)) {
                    if (strlen($num_cart) == 19) {
                        User::updateCart($num_cart);
                        header("Location: /user/edit");
                    } else
                        $errors = "Неправильно введены данные карты";
                }
            }

            $act = 8;
            require_once(ROOT . '/views/edit.php');
        }
        return true;
    }

    public function actionPolit()
    {
        require_once(ROOT . '/views/politika.php');
        return true;
    }
}
<?php

require 'User.php';
$login = '';
$password = '';
if (isset($_POST['submit']) && isset($_POST['password']) && isset($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $errors = false;

//     Валидация полей
    if (!User::checkName($login)) {
        $errors[] = 'Неправильный логин';
    }
    if (!User::checkPassword($password)) {
        $errors[] = 'Пароль не должен быть короче 6-ти символов';
    }
//
    // Проверяем существует ли пользователь
    $userId = User::checkUserData($login, $password);

    if ($userId == false) {
        // Если данные неправильные - показываем ошибку
        $errors[] = 'Неправильные данные для входа на сайт';
    }
    else {
        // Если данные правильные, запоминаем пользователя (сессия)
        User::auth($userId['id'],$userId['name']);
        header("Location: index.php");
    }
}
require_once 'HandF/header.php';
?>
<h4 class="card-title mt-5 text-center">Вход</h4>


<?php if (isset($errors)&& is_array($errors)):?>
    <div class="text-center">
        <ul>
            <li>- <?echo $errors[0]?></li>
        </ul>
    </div>
<?endif;?>


<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 mt-5">
            <form action="#" method="post">
                <div class="form-group input-group">
                    <input name="login" class="form-control" placeholder="Логин" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <input name="password" class="form-control" placeholder="Пароль" type="password">
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-dark btn-block"> Вход  </button>
                </div> <!-- form-group// -->
            </form>
        </div>
    </div>
</div>

<?php
require_once 'HandF/footer.php';
?>



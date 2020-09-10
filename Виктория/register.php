<?php
require_once 'HandF/header.php';

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
?>

<?php if ($result): ?>
    <h4 class="card-title mt-3 text-center">Вы зарегистрированы!</h4>
<?php else:?>
    <h4 class="card-title mt-5 text-center">Регистрация</h4>
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
                        <input name="login" class="form-control" placeholder="Логин" type="text" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <input name="Email" class="form-control" placeholder="Email" type="email" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">

                        <input name="password" class="form-control" placeholder="Придумайте пароль" type="password" required>
                    </div>
                    <div class="form-group input-group">

                        <input name="password_repeat" class="form-control" placeholder="Повторите пароль" type="password" required>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-dark btn-block"> Зарегистрироваться  </button>
                    </div> <!-- form-group// -->
                    <p class="text-center">Уже есть акаунт? <a href="/user/login/">Авторизоваться</a> </p>
                </form>
            </div>
        </div>
    </div>

<?php
endif;
require_once 'HandF/footer.php';
?>
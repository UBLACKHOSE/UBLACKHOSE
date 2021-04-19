<?php
require_once(ROOT . '/views/header_and_footer/header.php');
?>
<?php if ($result): ?>
    <h4 class="card-title mt-3 text-center">Вы зарегистрированы!</h4>
<?php else:?>
    <h4 class="card-title mt-3 text-center">Регистрация</h4>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 mt-5">
                <?php if (isset($errors)&& is_array($errors)):?>
                    <ul>
                        <li>- <?echo $errors[0]?></li>
                    </ul>
                <?endif;?>
                <form action="#" method="post">
                    <div class="form-group input-group">
                        <input name="login" class="form-control" placeholder="Логин" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <input name="Email" class="form-control" placeholder="Email" type="email">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <input name="password" class="form-control" placeholder="Придумайте пароль" type="password">
                    </div>
                    <div class="form-group input-group">

                        <input name="password_repeat" class="form-control" placeholder="Повторите пароль" type="password">
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-dark btn-block"> Зарегистрироваться  </button>
                    </div> <!-- form-group// -->
                    <p class="text-center">Уже есть акаунт? <a href="/user/login/">Авторизоваться</a> </p>
                </form>
            </div>
        </div>
    </div>
<? endif;?>
<?php
require_once(ROOT . '/views/header_and_footer/footer.php');
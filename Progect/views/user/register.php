<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>

            <h4 class="card-title mt-3 text-center">Create Account</h4>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 mt-5">
                <form action="#" method="post">
                <div class="form-group input-group">
                    <input name="" class="form-control" placeholder="Логин" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <input name="" class="form-control" placeholder="Email" type="email">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <select class="custom-select" style="max-width: 120px;">
                        <option selected="">+7</option>
                    </select>
                    <input name="" class="form-control" placeholder="Телефонный номер" type="text">
                </div>
                <div class="form-group input-group">

                    <input class="form-control" placeholder="Придумайте пароль" type="password">
                </div>
                <div class="form-group input-group">

                    <input class="form-control" placeholder="Повторите пароль" type="password">
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Зарегистрироваться  </button>
                </div> <!-- form-group// -->
                <p class="text-center">Уже есть акаунт? <a href="/user/login/">Авторизоваться</a> </p>
            </form>
            </div>
        </div>
    </div>


<?php require_once (ROOT.'/views/header_and_footer/footer.php')?>
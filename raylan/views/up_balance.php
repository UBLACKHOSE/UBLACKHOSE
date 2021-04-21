<?php require_once(ROOT . '/views/header_and_footer/header.php'); ?>

    <section class="ptb-30">
        <div class="container">
            <div class="row">

                <div class="order-1 order-lg-0 col-md-12 col-lg-8">
                    <?if($errors){?>
                            <div class="text-center">
                                <ul>
                                    <li>- <?echo $errors?></li>
                                </ul>
                            </div>
                    <?}?>
                    <form method="post" action="#">
                        <h2 class="mtb-20"><b>Способ пополнения</b></h2>
                        <select class="btn-dark ml-4 btn" size="1" name="type">
                            <option value="cart">Банковская карта</option>
                        </select>
                        <h2 class="mtb-20"><b>Сумма пополнения</b></h2>
                        <div class="input-group mb-3">
                            <input type="number" name="sum" class="form-control" aria-label="Сумма">
                            <div class="input-group-append">
                                <span class="input-group-text">Р</span>
                            </div>
                        </div>
                        <div class="order-1 order-lg-0 col-md-12">
                            <div class="ptb-0">
                                <a class="float-right">
                                    <button name="submit" type="submit" class="site-btn">Оплатить</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div><!-- col-sm-8 -->

                <div class="order-0  order-lg-1 col-md-12 col-lg-4">
                    <div class="mt-30 p-30 plr-40 card-view text-center">
                        <h4><b><?= $_SESSION['userLogin'] ?></b></h4>
                        <img class="mtb-20 max-w-100x mlr-auto" src="/template/img/img_user/<?= $_SESSION['userImg'] ?>"
                             alt="">

                        <h6><a class="mt-15 plr-20 dplay-block" type="submit"><b>Баланс:<?=$balance?>р</b></a></h6>
                        <div class="form-sm max-w-400x mlr-auto">
                            <h6><a href="/user/edit" class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>Изменить
                                        профиль</b></a></h6>
                        </div>
                        <div class="form-sm max-w-400x mlr-auto">
                            <h6><a class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" href="/user/up_balance" type="submit"><b>Пополнить баланс</b></a></h6>
                        </div>
                        <div class="form-sm max-w-400x mlr-auto">
                            <h6><a href="/user/history" class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>История платежей</b></a></h6>
                        </div>
                        <div class="ptb-0">
                            <h4 class="mtb-20"><b>Ваш адрес:</b><?if($street != null){?><?=$street['house'] ?> улица, <?=$street['street'] ?> дом<?}else{echo '                    
                        <div class="form-sm max-w-400x mlr-auto">
                        <h6><a class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>Указать</b></a></h6>
                    </div>';}?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once(ROOT . '/views/header_and_footer/footer.php');
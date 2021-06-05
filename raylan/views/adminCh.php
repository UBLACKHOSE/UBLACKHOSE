<?php require_once(ROOT . '/views/header_and_footer/header.php'); ?>
    <section class="ptb-30">
        <div class="container">
            <div class="row">

                <div class="order-1 order-lg-0 col-md-12">
                    <div class="ptb-0">
                        <h2 class="mtb-20"><b>Создание счёта </b></h2>
                    </div>
                    <?if(isset($errors2)) {?>
                            <h4><?echo $errors2;?></h4>
                    <form action="#" method="post">
                            <div class="order-1 order-lg-0 col-md-12 mt-50">
                                <div class="ptb-0">
                                    <a class="float-right">
                                        <button name="submit2" type="submit" class="site-btn">Создать еще один счёт</button>
                                    </a>
                                </div>
                            </div>
                    </form>
                        <?} else {?>
                            <?if($errors){
                                echo '<h4>'.$errors.'</h4>';
                        }?>
                    <form action="#" method="post">
                        <h4>Введите улицу:</h4>
                        <div class="input-group mb-3">
                            <select class="form-control"  size="1" name="street" required>
                                <?foreach ($streets as $item){?>
                                    <option value="<?=$item['id']?>"><?=$item['street']?></option>
                                <?}?>
                            </select>
                        </div>
                        <h4>Введите дом:</h4>
                        <div class="input-group mb-3">
                            <input type="number" name="house" class="form-control" aria-label="Дом" value="<?=$house?>" required>
                            <div class="input-group-append">
                                <span class="input-group-text">Дом</span>
                            </div>
                        </div>
                        <h4>Введите номер счета:</h4>
                        <div class="input-group mb-3">
                            <input type="number" name="number" class="form-control" aria-label="Дом" value="<?=$number?>" required>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h4>Введите дату выставления счета</h4>
                                <input name="date_start" type="date" class="form-control" value="<?=$date_start?>"  required>
                            </div>
                            <div class="col">
                                <h4>Введите дата окончания счета</h4>
                                <input name="date_stop" type="date" class="form-control" value="<?=$date_stop?>"  required>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <h4>Введите тип счета</h4>
                                <input name="type" type="text" class="form-control" placeholder="Тип счета" value="<?=$type?>" required>
                            </div>
                            <div class="col">
                                <h4>Введите базу расчета</h4>
                                <input name="base" type="text" class="form-control" value="<?=$base?>" placeholder="База расчета" required>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col">
                                <h4>Введите основания</h4>
                                <input name="reason" type="text" class="form-control" value="<?=$reason?>" placeholder="Основания" required>
                            </div>
                            <div class="col">
                                <h4>Введите название услуги</h4>
                                <input name="name" type="text" class="form-control" value="<?=$name?>" placeholder="Название" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <h4>Введите сумму</h4>
                                <input name="summ" type="number" class="form-control" value="<?=$sum?>" placeholder="Сумма" required>
                            </div>
                        </div>

                        <div class="order-1 order-lg-0 col-md-12 mt-50">
                            <div class="ptb-0">
                                <a class="float-right">
                                    <button name="submit" type="submit" class="site-btn">Создать счёт</button>
                                </a>
                            </div>
                        </div>
                    </form>
                    <?}?>
                </div><!-- col-sm-8 -->
            </div>
        </div>
    </section>

<?php require_once(ROOT . '/views/header_and_footer/footer.php');
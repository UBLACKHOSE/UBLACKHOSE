<?php require_once(ROOT . '/views/header_and_footer/header.php') ?>
<section class="ptb-30">
    <div class="container">
        <div class="row">

            <div class="order-1 order-lg-0 col-md-12 col-lg-8">
                <div class="ptb-0">
                    <h2 class="mtb-20"><b>Изменение профиля</b></h2>
                </div>
                <?if(isset($errors2)){
                    echo $errors2;
                }?>
                <form action="#" method="post">
                    <h4>Введите улицу:</h4>
                    <div class="input-group mb-3">
                    <select  class="btn form-control" size="1" name="street" >
                        <?foreach ($streets as $item){?>
                        <option value="<?=$item['id']?>"><?=$item['street']?></option>
                        <?}?>
                    </select>
                    </div>
                    <h4>Введите дом:</h4>
                    <div class="input-group mb-3">
                        <input type="number" name="house" class="form-control" aria-label="Дом" value="<?=$street['house'] ?>">
                        <div class="input-group-append">
                            <span class="input-group-text">Дом</span>
                        </div>
                    </div>
                    <div class="order-1 order-lg-0 col-md-12">
                        <div class="ptb-0">
                            <a class="float-right">
                                <button name="submit" type="submit" class="site-btn">Изменить</button>
                            </a>
                        </div>
                    </div>
                </form>
                <form class="mt-50" action="#" method="post" enctype="multipart/form-data" id="myForm" >
                    <h4>Изменить фото профиля:</h4>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Загрузить</span>
                        </div>
                        <div class="custom-file">
                            <input name="myfile" id="customFile"  type="file" class="custom-file-input" accept=".jpg, .jpeg, .png ">
                            <label id="namefile" class="custom-file-label" for="customFile">Выбрать файл</label>
                        </div>
                    </div>
                    <div class="order-1 order-lg-0 col-md-12">
                        <div class="ptb-0">
                            <a class="float-right">
                                <button name="submit2" type="submit" class="site-btn">Изменить</button>
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
                        <h4 class="mtb-20"><b>Ваш адрес:</b><?if($street != null){?> <?=$street['street'] ?> улица, <?=$street['house'] ?> дом<?}else{echo '                    
                        <div class="form-sm max-w-400x mlr-auto">
                        <h6><a href="/user/edit"  class="mt-15 plr-20 btn-b-sm btn-fill-primary dplay-block" type="submit"><b>Указать</b></a></h6>
                    </div>';}?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(
        function () {
            var avatar= $('#customFile');
            avatar.change(function () {
                if(($("#customFile")[0].files).length!=0) {
                    document.getElementById('namefile').innerHTML = avatar.val();
                    document.getElementById('namefile').style.display = 'block';
                }
            });
        }
    )
</script>




<?php require_once(ROOT . '/views/header_and_footer/footer.php') ?>

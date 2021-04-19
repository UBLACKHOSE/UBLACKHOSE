<?php require_once (ROOT.'/views/header_and_footer/header.php')?>
<section class="ptb-30">
    <div class="container">
        <div class="row">

            <div class="order-1 order-lg-0 col-md-12">
                <div class="ptb-0">
                    <h2 class="mtb-20"><b>Оплата</b></h2>
                </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-7">
                                <h4>Счет №<?= $item['number'] ?></h4>
                                <p><b>Тип </b>: <?= $item['type'] ?></p>
                            </div>
                            <div class="col-lg-5">
                                <h3 class="float-right ml-4"><?= $item['price'] ?>р</h3>
                            </div>
                        </div>
                        <div class="p-30 mb-30 card-view">
                            <h4 class="p-title"><b>Иформация</b></h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><b>Дата выставления счета:</b> <?= $item['date_start'] ?></p>
                                    <p><b>Категория:</b> <?= $item['category'] ?></p>
                                    <p><b>База расчета:</b> <?= $item['base'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Дата просрачивания счета:</b><?= $item['date_stop'] ?></p>
                                    <p><b>Основания:</b> <?= $item['reason'] ?></p>
                                    <p><b>Наиминование услуги:</b> <?= $item['name'] ?></p>
                                </div>
                            </div>
                            <h4 class="p-title"><b>Файл:</b></h4>
                        </div>
                        <div class="mb-20 brdr-grey-1 opacty-6"></div>
                    </div>
            </div><!-- col-sm-8 -->
        </div>
    </div>
</section>
<section class="ptb-30">
    <div class="container">
        <div class="row">
            <div class="order-1 order-lg-0 col-md-12">
                <div class="ptb-0">
                    <a href="/user/order/price_id-<?= $item['id'] ?>" class="float-right">
                        <button id="<?= $item['id'] ?>" class="site-btn">Оплатить</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?require_once (ROOT.'/views/header_and_footer/footer.php')?>

<?php require_once (ROOT.'/views/header_and_footer/header.php')?>



    <section class="pt-30 pb-0">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12">

                    <div class="pb-2">
                        <a class="mt-10" href="/"><i class="mr-5 ion-ios-home"></i><b>Главная</b></a>
                        <a class="mt-10 color-ash" href="/contacts"><i class="mlr-10 ion-chevron-right"></i><b>Контакты</b></a>
                    </div>

                </div><!-- col-sm-12 -->
            </div><!-- row -->
        </div><!-- container -->
    </section>


    <section class="pt-0 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="p-30 mb-30 card-view">
                        <h4 class="p-title"><b>Письмо в администрацию</b></h4>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="mb-30" type="text" placeholder="Имя">
                                </div><!-- col-sm-6 -->
                                <div class="col-sm-6">
                                    <input class="mb-30" type="text" placeholder="Email">
                                </div><!-- col-sm-6 -->
                                <div class="col-sm-12">
                                    <textarea class="mb-30" placeholder="Сообщение"></textarea>
                                </div><!-- col-sm-12 -->

                            </div><!-- row -->
                            <a class="btn-fill-primary plr-20" href="#"><b>Отправить</b></a>
                        </form>
                    </div><!-- card-view -->
                </div><!-- col-sm-12 -->
                <div class="col-md-12 col-lg-4">

                    <div class="p-30 mb-30 card-view">
                        <h4 class="p-title"><b>Наши контакты</b></h4>
                        <ul class="list-contact list-li-mb-20">
                            <li><i class="ion-ios-home"></i>Где то в россии</li>
                            <li><a href="#"><i class="ion-ios-telephone"></i>(+8)223-343-12-13</a></li>
                            <li><a href="#"><i class="ion-email"></i>Support@mail.ru</a></li>
                        </ul>
                    </div><!-- card-view -->
                </div><!-- col-sm-12 -->

            </div><!-- row -->
        </div><!-- container -->
    </section>
<?php require_once (ROOT.'/views/header_and_footer/footer.php')?>
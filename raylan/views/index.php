<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>


<section class="pt-0 bg-primary">

    <div class="plr-50 oflow-hidden">
        <div class="p-3">
            <a class="plr-10 mtb-10 btn-b-md" style="font-size: 5em;" href="/">Новости</a>
        </div>
    </div>
    <div class="plr-50 h-600x h-md-800x h-xs-1000x oflow-hidden">

        <div class="w-60 w-md-100 float-left float-md-none h-100 h-md-40 h-xs-50">

            <div class="w-50 w-xs-100 float-left float-xs-none pos-relative h-100 h-xs-50">
                <!-- Image as bg-1 -->
                <div class="img-bg bg-1 bg-grad-layer-6" style="background-image: url('/template/img/img_news/<?php echo $news[0]['img']?>')"></div>

                <div class="abs-blr color-white p-20">
                    <h3 class="mb-10 mb-sm-5 t-upper">
                        <a class="hover-grey" href="/news/<?php echo $news[0]['id']?>"><b><?php echo $news[0]['title']?></b></a></h3>
                    <ul class="list-li-mr-10 color-grey">
                        <li><i class="mr-5 font-12 ion-clock"></i><?php echo $news[0]['date']?></li>
                        <li><i class="mr-5 font-12 ion-android-person"></i>Опубликовал: <?php echo $news[0]['avtor']?></li>
                    </ul>
                </div><!--abs-blr -->
            </div><!-- w-50 -->

            <div class="w-50 w-xs-100 float-left float-xs-none pos-relative h-100 h-xs-50 pt-xs-10">
                <div class="mlr-10 mr-md-0 ml-xs-0 pos-relative h-100">
                    <!-- Image as bg-2 -->
                    <div class="img-bg bg-2 bg-grad-layer-6" style="background-image: url('/template/img/img_news/<?php echo $news[1]['img']?>')"></div>

                    <div class="abs-blr color-white p-20">
                        <h3 class="mb-10 mb-sm-5 t-upper">
                            <a class="hover-grey" href="/news/<?php echo $news[1]['id']?>"><b><?php echo $news[1]['title']?></b></a></h3>
                        <ul class="list-li-mr-10 color-grey">
                            <li><i class="mr-5 font-12 ion-clock"></i><?php echo $news[1]['date']?></li>
                            <li><i class="mr-5 font-12 ion-android-person"></i>Опубликовал: <?php echo $news[1]['avtor']?></li>
                        </ul>
                    </div><!--abs-blr -->
                </div><!-- w-50 -->
            </div><!-- w-50 -->

        </div><!-- w-60 -->
        <div class="w-40 w-md-100 float-left float-md-none h-100 h-md-60 h-xs-50">

            <div class="h-50 pb-5 pt-md-10">
                <div class="h-100 pos-relative">
                    <!-- Image as bg-3 -->
                    <div class="img-bg bg-3 bg-grad-layer-6" style="background-image: url('/template/img/img_news/<?php echo $news[2]['img']?>')"></div>

                    <div class="abs-blr color-white p-20">
                        <h3 class="mb-10 mb-sm-5 t-upper">
                            <a class="hover-grey" href="/news/<?php echo $news[2]['id']?>"><b><?php echo $news[2]['title']?> </b></a></h3>
                        <ul class="list-li-mr-10 color-ash">
                            <li><i class="mr-5 font-12 ion-clock"></i><?php echo $news[2]['date']?></li>
                            <li><i class="mr-5 font-12 ion-android-person"></i>Опубликовал: <?php echo $news[2]['avtor']?></li>
                        </ul>
                    </div><!--abs-blr -->
                </div><!-- h-50 -->
            </div><!-- h-50 -->

            <div class="h-50 pt-5">
                <div class="h-100 pos-relative">
                    <!-- Image as bg-4 -->
                    <div class="img-bg bg-4 bg-grad-layer-6" style="background-image: url('/template/img/img_news/<?php echo $news[3]['img']?>')"></div>

                    <div class="abs-blr color-white p-20">
                        <h3 class="mb-10 mb-sm-5 t-upper">
                            <a class="hover-grey" href="/news/<?php echo $news[3]['id']?>"><b><?php echo $news[3]['title']?></b></a></h3>
                        <ul class="list-li-mr-20 color-grey">
                            <li><i class="mr-5 font-12 ion-clock"></i><?php echo $news[3]['date']?></li>
                            <li><i class="mr-5 font-12 ion-android-person"></i>Опубликовал: <?php echo $news[3]['avtor']?></li>
                        </ul>
                    </div><!--abs-blr -->
                </div><!-- h-50 -->
            </div><!-- h-50 -->

        </div><!-- w-40 -->
    </div><!-- wrapper -->
</section>

<section class="ptb-30">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-12">

                <div class="ptb-0">
                    <h2 class="mtb-20"><b>Официальный сайт СНТ «Дружба»</b></h2>
                </div>

                <div class="p-30 mb-30 card-view">
                    <p><span class="letter-big"><b>Т</b></span>оварищество может быть создано и вправе осуществлять свою деятельность для совместного владения, пользования и в установленных федеральным законом пределах распоряжения гражданами имуществом общего пользования, находящимся в их общей долевой собственности или в общем пользовании, а также для следующих целей:
<br>
                        1) создание благоприятных условий для ведения гражданами садоводства и огородничества (обеспечение тепловой и электрической энергией, водой, газом, водоотведения, обращения с твердыми коммунальными отходами, благоустройства и охраны территории садоводства или огородничества, обеспечение пожарной безопасности территории садоводства или огородничества и иные условия);
                        <br>
                        2) содействие гражданам в освоении земельных участков в границах территории садоводства или огородничества;
                        <br>
                        3) содействие членам товарищества во взаимодействии между собой и с третьими лицами, в том числе с органами государственной власти и органами местного самоуправления, а также защита их прав и законных интересов.</p>

                    <div class="row mtb-20">
                        <div class="col-sm-6 col-md-7">
                            <p class="mtb-2"><strong>Год основания:</strong> 1967 г.</p>
                            <p><strong>Территория СНТ:</strong> Согласно Постановлению о закреплении земель за СНТ «Виноградово» от 1992 г.  Общая площадь: 20,02 га; общие земли – 5,91 га; в частной собственности – 14,11 га.
                            </p>
                            <p><strong>На территории СНТ:</strong> адм. здание (сторожка и правление), адм. строение (выездной магазин, работает  с мая по октябрь), водокачка, трансформатор, пожарный пруд, детская площадка.
                                Кадастровый номер СНТ «Виноградово»: 50:29:0020418
                            </p>
                            <p> <strong>Подъезд:</strong> круглогодичный, автобусная остановка (рейсовый автобус подается с мая по октябрь)
                            </p>
                            <p><strong>Охрана:</strong> круглогодичная, въезд/выезд через автоматические ворота / шлагбаум, управляемые с пульта.
                            </p>
                            <p><strong>Вода:</strong> летний водопровод, реконструирован в 2012г. (работает с мая по октябрь), вода подается крулосуточно на каждый участок.
                            </p>
                            <p><strong>Электричество:</strong> круглогодично, оплата ежемесячно на р.с. СНТ
                            </p>
                            <p><strong>Газ:</strong> пока нет.  При условии оформления домов на 70% участков, возможно рассмотрение данного проекта.
                            </p>
                            <p><strong>Общее количество участков:</strong> 235
                            </p>
                            <p><strong>Освоенных участков:</strong> 235
                            </p>

                        </div><!-- col-md-7 -->
                        <div class="col-sm-6 col-md-5 float-right">
                            <img src="/template/img/text.png" alt="">
                        </div><!-- col-md-7 -->
                    </div><!-- row -->



                </div><!-- card-view -->
            </div><!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- container -->
</section>



<?php require_once (ROOT.'/views/header_and_footer/footer.php')?>

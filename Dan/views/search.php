<?php
require_once(ROOT . '/views/header_and_footer/header.php');
?>

    <section style="min-height: 500px">
        <div class="container" style="padding-top: 20px">
            <div class="row">
                <div class="col-md-12 col-lg-12">


                    <?if($search_news){
                    foreach ($search_news as $news){
                        ?>
                        <div class="mb-30 sided-250x card-view">
                            <div class="s-left">
                                <img src="/template/images/<?php echo $news['img']?>.jpg" alt="">
                            </div><!-- left-area -->
                            <div class="s-right ptb-50 p-sm-20 pb-sm-5 plr-30 plr-xs-0">
                                <h4><a href="news/<?php echo $news['id']?>/"><?php echo $news['headline']?></a></h4>
                                <ul class="mtb-10 list-li-mr-20 color-lite-black">
                                    <li><i class="mr-5 font-12 ion-clock"></i><?php echo $news['date_time']?></li>

                                </ul>
                            </div><!-- right-area -->
                        </div><!-- sided-250x -->
                        <?
                    }
                    }
                    else{?>
                        <div class="mb-30 sided-250x card-view">

                            <div class="s-right ptb-50 p-sm-20 pb-sm-5 plr-30 plr-xs-0">
                                <h4>По вашему запросу нечего не найденно</h4>
                            </div><!-- right-area -->
                        </div><!-- sided-250x -->
                        <?
                    }
                    ?>

                </div><!-- col-sm-8 -->
            </div><!-- row -->
        </div><!-- container -->
    </section>

<?php
require_once(ROOT . '/views/header_and_footer/footer.php');
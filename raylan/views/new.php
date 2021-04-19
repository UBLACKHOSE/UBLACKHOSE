<?php require_once (ROOT.'/views/header_and_footer/header.php')?>
<script>
    function send() {
        var text = document.getElementById('text_comment');
        var block = document.getElementById('comments');
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                block.innerHTML = this.responseText + block.innerHTML;
                text.value = '';
            }
        };
        if (text.value!=''){
            xmlhttp.open("POST", "/news/comment/<?php echo $new['id']?>", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send('text='+text.value);
        }
        else {
            alert("Введите комментарий")
        }
    }
</script>
<section class="ptb-30">
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="ptb-0">
                    <a class="mt-10" href="/"><i class="mr-5 ion-ios-home"></i><b>Главная</b></a>
                    <a class="mt-10" href="/news"><i class="mlr-10 ion-chevron-right"></i><b>Новости</b></a>
                    <a class="mt-10 mb-30 color-ash" href=""><i class="mlr-10 ion-chevron-right"></i>
                        <b><?=$new['title']?></b></a>
                </div>

                <div class="p-30 mb-30 card-view">
                    <img src="/template/img/img_news/<?=$new['img']?>" alt="">
                    <h3 class="mt-30 mb-5"><a href="#"><b><?=$new['title']?></b></a></h3>
                    <ul class="list-li-mr-10 color-lite-black">
                        <li><i class="mr-5 font-12 ion-clock"></i><?=$new['date']?></li>
                        <li><i class="mr-5 font-12 ion-android-person"></i><?=$new['avtor']?></li>
                    </ul>

                    <p class="mt-30"><?=$new['description']?></p>
                    <p class="mtb-15">
                    </p>





                    <div class="p-30 mb-30 card-view">
                        <h4 class="p-title"><b>Прокоментировать</b></h4>
                        <form>
                            <?php if (User::isGuest()):?>
                                <div class="row"><h4>Для того чтобы оставить коментарий <a href="/user/login/">ВОЙДИТЕ</a></h4></div>
                            <?php else:?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea class="mb-30" id="text_comment" placeholder="Твой комментарий"></textarea>
                                    </div><!-- col-sm-12 -->
                                </div><!-- row -->
                                <a class="btn-fill-primary plr-20" href="#comment" onclick="send();"><b>Отправить</b></a>
                            <?php endif;?>
                        </form>
                    </div><!-- card-view -->

                <div class="p-30 mb-30 card-view">
                    <h4 class="p-title"><b>Коментарии</b></h4>
                    <div id="comments">
                    <?php foreach ($comments as $comment){?>
                    <div class="sided-90x">

                        <div class="mb-20 brdr-grey-1 opacty-6"></div>
                        <div class="sided-90x">
                            <div class="s-left br-3 oflow-hidden">
                                <img src="/template/img/img_user/<?php echo $comment['img']?>" alt="">
                            </div><!-- s-left -->

                            <div class="s-right">
                                <h5><b><?php echo $comment['login']?></b><span class="ml-10 color-ash font-8">  <?php echo $comment['date_and_time']?></span></h5>
                                <p class="mt-5 mb-10"><?php echo $comment['content']?>
                                </p>
                                <a class="mr-20" href="#"><b>Лайк</b></a>
                            </div><!-- s-left -->
                        </div>
                    </div>
                    <?}?><!-- sided-90x -->
                    </div>
                </div><!-- card-view -->



            </div><!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- container -->
</section>
<?require_once (ROOT.'/views/header_and_footer/footer.php')?>

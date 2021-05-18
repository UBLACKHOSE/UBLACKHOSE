<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>
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
			
				<div class="col-md-12 col-lg-8">
					
					<div class="ptb-0">
						<a class="mt-10" href="/"><i class="mr-5 ion-ios-home"></i><b>Главная</b></a>
						<a class="mt-10" href="/category/<?php echo $new['id_categ']?>"><i class="mlr-10 ion-chevron-right"></i><b><?php echo $new['name']?></b></a>
						<a class="mt-10 mb-30 color-ash" href=""><i class="mlr-10 ion-chevron-right"></i>
							<b><?php echo $new['headline']?></b></a>
					</div>
					
					<div class="p-30 mb-30 card-view">
						<img src="/template/images/<?php echo $new['img']?>.jpg" alt="">
						<h3 class="mt-30 mb-5"><a href="#"><b><?php echo $new['headline']?></b></a></h3>
						<ul class="list-li-mr-10 color-lite-black">
							<li><i class="mr-5 font-12 ion-clock"></i><?php echo $new['date_time']?></li>
						</ul>
						
						<p class="mt-30"><?php echo $new['description']?>
						</p>

					</div><!-- card-view -->
					

					
					<!-- card-view -->
                    <div class="p-30 mb-30 card-view">
                        <h4 class="p-title"><b>Прокоментировать</b></h4>
                        <form>
                            <?php if (User::isGuest()):?>
                                <div class="auth logo"><h4>Для того чтобы оставить коментарий <a href="/user/login/">Войдите</a></h4></div>
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
						<h4 class="p-title" name="comment"><b>Коментарии</b></h4>
						<div class="sided-90x" id="comments">
                            <?php foreach ($comments as $comment){?>
							<div>
								<h5><b><?php echo $comment['login']?></b><span class="ml-10 color-ash font-8"> / <?php echo $comment['date_and_time']?></span></h5>
								<p class="mt-5 mb-10"><?php echo $comment['content']?>
								</p>
							</div><!-- s-left -->
                            <?}?>
						</div><!-- sided-90x -->
					</div><!-- card-view -->
					





				</div><!-- col-sm-8 -->



				<div class="col-md-12 col-lg-4">
					<!-- START OF SIDEBAR MOST READ -->
					<div class="mb-30 p-30 card-view">
						<h4 class="p-title"><b>Также читайте</b></h4>
                        <?php foreach ($news_category as $item){?>
						<div class="sided-80x mb-20">
							<div class="s-left">
								<img src="/template/images/<?echo $item['img']?>.jpg" alt="">
							</div><!-- s-left -->
							<div class="s-right">
								<h5><a href="/news/<?echo $item['id']?>"><b><?echo $item['headline']?></b></a></h5>
							</div><!-- s-left -->
						</div><!-- sided-80x -->
                        <?}?>
					</div><!-- card-view -->
					<!-- END OF SIDEBAR MOST READ -->

					

					
				</div><!-- col-sm-4 -->
			</div><!-- row -->
		</div><!-- container -->
	</section>


<?php require_once ( ROOT . '/views/header_and_footer/footer.php') ?>
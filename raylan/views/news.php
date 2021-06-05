<?php require_once (ROOT.'/views/header_and_footer/header.php')?>
<section class="ptb-30">
		<div class="container">
			<div class="row">

				<div class="col-md-12">

					<div class="ptb-0">
						<a class="mt-10" href="/"><i class="mr-5 ion-ios-home"></i><b>Главная</b></a>
						<a class="mt-10 color-ash" href="/news"><i class="mlr-10 ion-chevron-right"></i><b>Новости</b></a>
						<h1 class="mtb-20"><b>Новости</b></h1>
						<p class="mb-30"></p>
					</div>
                    <?foreach ($news as $item){?>
					<div class="mb-30 sided-250x s-lg-height card-view">
						<div class="s-left">
							<img src="/template/img/img_news/<?=$item['img']?>" alt="">
						</div><!-- left-area -->
						<div class="s-right ptb-30 pt-sm-20 pb-xs-5 plr-30 plr-xs-0">
							<h4><a href="/news/<?=$item['id']?>"><?=$item['title']?></a></h4>
							<ul class="mtb-10 list-li-mr-20 color-lite-black">
								<li><i class="mr-5 font-12 ion-clock"></i><?=$item['date']?></li>
								<li><i class="mr-5 font-12 ion-android-person"></i><?=$item['avtor']?></li>
							</ul>
							<p class="mt-10"><?=$item['description']?></p>
						</div>
					</div>
                    <?}?>

                    <?php echo $pagination->get();?>

				</div>

			</div>
		</div>
	</section>
<?require_once (ROOT.'/views/header_and_footer/footer.php')?>

<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>

    <div class="main">
	<!-- START OF MAIN SLIDER -->
	<section class="bg-primary pt-0 pb-xs-20">
		<div class="container">
			<!-- row -->
			<div class="h-400x h-md-500x h-xs-600x oflow-hidden">
				<div class="w-50 w-md-100 float-left float-md-none h-100 h-md-50 h-xs-40 pr-10 pr-md-0 pb-md-10">
					<div class="w-100 float-left float-xs-none pos-relative h-100 ">
						<div class="img-bg bg-8 bg-grad-layer-6" style="background:url(/template/images/<?echo $categoryNews[0]['img']?>.jpg) "></div>
						<div class="abs-blr color-white p-20">
							<h3 class="mb-10 mb-sm-5 t-upper">
								<a class="hover-grey" href="/news/<?echo $categoryNews[0]['id']?>"><b><?echo $categoryNews[0]['headline']?></b></a></h3>
							<ul class="list-li-mr-10 color-grey">
								<li><i class="mr-5 font-12 ion-clock"></i><?echo $categoryNews[0]['date_time']?></li>
							</ul>
						</div><!--abs-blr -->
					</div><!-- float-left -->
					
				</div><!-- w-50 -->
				<div class="w-50 w-md-100 float-left float-md-none h-100 h-md-50 h-xs-60">
				
					<div class="w-50 w-xs-100 h-100 float-left pr-10 pr-xs-0 pb-xs-10 h-xs-50">
						<div class="h-100 pos-relative">
							<!-- Image as bg-3 -->
							<div class="img-bg bg-9 bg-grad-layer-6" style="background:url(/template/images/<?echo $categoryNews[1]['img']?>.jpg) "></div>
							
							<div class="abs-blr color-white p-20 pr-10">
                                <h3 class="mb-10 mb-sm-5 t-upper">
                                    <a class="hover-grey" href="/news/<?echo $categoryNews[1]['id']?>"><b><?echo $categoryNews[1]['headline']?></b></a></h3>
                                <ul class="list-li-mr-10 color-grey">
                                    <li><i class="mr-5 font-12 ion-clock"></i><?echo $categoryNews[1]['date_time']?></li>
                                </ul>
							</div><!--abs-blr -->
						</div><!-- h-50 -->
					</div><!-- h-50 -->
					
					<div class="w-50 w-xs-100 h-100 float-left h-xs-50">
						<div class="h-100 pos-relative">
							<!-- Image as bg-4 -->
							<div class="img-bg bg-10 bg-grad-layer-6" style="background:url(/template/images/<?echo $categoryNews[2]['img']?>.jpg) "></div>
							
							<div class="abs-blr color-white p-20 pr-10">
                                <h3 class="mb-10 mb-sm-5 t-upper">
                                    <a class="hover-grey" href="/news/<?echo $categoryNews[2]['id']?>"><b><?echo $categoryNews[2]['headline']?></b></a></h3>
                                <ul class="list-li-mr-10 color-grey">
                                    <li><i class="mr-5 font-12 ion-clock"></i><?echo $categoryNews[2]['date_time']?></li>
                                </ul>
							</div><!--abs-blr -->
						</div><!-- h-50 -->
					</div><!-- h-50 -->
					
				</div><!-- w-40 -->
			</div><!-- wrapper -->
		</div><!-- container -->
	</section>
	<!-- END OF MAIN SLIDER -->
	

	<section class="ptb-30">
		<div class="container">
			<div class="row">
			
				<div class="col-12">
					
					<div class="ptb-0">
						<a class="mt-10" href="/"><i class="mr-5 ion-ios-home"></i><b>Главная</b></a>
						<a class="mt-10 color-ash" href="/category/<? print_r($categ['id'])?>"><i class="mlr-10 ion-chevron-right"></i><b><? print_r($categ['name'])?></b></a>
						<h1 class="mtb-20"><b><? echo $categ['name']?></b></h1>
						<p class="mb-30"><? echo $categ['description']?></p>
					</div>
					<?foreach ($categoryNews as $news){?>
					<div class="mb-30 sided-250x s-lg-height card-view">
						<div class="s-left">
							<img src="/template/images/<?echo $news['img']?>.jpg" alt="">
						</div>
						<div class="s-right ptb-30 pt-sm-20 pb-xs-5 plr-30 plr-xs-0">
							<h4><a href="/news/<?echo $news['id']?>/"><?echo $news['headline']?></a></h4>
							<ul class="mtb-10 list-li-mr-20 color-lite-black">
								<li><i class="mr-5 font-12 ion-clock"></i><?echo $news['date_time']?></li>
							</ul>
							<p class="mt-10"><?echo $news['description']?></p>
						</div><!-- right-area -->
					</div><!-- sided-250x -->
                    <?}?>

                    <?php echo $pagination->get();?>
	</section>

</div>
<?php require_once ( ROOT . '/views/header_and_footer/footer.php') ?>
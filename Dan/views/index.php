<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>


	<section class="">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">


					<div class="mb-30 p-30 ptb-sm-25 plr-sm-15 card-view">
						<h3 class="p-title"><b>Новости дня</b></h3>
						<img src="../template/images/<?php echo $news[0]['img']?>.jpg" alt="">
						<h3 class="mt-30"><a href="news/<?php echo $news[0]['id']?>/"><?php echo $news[0]['headline']?></a></h3>
						<ul class="mtb-10 list-li-mr-20 color-lite-black">
							<li><i class="mr-5 font-12 ion-clock"></i><?php echo $news[0]['date_time']?></li>
						</ul>
						<p><?php echo $news[0]['description']?></p>
					</div><!-- bg-white -->


					<? $i=1;
					while($i<4){
					?>
					<div class="mb-30 sided-250x card-view">
						<div class="s-left">
							<img src="/template/images/<?php echo $news[$i]['img']?>.jpg" alt="">
						</div><!-- left-area -->
						<div class="s-right ptb-50 p-sm-20 pb-sm-5 plr-30 plr-xs-0">
							<h4><a href="news/<?php echo $news[$i]['id']?>/"><?php echo $news[$i]['headline']?></a></h4>
							<ul class="mtb-10 list-li-mr-20 color-lite-black">
								<li><i class="mr-5 font-12 ion-clock"></i><?php echo $news[$i]['date_time']?></li>
							</ul>
						</div><!-- right-area -->
					</div><!-- sided-250x -->
					<?
                        $i++;
					}
					?>

				</div><!-- col-sm-8 -->
			</div><!-- row -->
		</div><!-- container -->
	</section>
	

	
	<section class="pb-20">
		<div class="container">
			<div class="row">
				
				<div class="col-md-12 col-lg-12">

                    <h3 class="p-title"><b>Новости по категориям</b></h3>
					<div class="row">
                        <?foreach ($news_category as $new){?>
						<div class="col-sm-12 col-md-6">
							<div class="p-30 card-view mb-30">
								<h4 class="p-title"><b><?echo $new['name']?></b></h4>
								<img src="/template/images/<?echo $new['img']?>.jpg" alt="">
								<h4 class="mt-30"><a href="/news/<?echo $new['id']?>">
									<b><?echo $new['headline']?></b></a></h4>
								<ul class="mtb-10 list-li-mr-5 color-lite-black">
									<li><i class="mr-5 font-12 ion-clock"></i><?echo $new['date_time']?></li>
								</ul>
								<div class="mtb-15 brdr-grey-1"></div>
								<p class="mb-10"><?echo $new['description']?></p>
							</div><!-- p-30 card-view -->
						</div><!-- col-sm-6 -->
                        <?}?>

						<!-- END OF TECH -->
					</div><!-- row -->
					
				</div><!-- col-sm-8 -->

			</div><!-- row -->
		</div><!-- container -->
	</section>


<?php require_once ( ROOT . '/views/header_and_footer/footer.php') ?>

<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>
<?php require_once (ROOT.'/views/header_and_footer/baner.php')?>



<div class="container-fluid" id="films_conteiner" style="">
<div class="container" id="films" style="padding: 10px 0px;">
    <h2 class="text-center">Лучшие фильмы за месяц:</h2>


    <?php foreach ($films as $film):?>
    <div class="row" style=" border-radius: 4px; margin-top: 10px;" id="film">
        <div class="col-sm-3" style="padding: 0px" >
            <a href="/film/<?echo $film['id']?>"><img src="../template/img/img_films/<?echo $film['img']?>.jpg" class="img-thumbnail"></a>
        </div>
        <div class="col-sm-3 text-center" style="padding-top: 10px;" id="mobil2">
            <h4><?echo $film['name']?></h4>
        </div>
        <div class="col-sm-9" id="pc2">
            <div class="row">
                <div class="col-sm-12">
                    <a href="/film/<?echo $film['id']?>"><h1><?echo $film['name']?></h1></a>
                </div>
            </div>
            <div class="row" >
                <div class="col-sm-12 col-xl-6">
                    <div class="col-sm-6 col-xl-12" style="float: left">
                        <p>Год:<?php echo $film['year']?></p>
                        <p class="text-justify">Режиссер: <?php echo $film['producer_r+']?></p>
                        <p class="text-justify">Сценарий: <?php echo $film['scenario']?></p>
                    </div>
                    <div class="col-sm-6 col-xl-12" style="float: left">
                        <p>Продюсер: <?php echo $film['producer']?></p>
                        <p>Страна:  <?php echo $film['country']?></p>
                        <p>Жанр:<?php echo $film['genre']?></p>
                    </div>
                </div>
                <div class="col-sm-12  col-xl-6" style="font-size: 3.1vm">
                    <p>Описание:</p>
                    <p><?php echo $film['description']?></p>

                </div>
            </div>
        </div>
    </div>
    <? endforeach;?>





        </div>
</div>

<?php require_once (ROOT.'/views/header_and_footer/footer.php')?>

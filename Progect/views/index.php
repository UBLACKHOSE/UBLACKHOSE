
<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>
<?php require_once (ROOT.'/views/header_and_footer/baner.php')?>



<div class="container-fluid" id="films_conteiner" style="">
<div class="container" id="films" style="padding: 10px 0px;">
    <h2 class="text-center">Лучшие фильмы за месяц:</h2>


    <?php foreach ($films as $film):?>
    <div class="row" style=" border-radius: 4px; margin-top: 10px;" id="film">
        <div class="col-sm-3" style="padding: 0px" >
            <img src="../template/img/img_films/<?echo $film['img']?>.jpg" class="img-thumbnail">
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12">
                    <h1><?echo $film['name']?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p>Год: <?php echo $film['year']?></p>
                    <p class="text-justify">Режиссер : <?php echo $film['producer_r+']?></p>
                    <p class="text-justify">Сценарий : <?php echo $film['scenario']?></p>
                    <p>Продюсер: <?php echo $film['producer']?></p>
                    <p>Страна:  <?php echo $film['country']?></p>
                    <p>Жанр:<?php echo $film['genre']?></p>
                </div>
                <div class="col-sm-6" style="font-size: 3.1vm">
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
<!--<form>-->
<!--    <div class="form-row align-items-center">-->
<!--        <div class="col-sm-3 my-1">-->
<!--            <label class="sr-only" for="inlineFormInputName">Name</label>-->
<!--            <input type="text" class="form-control" id="inlineFormInputName" placeholder="Jane Doe">-->
<!--        </div>-->
<!--        <div class="col-sm-3 my-1">-->
<!--            <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>-->
<!--            <div class="input-group">-->
<!--                <div class="input-group-prepend">-->
<!--                    <div class="input-group-text">@</div>-->
<!--                </div>-->
<!--                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-auto my-1">-->
<!--            <div class="form-check">-->
<!--                <input class="form-check-input" type="checkbox" id="autoSizingCheck2">-->
<!--                <label class="form-check-label" for="autoSizingCheck2">-->
<!--                    Remember me-->
<!--                </label>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-auto my-1">-->
<!--            <button type="submit" class="btn btn-primary">Submit</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</form>-->
</body>
</html>
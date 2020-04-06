<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>


<script>
    function showHint(str) {
        location.reload();
    }
</script>


<div class="container-fluid" style="background: #ebe8ec;">
    <div class="container" style="background: white;padding: 0px;border-left: 1px solid black;border-right: 1px solid black;  ">
        <div class="row">
            <div class="" style=" padding: 10px 30px;font-size: 1.2em" id="pc">
                <form id="sort" method="post" action="#">
                    <h2 style="float: left">Сортировать по:</h2>
                    <input name="name" type="submit" value="Названию">
                    <input name="age" type="submit"  value="Году">
                    <input name="reiting" type="submit"  value="Рейтингу">
                    <input name="popular" type="submit"  value="Популярности">
                </form>
            </div>
            <div style="padding: 10px 30px;font-size: 1.2em;" id="mobil">

                <div class="dropdown" style=" padding-top: 5px;">
                    <h2 style="float: left">Сортировать по:</h2>
                    <button class="" data-toggle="dropdown" style="border-radius:10px;background: #3e4649;height: 30px;padding: 0px;border: 0px;float: right;padding: 0px 10px; color: white;">
                        <?php if (isset($_SESSION['method'])) {echo $_SESSION['method'];} else{ echo "Названию вниз";}; ?>
                        <svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd"/>
                        </svg>
                    </button>
<!--                    <ul class="dropdown-menu" style="background: white;font-size: 1.2em;float: right;">-->
<!--                        <li><a href="/">Главная</a></li>-->
<!--                        <li><a href="/cabinet/">Профиль</a></li>-->
<!--                        <li><a href="#">Комментарии</a></li>-->
<!--                        <li><a href="#">Настройки</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="/user/logout">Выход</a></li>-->
<!--                    </ul>-->
                    <form class="dropdown-menu"  method="post" action="#" id="sort_mobil">
                        <input class="btn-dark" name="name" type="submit" value="Названию">
                        <input class="btn-dark" name="age" type="submit"  value="Году">
                        <input class="btn-dark" name="reiting" type="submit"  value="Рейтингу">
                        <input class="btn-dark" name="popular" type="submit"  value="Популярности">
                    </form>
                </div>
<!--            <form id="sort" method="post" action="#">-->
<!--                <h2 style="float: left">Сортировать по:</h2>-->
<!--                <select style="margin-top: 5px; margin-left: 5px;" name="submit" onchange="showHint(this.value)">-->
<!--                    <option name="name">Названию</option>-->
<!--                    <option name="age">Году</option>-->
<!--                    <option name="reiting">Рейтингу</option>-->
<!--                    <option name="popular">Популярности</option>-->
<!--                </select>-->
<!--            </form>-->
            </div>
        </div>
        <?foreach ($search_films as $film):?>
        <div class="row" style="background:#ebe8ec;border-radius: 10px;margin:10px 0px;margin-left: 5%;width: 90%;padding: 10px 0px; border: 1px solid black">
            <div class="col-sm-2 col-md-2">
                <img style=""  src="/template/img/img_films/<?php echo $film['img']?>.jpg" id="search_film_img">
            </div>
            <div class="col-sm-10 col-md-10">
                <div class="col-sm-6 text-center">
                    <h4><?echo $film['name']?></h4>
                    <div id="star_reiting" style="">
                        <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>

                    </div>

                </div>
                <div class="col-sm-6 col-md-5">
                    <p style="">Год: <?php echo $film['year']?></p>
                    <p>Посмотрели: 0 человек</p>
                    <p>Жанр: <?php echo $film['genre']?></p>
                    <a href="/film/<?echo $film['id']?>">
                    <button class="btn btn-dark" style="height: 30px; width: 100%;margin-top: 20px">
                        Перейти к фильму
                    </button>
                    </a>
                </div>
                <div class="col-sm-12">

                </div>
            </div>
        </div>
        <?endforeach;?>
    </div>
</div>
<?php require_once (ROOT.'/views/header_and_footer/footer.php')?>
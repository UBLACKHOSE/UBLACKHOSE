<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>
<script>
    function Processing_request(q) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText==1){
                    document.getElementById('btn2').style.background = '#3e4649';
                    document.getElementById('btn2').style.color = 'white';
                    document.getElementById('btn1').style.background = 'white';
                    document.getElementById('btn1').style.color = '#3e4649';
                    document.getElementById('reiting').style.display ='block';
                }else {
                    document.getElementById('btn1').style.background = '#3e4649';
                    document.getElementById('btn1').style.color = 'white';
                    document.getElementById('btn2').style.background = 'white';
                    document.getElementById('btn2').style.color = '#3e4649';
                    document.getElementById('reiting').style.display ='none';
                };
            }
        };
        xmlhttp.open("GET", "/film/<?echo $film['id']?>/?q="+q, true);
        xmlhttp.send();
    }
    function color_change_stars(star) {
        switch (star) {
            case 5:{
                document.getElementById('star1').style.color = 'yellow';
                document.getElementById('star2').style.color = 'yellow';
                document.getElementById('star3').style.color = 'yellow';
                document.getElementById('star4').style.color = 'yellow';
                document.getElementById('star5').style.color = 'yellow';
            }
                break;
            case 4:{
                document.getElementById('star1').style.color = 'yellow';
                document.getElementById('star2').style.color = 'yellow';
                document.getElementById('star3').style.color = 'yellow';
                document.getElementById('star4').style.color = 'yellow';
                document.getElementById('star5').style.color = 'black';
            }
                break;
            case 3:{
                document.getElementById('star1').style.color = 'yellow';
                document.getElementById('star2').style.color = 'yellow';
                document.getElementById('star3').style.color = 'yellow';
                document.getElementById('star4').style.color = 'black';
                document.getElementById('star5').style.color = 'black';
            }
                break;
            case 2:{
                document.getElementById('star1').style.color = 'yellow';
                document.getElementById('star2').style.color = 'yellow';
                document.getElementById('star3').style.color = 'black';
                document.getElementById('star4').style.color = 'black';
                document.getElementById('star5').style.color = 'black';
            }
                break;
            case 1:{
                document.getElementById('star1').style.color = 'yellow';
                document.getElementById('star2').style.color = 'black';
                document.getElementById('star3').style.color = 'black';
                document.getElementById('star4').style.color = 'black';
                document.getElementById('star5').style.color = 'black';
            }
                break;
            case 0:{
                document.getElementById('star1').style.color = 'black';
                document.getElementById('star2').style.color = 'black';
                document.getElementById('star3').style.color = 'black';
                document.getElementById('star4').style.color = 'black';
                document.getElementById('star5').style.color = 'black';
            }
                break;
        }
    }
    function color_change_stars_back(star) {
        switch (star) {
            case 5:{
                document.getElementById('star1').style.color = 'yellow';
                document.getElementById('star2').style.color = 'yellow';
                document.getElementById('star3').style.color = 'yellow';
                document.getElementById('star4').style.color = 'yellow';
                document.getElementById('star5').style.color = 'yellow';
            }
                break;
            case 4:{
                document.getElementById('star1').style.color = 'yellow';
                document.getElementById('star2').style.color = 'yellow';
                document.getElementById('star3').style.color = 'yellow';
                document.getElementById('star4').style.color = 'yellow';
                document.getElementById('star5').style.color = 'black';
            }
                break;
            case 3:{
                document.getElementById('star1').style.color = 'yellow';
                document.getElementById('star2').style.color = 'yellow';
                document.getElementById('star3').style.color = 'yellow';
                document.getElementById('star4').style.color = 'black';
                document.getElementById('star5').style.color = 'black';
            }
                break;
            case 2:{
                document.getElementById('star1').style.color = 'yellow';
                document.getElementById('star2').style.color = 'yellow';
                document.getElementById('star3').style.color = 'black';
                document.getElementById('star4').style.color = 'black';
                document.getElementById('star5').style.color = 'black';
            }
                break;
            case 1:{
                document.getElementById('star1').style.color = 'yellow';
                document.getElementById('star2').style.color = 'black';
                document.getElementById('star3').style.color = 'black';
                document.getElementById('star4').style.color = 'black';
                document.getElementById('star5').style.color = 'black';
            }
                break;
            case 0:{
                document.getElementById('star1').style.color = 'black';
                document.getElementById('star2').style.color = 'black';
                document.getElementById('star3').style.color = 'black';
                document.getElementById('star4').style.color = 'black';
                document.getElementById('star5').style.color = 'black';
            }
                break;
        }
    }


    function color_check() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                switch (this.responseText) {
                    case '5':{
                        document.getElementById('star1').style.color = 'yellow';
                        document.getElementById('star2').style.color = 'yellow';
                        document.getElementById('star3').style.color = 'yellow';
                        document.getElementById('star4').style.color = 'yellow';
                        document.getElementById('star5').style.color = 'yellow';
                    }
                        break;
                    case '4':{
                        document.getElementById('star1').style.color = 'yellow';
                        document.getElementById('star2').style.color = 'yellow';
                        document.getElementById('star3').style.color = 'yellow';
                        document.getElementById('star4').style.color = 'yellow';
                        document.getElementById('star5').style.color = 'black';
                    }
                        break;
                    case '3':{
                        document.getElementById('star1').style.color = 'yellow';
                        document.getElementById('star2').style.color = 'yellow';
                        document.getElementById('star3').style.color = 'yellow';
                        document.getElementById('star4').style.color = 'black';
                        document.getElementById('star5').style.color = 'black';
                    }
                        break;
                    case '2':{
                        document.getElementById('star1').style.color = 'yellow';
                        document.getElementById('star2').style.color = 'yellow';
                        document.getElementById('star3').style.color = 'black';
                        document.getElementById('star4').style.color = 'black';
                        document.getElementById('star5').style.color = 'black';
                    }
                        break;
                    case '1':{
                        document.getElementById('star1').style.color = 'yellow';
                        document.getElementById('star2').style.color = 'black';
                        document.getElementById('star3').style.color = 'black';
                        document.getElementById('star4').style.color = 'black';
                        document.getElementById('star5').style.color = 'black';
                    }
                        break;
                    case '0':{
                        document.getElementById('star1').style.color = 'black';
                        document.getElementById('star2').style.color = 'black';
                        document.getElementById('star3').style.color = 'black';
                        document.getElementById('star4').style.color = 'black';
                        document.getElementById('star5').style.color = 'black';
                    }
                        break;
                }
            }
        };
        xmlhttp.open("GET", "/film/<?echo $film['id']?>/reting", true);
        xmlhttp.send();
    }
    function remember_rating(q) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                switch (this.responseText) {
                    case 5:{
                        document.getElementById('star1').style.color = 'yellow';
                        document.getElementById('star2').style.color = 'yellow';
                        document.getElementById('star3').style.color = 'yellow';
                        document.getElementById('star4').style.color = 'yellow';
                        document.getElementById('star5').style.color = 'yellow';
                    }
                        break;
                    case 4:{
                        document.getElementById('star1').style.color = 'yellow';
                        document.getElementById('star2').style.color = 'yellow';
                        document.getElementById('star3').style.color = 'yellow';
                        document.getElementById('star4').style.color = 'yellow';
                        document.getElementById('star5').style.color = 'black';
                    }
                        break;
                    case 3:{
                        document.getElementById('star1').style.color = 'yellow';
                        document.getElementById('star2').style.color = 'yellow';
                        document.getElementById('star3').style.color = 'yellow';
                        document.getElementById('star4').style.color = 'black';
                        document.getElementById('star5').style.color = 'black';
                    }
                        break;
                    case 2:{
                        document.getElementById('star1').style.color = 'yellow';
                        document.getElementById('star2').style.color = 'yellow';
                        document.getElementById('star3').style.color = 'black';
                        document.getElementById('star4').style.color = 'black';
                        document.getElementById('star5').style.color = 'black';
                    }
                        break;
                    case 1:{
                        document.getElementById('star1').style.color = 'yellow';
                        document.getElementById('star2').style.color = 'black';
                        document.getElementById('star3').style.color = 'black';
                        document.getElementById('star4').style.color = 'black';
                        document.getElementById('star5').style.color = 'black';
                    }
                        break;
                    case 0:{
                        document.getElementById('star1').style.color = 'black';
                        document.getElementById('star2').style.color = 'black';
                        document.getElementById('star3').style.color = 'black';
                        document.getElementById('star4').style.color = 'black';
                        document.getElementById('star5').style.color = 'black';
                    }
                        break;
                }
            }
        }
        xmlhttp.open("GET", "/film/<?echo $film['id']?>/?reting="+q, true);
        xmlhttp.send();
    }
    function send() {
        var text = document.getElementById('text_comment');
        var block = document.getElementById('comments');
        var predupr = document.getElementById('predupr');
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if(predupr){predupr.style.display = 'none'};
                block.innerHTML = this.responseText + block.innerHTML;
                text.value = '';
            }
        };
        xmlhttp.open("POST", "/film/comment/<?echo $film['id']?>", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send('text='+text.value);
    }
</script>

<div class="container-fluid" style="background: #ebe8ec;">
    <div class="container" style="background: white;padding: 0px;border-left: 1px solid black;border-right: 1px solid black;  ">
        <div class="row" style="">
            <div class="col-md-3" style="padding: 0px">
                <img id="img_film" src="/template/img/img_films/<?echo $film['img']?>.jpg" class="img-thumbnail" style="height: 260px;">
                <?php if (!User::isGuest()):?>
                <form class="form">
                    <input id="btn1" onclick="Processing_request(1);" value='Посмотрел' type="button" style="background: <?if(Film::checkStatusFilm($film['id'],$_SESSION['user'])==1){echo 'white';} else{echo '#3e4649';}?>; color: <?if(Film::checkStatusFilm($film['id'],$_SESSION['user'])==1){echo '#3e4649';} else{echo 'white';}?> ;">
                    <input id="btn2" onclick="Processing_request(2);" value='Хочу посмотреть' type="button" style="background:<?if(Film::checkStatusFilm($film['id'],$_SESSION['user'])==2){echo 'white';} else{echo '#3e4649';}?>; color: <?if(Film::checkStatusFilm($film['id'],$_SESSION['user'])==2){echo '#3e4649';} else{echo 'white';}?> ;">
                </form>
                <?endif;?>
            </div>
            <div class="col-md-9" style="font-family: 'Arial Black'" id="film_classifical">
                <div class="row" style="">
                    <div class="col-12" style="padding: 5px 0px;height: 40px;border-bottom: 1px black solid; border-radius: 5px;padding-top: 5px;padding-bottom: 40px; margin: 5px 0px;">
                        <h2 style="float: left; margin-left: 10px"><?php echo $film['name']?></h2>
                        <h2 style="float:right;padding:5px;border: 1px solid black;border-radius:50%;"><?php echo $film['age']?>+</h2>
                    </div>
                <div class="col-12 col-md-6">
                    <pre style="width: 100%"><p style="float: left;">Год:</p><p id="film_class"><?php echo $film['year']?></p></pre>
                    <pre style="width: 100%"><p style="float: left;">Режиссер: </p><p id="film_class"><?php echo $film['producer_r+']?></p></pre>
                    <pre style="width: 100%"><p style="float: left;">Сценарий: </p><p id="film_class"><?php echo $film['scenario']?></p></pre>
                    <pre style="width: 100%"><p style="float: left;">Оператор:</p><p id="film_class"><?php echo $film['operator']?></p></pre>
                    <pre style="width: 100%"><p style="float: left;">Дата примьеры:</p><p id="film_class"><?php echo $film['premiere']?></p></pre>
                </div>
                <div class="col-12 col-md-6">
                    <pre style="width: 100%"><p style="float: left;">Продюсер: </p><p id="film_class"><?php echo $film['producer']?></p></pre>
                    <pre style="width: 100%"><p style="float: left;">Страна: </p><p id="film_class"><?php echo $film['country']?></p></pre>
                    <pre style="width: 100%"><p style="float: left;">Жанр:</p><p id="film_class"><?php echo $film['genre']?></p></pre>
                    <pre style="width: 100%"><p style="float: left;">Композитор:</p><p id="film_class"><?php echo $film['composer']?></p></pre>
                </div>
                </div>
                <?php if (!User::isGuest() and Film::checkStatusFilm($film['id'],$_SESSION['user'])==1):?>
                <div class="row" style="padding-left: 20px" id="reiting" onload="color_change_stars_back(<?php echo $reting?>);">
                    <h3 style="width: 100%">Мой рейтинг:</h3>
                    <div id="star_reiting">
                        <svg id="star1" onmouseleave="color_check();"  onmouseenter="color_change_stars(1);" onclick="remember_rating(1);"  class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg id="star2" onmouseleave="color_check();" onmouseenter="color_change_stars(2);" onclick="remember_rating(2);" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg id="star3" onmouseleave="color_check();" onmouseenter="color_change_stars(3);" onclick="remember_rating(3);" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg id="star4" onmouseleave="color_check();" onmouseenter="color_change_stars(4);"  onclick="remember_rating(4);" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg id="star5" onmouseleave="color_check();" onmouseenter="color_change_stars(5);" onclick="remember_rating(5);" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>
                </div>
                <?endif;?>
            </div>

        </div>
        <div class="row" style="padding-bottom: 0px">
            <div class="col-sm-offset-1 col-md-10" >
                <h4 style="width: 100%">Описание</h4>
                <p><?php echo $film['description']?></p>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-offset-1 col-md-10" >
            <h4>Комментарий:</h4>
                <?php if (!User::isGuest()):?>
            <div style="width: 100%;">
                <textarea style="font-size: 1.2em;overflow: hidden;width: 80%;resize: none;outline: none" name="comment" id="text_comment" placeholder="Написать комментарий" ></textarea>
                <input style="margin-bottom: 23px" class="btn btn-dark" value="Отправить" type="button" onclick="send();">
            </div>
                <?else:?>
                    <h2 style="margin: 20px 0px"><a href="/user/login/">Войдите</a> для того что бы оставить коментарий</h2>
                <?endif;?>
            </div>
        </div>




        <div class="row" >
            <div class="col-sm-offset-1 col-md-10" >
                <h4>Комментарии пользователей:</h4>
            </div>
        </div>

        <div class="row" id="comments">

<!--Коментарий-->
            <?foreach ($comments as $comment):?>
            <div class="col-sm-offset-1 col-md-10" style="  border-radius: 10px;background:#ebe8ec;padding: 10px;margin-bottom: 10px">
                <div class="col-sm-1" style="padding: 0px">
                    <img src="/template/img/img_user/<?echo $comment['img']?>" style="height: 45px; width: 45px;border-radius: 100%;">
                </div>
                <div class=" col-sm-11" style="padding: 0px">
                    <div class="row" style="">
                        <h4 style="float: left;"><?echo $comment['login']?></h4>
                        <h5 style="float: left; color:#3e4649;padding-left: 10px;padding-top: 3px"><?echo $comment['date_and_time']?></h5>
                    </div>
                    <div class="row" style="border-radius: 10px;background: white;padding: 5px">
                        <p><?echo $comment['content']?></p>
                    </div>
                    <div class="row">
                        <a href="#">
                            <h4 style="float: right;">Ответить</h4>
                        </a>
                    </div>
                </div>
            </div>

            <?endforeach;?>
        </div>
        <?if(Film::getCountComments($film['id'])==0):?>
    <div class="row" id="predupr" >
        <div class="col-sm-offset-3 col-md-6" style="padding: 20px 0px;">
            <h4>Здесь пока нет коментариев</h4>
        </div>
    </div>
        <?endif;?>

<!--            <div class="offset-2 col-9" style="padding: 5px 0px;background: white; border-radius: 20px">-->
<!--                <div style="">-->
<!--                    <a data-toggle="collapse" data-target="#answers" style="cursor: pointer">-->
<!--                        <h4 style="float: right;padding-left: 5px">Ответы на комментарий</h4>-->
<!--                        <svg class="bi bi-chevron-down" style="float: right;height: 20px;width: 20px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd"/>-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->

<!--            Ответ к коментарию-->
<!--            <div id="answers" class="collapse">-->
<!--            <div class="offset-2 col-10 col-sm-9" style="border-radius: 10px;background:#ebe8ec;padding: 10px;margin-bottom: 10px">-->
<!--                <div class="col-sm-1" style="padding: 0px">-->
<!--                    <img src="/template/img/img_user/0.png" style="height: 45px; width: 45px;border-radius: 100%;">-->
<!--                </div>-->
<!--                <div class=" col-sm-11" style="padding: 0px">-->
<!--                    <div class="row" style="">-->
<!--                        <h4 style="float: left;">ИмяПользователя</h4>-->
<!--                        <h5 style="float: left; color:#3e4649;padding-left: 10px;padding-top: 3px">19.06.2001</h5>-->
<!--                    </div>-->
<!--                    <div class="row" style="border-radius: 10px;background: white;padding: 5px">-->
<!--                        <p>Какойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментария</p>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <a href="#">-->
<!--                            <h4 style="float: right;">Ответить</h4>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            </div>-->
<!--            <div class="col-sm-offset-1 col-md-10" style="  border-radius: 10px;background:#ebe8ec;padding: 10px;margin-bottom: 10px">-->
<!--                <div class="col-sm-1" style="padding: 0px">-->
<!--                    <img src="/template/img/img_user/0.png" style="height: 45px; width: 45px;border-radius: 100%;">-->
<!--                </div>-->
<!--                <div class=" col-sm-11" style="padding: 0px">-->
<!--                    <div class="row" style="">-->
<!--                        <h4 style="float: left;">ИмяПользователя</h4>-->
<!--                        <h5 style="float: left; color:#3e4649;padding-left: 10px;padding-top: 3px">19.06.2001</h5>-->
<!--                    </div>-->
<!--                    <div class="row" style="border-radius: 10px;background: white;padding: 5px">-->
<!--                        <p>Какойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментария</p>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <a href="#">-->
<!--                            <h4 style="float: right;">Ответить</h4>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="offset-2 col-9" style="padding: 5px 0px;background: white; border-radius: 20px">-->
<!--                <div style="">-->
<!--                    <a data-toggle="collapse" data-target="#answers2" style="cursor: pointer">-->
<!--                        <h4 style="float: right;padding-left: 5px">Ответы на комментарий</h4>-->
<!--                        <svg class="bi bi-chevron-down" style="float: right;height: 20px;width: 20px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd"/>-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--                      Ответ к коментарию-->
<!--            <div id="answers2" class="collapse">-->
<!--                <div class="offset-2 col-10 col-sm-9" style="border-radius: 10px;background:#ebe8ec;padding: 10px;margin-bottom: 10px">-->
<!--                    <div class="col-sm-1" style="padding: 0px">-->
<!--                        <img src="/template/img/img_user/0.png" style="height: 45px; width: 45px;border-radius: 100%;">-->
<!--                    </div>-->
<!--                    <div class=" col-sm-11" style="padding: 0px">-->
<!--                        <div class="row" style="">-->
<!--                            <h4 style="float: left;">ИмяПользователя</h4>-->
<!--                            <h5 style="float: left; color:#3e4649;padding-left: 10px;padding-top: 3px">19.06.2001</h5>-->
<!--                        </div>-->
<!--                        <div class="row" style="border-radius: 10px;background: white;padding: 5px">-->
<!--                            <p>Какойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментария</p>-->
<!--                        </div>-->
<!--                        <div class="row">-->
<!--                            <a href="#">-->
<!--                                <h4 style="float: right;">Ответить</h4>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="offset-2 col-10 col-sm-9" style="border-radius: 10px;background:#ebe8ec;padding: 10px;margin-bottom: 10px">-->
<!--                    <div class="col-sm-1" style="padding: 0px">-->
<!--                        <img src="/template/img/img_user/0.png" style="height: 45px; width: 45px;border-radius: 100%;">-->
<!--                    </div>-->
<!--                    <div class=" col-sm-11" style="padding: 0px">-->
<!--                        <div class="row" style="">-->
<!--                            <h4 style="float: left;">ИмяПользователя</h4>-->
<!--                            <h5 style="float: left; color:#3e4649;padding-left: 10px;padding-top: 3px">19.06.2001</h5>-->
<!--                        </div>-->
<!--                        <div class="row" style="border-radius: 10px;background: white;padding: 5px">-->
<!--                            <p>Какойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментария</p>-->
<!--                        </div>-->
<!--                        <div class="row">-->
<!--                            <a href="#">-->
<!--                                <h4 style="float: right;">Ответить</h4>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="offset-2 col-10 col-sm-9" style="border-radius: 10px;background:#ebe8ec;padding: 10px;margin-bottom: 10px">-->
<!--                    <div class="col-sm-1" style="padding: 0px">-->
<!--                        <img src="/template/img/img_user/0.png" style="height: 45px; width: 45px;border-radius: 100%;">-->
<!--                    </div>-->
<!--                    <div class=" col-sm-11" style="padding: 0px">-->
<!--                        <div class="row" style="">-->
<!--                            <h4 style="float: left;">ИмяПользователя</h4>-->
<!--                            <h5 style="float: left; color:#3e4649;padding-left: 10px;padding-top: 3px">19.06.2001</h5>-->
<!--                        </div>-->
<!--                        <div class="row" style="border-radius: 10px;background: white;padding: 5px">-->
<!--                            <p>Какойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментарияКакойто там текст коментария</p>-->
<!--                        </div>-->
<!--                        <div class="row">-->
<!--                            <a href="#">-->
<!--                                <h4 style="float: right;">Ответить</h4>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

    </div>
</div>



    <script>
        var observe;
        if (window.attachEvent) {
            observe = function (element, event, handler) {
                element.attachEvent('on'+event, handler);
            };
        }
        else {
            observe = function (element, event, handler) {
                element.addEventListener(event, handler, false);
            };
        }
        function init () {
            var text = document.getElementById('text_comment');
            function resize () {
                text.style.height= '50px';
                text.style.height = text.scrollHeight+'px';
            }
            /* 0-timeout to get the already changed text */
            function delayedResize () {
                window.setTimeout(resize, 0);
            }
            observe(text, 'change',  resize);
            observe(text, 'cut',     delayedResize);
            observe(text, 'paste',   delayedResize);
            observe(text, 'drop',    delayedResize);
            observe(text, 'keydown', delayedResize);

            text.select();
            resize();
        }
    </script>
<?php require_once (ROOT.'/views/header_and_footer/footer.php')?>
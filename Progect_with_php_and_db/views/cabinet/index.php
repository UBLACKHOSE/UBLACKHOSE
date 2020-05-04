<?php include_once ( ROOT . '/views/header_and_footer/header.php') ?>

<div class="container-fluid" style="background: #ebe8ec;">
    <div class="container" style="background: white;padding: 0px;border-left: 1px solid black;border-right: 1px solid black;  ">
        <div class="row">
        <div class="col-md-2 col-xl-1 text-center" id="pc" style="border-right: 1px solid black;padding: 0px">
            <ul class="account-menu" style="width: 100%;margin: 0px" id="menu-cabinet">
                <a href="/">
                    <li class="account-menu-item">
                        <svg class="bi bi-house-door" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="float: left;height: 28px;width: 80%;margin-left: 10%;color: black;margin-top:2px;">
                            <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5H9.5a.5.5 0 01-.5-.5v-4H7v4a.5.5 0 01-.5.5H2a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
                        </svg>
                        <p>Главная</p>
                    </li>
                </a>
               <a href="/cabinet/">
                   <li class="account-menu-item">
                       <img src="/template/icons/person.svg" style="float: left; height: 30px;width: 80%;margin-left: 10%;">
                       <p>Мой профиль</p>
                   </li>
               </a>
                <a href="/cabinet/">
                    <li class="account-menu-item">
                        <svg class="bi bi-chat-square-dots" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="float: left;height: 28px;width: 80%;margin-left: 10%;color: black;margin-top:2px;">
                            <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v8a1 1 0 001 1h2.5a2 2 0 011.6.8L8 14.333 9.9 11.8a2 2 0 011.6-.8H14a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v8a2 2 0 002 2h2.5a1 1 0 01.8.4l1.9 2.533a1 1 0 001.6 0l1.9-2.533a1 1 0 01.8-.4H14a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                            <path d="M5 6a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                        </svg>
                        <p>Комментарии</p>
                    </li>
                </a>
                <a href="/cabinet/">
                    <li class="account-menu-item">
                        <img src="/template/icons/star.svg" style="float: left; height: 30px;width: 80%;margin-left: 10%;">
                        <p>Рекомендации</p>
                    </li>
                </a>
                <a href="/user/edit/">
                    <li class="account-menu-item">
                        <img src="/template/icons/gear.svg" style="float: left; height: 30px;width: 80%;margin-left: 10%;">
                        <p >Настройки профиля</p>
                    </li>
                </a>
                <?if(isset($admin)&& $admin==1):?>
                <a href="/admin/">
                    <li class="account-menu-item">
                        <img src="/template/icons/gear.svg" style="float: left; height: 30px;width: 80%;margin-left: 10%;">
                        <p>Кабинет админа</p>
                    </li>
                </a>
                <?endif;?>
            </ul>
        </div>
            <div class="col-md-10 col-xl-11" style="padding: 0px;">
                <div class="row" style="padding: 0px;border-bottom: 1px solid black;">
                    <div class="col-6 col-sm-6 col-md-6 col-xl-4 text-center" style="padding: 0px;padding-top: 44px;text-align: center;">
                        <img src="/template/img/img_user/<?php echo $_SESSION['userImg']?>" style="height: 140px; width: 140px; border-radius: 100%">
                        <h3 style="text-align: center;margin: 0px"><?echo $_SESSION['userLogin']?></h3>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-xl-8" style="font-size: 1em;padding: 0px;">
                        <p style="" id="progres-item"><strong>Я посмотрел:</strong><?echo Film::getCountFilm($_SESSION['user'],1)?> фильмов</p>
                        <p style=""  id="progres-item"><strong>Я хочу посмотреть:</strong>0 фильмов</p>
                        <p style=""  id="progres-item"><strong>Я прокоментировал:</strong>0 фильмов</p>
                        <p style=""  id="progres-item"><strong>Я поставили рейтинг:</strong>0 фильмов</p>
                    </div>
                </div>
                <div class="row" style="padding: 0px">
                    <div style="width: 100%;" id="section_title">
                        <h2>Посмотрел
                        <a data-toggle="collapse" data-target="#content-section1">
                            <svg class="bi bi-chevron-down" style="height: 18px;width: 18px;color: black;" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        </h2>
                        <span style="display:block;width: 30%; height: 1px;background: black;"></span>
                    </div>


                    <div class="container-fluid collapse" id="content-section1">
                        <?foreach ($films1 as $film):?>
                        <div class="row" id="content-user-film">
                            <div class="col-3 col-xl-2" style=" ">
                            <img src="/template/img/img_films/<?echo $film['img']?>.jpg" style="height:120px;width:100%">
                            </div>
                            <div class="col-9 col-xl-10">
                                <h4 style="padding:0px 0px 0px 5px;font-size: 2em;"><?echo $film['name']?></h4>
                                <div style="margin-top: 66px;">
                                    <div style="font-size: 2em">
                                    <svg id="star<?echo $film["id"]?>1" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg id="star<?echo $film["id"]?>2" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg id="star<?echo $film["id"]?>3" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg id="star<?echo $film["id"]?>4" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg id="star<?echo $film["id"]?>5" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    </div>
                                    <script>
                                        switch (<?echo $film['reiting']?>) {
                                            case 5:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'yellow';
                                            }
                                                break;
                                            case 4:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'black';
                                            }
                                                break;
                                            case 3:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'black';
                                            }
                                                break;
                                            case 2:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'black';
                                            }
                                                break;
                                            case 1:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'black';
                                            }
                                                break;
                                            case 0:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'black';
                                            }
                                                break;
                                        }
                                    </script>
                                    <a href="/film/<?echo $film['id']?>">
                                <button class="btn-dark btn" style="float: right;width:140px;height: 30px">Перейти к фильму</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <span style="margin:0px 10%;display:block;width: 80%; height: 1px;background: black;"></span>
                        <?endforeach;?>
                    </div>


                    <div style="width: 100%;" id="section_title">
                        <h2>Хочу посмотреть:
                        <a data-toggle="collapse" data-target="#content-section2">
                            <svg class="bi bi-chevron-down" style="height: 18px;width: 18px;color: black;" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd"/>
                            </svg>
                        </a></h2>
                        <span style="margin-bottom: 5px;display:block;width: 30%; height: 1px;background: black;"></span>
                    </div>


                    <div class="container-fluid collapse" id="content-section2" style="margin-bottom: 20px">
<?foreach ($films2 as $film):?>
                        <div class="row" id="content-user-film">
                            <div class="col-3 col-xl-2" style=" ">
                                <img src="/template/img/img_films/<?echo $film['img']?>.jpg" style="height:120px;width:100%">
                            </div>
                            <div class="col-9 col-xl-10">
                                <h4 style="padding:0px 0px 0px 5px;font-size: 2em;"><?echo $film['name']?></h4>
                                <div style="margin-top: 66px">
                                    <div style="font-size: 2em">
                                    <svg id="star<?echo $film['id']?>1" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg id="star<?echo $film['id']?>2" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg id="star<?echo $film['id']?>3" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg id="star<?echo $film['id']?>4" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg id="star<?echo $film['id']?>5" class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    </div>
                                    <script>
                                        switch (<?echo round(Film::checkReitingFilm($film['id']));?>) {
                                            case 5:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'yellow';
                                            }
                                                break;
                                            case 4:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'black';
                                            }
                                                break;
                                            case 3:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'black';
                                            }
                                                break;
                                            case 2:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'black';
                                            }
                                                break;
                                            case 1:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'yellow';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'black';
                                            }
                                                break;
                                            case 0:{
                                                document.getElementById('star<?echo $film["id"]?>1').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>2').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>3').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>4').style.color = 'black';
                                                document.getElementById('star<?echo $film["id"]?>5').style.color = 'black';
                                            }
                                                break;
                                        }
                                    </script>
                                    <a href="/film/<?echo $film['id']?>">
                                        <button class="btn-dark btn" style="float: right;width:140px;height: 30px">Перейти к фильму</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <span style="margin:0px 10%;display:block;width: 80%; height: 1px;background: black;"></span>
                        <?endforeach;?>


                </div>
            </div>
        </div>
    </div>
</div >
<?php include_once(ROOT . '/views/header_and_footer/footer.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="private">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="/template/css/bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="/template/css/main.css">
    <title>Здесь должно быть название</title>
</head>
<body onload="color_change_stars_back(<?php echo $reting;?>);init();">
<div class="nav" style="background: #3e4649" id="men-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="/" style="float: left"><img src="/template/img/header_img/Логотип.png" class="logo"> </a>
                <?php if (User::isGuest()):?>
                    <p class="float-md-right" style="color: #3e4649; margin-top: 20px; float: right" id="mobil"><a href="/user/register/">Регистрация</a> / <a href="/user/login/">Вход</a></p>
                    <button class="btn-dark" data-toggle="modal" data-target="#myModal" id="mobil" style="background:#3e4649;float: right;color: white;margin-top: 20px; margin-right: 20px;border: 0px">
                        <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                <?php else:?>
                <div style="padding-top: 5px; float: right" id="mobil">

                    <a data-toggle="collapse" data-target="#menu2">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#menu" style="height: 50px;width: 50px;padding: 5px;float: right;margin:0px;margin-left: 5px;">
                            <svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </a>
                    <img name="user_img" src="/template/img/img_user/<?echo $_SESSION['userImg']?>" style="width: 50px;height: 50px;border-radius: 50px;float: right;">

                    <button class="btn-dark" data-toggle="modal" data-target="#myModal" id="mobil" style="background:#3e4649;float: right;color: white;border: 0px;padding-top: 17px;padding-right: 20px">
                        <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="width: 25px;height: 25px;">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
                <?endif;?>
           </div>



            <div id="myModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content" style="height: 40px">
                        <form class="col-md-12 modal-body" style="padding-top: 5px;height: 30px" method="get" action="/search/">
                            <div class="input-group" style="height: 30px">
                                <input required style="height: 30px;font-size: 1.2em" class="form-control" type="text" name="search" placeholder="Искать фильм">
                                <div class="input-group-append" >
                                    <button class="btn btn-outline-secondary btn-search" style="height: 30px;font-size: 1.2em">
                                        <span>Найти</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <div class="col-md-6" id="pc" style="float: right;padding: 15px;" >
                <form class="col-md-12" style="height: 30px" method="get" action="/search/">
                    <div class="input-group" style="height: 30px">
                        <input required style="height: 30px;font-size: 1.2em" class="form-control" type="text" name="search" placeholder="Искать фильм">
                        <div class="input-group-append" >
                            <button class="btn btn-outline-secondary btn-search" style="height: 30px;font-size: 1.2em">
                                <span>Найти</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-md-3 " style=" margin-top: 0px;" id="pc">
            <?php if (User::isGuest()):?>
                <p class="float-md-right" style="color: #3e4649; margin-top: 20px"><a href="/user/register/">Регистрация</a> / <a href="/user/login/">Вход</a></p>
            <?php else:?>
            <div class="dropdown" style=" padding-top: 5px;float: right;height: 59px;">
                <button class="" data-toggle="dropdown" style="clip-path: polygon(0% 0%, 100% 0, 100% 80%, 51% 100%, 1% 80%);border-radius:10px;background: #3e4649;height: 50px;padding: 0px;border: 0px;float: right;padding: 0px 10px;">
                <p style="float:right;color: white;margin: 0px;font-size: 16px;font-family: inherit;">
                    <?echo $_SESSION['userLogin'];?>
                <img name="user_img" src="/template/img/img_user/<?echo $_SESSION['userImg']?>" style="width:45px;height: 45px;border-radius: 50px"></p>
                </button>
                <ul class="dropdown-menu" style="background: white;font-size: 1.2em;float: right;">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/cabinet/">Профиль</a></li>
                    <li><a href="#">Комментарии</a></li>
                    <li><a href="/user/edit/">Настройки</a></li>
                    <li class="divider"></li>
                    <li><a href="/user/logout">Выход</a></li>
                </ul>
            </div>
            <?endif;?>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="background: #595769;padding: 2px;">
</div>

<div class="container-fluid collapse" id="menu">
    <div class="offset-3 col-6" style="font-size: 1.8em" id="mobil">
        <ul>
            <li><a href="/">
                    <svg class="bi bi-house-door" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="height: 30px;width: 30px;color: black">
                        <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5H9.5a.5.5 0 01-.5-.5v-4H7v4a.5.5 0 01-.5.5H2a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
                    </svg>
                    Главная
                </a>
            </li>
            <li>
                <a href="/cabinet/">
                    <img src="/template/icons/person.svg" style="height: 30px;width: 30px">
                    Профиль</a></li>
            <li>
                <a href="#">
                    <svg class="bi bi-chat-square-dots" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="height: 30px;width: 30px;color: black">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v8a1 1 0 001 1h2.5a2 2 0 011.6.8L8 14.333 9.9 11.8a2 2 0 011.6-.8H14a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v8a2 2 0 002 2h2.5a1 1 0 01.8.4l1.9 2.533a1 1 0 001.6 0l1.9-2.533a1 1 0 01.8-.4H14a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                        <path d="M5 6a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                    </svg>
                    Комментарии</a></li>
            <li><a href="#">                    <img src="/template/icons/star.svg" style=" height: 30px;width: 30px">
                    Рекомендации</a></li>
            <li><a href="/user/edit/">                    <img src="/template/icons/gear.svg" style=" height: 30px;width: 30px">
                    Настройки</a></li>
            <li class="divider"></li>
            <li><a href="/user/logout">
                    <svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="height: 30px;width: 30px;color: black">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                    </svg>
                    Выход
                </a>
            </li>
        </ul>
    </div>
    <div class="container-fluid" style="background: #595769;padding: 2px;">
    </div>
</div>


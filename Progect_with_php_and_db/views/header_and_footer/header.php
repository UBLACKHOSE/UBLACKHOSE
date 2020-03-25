
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="/template/css/bootstrap-4.4.1-dist/css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="/template/css/main.css">
    <title>Здесь должно быть название</title>
</head>
<body>
<div class="nav" style="background: #3e4649" id="men-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="/" style="float: left"><img src="/template/img/header_img/Логотип.png" class="logo"> </a>
                <?php if (User::isGuest()):?>
                <p class="float-md-right" style="color: #3e4649; margin-top: 20px; float: right" id="mobil"><a href="/user/register/">Регистрация</a> / <a href="/user/login/">Вход</a></p>
                <?php else:?>
                <div style="padding-top: 5px; float: right" id="mobil">
                    <img src="/template/img/img_user/<?echo $_SESSION['userImg']?>.png" style="width: 50px;height: 50px;border-radius: 50px;">
                    <a data-toggle="collapse" data-target="#menu2"><button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#menu" style="height: 50px;width: 50px;padding: 5px;float: right;margin:0px;margin-left: 5px;">
                            <svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd"/>
                            </svg>
                    </button>
                    </a>
                </div>
                <?endif;?>
           </div>

            <div class="col-md-6" id="pc" style="float: right;padding: 15px;" >
                <form class="col-md-12" style="height: 30px">
                    <div class="input-group" style="height: 30px">
                        <input style="height: 30px;font-size: 1.2em" class="form-control" type="text" name="search" placeholder="Искать фильм">
                        <div class="input-group-append" >
                        <input style="font-size: 1.2em" type="submit" name="submit" value="Поиск" class="btn btn-outline-secondary btn-search">
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
                <img src="/template/img/img_user/<?echo $_SESSION['userImg']?>.png" style="width:45px;height: 45px;border-radius: 50px"></p>
                </button>
                <ul class="dropdown-menu" style="background: white;font-size: 1.2em;float: right;">
                    <li><a href="/cabinet/">Профиль</a></li>
                    <li><a href="#">Мои фильмы</a></li>
                    <li><a href="#">Настройки</a></li>
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
<?php if(trim($_SERVER['REQUEST_URI'], '/')!= 'cabinet'):?>
<div class="container-fluid collapse" id="menu">
    <div class="text-center" style="font-size: 1.8em" id="mobil">
        <ul>
            <li><a href="/cabinet/">Профиль</a></li>
            <li><a href="#">Мои фильмы</a></li>
            <li><a href="#">Настройки</a></li>
            <li class="divider"></li>
            <li><a href="/user/logout">Выход</a></li>
        </ul>
    </div>
</div>
<?php endif;?>
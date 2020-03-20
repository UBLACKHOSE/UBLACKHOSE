<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/template/css/bootstrap-4.4.1-dist/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/template/css/bootstrap-4.4.1-dist/css/bootstrap-grid.css" type="text/css">
    <link rel="stylesheet" href="/template/css/bootstrap-4.4.1-dist/css/bootstrap-reboot.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/template/css/main.css">
    <title>Здесь должно быть название</title>
</head>
<body>
<div class="nav" style="background: #331d43">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="/"><img src="/template/img/header_img/Логотип.png" class="logo"> </a>
            </div>
           
            <div class="col-md-6" id="search">
                <form class="col-md-12" style="margin: 10px 0px;">
                    <div class="input-group">
                        <input class="form-control" type="text" name="search" placeholder="Искать фильм">
                        <div class="input-group-append">
                        <input type="submit" value="Поиск" class="btn btn-outline-secondary btn-search">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 " style=" margin-top: 15px;">
                <p class="float-md-right" style="color: #3e4649;"><a href="/user/register/">Регистрация</a> / <a href="/user/login/">Вход</a></p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="background: #595769;padding: 2px;">
</div>';

<html>
<head>
    <title>Ednews</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700" rel="stylesheet">

    <!-- Stylesheets -->

    <link href="/template/plugin-frameworks/bootstrap.css" rel="stylesheet">
    <link href="/template/fonts/ionicons.css" rel="stylesheet">
    <link href="/template/common/styles.css" rel="stylesheet">
</head>
<body>
<header class="sticky-top">


<!--в классе News запускает getCategorys.-->
<?$categorys=array();$categorys=News::getCategorys();?>
    <div class="bottom-menu">
        <div class="container-fluid">
            <div class="row sticky-top">

                <a  class="menu-nav-icon col-3" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>



                <div class="col-lg-2 col-9 ">
                    <a class="logo " href="/"><img src="/template/images/logo-black.png" alt="Logo"></a>
                </div><!-- col-sm-4 -->


                <div class="col-lg-8" >
                    <div class="row">
                        <form class="abs-form mtb-10 col-xl-2" method="get" action="/search/">
                            <input type="text" placeholder="Поиск" name="search">
                            <button type="submit"><i class="ion-ios-search"></i></button>
                        </form>
                        <ul class="col-xl-10 main-menu" id="main-menu">
                            <li class="drop-down"><a href="/">Главная</a>
                            </li>
                            <? foreach ($categorys as $category) { ?>
                                <li class="drop-down">
                                    <!--                            <ul class="drop-down-menu drop-down-inner">-->

                                    <a href="/category/<? echo $category['id_categ'] ?>"><? echo $category['name'] ?></a>

                                    <!--                            </ul>-->
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 float-right">
                    <?php if (User::isGuest()):?>
                        <div class="auth logo float-right"><a href="/user/register/">Регистрация</a> / <a href="/user/login/">Вход</a></div>
                    <?php else:?>
                        <div class="auth logo float-right"><?echo $_SESSION['userLogin'];?>/<a href="/user/logout/">Выйти</a></div>
                    <?php endif;?>
                </div>






            </div>

        </div>
    </div>
</header>






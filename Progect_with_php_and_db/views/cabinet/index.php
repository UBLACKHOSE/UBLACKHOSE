<?php include_once ( ROOT . '/views/header_and_footer/header.php') ?>


<div class="container-fluid collapse" id="menu2">
    <div class="text-center" id="mobil">
        <ul class="account-menu" style="width: 100%;margin: 0px">
            <a href="/cabinet/">
                <li class="account-menu-item">
                    <img src="/template/icons/person.svg" style="float: left; height: 30px;width: 30px">
                    <p style="padding-left: 5px;float: left;">Мой профиль</p>
                </li>
            </a>
            <a href="/cabinet/">
                <li class="account-menu-item">
                    <svg class="bi bi-collection-play-fill" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="float: left;height: 30px;width: 30px;color: black">
                        <path fill-rule="evenodd" d="M1.5 14.5A1.5 1.5 0 010 13V6a1.5 1.5 0 011.5-1.5h13A1.5 1.5 0 0116 6v7a1.5 1.5 0 01-1.5 1.5h-13zm5.265-7.924A.5.5 0 006 7v5a.5.5 0 00.765.424l4-2.5a.5.5 0 000-.848l-4-2.5zM2 3a.5.5 0 00.5.5h11a.5.5 0 000-1h-11A.5.5 0 002 3zm2-2a.5.5 0 00.5.5h7a.5.5 0 000-1h-7A.5.5 0 004 1z" clip-rule="evenodd"/>
                    </svg>
                    <p style="padding-left: 5px;float: left;">Мои фильмы</p>
                </li>
            </a>
            <a href="/cabinet/">
                <li class="account-menu-item">
                    <img src="/template/icons/star.svg" style="float: left; height: 30px;width: 30px">
                    <p style="padding-left: 5px;float: left;">Рекомендации</p>
                </li>
            </a>
            <a href="/cabinet/">
                <li class="account-menu-item">
                    <img src="/template/icons/gear.svg" style="float: left; height: 30px;width: 30px">
                    <p style="padding-left: 5px;float: left;">Настройки профиля</p>
                </li>
            </a>
        </ul>
    </div>
</div>

<div class="container-fluid">
    <div class="container" style="padding: 0px;border-left: 1px solid black;border-right: 1px solid black;  ">
        <div class="row">
        <div class="col-md-3" id="pc" style="border-right: 1px solid black;padding: 0px">
            <ul class="account-menu" style="width: 100%;margin: 0px">
               <a href="/cabinet/">
                   <li class="account-menu-item">
                       <img src="/template/icons/person.svg" style="float: left; height: 30px;width: 30px">
                       <p style="padding-left: 5px;float: left;">Мой профиль</p>
                   </li>
               </a>
                <a href="/cabinet/">
                    <li class="account-menu-item">
                        <svg class="bi bi-collection-play-fill" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="float: left;height: 30px;width: 30px;color: black">
                            <path fill-rule="evenodd" d="M1.5 14.5A1.5 1.5 0 010 13V6a1.5 1.5 0 011.5-1.5h13A1.5 1.5 0 0116 6v7a1.5 1.5 0 01-1.5 1.5h-13zm5.265-7.924A.5.5 0 006 7v5a.5.5 0 00.765.424l4-2.5a.5.5 0 000-.848l-4-2.5zM2 3a.5.5 0 00.5.5h11a.5.5 0 000-1h-11A.5.5 0 002 3zm2-2a.5.5 0 00.5.5h7a.5.5 0 000-1h-7A.5.5 0 004 1z" clip-rule="evenodd"/>
                        </svg>
                        <p style="padding-left: 5px;float: left;">Мои фильмы</p>
                    </li>
                </a>
                <a href="/cabinet/">
                    <li class="account-menu-item">
                        <img src="/template/icons/star.svg" style="float: left; height: 30px;width: 30px">
                        <p style="padding-left: 5px;float: left;">Рекомендации</p>
                    </li>
                </a>
                <a href="/cabinet/">
                    <li class="account-menu-item">
                        <img src="/template/icons/gear.svg" style="float: left; height: 30px;width: 30px">
                        <p style="padding-left: 5px;float: left;">Настройки профиля</p>
                    </li>
                </a>
            </ul>
        </div>
            <div class="col-md-9" style="border-bottom: 1px solid black;padding: 0px; height: 250px
">
                <div class="row" style="padding: 0px">
                    <div class="col-6 col-sm-6 col-md-6 col-xl-4 text-center" style="padding: 0px;padding-top: 25px;text-align: center;">
                        <img src="/template/img/img_user/<?php echo $_SESSION['userImg']?>.png" style="height: 140px; width: 140px; border-radius: 100%">
                        <h3 style="text-align: center;margin: 0px"><?echo $_SESSION['userLogin']?></h3>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-xl-8" style="font-size: 1em;padding: 0px;">
                        <p style="" id="progres-item"><strong>Вы посмотрели:</strong>0 фильмов</p>
                        <p style=""  id="progres-item"><strong>Вы хотите посмотреть:</strong>0 фильмов</p>
                        <p style=""  id="progres-item"><strong>Вы прокоментировали:</strong>0 фильмов</p>
                        <p style=""  id="progres-item"><strong>Вы поставили рейтинг:</strong>0 фильмов</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div >
<?php include_once(ROOT . '/views/header_and_footer/footer.php') ?>
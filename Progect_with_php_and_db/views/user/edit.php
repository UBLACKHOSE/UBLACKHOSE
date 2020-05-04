<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>

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
                </ul>
            </div>
            <div class="col-md-10 col-xl-11" style="padding: 0px;">
                <div class="row" style="padding: 0px;border-bottom: 1px solid black;">
                    <div class="col-6 col-sm-6 col-md-6 col-xl-4 text-center" style="padding: 0px;padding-top: 44px;text-align: center;">
                        <img src="/template/img/img_user/<?php echo $_SESSION['userImg']?>" style="height: 140px; width: 140px; border-radius: 100%" name="user_img">
                        <h3 style="text-align: center;margin: 0px"><?echo $_SESSION['userLogin']?></h3>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-xl-8" style="font-size: 1em;padding: 0px;">
                        <p style="" id="progres-item"><strong>Я посмотрел: </strong><?echo Film::getCountFilm($_SESSION['user'],1)?> фильмa</p>
                        <p style=""  id="progres-item"><strong>Я хочу посмотреть: </strong>0 фильмa</p>
                        <p style=""  id="progres-item"><strong>Я прокоментировал: </strong>0 фильмa</p>
                        <p style=""  id="progres-item"><strong>Я поставили рейтинг: </strong>0 фильмa</p>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-1 col-10" style="padding: 10px 0px;">
                        <form id="myForm" method="post" enctype="multipart/form-data">
                            <h2 style="padding: 10px 0px;">Сменить фото профиля:</h2>
                            <div class="custom-file" style="width: 35%;float: left;">
                                <input class="custom-file-input" style="float: left;" name="myfile" id="customFile" type="file"  accept=".jpg, .jpeg, .png ">
                                <label  class="custom-file-label btn" style="text-align: center; background:#343a40;color: white" for="customFile">Выбрать файл</label>
                            </div>
                            <div style="width: 65%; float: left">
                                <div id="namefile" class="col-10" style="width: 60%;float: left;overflow: hidden;">
                                </div>
                                <input style="width: 40%" class="btn btn-dark" type="submit" id="download" value="Сменить">
                            </div>
                            <div id="my_form_satus" style="font-size: 1.2em"></div>
                        </form>
                        <form action="#" method="post">
                            <h2 style="padding: 10px 0px;">Сменить логин:</h2>
                            <?if(isset($errors_login) && $errors_login!=null){?>
                            <?foreach($errors_login as $error):?>
                                    <div style="margin: 10px 0px; font-size: 1.2em;" class="alert-danger"><?echo $error ?></div>
                            <?endforeach;}?>
                            <div class="input-group">
                                <input type="text" name="login_text" style="float: left;" class="form-control" placeholder="Введите логин">
                                <input name="login" type="submit" class="btn btn-dark" value="Сменить">
                            </div>
                        </form>
                        <form action="#" method="post">
                            <h2 style="padding: 10px 0px;">Сменить Email:</h2>
                            <?if(isset($errors_email) && $errors_email!=null){?>
                                <?foreach($errors_email as $error):?>
                                    <div style="margin: 10px 0px; font-size: 1.2em;" class="alert-danger"> <?echo $error ?></div>
                                <?endforeach;}else if (isset($success_email) &&  $success_email!= null){?>
                                <?foreach($success_email as $success):?>
                                    <div style="margin: 10px 0px; font-size: 1.2em;" class="alert-success"> <?echo $success ?></div>
                                <?endforeach;}?>
                            <div class="input-group">
                                <input type="email" name="email_text" style="float: left;" class="form-control" placeholder="Введите Email">
                                <input name="email" type="submit" class="btn btn-dark"class="input-group-append" value="Сменить">
                            </div>
                        </form>
                        <form action="#" method="post">
                            <h2 style="padding: 10px 0px;">Сменить пароль:</h2>
                            <?if(isset($errors_password) && $errors_password!=null){?>
                                <?foreach($errors_password as $error):?>
                                    <div style="margin: 10px 0px; font-size: 1.2em;" class="alert-danger"> <?echo $error ?></div>
                                <?endforeach;}else if (isset($success_password) &&  $success_password!= null){?>
                                <?foreach($success_password as $success):?>
                                    <div style="margin: 10px 0px; font-size: 1.2em;" class="alert-danger"> <?echo $success ?></div>
                                <?endforeach;}?>

                            <div class="input-group">
                                <h3 style="width: 100%">Старый пароль</h3>
                                <input type="password" name="old_password" style="margin: 10px 0px;float: left;" class="form-control" placeholder="Введите старый пароль">
                                <h3 style="width: 100%">Новый пароль</h3>
                                <input  type="password" name="new_password" style="float: left; width: 100%;margin: 10px 0px;" placeholder="Введите новый пароль">
                                <input  name="password" type="submit" class="btn btn-dark" value="Сменить" style="float: right">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
        $(document).ready(
           function () {
               var form = $('#myForm');
               var message = $('#my_form_satus');
               var avatar= $('#customFile');
               document.getElementById('namefile').style.display = 'none';
               avatar.change(function () {
                   if(($("#customFile")[0].files).length!=0) {
                       document.getElementById('namefile').innerHTML = avatar.val();
                       document.getElementById('namefile').style.display = 'block';
                   }
                   else {
                       document.getElementById('namefile').style.display = 'none';
                   }
               });
               form.on('submit',function () {
                   var formData= new FormData();
                   if(($("#customFile")[0].files).length!=0){
                       $.each($("#customFile")[0].files,function (i,file) {
                           formData.append("file["+ i +"]",file);
                       });
                   }
                   else {
                       message.html('Нужно выбрать файл');
                       return false;
                   }
                   $.ajax({
                       type:"POST",
                       url:"/user/edit_img/",
                       data:formData,
                       cache:false,
                       dataType:"json",
                       contentType: false,
                       processData:false,
                       beforeSend:function(){
                         console.log('Запрос начат');
                         message.text('Запрос начат');
                         form.find('input').prop("disabled",true);
                       },
                       success:function (data) {
                           if (data.status=='ok'){
                               message.text('Файл загружен');
                               $('#customFile').val('');
                               console.log(data);
                               var img_user = document.getElementsByName('user_img');
                               for(var i=0;i<3;i++){
                                   img_user[i].src="/template/img/img_user/"+data.file;
                               }
                           }
                           else {
                               console.log(data);
                               message.text('С загрузкой что то не так');
                           }
                       },
                       complete:function () {
                           console.log('Запрос закончен');
                           form.find('input').prop("disabled",false);
                       }
                   });

                   return false;
               });
           }
        )
    </script>

<?php require_once (ROOT.'/views/header_and_footer/footer.php')?>
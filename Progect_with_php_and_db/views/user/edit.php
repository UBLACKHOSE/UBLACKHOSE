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
                    <div class="offset-1 col-10" style="padding: 10px 0px">
                        <form id="myForm" method="post" enctype="multipart/form-data">
                            <input name="myfile" id="myfile" type="file"  accept=".jpg, .jpeg, .png ">
                            <input type="submit">
                            <div id="my_form_satus"></div>
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
               form.on('submit',function () {
                   var formData= new FormData();
                   if(($("#myfile")[0].files).length!=0){
                       $.each($("#myfile")[0].files,function (i,file) {
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
                               $('#myfile').val('');
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
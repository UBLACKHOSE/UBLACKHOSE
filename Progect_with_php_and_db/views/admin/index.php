<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>









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

<?php require_once (ROOT.'/views/header_and_footer/footer.php')?><?php

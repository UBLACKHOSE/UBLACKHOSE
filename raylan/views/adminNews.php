<?php require_once ( ROOT . '/views/header_and_footer/header.php') ?>
<section class="ptb-30">
    <div class="container">
        <div class="row">
            <div class="order-1 order-lg-0 col-md-12">
                <div class="ptb-0">
                    <h2 class="mtb-20"><b> Добавление новости </b></h2>
                </div>
                <?if(isset($succes)){?>
                    <h4><?echo $succes;?></h4>
                    <form action="#" method="post">
                        <div class="order-1 order-lg-0 col-md-12 mt-50">
                            <div class="ptb-0">
                                <a class="float-right">
                                    <button name="submit2" type="submit" class="site-btn">Создать еще одну новость</button>
                                </a>
                            </div>
                        </div>
                    </form>
                <?} else{?>
                    <form action="#" method="post" enctype="multipart/form-data" id="myForm" >
                        <h4>Введите заголовок:</h4>
                        <div class="input-group mb-3">
                            <input type="text" name="title" class="form-control" value="<?=$title?>" aria-label="Дом"  required>
                        </div>
                        <h4>Введите основной текст:</h4>
                        <div class="form-group">
                            <textarea name="description" class="form-control" id="exampleTextarea" rows="5" required><?=$description?></textarea>
                        </div>
                        <h4>Вставте изображение:</h4>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                            <div class="custom-file">
                                <input name="myfile" id="customFile"  type="file" class="custom-file-input" accept=".jpg, .jpeg, .png " required>
                                <label id="namefile" class="custom-file-label" for="customFile">Выбрать файл</label>
                            </div>
                        </div>

                        <div class="order-1 order-lg-0 col-md-12 mt-50">
                            <div class="ptb-0">
                                <a class="float-right">
                                    <button name="submit" type="submit" class="site-btn">Создать новость</button>
                                </a>
                            </div>
                        </div>
                    </form>
                <?}?>
            </div><!-- col-sm-8 -->
        </div>
    </div>
</section>

<script>
    $(document).ready(
        function () {
            var avatar= $('#customFile');
            avatar.change(function () {
                if(($("#customFile")[0].files).length!=0) {
                    document.getElementById('namefile').innerHTML = avatar.val();
                    document.getElementById('namefile').style.display = 'block';
                }
            });
        }
    )
</script>
<?php require_once (ROOT.'/views/header_and_footer/footer.php')?>

<?php
$tel = $_POST['tel'];
$tel = htmlspecialchars($tel);
$tel = urldecode($tel);
$tel = trim($tel);


$name = $_POST['name'];
$name = htmlspecialchars($name);
$name = urldecode($name);
$name = trim($name);



$email = $_POST['email'];
$email = htmlspecialchars($email);
$email = urldecode($email);
$email = trim($email);

$com = $_POST['com'];
$com = htmlspecialchars($com);
$com = urldecode($com);
$com = trim($com);

if (mail("kotolizator82@gmail.com", "Заказ звонка", "Телефон:".$tel."Имя:".$name."Email:".$email."Коментарий:".$com,"From: example2@mail.ru \r\n"))
{
    echo "сообщение успешно отправлено";
} else {
    echo "при отправке сообщения возникли ошибки";
}
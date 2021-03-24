<?php
$tel = $_POST['tel'];
$tel = htmlspecialchars($tel);
$tel = urldecode($tel);
$tel = trim($tel);


if (mail("kotolizator82@gmail.com", "Заказ звонка", "Телефон:".$tel,"From: example2@mail.ru \r\n"))
{
    echo "сообщение успешно отправлено";
} else {
    echo "при отправке сообщения возникли ошибки";
}
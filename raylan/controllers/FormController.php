<?php


class FormController
{

    public function actionForm1(){


        $sum = '';
        $type = '';
        if (isset($_POST['submit'])) {
            $sum = $_POST['sum'];
            $type = $_POST['type'];
            echo 123;
        }

        return true;
    }
}
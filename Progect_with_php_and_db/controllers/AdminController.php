<?php


class AdminController
{
    public function actionIndex(){
        if (isset($_SESSION['user'])){
            if (User::checkAdminRights($_SESSION['user'])==1) {




            require_once(ROOT . '/views/admin/index.php');
            }
            else
                {
                    header('location:/');
                }
        }
        return true;
    }
}
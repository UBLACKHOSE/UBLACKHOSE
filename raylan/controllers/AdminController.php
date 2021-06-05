<?php


class AdminController
{
    public function actionCh(){

        $streets = User::getStreetsList();
        $id_street_input ="";
        $house ="";
        $date_start ="";
        $date_stop = "";
        $type ="";
        $base = "";
        $reason="";
        $name="";
        $sum ="";
        $number = "";
        $errors = false;
        if (isset($_POST['submit'])) {
            $id_street_input = $_POST['street'];
            $house = $_POST['house'];
            $date_start = $_POST['date_start'];
            $date_stop = $_POST['date_stop'];
            $type = $_POST['type'];
            $base =    $_POST['base'];
            $reason = $_POST['reason'];
            $name = $_POST['name'];
            $sum = $_POST['summ'];
            $number = $_POST['number'];
            if(User::СheckHouse($id_street_input,$house)) {
                $id_house = User::getHouse($id_street_input, $house);
                if (Admin::addBills($id_house,$number,$date_start,$date_stop,$type,$base,$reason,$name,$sum)){
                    $errors2 = "Счет выставлен";
                }
            }else{
                $errors = "Такого дома нет";
            }
        }

        if (isset($_POST['submit2'])) {
            header("Location: /admin/ch");
        }
        require_once(ROOT.'/views/adminCh.php');
        return true;
    }
    public function actionNew(){
        $title ="";
        $description ="";
        if (isset($_POST['submit'])) {

            $title = $_POST['title'];
            $description = $_POST['description'];
            if (!empty($_FILES['myfile']['tmp_name'])) {

                $upload_path = ROOT . "/template/img/img_news/";
                $user_filename = $_FILES['myfile']['name'];
                $userfile_basename = pathinfo($user_filename, PATHINFO_FILENAME);
                $userfile_extension = pathinfo($user_filename, PATHINFO_EXTENSION);


                $server_filename = $userfile_basename . ".png";
                $server_filepath = $upload_path . $server_filename;


                if (copy($_FILES['myfile']['tmp_name'], $server_filepath)) {
                    Admin::addNew($title, $description,date("y-m-d"),$_SESSION['userLogin'],$server_filename);
                    $response['myfile'] = $server_filename;
                    $response['status'] = 'ok';
                    $succes = "Новость добавлена";
                }
                $response['text'] = 'file exist';
            }
        }

        if (isset($_POST['submit2'])) {
            header("Location: /admin/new");
        }
        require_once(ROOT.'/views/adminNews.php');
        return true;
    }
}
<?php
require_once '../../settings/crud.php';


if (isset($_POST['subscribe_mail'])){
    $crud = new crud();
    $response = $crud->subscribe_form(htmlspecialchars($_POST['mail']));
    if ($response == TRUE){
        header('location:'.take_link().'/'.'anasayfa?status=ok');
        die();
    }
    else{
        header('location:'.take_link().'/'.'anasayfa?status=no');
        die();
    }
}

?>
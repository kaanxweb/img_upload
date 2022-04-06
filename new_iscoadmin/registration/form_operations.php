<?php
session_start();
if (isset($_SESSION['username'])){
    include '../../system/settings.php';
    $id = $_GET['id'];
    $delete = $db->prepare("DELETE FROM form WHERE id=:id");
    $delete->execute(array(
        ':id' => $id
    ));
    if ($delete->rowCount() > 0){
        header("location:../form_list.php?durum=ok");
    }
    else{
        print_r($delete->errorInfo());
        header("location:../form_list.php?durum=no");
    }
}


?>
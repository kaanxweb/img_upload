<?php
session_start();
if (isset($_SESSION['username'])){
include 'settings.php';
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['password']) && isset($_POST['edit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];

    $edit = $db->prepare("UPDATE admin SET
    name=:name, surname=:surname, password=:password WHERE id=:id");
    $edit->execute(array(
       'name' => $name,
       'surname' => $surname,
       'password' => $password,
        'id' => $_SESSION['id']
    ));
    if ($edit){
        header('location:../user-details.php?durum=yes');
    }
}
else{
    header("location:user-details.php=durum=no");
}
















}










?>
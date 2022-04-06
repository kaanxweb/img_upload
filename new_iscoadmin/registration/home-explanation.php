<?php
include '../../system/settings.php';
if (isset($_POST['explanation']) && isset($_POST['title']) && isset($_POST['text'])){
$title = $_POST['title'];
$text = $_POST['text'];

$query = $db->prepare("UPDATE home_explanation SET title=:title, text=:text");
$query->execute(array(
   'title' => $title,
   'text' => $text
));
if ($query->rowCount() > 0){
    header("location:../home-explanation.php?durum=ok");
}
else{
    print_r($query->errorInfo());
}

}
else{
    header("location:../home-explanation.php?durum=no");
}


?>
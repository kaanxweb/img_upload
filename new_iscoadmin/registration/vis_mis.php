<?php
include '../../system/settings.php';

if (isset($_POST['submit']) && isset($_POST['vision'])){
    $vision = $_POST['vision'];
    $vision_update = $db->prepare("UPDATE companyinfo SET vision=:vision ");
    $vision_update->execute(array(
        'vision' => $vision
    ));
    if ($vision_update->rowCount() > 0){
        header("location:../vis_mis.php?operation=vision&durum=ok");
    }
    else {
        echo "As";
    }
}

if (isset($_POST['submit']) && isset($_POST['mission'])){
    $mission = $_POST['mission'];
    $mission_update = $db->prepare("UPDATE companyinfo SET mission=:mission ");
    $mission_update->execute(array(
        'mission' => $mission
    ));
    if ($mission_update->rowCount() > 0){
        header("location:../vis_mis.php?operation=mission&durum=ok");
    }
    else {
        echo "As";
    }
}




?>
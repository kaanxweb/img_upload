<?php
include '../../system/settings.php';
ob_start();
#Register
    if (isset($_POST['register']) && isset($_POST['feature_icon']) && isset($_POST['feature_title']) && isset($_POST['feature_text'])) {
        $feature_icon = $_POST['feature_icon'];
        $feature_title = $_POST['feature_title'];
        $feature_text = $_POST['feature_text'];
        $reg = $db->prepare("INSERT INTO about_features SET 
                        feature_icon=:feature_icon,
                        feature_title=:feature_title,
                        feature_text=:feature_text ");
        $control = $reg->execute(
            array(
                'feature_icon' => $feature_icon,
                'feature_title' => $feature_title,
                'feature_text' => $feature_text
            )
        );
        if (isset($control)) {
            header('location:../about-features.php?durum=ok');
        } else {
            header('location:../about-features.php?durum=no');
        }
    }


#Update
if (isset($_POST['feature_id']) && isset($_POST['feature_icon']) && isset($_POST['feature_title']) && isset($_POST['feature_text']) && isset($_POST['edit']) ){

    $feature_id = $_POST['feature_id'];
    $feature_icon = $_POST['feature_icon'];
    $feature_title = $_POST['feature_title'];
    $feature_text = $_POST['feature_text'];
    $update = $db->prepare("UPDATE about_features SET feature_icon=:feature_icon, feature_title=:feature_title, feature_text=:feature_text WHERE id=:id ");
    $control = $update->execute(array(
        'feature_icon' => $feature_icon,
        'feature_title' => $feature_title,
        'feature_text' => $feature_text,
        'id' => $feature_id
    ));

    if (isset($control)){
        $operation = $_GET['operation'];
        echo $operation;
        header("location:../feature_operations.php?id=$feature_id&operation=edit&durum=ok");
    }
    else{
        header('location:../feature_operations.php?id=$id&operation=$operation&durum=no');
    }
}

#Delete


if (@$_GET['operation'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $db->prepare("DELETE FROM about_features WHERE id=:id");
    $control = $delete->execute(array(
        'id' => $id
    ));
    if (isset($control)) {
        header('location:../about-features.php?durum=ok');
    } else {
        header('location:../about-features.php?durum=no');
    }
}


ob_flush();
?>
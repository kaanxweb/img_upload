<?php include '../../system/settings.php';

if( isset($_POST['about_title']) && isset($_POST['about'])){
    $about_title = $_POST['about_title'];
    $aboutck = $_POST['about'];
    $about = $db->prepare("UPDATE companyinfo SET about_title=:about_title, about=:about");
    $control = $about->execute(array(
        'about_title' => $about_title,
        'about' => $aboutck
    ));
    if ($control){
        header("location:../about-edit.php?durum=ok");
    }
    else{
        header("location:../about-edit.php?durum=no");
    }
}

if(isset($_POST['features_icon']) && isset($_POST['features_title']) && $_POST['features_text']){


}
?>
<?php
include '../../system/settings.php';
if (isset($_FILES['my_file']) && isset($_POST['slider_title']) && isset($_POST['slider_explanation'])){

        $slider_image = $_FILES['my_file'];
        $title = $_POST['slider_title'];
        $explanation = $_POST['slider_explanation'];


        if ($slider_image['name'] != ""){

        $target = "../../img/slider/";
        $file = $slider_image['name'];
        $file_details = pathinfo($file);
        $file_details['filename'];

        $slider_name = $slider_image['name'];
        $slider_tmp  = $slider_image['tmp_name'];
        $slider_new_name = "upload_".rand(0,500000000).$file_details['dirname'].$file_details['extension'];
        if (move_uploaded_file($slider_tmp,$target.$slider_new_name)) {
            if (isset($_POST['slider_registration'])){
            $query = $db->prepare("INSERT INTO sliders SET slider_photo=:slider_photo, slider_title=:slider_title, slider_explanation=:slider_explanation");
            $query->execute(array(
                'slider_photo' => $slider_new_name,
                'slider_title' => $title,
                'slider_explanation' => $explanation
            ));
            }
            if (isset($_POST['slider_edit'])){
                $id = $_POST['id'];
                $query = $db->prepare("UPDATE sliders SET slider_photo=:slider_photo, slider_title=:slider_title, slider_explanation=:slider_explanation WHERE id=:id");
                $query->execute(array(
                    'slider_photo' => $slider_new_name,
                    'slider_title' => $title,
                    'slider_explanation' => $explanation,
                    'id' => $id
                ));
            }
            if ($query->rowCount() > 0){
                header("location:../sliders.php?durum=ok");
            }
            else{
                header("location:../sliders.php?durum=no");
            }

        }
        }
        if ($slider_image['name'] == "" && isset($_POST['slider_edit'])){
                $id = $_POST['id'];
                $query = $db->prepare("UPDATE sliders SET slider_title=:slider_title, slider_explanation=:slider_explanation WHERE id=:id");
                $query->execute(array(
                    'slider_title' => $title,
                    'slider_explanation' => $explanation,
                    'id' => $id
                ));
                if ($query->rowCount() > 0){
                    header("location:../sliders.php?durum=ok");
                }
                else{
                    header("location:../sliders.php?durum=no");
                }
        }

}

if (@$_GET['operation'] == 'delete'){
    $id = $_GET['id'];
    $query = $db->prepare("DELETE FROM sliders WHERE id=:id");
    $query->execute(array(
        'id' => $id
    ));
    if ($query->rowCount() > 0){
        header("location:../sliders.php?durum=ok");
    }
    else{
        header("location:../sliders.php?durum=no");
    }
}



?>
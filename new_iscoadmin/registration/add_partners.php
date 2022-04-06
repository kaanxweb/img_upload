<?php
include '../../system/settings.php';
/* Çalışıyor.
echo "<pre>";
var_dump($_FILES);
echo "</pre>";
*/


if (@strlen($_FILES['my_file']['name']) > 0 ){


// Where the file is going to be stored
    $target_dir = "../../img/uploads/"; //dosya yolu belirledik.
    $file = $_FILES['my_file']['name']; //Gelen dosyanın ismini uzantısıyla beraber (.jpg vs) aldık.
    $path = pathinfo($file); //Dosya yolu hakkında bilgi döndürdük.
    //$file_extension = $path['extension']; //Dosyanın tipini aldık.

    $filename = $path['filename']; //Burada dosyanın sadece ismini aldık
    $ext = $path['extension']; //Burada dosyanın sadece uzantısını aldık (jpg,png vs)
    $temp_name = $_FILES['my_file']['tmp_name']; //temp_name adında bir değişken oluşturmuş, ve dosyanın yolunu almış.
    $path_filename_ext = $target_dir.$filename.".".$ext; // Upload/dosyaismi.uzantı

    if ($_FILES['my_file']['name'] != ""){
    $file_new_name = "upload_".rand(0,50000).".".$path['extension'];
    }

    $explanation = $_POST['partner_explanation']; #IMG Alt ile gelen metni aldık.
    if (isset($_POST['registration'])){
    if (file_exists($file_new_name)) { #Aynı dosya ismine sahip bir dosya var mı diye kontrol sağlıyoruz.
        header("location:../add_partners.php?durum=no");
    }else{
        if ($file_new_name != ""){
            move_uploaded_file($temp_name,$target_dir.$file_new_name);
            $partner_reg = $db->prepare("INSERT INTO business_partners SET partner_image=:partner_image, partner_explanation=:partner_explanation");
            $partner_reg->execute(array(
                'partner_image' => $file_new_name,
                'partner_explanation' => $explanation
            ));
            if ($partner_reg->rowCount() > 0){
                echo "Kayıt işlemi başarılı...";
                header("location:../business_partners.php?durum=ok");
            }
            else{
                print_r($partner_reg->errorInfo());
                header("location:business_partners.php?durum=no");
            }
        }
        else{
                header("location:business_partners.php?durum=no");
        }


    }
    } // if'in parantezi (registration postunu kontrol eden if in)
    if (isset($_POST['edit']) ){

        if (file_exists($file_new_name)) { #Aynı dosya ismine sahip bir dosya var mı diye kontrol sağlıyoruz.
            header("location:../add_partners.php?durum=no");
        }else{

            $id = $_POST['partner_id'];
            if (move_uploaded_file($temp_name,$target_dir.$file_new_name)){


            $partner_reg = $db->prepare("UPDATE business_partners SET partner_image=:partner_image, partner_explanation=:partner_explanation WHERE id=:id");
            $partner_reg->execute(array(
                'partner_image' => $file_new_name,
                'partner_explanation' => $explanation,
                'id' => $id
            ));
            if ($partner_reg->rowCount() > 0){
                echo "Kayıt işlemi başarılı...";
                header("location:../business_partners.php?durum=ok");
            }
            else{
                print_r($partner_reg->errorInfo());
                header("location:business_partners.php?durum=no");
            }
            }
            else{
                header("location:../business_partners.php?durum=no");
            }

        }
    }
}
if (isset($_POST['edit']) && @strlen($_FILES['my_file']['name']) <= 0 ){
    $id = $_POST['partner_id'];
    $explanation = $_POST['partner_explanation'];
    $partner_reg = $db->prepare("UPDATE business_partners SET partner_explanation=:partner_explanation WHERE id=:id");
    $partner_reg->execute(array(
        'partner_explanation' => $explanation,
        'id' => $id
    ));
    if ($partner_reg->rowCount() > 0){
        echo "Kayıt işlemi başarılı...";
        header("location:../business_partners.php?durum=ok");
    }
    else{
        print_r($partner_reg->errorInfo());
        die;
        header("location:../business_partners.php?durum=no");
    }
}
if (@$_GET['operation'] == 'partner_delete'){
    $id = $_GET['id'];
    $partner_delete = $db->prepare("DELETE FROM business_partners WHERE id=:id");
    $partner_delete->execute(array(
        'id' => $id
    ));
    if ($partner_delete->rowCount() > 0){
        header("location:../business_partners.php?durum=ok");
    }
    else{
        echo "<pre>";
        var_dump($partner_delete->errorInfo());
        echo "</pre>";
    }
}


?>
<?php
include '../../system/settings.php';

#Company Info Update
if (isset($_POST['company_update'])){
    $company_url = $_POST['company_url'];
    $company_title = $_POST['company_title'];
    $company_description = $_POST['company_description'];
    $company_keywords = $_POST['company_keywords'];
    $company_phone = $_POST['company_phone'];
    $company_phone_two = $_POST['company_phone_two'];
    $company_phone_three = $_POST['company_phone_three'];
    $company_mail = $_POST['company_mail'];
    $company_facebook = $_POST['company_facebook'];
    $company_twitter = $_POST['company_twitter'];
    $company_instagram = $_POST['company_instagram'];
    $company_linkedin = $_POST['company_linkedin'];
    $company_youtube = $_POST['company_youtube'];

    $query = $db->prepare("UPDATE companyinfo SET 
                            url=:company_url,
                            title=:company_title,
                            description=:company_description,
                            keywords=:company_keywords,
                            phone=:company_phone,
                            phone_two=:company_phone_two,
                            phone_three=:company_phone_three,
                            mail=:company_mail,
                            facebook=:company_facebook,
                            twitter=:company_twitter,
                            instagram=:company_instagram,
                            linkedin=:company_linkedin,
                            youtube=:company_youtube ");

    $query->execute(array(
        'company_url' => $company_url,
        'company_title' => $company_title,
        'company_description' => $company_description,
        'company_keywords' => $company_keywords,
        'company_phone' => $company_phone,
        'company_phone_two' => $company_phone_two,
        'company_phone_three' => $company_phone_three,
        'company_mail' => $company_mail,
        'company_facebook' => $company_facebook,
        'company_twitter' => $company_twitter,
        'company_instagram' => $company_instagram,
        'company_linkedin' => $company_linkedin,
        'company_youtube' => $company_youtube
    ));

    if ($query->rowCount() > 0){
        header("location:../settings.php?durum=ok");
    }
    else{
        header("location:../settings.php?durum=no");
    }


}


?>
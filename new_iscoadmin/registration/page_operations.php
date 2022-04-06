<?php
include '../../system/settings.php';
include '../../system/functions.php';
ob_start();
if(isset($_FILES['page_photo']) && isset($_POST['page_title']) && isset($_POST['page_explanation'])){

    $id = $_POST['id'];
    $target = "../../img/pages/";
    $page_photo = $_FILES['page_photo'];
    $tmp_photo = $_FILES['page_photo']['tmp_name'];
    $page_title = $_POST['page_title'];
    $seo_title = seo_title($page_title);
    $page_explanation = $_POST['page_explanation'];
    $photo_name = $page_photo['name'];
    $photo_path = pathinfo($page_photo['name']);
    @$new_name = RandomWord(20).rand(0,500000).$photo_path['dirname'].$photo_path['extension'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_author = $_POST['meta_author'];


    echo "<hr>";

    if (isset($_POST['page_registration']) && strlen($photo_name) > 0){
        if (file_exists($new_name)){
            header("location:../pages.php?durum=no");
        }
        else{
            if (move_uploaded_file($tmp_photo,$target.$new_name)){
                $query = $db->prepare("INSERT INTO pages SET
            page_photo=:page_photo, page_title=:page_title, seo_title=:seo_title, page_content=:page_content, meta_title=:meta_title, meta_description=:meta_description,
            meta_keywords=:meta_keywords, meta_author=:meta_author");
                $query->execute(array(
                    ':page_photo' => $new_name,
                    ':page_title' => $page_title,
                    ':seo_title' => $seo_title,
                    ':page_content' => $page_explanation,
                    ':meta_title' => $meta_title,
                    ':meta_description' => $meta_description,
                    ':meta_keywords' => $meta_keywords,
                    ':meta_author' => $meta_author
                ));
                if ($query->rowCount() > 0){
                    header("location:../pages.php?durum=ok");
                    die;
                }
                else{
                    echo ":D";
                    header("location:../pages.php?durum=no");
                    die;
                }
            }
            else{
                header("location:../pages.php?durum=no");
            }
        }
    }
    else if (isset($_POST['page_registration']) && strlen($photo_name <= 0)){

        $query = $db->prepare("INSERT INTO pages SET
        page_title=:page_title,
        seo_title=:seo_title,
        page_content=:page_content,
        meta_title=:meta_title, meta_description=:meta_description,
        meta_keywords=:meta_keywords, meta_author=:meta_author

");
        $query->execute(array(
            ':page_title' => $page_title,
            ':seo_title' => $seo_title,
            ':page_content' => $page_explanation,
            ':meta_title' => $meta_title,
            ':meta_description' => $meta_description,
            ':meta_keywords' => $meta_keywords,
            ':meta_author' => $meta_author
        ));
        if ($query->rowCount() > 0){
            header("location:../pages.php?durum=ok");
        }
        else{
            echo "<pre>";
            var_dump($query->errorInfo());
            echo "</pre>";
        }
    }

    if (isset($_POST['page_edit']) && strlen($photo_name) > 0){
        if (file_exists($new_name)){
            header("location:../pages.php?durum=no");
            die;
        }
        else{
            if (move_uploaded_file($tmp_photo,$target.$new_name)){
                $query = $db->prepare("UPDATE pages SET
            page_photo=:page_photo, page_title=:page_title, seo_title=:seo_title, page_content=:page_content,         
            meta_title=:meta_title, meta_description=:meta_description,
            meta_keywords=:meta_keywords, meta_author=:meta_author WHERE id=:id");
                $query->execute(array(
                    ':page_photo' => $new_name,
                    ':page_title' => $page_title,
                    ':seo_title' => $seo_title,
                    ':page_content' => $page_explanation,
                    ':meta_title' => $meta_title,
                    ':meta_description' => $meta_description,
                    ':meta_keywords' => $meta_keywords,
                    ':meta_author' => $meta_author,
                    ':id' => $id
                ));
                if ($query->rowCount() > 0){
                    header("location:../pages.php?durum=ok");
                    die;
                }
                else{
                    echo ":D";
                    header("location:../pages.php?durum=no");
                    die;
                }
            }
            else{
                header("location:../pages.php?durum=no");
                die;
            }
        }
    }
    else if (isset($_POST['page_edit']) && strlen($photo_name) <= 0){

        echo $page_title;
        echo "<hr>";
        echo $page_explanation;

        $query = $db->prepare("UPDATE pages SET
        page_title=:page_title,
        seo_title=:seo_title,
        page_content=:page_content, meta_title=:meta_title, meta_description=:meta_description,
            meta_keywords=:meta_keywords, meta_author=:meta_author WHERE id=:id ");
        $query->execute(array(
            ':page_title' => $page_title,
            ':seo_title' => $seo_title,
            ':page_content' => $page_explanation,
            ':meta_title' => $meta_title,
            ':meta_description' => $meta_description,
            ':meta_keywords' => $meta_keywords,
            ':meta_author' => $meta_author,
            ':id' => $id
        ));
        if ($query->rowCount() > 0){
            header("location:../pages.php?durum=ok");
        }
        else{
            header("location:../pages.php?durum=no");

            echo "<pre>";
            var_dump($query->errorInfo());
            echo "</pre>";

        }
    }
}

if (@$_GET['operation'] == 'delete'){
    $delete_id = $_GET['id'];
    $query = $db->prepare("DELETE FROM pages WHERE id=:id");
    $query->execute(array(
        ':id' => $delete_id
    ));
    if ($query->rowCount() > 0){
        header("location:../pages.php?durum=ok");
    }
    else{
        header("locaton:../pages.php?durum=no");
    }
}

if (@$_GET['operation'] == 'photo_delete'){
    echo $delete_id = $_GET['id'];

    $query = $db->prepare("UPDATE pages SET page_photo=:page_photo WHERE id=:id");
    $query->execute(array(
        ':page_photo'=> NULL ,
        ':id' => $delete_id
    ));

    if ($query->rowCount() > 0){
        header("location:../pages.php?durum=ok");
        die;
    }
    else{
        echo ":D";
        header("location:../pages.php?durum=no");
        die;
    }

}


ob_end_flush();
?>
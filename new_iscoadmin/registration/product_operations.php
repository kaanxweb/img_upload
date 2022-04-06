<?php
include '../../system/settings.php';
include '../../system/functions.php';
if (isset($_POST['product_registration'])){

    $product_images = $_FILES['product_images'];
    $product_explanation = $_POST['product_explanation'];
    $product_name = $_POST['product_name'];
    $seo_title = seo_title($product_name);
    $product_code = $_POST['product_code'];
    $product_price = $_POST['product_price'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_author = $_POST['meta_author'];



    $count = count($product_images['name']);
    $hash_name = [];
    for ($i = 0;$i<$count;$i++){
        $image_name = explode('.', $product_images['name'][$i]);
        $hash='';
        if ($product_images['type'][$i] ==  'image/png' ){
            $hash = password_hash($image_name[0],PASSWORD_DEFAULT) . '.png';
        }elseif ($product_images['type'][$i] == 'image/jpeg'){
            $hash = password_hash($image_name[0],PASSWORD_DEFAULT) . '.jpeg';
        }elseif($product_images['type'][$i] == 'image/webp') {
            $hash = password_hash($image_name[0],PASSWORD_DEFAULT) . '.webp';
        }else{
            damp('hata');
        }
        $hash_name[$i] = str_replace('/','a',$hash);

    }
    $hash_name = json_encode($hash_name);

    $save = $db->prepare("INSERT INTO products SET product_name=:product_name, seo_title=:seo_title, product_code=:product_code, product_explanation=:product_explanation, 
    product_price=:product_price, product_photos=:product_photos, meta_title=:meta_title, meta_description=:meta_description,
            meta_keywords=:meta_keywords, meta_author=:meta_author");

    $save->execute(array(
        ':product_name' => $product_name,
        ':seo_title' => $seo_title,
        ':product_code' => $product_code,
        ':product_explanation' => $product_explanation,
        ':product_price' => $product_price,
        ':product_photos' => $hash_name,
        ':meta_title' => $meta_title,
        ':meta_description' => $meta_description,
        ':meta_keywords' => $meta_keywords,
        ':meta_author' => $meta_author
    ));
    if ( $save->rowCount() > 0 )
    {
        $hash_name = json_decode($hash_name,true);
        for ($i=0;$i<$count;$i++){
            $photo = '../../img/uploads/'.$hash_name[$i];
            move_uploaded_file($product_images['tmp_name'][$i],$photo);
        }
        echo $sonuc = 'Başarı ile Eklenmiştir !' ;
        header("location:../products.php");

    }
    else
    {
        echo "ERRR";
        echo "<pre>";
        var_dump($save->errorInfo());
        echo "</pre>";
    }
}
if (isset($_POST['product_edit'])) {

    $product_images = $_FILES['product_images'];
    $product_explanation = $_POST['product_explanation'];
    $product_name = $_POST['product_name'];
    $seo_title = seo_title($product_name);
    $product_code = $_POST['product_code'];
    $product_price = $_POST['product_price'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_author = $_POST['meta_author'];
    $id = $_POST['id'];

    if ($_FILES['product_images']['name'][0] != "") {

        $count = count($product_images['name']);
        $hash_name = [];
        for ($i = 0; $i < $count; $i++) {
            $image_name = explode('.', $product_images['name'][$i]);
            $hash = '';
            if ($product_images['type'][$i] == 'image/png') {
                $hash = password_hash($image_name[0], PASSWORD_DEFAULT) . '.png';
            } elseif ($product_images['type'][$i] == 'image/jpeg') {
                $hash = password_hash($image_name[0], PASSWORD_DEFAULT) . '.jpeg';
            } elseif ($product_images['type'][$i] == 'image/webp') {
                $hash = password_hash($image_name[0], PASSWORD_DEFAULT) . '.webp';
            } else {
                damp('hata');
            }
            $hash_name[$i] = str_replace('/', 'a', $hash);

        }
        $hash_name = json_encode($hash_name);

        $save = $db->prepare("UPDATE products SET product_name=:product_name, seo_title=:seo_title, product_code=:product_code, product_explanation=:product_explanation, 
        product_price=:product_price, product_photos=:product_photos, meta_title=:meta_title, meta_description=:meta_description,
            meta_keywords=:meta_keywords, meta_author=:meta_author WHERE id=:id");
        $save->execute(array(
            ':product_name' => $product_name,
            ':seo_title' => $seo_title,
            ':product_code' => $product_code,
            ':product_explanation' => $product_explanation,
            ':product_price' => $product_price,
            ':product_photos' => $hash_name,
            ':meta_title' => $meta_title,
            ':meta_description' => $meta_description,
            ':meta_keywords' => $meta_keywords,
            ':meta_author' => $meta_author,
            ':id' => $id
        ));

        if ( $save->rowCount() > 0 )
        {
            $hash_name = json_decode($hash_name,true);
            for ($i=0;$i<$count;$i++){
                $photo = '../../img/uploads/'.$hash_name[$i];
                move_uploaded_file($product_images['tmp_name'][$i],$photo);
            }
            echo $sonuc = 'Başarı ile Eklenmiştir !' ;
            header("location:../products.php?durum=ok");

        }
        else
        {
            echo "ERRR";
            echo "<pre>";
            var_dump($save->errorInfo());
            echo "</pre>";
            header("location:../products.php?durum=no");
        }



    }
    else{

        $save = $db->prepare("UPDATE products SET product_name=:product_name, seo_title=:seo_title, product_code=:product_code, product_explanation=:product_explanation, 
        product_price=:product_price, meta_title=:meta_title, meta_description=:meta_description,
            meta_keywords=:meta_keywords, meta_author=:meta_author WHERE id=:id");
        $save->execute(array(
            ':product_name' => $product_name,
            ':seo_title' => $seo_title,
            ':product_code' => $product_code,
            ':product_explanation' => $product_explanation,
            ':product_price' => $product_price,
            ':meta_title' => $meta_title,
            ':meta_description' => $meta_description,
            ':meta_keywords' => $meta_keywords,
            ':meta_author' => $meta_author,
            ':id' => $id
        ));

        if ( $save->rowCount() > 0 )
        {
            echo $sonuc = 'Başarı ile Eklenmiştir !' ;
            header("location:../products.php?durum=ok");

        }
        else
        {
            echo "ERRR";
            echo "<pre>";
            var_dump($save->errorInfo());
            echo "</pre>";
            die;
            header("location:../products.php?durum=no");
        }
    }

}

if (@$_GET['operation'] == 'delete' && isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = $db->prepare("DELETE FROM products WHERE id=:id");
    $delete->execute(array('id' => $id));
    if ($delete->rowCount() > 0){
        header("location:../products.php?durum=ok");
    }
    else{
        header("location:../products.php?durum=no");
    }

}
?>
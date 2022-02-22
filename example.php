<?php

//Wait! First Create uploads directory


if (isset($_FILES)){
    require_once 'class.php';
    $img_upload = new image_upload();

    $img_upload->file = $_FILES['file'];

    if ($img_upload->single_upload()){
        echo 'Success';
    }
    else{
        echo 'Error!';
    }
}
?>
<html>
    <head>
        <title>Document</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit">Submit</button>
        </form>
    </body>
</html>

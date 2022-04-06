<?php
ob_start();
include '../../system/settings.php';
session_start();
if (isset($_SESSION['username'])){
    $id = @$_GET['id'];
    $query = $db->prepare("SELECT * FROM sticker_card WHERE id=:id");
    $query->execute(array(
        'id' => $id
    ));
    $sticker = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title; ?></title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include '../topbar.php';  ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <a href="../sticker_card.php" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                        <span class="text">Geri Dön</span>
                    </a>
                    <h1 class="h3 mb-4 text-gray-800 text-center">Hakkımızda / Özelliklerimiz <?php
                        if (@$_GET['operation' == 'register']){ echo "Ekleme İşlemi"; }
                    if (@$_GET['operation'] == 'edit'){ echo "Düzenleme İşlemi"; }
                    ?>  </h1>
                    <?php if (@$_GET['durum'] == "ok"){ ?>
                        <div class="card mb-4 py-3 border-bottom-success text-center">Düzenleme İşlemi Başarılı</div>
                    <?php } ?>
                    <?php if (@$_GET['durum'] == "no"){ ?>
                        <div class="card mb-4 py-3 border-bottom-danger text-center">Düzenleme İşlemi Başarısız</div>
                    <?php } ?>
                </div>
                <?php if ($_GET['operation'] == 'register'){
                    if (isset($_POST['register']) && isset($_POST['sticker_text']) && isset($_POST['sticker_icon'])) {
                        $sticker_icon = $_POST['sticker_icon'];
                        $sticker_text = $_POST['sticker_text'];
                        $reg = $db->prepare("INSERT INTO sticker_card SET text=:text, icon=:icon
                         ");
                        $control = $reg->execute(
                                array(
                                    'text' => $sticker_text,
                                    'icon' => $sticker_icon
                                )
                        );
                        if (isset($control)){
                            header('location:../sticker_card.php?durum=ok');
                        }
                        else{
                            header('location:../sticker_card.php?durum=no');
                        }
                    }

                ?>
                <!-- /.container-fluid -->
                <form action="#" method="POST">

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-default">Icon</label>
                        </div>
                        <input type="text" id="inputGroupSelect01" name="sticker_icon" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <textarea id="editor" class="ckeditor"  name="sticker_text"></textarea>
                    <br>
                    <div class="container-fluid text-center">
                        <button type="submit" name="register" class="btn btn-success btn-icon-split w-50">
                            <span class="text">Kayıt Ekle</span>
                        </button>
                    </div>
                </form>
                <?php } ?>

                <?php
                if (@$_GET['operation'] == 'edit' && isset($_GET['id'])) {
                    if (isset($_POST['edit']) && isset($_POST['sticker_text']) && isset($_POST['sticker_icon'])){
                        $sticker_text = $_POST['sticker_text'];
                        $sticker_icon = $_POST['sticker_icon'];
                        $update = $db->prepare("UPDATE sticker_card SET text=:text, icon=:icon WHERE id=:id ");
                        $control = $update->execute(array(
                                'text' => $sticker_text,
                                'icon' => $sticker_icon,
                                'id' => $id
                        ));

                        if (isset($control)){
                            $operation = $_GET['operation'];
                            echo $operation;
                            header("location:sticker_card.php?id=$id&operation=$operation&durum=ok");
                        }
                        else{
                            header('location:sticker_card.php?id=$id&operation=$operation&durum=no');
                        }
                    }
                    ?>
                    <form action="#" method="POST">

                        <div class="input-group mb-3 w-50 ml-auto mr-auto">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-default">ID</label>
                            </div>
                            <input type="text" id="inputGroupSelect01" class="form-control" disabled value="<?=$sticker['id']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3 w-50 ml-auto mr-auto">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-default">Icon</label>
                            </div>
                            <input type="text" id="inputGroupSelect01" name="sticker_icon" class="form-control" value="<?=$sticker['icon']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <textarea id="editor" class="ckeditor"  name="sticker_text">
                        <?=$sticker['text']; ?>
                        </textarea>
                        <br>
                        <div class="container-fluid text-center">
                            <button type="submit" name="edit" class="btn btn-success btn-icon-split w-50">
                                <span class="text">Düzenle</span>
                            </button>
                        </div>
                    </form>

                <?php } ?>

                <?php

                if ($_GET['operation'] == 'delete' && isset($_GET['id'])){
                    $delete = $db->prepare("DELETE FROM sticker_card WHERE id=:id");
                    $control = $delete->execute(array(
                            'id' => $id
                    ));
                    if (isset($control)){
                        header('location:../sticker_card.php?durum=ok');
                    }
                    else{
                        header('location:../sticker_card.php?durum=no');
                    }
                }
                ?>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>

                </div>


            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?=$title; ?> 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include '../logout-modal.php';?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>

<?php
    ob_flush();
}
else{
    header('location:login.php');
}
?>
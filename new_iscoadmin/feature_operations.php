<?php
ob_start();
include '../system/settings.php';
session_start();
if (isset($_SESSION['username'])){
    $id = @$_GET['id'];
    $query = $db->prepare("SELECT * FROM about_features WHERE id=:id");
    $query->execute(array(
        'id' => $id
    ));
    $feature = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>

<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title; ?></title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'topbar.php';  ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <a href="about-features.php" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                        <span class="text">Geri Dön</span>
                    </a>
                    <h1 class="h3 mb-4 text-gray-800 text-center">Hizmetlerimiz <?php
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

                <!-- /.container-fluid -->
                <?php if ($_GET['operation'] == 'register'){ ?>
                <form action="registration/feature_operations.php" method="POST">
                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect02" id="inputGroup-sizing-default">Icon</label>
                        </div>
                        <input type="text" name="feature_icon" id="inputGroupSelect02" class="form-control " value="<?=$feature['feature_icon']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="alert alert-warning" role="alert">
                        <p class="text-center">Geri Dönüşüm Icon Adı: fa fa-recycle <br> Daha Fazlası: <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Tıkla ve Git</a></p>
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-default">Başlık</label>
                        </div>
                        <input type="text" name="feature_title" id="inputGroupSelect01" class="form-control " value="<?=$feature['feature_title']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <textarea id="editor" class="ckeditor"  name="feature_text">
                        <?=$feature['feature_text']; ?>
                        </textarea>
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
                    ?>
                    <form action="registration/feature_operations.php" method="POST">
                        <div class="input-group mb-3 w-50 ml-auto mr-auto">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect03" id="inputGroup-sizing-default">ID</label>
                            </div>
                            <input type="text" readonly name="feature_id" id="inputGroupSelect03" class="form-control disabled" value="<?=$feature['id']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3 w-50 ml-auto mr-auto">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect02" id="inputGroup-sizing-default">Icon</label>
                            </div>
                            <input type="text" name="feature_icon" id="inputGroupSelect02" class="form-control " value="<?=$feature['feature_icon']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="alert alert-warning" role="alert">
                            <p class="text-center">Geri Dönüşüm Icon Adı: fa fa-recycle <br> Daha Fazlası: <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Tıkla ve Git</a></p>
                        </div>

                        <div class="input-group mb-3 w-50 ml-auto mr-auto">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-default">Başlık</label>
                            </div>
                            <input type="text" name="feature_title" id="inputGroupSelect01" class="form-control " value="<?=$feature['feature_title']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <textarea id="editor" class="ckeditor"  name="feature_text">
                        <?=$feature['feature_text']; ?>
                        </textarea>
                        <br>
                        <div class="container-fluid text-center">
                            <button type="submit" name="edit" class="btn btn-success btn-icon-split w-50">
                                <span class="text">Düzenle</span>
                            </button>
                        </div>
                    </form>
                <?php } ?>



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
    <?php include 'logout-modal.php';?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php
    ob_flush();
}
else{
    header('location:login.php');
}
?>
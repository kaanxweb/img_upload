<?php
ob_start();
include '../system/settings.php';
session_start();
if (isset($_SESSION['username'])){
    $id = @$_GET['id'];
    $query = $db->prepare("SELECT * FROM business_partners WHERE id=:id");
    $query->execute(array(
        'id' => $id
    ));
    $partner = $query->fetch(PDO::FETCH_ASSOC);
    $target = "../img/uploads/";
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
                    <a href="business_partners.php" class="btn btn-secondary btn-icon-split">
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



                    <form action="registration/add_partners.php" enctype="multipart/form-data" method="POST">
                        <div class="input-group mb-3 w-50 ml-auto mr-auto">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect03" id="inputGroup-sizing-default">ID</label>
                            </div>
                            <input type="text" readonly name="partner_id" id="inputGroupSelect03" class="form-control disabled" value="<?=$partner['id']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Yeni Görsel Yükleyin:</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="my_file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">...</label>
                            </div>
                        </div>

                        <div class="input-group mb-3 w-50 ml-auto mr-auto">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-default">Görsel Açıklaması (HTML Alt)</label>
                            </div>
                            <input type="text" name="partner_explanation" id="inputGroupSelect01" class="form-control " value="<?=$partner['partner_explanation']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <h4 class="text-center">Şuan ki Partner Fotoğrafı;</h4>


                        <div class="container">
                        <div class="input-group mb-3 w-50 mx-auto">

                            <img src="<?=$target.$partner['partner_image']; ?>" alt="<?=$partner['partner_explanation']; ?>" class="img-thumbnail text-center">
                        </div>
                        </div>





                        <br>
                        <div class="container-fluid text-center">
                            <button type="submit" name="edit" class="btn btn-success btn-icon-split w-50">
                                <span class="text">Düzenle</span>
                            </button>
                        </div>
                    </form>




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
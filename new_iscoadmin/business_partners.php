<?php
include '../system/settings.php';
session_start();
if (isset($_SESSION['username'])){

    $query = $db->prepare("SELECT * FROM business_partners");
    $query->execute();


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
                <?php include 'topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800 text-center">İş ortakları Listesi</h1>
                    <?php if (@$_GET['durum'] == "ok"){ ?>
                        <div class="card mb-4 py-3 border-bottom-success text-center">İşlem Başarılı</div>
                    <?php } ?>
                    <?php if (@$_GET['durum'] == "no"){ ?>
                        <div class="card mb-4 py-3 border-bottom-danger text-center">İşlem Başarısız</div>
                    <?php } ?>

                </div>

                <!-- /.container-fluid -->
                <div class="col-md-12">
                    <a href="add_partners.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                        <span class="text">Yeni Partner Ekle</span>
                    </a>
                </div>
                <hr>

                    <div class="container">
                    <div class="row">
                <?php
                $target = "../img/uploads/";
                while ($partners = $query->fetch(PDO::FETCH_ASSOC)){ ?>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="card-img-top" src="<?=$target.$partners['partner_image']; ?>" alt="Card image cap">
                                    <div class="card-block">
                                        <h4 class="card-title">Görsel Açıklaması;</h4>
                                        <p class="card-text"><?=$partners['partner_explanation']; ?></p>
                                    </div>
                                    <div class="card-footer d-flex">
                                        <a href="partner_operations.php?id=<?=$partners['id']; ?>" class="btn btn-success btn-icon-split w-50">
                                            <span class="text">Düzenle</span>
                                        </a>
                                        <a href="registration/add_partners.php?operation=partner_delete&id=<?=$partners['id']; ?>" class="btn btn-danger btn-icon-split w-50">
                                            <span class="text">Sil</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                <?php } ?>
                        </div>
                    </div>





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
    <?php include 'logout-modal.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php }
else{
    header('location:login.php');
}
?>
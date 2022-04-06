<?php
include '../system/settings.php';
session_start();
if (isset($_SESSION['username'])){

    $details = $db->prepare("SELECT * FROM admin WHERE id=:id");
    $details->execute(array(
            'id' => $_SESSION['id']
    ));
    $userdetails = $details->fetch(PDO::FETCH_ASSOC);

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
                    <h1 class="h3 mb-4 text-gray-800 text-center">Hesap Detayları</h1>
                    <div class="row justify-content-center">

                        <div class="col-xl-10 col-lg-12 col-md-9">

                            <div class="card o-hidden border-0 shadow-lg my-5">

                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-6 ml-auto mr-auto">

                                            <div class="p-5">
                                                <div class="text-center">
                                                    <div class="col-lg-12 mb-3">
                                                        <img src="img/logo.png">
                                                    </div>
                                                    <hr>
                                                    <h1 class="h4 text-gray-900 mb-4">IscoSoftware | Hesap Düzenleme İşlemi</h1>
                                                    <?php if (@$_GET['durum'] == "yes"){ ?>
                                                    <div class="card mb-4 py-3 border-left-success">Hesap Düzenleme İşlemi Başarılı</div>
                                                    <?php } ?>
                                                    <?php if (@$_GET['durum'] == "no"){ ?>
                                                        <div class="card mb-4 py-3 border-left-danger">Hesap Düzenleme İşlemi Başarısız</div>
                                                    <?php } ?>
                                                </div>
                                                <form class="user" action="operation.php" method="POST">
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user"
                                                                   id="exampleInputEmail" name="name" value="<?=$userdetails['name']; ?>" aria-describedby="emailHelp"
                                                                   placeholder="Kullanıcı Adınız">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="surname" class="form-control form-control-user"
                                                                   id="exampleInputPassword" value="<?=$userdetails['surname']; ?>" placeholder="Şifreniz">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="text" disabled class="form-control form-control-user"
                                                               id="exampleInputEmail" value="<?=$userdetails['username']; ?>" aria-describedby="emailHelp"
                                                               placeholder="Kullanıcı Adınız">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password" class="form-control form-control-user"
                                                               id="exampleInputPassword" value="<?=$userdetails['password'] ?>" placeholder="Şifreniz">
                                                    </div>
                                                    <button name="edit" type="submit" class="btn btn-primary btn-user btn-block">
                                                        Düzenle
                                                    </button>
                                                    <hr>
                                                </form>
                                                <hr>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'footer.php'; ?>
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
<?php
}
else{
    header("location:login.php");
}

?>
<?php include '../system/settings.php';
session_start();
if (isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?=$title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Müşteri başvuru listesi</h1>
                    <?php if (@$_GET['durum'] == "ok"){ ?>
                            <hr>
                        <div class="card mb-4 py-3 border-bottom-success text-center">İşlem Başarılı</div>
                    <?php } ?>
                    <?php if (@$_GET['durum'] == "no"){ ?>
                            <hr>
                        <div class="card mb-4 py-3 border-bottom-danger text-center">İşlem Başarısız</div>
                    <?php } ?>
                </div>
                <br>
                <!-- /.container-fluid -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <?php
                        $page = $_GET['page'];

                        if ($page == 1){
                        ?>
                        <h6 class="m-0 font-weight-bold text-primary">İletişim Form Listesi</h6>
                            <?php } ?>

                        <?php
                        if ($page == 2){
                            ?>
                            <h6 class="m-0 font-weight-bold text-primary">Ürün Başvuru Form Listesi</h6>
                        <?php }
                        ?>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>S.NO:</th>
                                    <th>ID</th>
                                    <th>İsim</th>
                                    <th>Tel No</th>
                                    <th>Mail Adresi</th>
                                    <th>Mesajı</th>
                                    <th>Sil</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $form = $db->prepare("SELECT * FROM form WHERE type=:type");
                                $form->execute(array(
                                        ':type' => $page
                                ));
                                $sno = 0;
                                while ($form_list = $form->fetch(PDO::FETCH_ASSOC)){ $sno++;
                                ?>
                                <tr>
                                    <td><?=$sno; ?></td>
                                    <td><?=$form_list['name'] ?></td>
                                    <td><?=$form_list['surname'] ?></td>
                                    <td><?=$form_list['number'] ?></td>
                                    <td><?=$form_list['mail'] ?></td>
                                    <td><?=$form_list['message'] ?></td>
                                    <td>
                                        <a href="registration/form_operations.php?id=<?=$form_list['id']; ?>&operation=delete" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                            <span class="text">Sil</span>
                                        </a>
                                    </td>
                                </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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

    <!-- Page level custom scripts -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php }
else{
    header('location:login.php');
}
?>
<?php
include '../system/settings.php';
session_start();
if (isset($_SESSION['username'])){

    $query = $db->prepare("SELECT * FROM home_explanation");
    $query->execute();
    $explanation = $query->fetch(PDO::FETCH_ASSOC);



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
                <?php include 'topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800 text-center">AnaSayfa Açıklama Mesajı</h1>
                    <div class="text-center mb-4"><span>(Slider'ın altında ki açıklama mesajı)</span></div>

                </div>
                <!-- /.container-fluid -->

                <form action="registration/home-explanation.php" method="POST">
                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-default">Başlık</label>
                        </div>
                        <input type="text" name="title" id="inputGroupSelect01" class="form-control " value="<?=$explanation['title']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                <textarea id="editor" class="ckeditor" name="text">
                <?=$explanation['text']; ?>
                </textarea>
                    <br>
                    <div class="container-fluid text-center">
                    <button name="explanation" class="btn btn-success btn-icon-split w-50">
                        <span class="text">Kaydet</span>
                    </button>
                    </div>
                </form>







                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .catch( error => {
                            console.error( error );
                        }

                        );
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
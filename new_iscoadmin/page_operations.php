<?php
include '../system/settings.php';
session_start();
if (isset($_SESSION['username'])){
    $query = $db->prepare("SELECT * FROM pages");
    $query->execute();
    $pages = $query->fetchAll(PDO::FETCH_ASSOC);

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
                    <?php
                    switch ($_GET['operation']){
                        case 'register'; ?>
                            <h1 class="h3 mb-1 text-gray-800 text-center">Sayfa Ekleme İşlemi</h1>
                        <?php
                            break;



                    }
                    ?>

                    <?php if (@$_GET['durum'] == "ok"){ ?>
                        <div class="card mb-4 py-3 border-bottom-success text-center">Düzenleme İşlemi Başarılı</div>
                    <?php } ?>
                    <?php if (@$_GET['durum'] == "no"){ ?>
                        <div class="card mb-4 py-3 border-bottom-danger text-center">Düzenleme İşlemi Başarısız</div>
                    <?php } ?>

                </div>
                <!-- /.container-fluid -->

                <?php if (@$_GET['operation'] == 'register'){ ?>

                <form action="registration/page_operations.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Sayfa Görseli:</span>
                        </div>

                        <div class="custom-file">
                            <input type="file" name="page_photo" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">...</label>
                        </div>
                    </div>
                    <div class="input-group mb-3 w-50 mx-auto">
                            <label>Not: Toplu görsel yükleme işlemi yapabilirsiniz. </label>
                    </div>


                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Sayfa Başlığı</span>
                        </div>
                        <input type="text" name="page_title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <hr>
                    <h6 class="text-center">Sadece Bilginiz var ise META inputlarını doldurun. Aksi takdirde SEO puanınız olumsuz etkilenebilir.</h6>
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Meta Title</span>
                        </div>
                        <input type="text" name="meta_title" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Meta Description</span>
                        </div>
                        <input type="text" name="meta_description" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Meta Keywords</span>
                        </div>
                        <input type="text" name="meta_keywords" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Meta Author</span>
                        </div>
                        <input type="text" name="meta_author" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>




                    <textarea id="editor" class="ckeditor"  name="page_explanation" placeholder="Sayfa İçeriği"></textarea>



                    <br>
                    <div class="container-fluid text-center">
                    <button name="page_registration" class="btn btn-success btn-icon-split w-50">
                        <span class="text">Kaydet</span>
                    </button>
                    </div>
                </form>

                <?php } ?>


                <?php if (@$_GET['operation'] == 'edit'){
                    $id = $_GET['id'];

                     $query = $db->prepare("SELECT * FROM pages WHERE id=:id");
                     $query->execute(array(
                             ':id' => $id
                     ));
                     $Row = $query->fetch(PDO::FETCH_ASSOC);
                     $photos = $Row['page_photo'];
                    ?>

                    <form action="registration/page_operations.php" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Görsel Yükleyin</span>
                            </div>

                            <div class="custom-file">
                                <input type="file" name="page_photo" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">...</label>
                            </div>
                        </div>
                        <div class="input-group mb-3 w-50 mx-auto">
                            <label>Not: Toplu görsel yükleme işlemi yapabilirsiniz. </label>
                        </div>

                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
                            </div>
                            <input type="text" readonly name="id" class="form-control" value="<?=$Row['id']; ?>" required aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Sayfa Başlığı</span>
                            </div>
                            <input type="text" name="page_title" class="form-control" value="<?=$Row['page_title']; ?>" required aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <h6 class="text-center">Sadece Bilginiz var ise META inputlarını doldurun. Aksi takdirde SEO puanınız olumsuz etkilenebilir.</h6>
                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Meta Title</span>
                            </div>
                            <input type="text" name="meta_title" class="form-control" value="<?=$Row['meta_title'] ?>"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Meta Description</span>
                            </div>
                            <input type="text" name="meta_description" value="<?=$Row['meta_description'] ?>" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Meta Keywords</span>
                            </div>
                            <input type="text" name="meta_keywords" value="<?=$Row['meta_keywords'] ?>" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Meta Author</span>
                            </div>
                            <input type="text" name="meta_author" value="<?=$Row['meta_author'] ?>" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>




                        <textarea id="editor" class="ckeditor"  name="page_explanation" placeholder="Sayfa Açıklaması"><?=$Row['page_content'] ?></textarea>



                        <br>
                        <div class="container-fluid text-center">
                            <button name="page_edit" class="btn btn-success btn-icon-split w-50">
                                <span class="text">Kaydet</span>
                            </button>
                        </div>
                    </form>

                    <div class="col-md-12 mt-5">
                        <h2 class="text-center">Yüklediğiniz Görseller:</h2>
                    </div>
                    <div class="mt-5 col-sm-4 d-flex mx-auto">


                        <div class="col-md-12 ml-4">
                            <img src="../img/pages/<?=$Row['page_photo']; ?>" class="img-fluid" width="250px" alt=""/>
                        </div>
                    </div>
                 <hr>


                <div class="mt-5 col-sm-4 d-flex mx-auto">
                <div class=" col-md-12 ml-5 col-lg-12">
                        <button name="page_edit" class="btn btn-danger btn-icon-split w-50">
                            <span class="text"><a href="registration/page_operations.php?operation=photo_delete&id=<?=$Row['id']; ?>">Görselleri Sil</a></span>
                        </button>
                    </div>
                </div>
        <?php } ?>









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
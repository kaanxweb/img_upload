<?php include '../system/settings.php';
session_start();
if (isset($_SESSION['username'])){
    $query = $db->prepare("SELECT * FROM companyinfo");
    $query->execute();
    $settings = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title ?></title>

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
        <?php include 'sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <form action="registration/settings.php" method="POST">
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Firma Bilgileri</h1>
                    <?php if (@$_GET['durum'] == "ok"){ ?>
                        <div class="card mb-4 py-3 border-bottom-success text-center">Düzenleme İşlemi Başarılı</div>
                    <?php } ?>
                    <?php if (@$_GET['durum'] == "no"){ ?>
                        <div class="card mb-4 py-3 border-bottom-danger text-center">Düzenleme İşlemi Başarısız</div>
                    <?php } ?>
                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-default">URL</label>
                        </div>
                        <input type="text" name="company_url" id="inputGroupSelect01" class="form-control" value="<?=$settings['url']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect02" id="inputGroup-sizing-default">Firma İsmi</label>
                        </div>
                        <input type="text" name="company_title" id="inputGroupSelect02" class="form-control" value="<?=$settings['title']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect03" id="inputGroup-sizing-default">Firma Açıklama Mesajı</label>
                        </div>
                        <input type="text" name="company_description" id="inputGroupSelect03" class="form-control" value="<?=$settings['description']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        <span>(Bu metin Google'da isminiz aratıldığında başlık altında ki açıklama metni olarakta görülür.)</span>
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect04" id="inputGroup-sizing-default">Firma Anahtar Kelimeleri</label>
                        </div>
                        <input type="text" name="company_keywords" id="inputGroupSelect04" class="form-control" value="<?=$settings['keywords']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        <span>(SEO Hakkında tecrübeniz yok ise lütfen buralara dokunmayın. Aksi halde sitenize Google'da ciddi zararlar verebilirsiniz. Keywordsleri ',' kullanarak yazmayı unutmayın.)</span>
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect05" id="inputGroup-sizing-default">Firma Telefon Numarası</label>
                        </div>
                        <input type="text" name="company_phone" id="inputGroupSelect05" class="form-control" value="<?=$settings['phone']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect06" id="inputGroup-sizing-default">Firma 2. Telefon Numarası</label>
                        </div>
                        <input type="text" name="company_phone_two" id="inputGroupSelect06" class="form-control" value="<?=$settings['phone_two']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        <span>2. Bir telefon numarası kullanıyorsanız buraya girin. Kullanmıyorsanız boş bırakabilirsiniz.</span>
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect06" id="inputGroup-sizing-default">Firma 2. Telefon Numarası</label>
                        </div>
                        <input type="text" name="company_phone_three" id="inputGroupSelect06" class="form-control" value="<?=$settings['phone_three']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        <span>3. Bir telefon numarası kullanıyorsanız buraya girin. Kullanmıyorsanız boş bırakabilirsiniz.</span>
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect07" id="inputGroup-sizing-default">İletişim Mail Adresi</label>
                        </div>
                        <input type="text" name="company_mail" id="inputGroupSelect07" class="form-control" value="<?=$settings['mail']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect08" id="inputGroup-sizing-default">Firma Facebook Adresi</label>
                        </div>
                        <input type="text" name="company_facebook" id="inputGroupSelect08" class="form-control" value="<?=$settings['facebook']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect09" id="inputGroup-sizing-default">Firma Twitter Adresi</label>
                        </div>
                        <input type="text" name="company_twitter" id="inputGroupSelect09" class="form-control" value="<?=$settings['twitter']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect10" id="inputGroup-sizing-default">Firma Instagram Adresi</label>
                        </div>
                        <input type="text" name="company_instagram" id="inputGroupSelect10" class="form-control" value="<?=$settings['instagram'] ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect12" id="inputGroup-sizing-default">Firma Linkedin Adresi</label>
                        </div>
                        <input type="text" name="company_linkedin" id="inputGroupSelect12" class="form-control" value="<?=$settings['linkedin']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 ml-auto mr-auto">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect11" id="inputGroup-sizing-default">Firma Youtube Adresi</label>
                        </div>
                        <input type="text" name="company_youtube" id="inputGroupSelect11" class="form-control" value="<?=$settings['youtube']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="container-fluid text-center">
                        <button type="submit" name="company_update" class="btn btn-success btn-icon-split w-50">
                            <span class="text">Düzenle</span>
                        </button>
                    </div>
                </div>

                <!-- /.container-fluid -->
                </form>

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
<?php } else {
    header("location:login.php");
}?>
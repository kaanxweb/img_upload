<?php
session_start();
ob_start();
if (isset($_SESSION['admin'])){
    require_once '../settings/crud.php';
    require_once '../settings/functions.php';
    $page = take_page();
    $crud = new crud();
    $company_info = $crud->read("company_info")->fetch(PDO::FETCH_ASSOC);

    /*
    $product_count = $db->prepare("SELECT * FROM products");
    $product_count->execute();
    $products = $product_count->rowCount();


    $partners_count = $db->prepare("SELECT * FROM business_partners");
    $partners_count->execute();
    $partners = $partners_count->rowCount();
    */

?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?=$company_info['developer']; ?>&nbsp;|&nbsp;Yönetim Paneli</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>

    <script src="vendor/sweetalert/sweetalert2@11.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'sidebar.php' ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'topbar.php';
                ?>
                <?php switch ($page){


            case 'user_details':
                    $row = $crud->read_with_id('admin',$_SESSION['admin']['id'])->fetch(PDO::FETCH_ASSOC);


                    ?>

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
                                                        </div>
                                                        <form class="user" action="#" id="edit_user_details" method="POST">
                                                            <div class="form-group row">
                                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                                    <input type="text" class="form-control form-control-user"
                                                                           id="exampleInputEmail" name="name" value="<?=$row['name']; ?>" aria-describedby="emailHelp"
                                                                           placeholder="Kullanıcı Adınız">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="surname" class="form-control form-control-user"
                                                                           id="exampleInputPassword" value="<?=$row['surname']; ?>" placeholder="Şifreniz">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" disabled class="form-control form-control-user"
                                                                       id="exampleInputEmail" value="<?=$row['username']; ?>" aria-describedby="emailHelp"
                                                                       placeholder="Kullanıcı Adınız">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="password" class="form-control form-control-user"
                                                                       id="exampleInputPassword" placeholder="Şifreniz">
                                                            </div>
                                                            <button name="edit_user_details" onclick="data_cu('#edit_user_details','edit_user_details')" type="submit" class="btn btn-primary btn-user btn-block">
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

                <?php break;


            case 'index': ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kurumsal Site Yönetim Paneli</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Toplam Gelen Form Sayısı</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Eklenen Proje Sayısı</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
            <?php break; ?>
            <?php
            //Home Page Edit
            case 'home_bg': //HomePage First Background
                $home_opening = $crud->read("home_opening_screen");
                $crud->target = "../assets/images/uploads/home_screen/";
                 ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Ana Sayfa Açılış Ekranı</h1>

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
                        <h6 class="m-0 font-weight-bold text-primary">Özellik</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Ürün Fotoğrafı</th>
                                    <th>S.NO:</th>
                                    <th>ID</th>
                                    <th>Başlık</th>
                                    <th>Kısa Açıklama</th>
                                    <th>Düzenle</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $sno = 0; //Sequence Number
                                while ($row = $home_opening->fetch(PDO::FETCH_ASSOC)){ $sno++;
                                    ?>
                                    <tr>
                                        <td><img src="<?=$crud->target.$row['photo']; ?>" class="hover-zoom" width="100px" height="50px"> </td>
                                        <td><?=$sno; ?></td>
                                        <td><?=$row['id']; ?></td>
                                        <td><?=$row['title']; ?></td>
                                        <td><?=divide($row['content'],18) ; ?></td>
                                        <td>
                                            <a href="index.php?page=edit_home_bg&id=<?=$row['id']; ?>&operation=edit" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                                <span class="text">Düzenle</span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <?php break;

            case 'edit_home_bg':
                $crud->target = "../assets/images/uploads/home_screen/";
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">Ana Sayfa Açılış Ekranı</h1>
                </div>
                <!-- /.container-fluid -->

            <?php if (@$_GET['operation'] == 'edit'){
                $row = $crud->read('home_opening_screen')->fetch(PDO::FETCH_ASSOC);
            ?>
                <form action="#" method="POST" id="edit_home_screen" enctype="multipart/form-data">
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
                        </div>
                        <input type="text" name="id" class="form-control" value="<?=$row['id']; ?>" readonly  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Görsel:</span>
                        </div>

                        <div class="custom-file">
                            <input type="file" name="my_file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">...</label>
                        </div>
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <img src="<?=$crud->target.$row['photo']; ?>" alt="..." class="img-thumbnail">
                        <label>Not: Bu Görseli güncellemek istemiyorsanız, görsel yüklemeyin. </label>
                    </div>


                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Başlık</span>
                        </div>
                        <input type="text" name="title" class="form-control" value="<?=$row['title']; ?>"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Açıklama </span>
                        </div>
                        <input type="text" name="content" value="<?=$row['content']; ?>" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>





                    <br>
                    <div class="container-fluid text-center">
                        <button type="submit" name="edit_home_screen" onclick="data_cu('#edit_home_screen','edit_home_screen')" class="btn btn-success btn-icon-split w-50">
                            <span class="text">Kaydet</span>
                        </button>
                    </div>
                </form>
            <?php } ?>
                <?php break;

            case 'index_short_about':
                $crud->target = "../assets/images/uploads/index_short_about/";
                $row = $crud->read('index_short_about')->fetch(PDO::FETCH_ASSOC);
                ?>
                <!-- Main Content -->
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-1 text-gray-800 text-center">AnaSayfa Açıklama Mesajı</h1>
                        <div class="text-center mb-4"><span>(Ana Sayfa kısa hakkımızda kısmı için alan.)</span></div>
                    </div>
                    <!-- /.container-fluid -->

                    <form action="#" method="POST" id="index_short_about" enctype="multipart/form-data">
                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Görsel:</span>
                            </div>

                            <div class="custom-file">
                                <input type="file" name="my_file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">...</label>
                            </div>
                        </div>

                        <div class="input-group mb-3 w-50 mx-auto">
                            <img src="<?=$crud->target.$row['photo']; ?>" alt="..." class="img-thumbnail mx-auto">
                            <label>Not: Bu Görseli güncellemek istemiyorsanız, görsel yüklemeyin. </label>
                        </div>

                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-default">Başlık</label>
                            </div>
                            <input type="text" name="title" id="inputGroupSelect01" class="form-control " value="<?=$row['title']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Alt Başlık</span>
                            </div>
                            <input type="text" name="sub_title" class="form-control" value="<?=$row['sub_title']; ?>"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <textarea id="editor" class="ckeditor" name="content">
                        <?=$row['content']; ?>
                        </textarea>
                        <br>
                        <div class="container-fluid text-center">
                            <button type="submit" name="index_short_about" onclick="data_cu('#index_short_about','index_short_about')" class="btn btn-success btn-icon-split w-50">
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

                <?php break;

            case 'work_stats': //HomePage First Background
                $read = $crud->read("work_stats");
                $crud->target = "../assets/images/uploads/work_stats/";
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Sayfalar da bulunan istatistik ekranı</h1>
                </div>
                <br>
                <div class="col-md-12 mb-3 text-right">
                    <a href="index.php?page=add_work_stats" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                        <span class="text">Yeni istatistik ekle</span>
                    </a>
                </div>
                <!-- /.container-fluid -->

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Özellik</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Özellik Iconu</th>
                                    <th>S.NO:</th>
                                    <th>ID</th>
                                    <th>Icon</th>
                                    <th>Sayı</th>
                                    <th>İçerik</th>
                                    <th>Düzenle</th>
                                    <th>Sil</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $sno = 0; //Sequence Number
                                while ($row = $read->fetch(PDO::FETCH_ASSOC)){ $sno++;
                                    ?>
                                    <tr class="data-<?=$row['id']; ?>">
                                        <td><i class="<?=$crud->$row['icon'];?>" aria-hidden="true"></i></td>
                                        <td><?=$sno; ?></td>
                                        <td><?=$row['id']; ?></td>
                                        <td><?=$row['icon']; ?></td>
                                        <td><?=$row['number']; ?></td>
                                        <td><?=$row['content']; ?></td>
                                        <td>
                                            <a href="index.php?page=edit_work_stats&id=<?=$row['id']; ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                                <span class="text">Düzenle</span>
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" onclick="data_d('delete_work_stats',<?=$row['id']; ?>)" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Sil</span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <?php break;

            case 'add_work_stats':
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">İstatistik Ekle</h1>
                    <h6 class="text-center">Icon Listesi:<a href="https://fontawesome.com/v4.7/icons/">(https://fontawesome.com/v4.7/icons/)</a></h6>
                </div>
                <!-- /.container-fluid -->
                <form action="#" id="add_work_stats" method="POST">
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Icon</span>
                        </div>
                        <input type="text" name="icon" class="form-control" placeholder="Icon"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Sayı</span>
                        </div>
                        <input type="text" name="number" class="form-control" placeholder="Sayı" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">İçerik</span>
                        </div>
                        <input type="text" name="content" class="form-control" placeholder="İçerik" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <br>
                    <div class="container-fluid text-center">
                        <button type="submit" name="create_work_stats" onclick="data_cu('#add_work_stats','create_work_stats')" class="btn btn-success btn-icon-split w-50">
                            <span class="text">Kaydet</span>
                        </button>
                    </div>
                </form>

                <?php break;

            case 'edit_work_stats':
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">İstatistik Düzenleme Sayfası</h1>
                </div>
                <!-- /.container-fluid -->

                <?php if (isset($_GET['id'])){
                $row = $crud->read_with_id('work_stats',$_GET['id'])->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="../settings/operations.php" id="edit_work_stats" method="POST">
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
                        </div>
                        <input type="text" name="id" class="form-control" value="<?=$row['id']; ?>" readonly  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>



                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Icon</span>
                        </div>
                        <input type="text" name="icon" class="form-control" value="<?=$row['icon']; ?>"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Sayı</span>
                        </div>
                        <input type="text" name="number" value="<?=$row['number']; ?>" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Açıklama </span>
                        </div>
                        <input type="text" name="content" value="<?=$row['content']; ?>" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>





                    <br>
                    <div class="container-fluid text-center">
                        <button name="edit_work_stats" onclick="data_cu('#edit_work_stats', 'edit_work_stats', <?=$row['id']; ?>)" class="btn btn-success btn-icon-split w-50">
                            <span class="text">Kaydet</span>
                        </button>
                    </div>
                </form>
            <?php } ?>
                <?php break;

            case 'why_us': ?>



                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800 text-center">Neden Biz?</h1>
                        <div class="col-md-12 text-right">
                        <a href="index.php?page=add_why_us" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                            <span class="text">Yeni Veri Ekle</span>
                        </a>
                        </div>
                    </div>
                    <br>
                    <!-- /.container-fluid -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Özellik Listesi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>S.NO:</th>
                                        <th>ID</th>
                                        <th>Başlık</th>
                                        <th>İçerik</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $why_us = $crud->read('why_us');
                                    $sno = 0; //sequence_number
                                    while ($why_us_come = $why_us->fetch(PDO::FETCH_ASSOC)){ $sno++;
                                        ?>
                                        <tr class="data-<?=$why_us_come['id']; ?>">
                                            <td><?=$sno; ?></td>
                                            <td><?=$why_us_come['id']; ?></td>
                                            <td><?=$why_us_come['title']; ?></td>
                                            <td><?=$why_us_come['content']; ?></td>
                                            <td>
                                                <a href="index.php?page=edit_why_us&id=<?=$why_us_come['id']; ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                                    <span class="text">Düzenle</span>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" onclick="data_d('delete_why_us',<?=$why_us_come['id']; ?>)" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                    <span class="text">Sil</span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            <?php break;

            case 'add_why_us':
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">Neden Biz? Madde Ekle</h1>
                </div>
                <!-- /.container-fluid -->
                <form action="#" method="POST" id="create_why_us">
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Başlık</span>
                        </div>
                        <input type="text" name="title" class="form-control" placeholder="Başlık"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">İçerik</span>
                        </div>
                        <input type="text" name="content" class="form-control" placeholder="İçerik" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <br>
                    <div class="container-fluid text-center">
                        <button name="create_why_us" onclick="data_cu('#create_why_us', 'create_why_us')" class="btn btn-success btn-icon-split w-50">
                            <span class="text">Kaydet</span>
                        </button>
                    </div>
                </form>

                <?php break;

            case 'edit_why_us':
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">İstatistik Düzenleme Sayfası</h1>
                </div>
                <!-- /.container-fluid -->

                <?php if (isset($_GET['id'])){
                $row = $crud->read_with_id('why_us',$_GET['id'])->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="../settings/operations.php" id="edit_why_us" method="POST">
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
                        </div>
                        <input type="text" name="id" class="form-control" value="<?=$row['id']; ?>" readonly  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>


                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Başlık</span>
                        </div>
                        <input type="text" name="title" value="<?=$row['title']; ?>" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Açıklama </span>
                        </div>
                        <input type="text" name="content" value="<?=$row['content']; ?>" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>



                    <br>
                    <div class="container-fluid text-center">
                        <button type="submit" name="edit_why_us" onclick="data_cu('#edit_why_us','edit_why_us',<?=$row['id']; ?>)" class="btn btn-success btn-icon-split w-50">
                            <span class="text">Kaydet</span>
                        </button>
                    </div>
                </form>
            <?php } ?>
                <?php break;

            case 'what_we_do': ?>
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800 text-center">Neler Yapıyoruz?</h1>
                        <div class="col-md-12 text-right">
                            <a href="index.php?page=add_what_we_do" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                <span class="text">Yeni Veri Ekle</span>
                            </a>
                        </div>
                    </div>
                    <br>
                    <!-- /.container-fluid -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Özellik Listesi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>S.NO:</th>
                                        <th>ID</th>
                                        <th>Icon</th>
                                        <th>Başlık</th>
                                        <th>İçerik</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $what_we_do = $crud->read('what_we_do');
                                    $sno = 0; //sequence_number
                                    while ($row = $what_we_do->fetch(PDO::FETCH_ASSOC)){ $sno++;
                                        ?>
                                        <tr class="data-<?=$row['id']; ?>">
                                            <td><?=$sno; ?></td>
                                            <td><?=$row['id']; ?></td>
                                            <td><?=$row['icon']; ?></td>
                                            <td><?=$row['title']; ?></td>
                                            <td><?=$row['content']; ?></td>
                                            <td>
                                                <a href="index.php?page=edit_what_we_do&id=<?=$row['id']; ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                                    <span class="text">Düzenle</span>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" onclick="data_d('delete_what_we_do',<?=$row['id']; ?>)" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                    <span class="text">Sil</span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


                <?php break;

            case 'add_what_we_do':
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">Neler Yapıyoruz? Madde Ekle</h1>
                </div>
                <!-- /.container-fluid -->
                <form action="#" method="POST" id="create_what_we_do">

                <div class="input-group mb-3 w-50 mx-auto">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Icon</span>
                    </div>
                    <input type="text" name="icon" class="form-control" placeholder="Icon"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>


                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Başlık</span>
                        </div>
                        <input type="text" name="title" class="form-control" placeholder="Başlık"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">İçerik</span>
                        </div>
                        <input type="text" name="content" class="form-control" placeholder="İçerik" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <br>
                    <div class="container-fluid text-center">
                        <button name="create_what_we_do" onclick="data_cu('#create_what_we_do', 'create_what_we_do')" class="btn btn-success btn-icon-split w-50">
                            <span class="text">Kaydet</span>
                        </button>
                    </div>
                </form>

                <?php break;

            case 'edit_what_we_do':
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">Neler Yapıyoruz? Düzenleme Sayfası</h1>
                </div>
                <!-- /.container-fluid -->

                <?php if (isset($_GET['id'])){
                $row = $crud->read_with_id('what_we_do',$_GET['id'])->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="../settings/operations.php" id="edit_what_we_do" method="POST">
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
                        </div>
                        <input type="text" name="id" class="form-control" value="<?=$row['id']; ?>" readonly  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>


                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Icon</span>
                        </div>
                        <input type="text" name="icon" class="form-control" value="<?=$row['icon']; ?>"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>


                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Başlık</span>
                        </div>
                        <input type="text" name="title" value="<?=$row['title']; ?>" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Açıklama </span>
                        </div>
                        <input type="text" name="content" value="<?=$row['content']; ?>" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>



                    <br>
                    <div class="container-fluid text-center">
                        <button type="submit" name="edit_what_we_do" onclick="data_cu('#edit_what_we_do','edit_what_we_do',<?=$row['id']; ?>)" class="btn btn-success btn-icon-split w-50">
                            <span class="text">Kaydet</span>
                        </button>
                    </div>
                </form>
            <?php } ?>
                <?php break;


            //About Page Edit
            case 'about':
                $row = $crud->read('about')->fetch(PDO::FETCH_ASSOC);
                ?>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800 text-center">Hakkımızda</h1>
                        <?php if (@$_GET['durum'] == "ok"){ ?>
                            <div class="card mb-4 py-3 border-bottom-success text-center">Düzenleme İşlemi Başarılı</div>
                        <?php } ?>
                        <?php if (@$_GET['durum'] == "no"){ ?>
                            <div class="card mb-4 py-3 border-bottom-danger text-center">Düzenleme İşlemi Başarısız</div>
                        <?php } ?>

                    </div>
                    <!-- /.container-fluid -->

                    <form action="#" method="POST" id="about">
                        <div class="input-group mb-3 w-50 ml-auto mr-auto">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-default">Başlık</label>
                            </div>
                            <input type="text" name="title" id="inputGroupSelect01" class="form-control " value="<?=$row['title']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <textarea id="editor" class="ckeditor" name="content">
                        <?=$row['content']; ?>
                        </textarea>
                        <br>
                        <div class="container-fluid text-center">
                            <button type="submit" onclick="data_cu('#about','about')" class="btn btn-success btn-icon-split w-50">
                                <span class="text">Kaydet</span>
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






            <?php break;


            //Business Partners
            case 'business_partners': ?>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-1 text-gray-800 text-center">İş ortakları Listesi</h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="col-md-12">
                        <a href="index.php?page=add_business_partners" class="btn btn-success btn-icon-split">
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
                            $target = "../assets/images/uploads/partners/";
                            $query = $crud->read('business_partners');
                            while ($row = $query->fetch(PDO::FETCH_ASSOC)){ ?>
                                <div class="col-xs-12 col-md-6 col-lg-3 data-<?=$row['id']; ?>">
                                    <div class="card">
                                        <img class="card-img-top" src="<?=$target.$row['photo']; ?>" alt="Card image cap">
                                        <div class="card-block">
                                            <h4 class="card-title">Görsel Açıklaması;</h4>
                                            <p class="card-text"><?=$row['alt']; ?></p>
                                        </div>
                                        <div class="card-footer d-flex">
                                            <a href="index.php?page=edit_business_partners&id=<?=$row['id']; ?>" class="btn btn-success btn-icon-split w-50">
                                                <span class="text">Düzenle</span>
                                            </a>
                                            <button onclick="data_d('delete_business_partners',<?=$row['id']; ?>)" class="btn btn-danger btn-icon-split w-50">
                                                <span class="text">Sil</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

            <?php break;

            case 'add_business_partners': ?>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <h1 class="h3 mb-1 text-gray-800 text-center">İş ortakları</h1>
                    </div>
                    <!-- /.container-fluid -->

                    <form action="registration/add_partners.php" method="POST" enctype="multipart/form-data" id="create_business_partners">
                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Görsel Yükleyin:</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="my_file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">...</label>
                            </div>
                        </div>

                        <div class="input-group mb-3 w-50 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Görsel Açıklaması</span>
                            </div>
                            <input type="text" name="alt" class="form-control" required aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>


                        <br>
                        <div class="container-fluid text-center">
                            <button type="submit" onclick="data_cu('#create_business_partners','create_business_partners')" class="btn btn-success btn-icon-split w-50">
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






            <?php break;

            case 'edit_business_partners':
                $row = $crud->read_with_id('business_partners', $_GET['id'])->fetch(PDO::FETCH_ASSOC);
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">İş ortakları Düzenleme Sayfası</h1>
                </div>
                <!-- /.container-fluid -->

                <form action="#" method="POST" enctype="multipart/form-data" id="edit_business_partners">

                    <div class="card">
                        <div class="card-header text-center">
                            <h5 class="mt-2"><b>Mevcut Yüklü Görsel</b></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <div class="card-text text-center"><img src="../assets/images/uploads/partners/<?=$row['photo']; ?>" height="150px"></div>
                        </div>
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

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Yeni Görsel Açıklaması</span>
                        </div>
                        <input type="text" name="alt" class="form-control" value="<?=$row['alt']; ?>" required aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>


                    <br>
                    <div class="container-fluid text-center">
                        <button type="submit" onclick="data_cu('#edit_business_partners','edit_business_partners',<?=$row['id']; ?>)" class="btn btn-success btn-icon-split w-50">
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

            <?php break;


            //Blog
            case 'blog': ?>
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800 text-center">Blog Listesi</h1>
                        <a href="index.php?page=add_blog" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                            <span class="text">Yeni Blog Ekle</span>
                        </a>
                    </div>
                    <br>
                    <!-- /.container-fluid -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Özellik Listesi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Blog Fotoğrafı</th>
                                        <th>S.NO:</th>
                                        <th>ID</th>
                                        <th>Blog Adı</th>
                                        <th>Blog Açıklaması</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $blog = $crud->read('blog');
                                    $sno = 0;
                                    while ($row = $blog->fetch(PDO::FETCH_ASSOC)){ $sno++;
                                        ?>
                                        <tr class="data-<?=$row['id']; ?>">
                                            <td><img src="../assets/images/uploads/blog/<?=$row['photo']; ?>" class="hover-zoom" width="100px" height="50px"> </td>
                                            <td><?=$sno; ?></td>
                                            <td><?=$row['id']; ?></td>
                                            <td><?=$row['title']; ?></td>
                                            <td><?=divide($row['content'],50) ; ?></td>
                                            <td>
                                                <a href="index.php?page=edit_blog&id=<?=$row['id']; ?>" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                                    <span class="text">Düzenle</span>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="submit" onclick="data_d('delete_blog',<?=$row['id']; ?>)" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Sil</span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            <?php break;

            case 'add_blog': ?>



                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <h1 class="h3 mb-1 text-gray-800 text-center">Blog Ekleme İşlemi</h1>
                    </div>
                    <!-- /.container-fluid -->



                        <form action="#" method="POST" id="create_blog" enctype="multipart/form-data">
                            <div class="input-group mb-3 w-50 mx-auto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Blog Görseli:</span>
                                </div>

                                <div class="custom-file">
                                    <input type="file" name="my_file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">...</label>
                                </div>
                            </div>


                            <div class="input-group mb-3 w-50 mx-auto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Blog Başlığı</span>
                                </div>
                                <input type="text" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <hr>
                    <h6 class="text-center">Sadece Bilginiz var ise META inputlarını doldurun. Aksi takdirde <u>SEO</u> puanınız olumsuz etkilenebilir.</h6>
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




                            <textarea id="editor" class="ckeditor"  name="content" placeholder="Blog İçeriği"></textarea>



                            <br>
                            <div class="container-fluid text-center">
                                <button type="submit" onclick="data_cu('#create_blog','create_blog')" class="btn btn-success btn-icon-split w-50">
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




            <?php break;

            case 'edit_blog':
                $row = $crud->read_with_id('blog',$_GET['id'])->fetch(PDO::FETCH_ASSOC);
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">Blog Düzenleme İşlemi</h1>
                </div>
                <!-- /.container-fluid -->



                <form action="#" method="POST" id="edit_blog" enctype="multipart/form-data">
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Blog Görseli:</span>
                        </div>

                        <div class="custom-file">
                            <input type="file" name="my_file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">...</label>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header text-center">
                            <h5 class="mt-2"><b>Mevcut Yüklü Görsel</b></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <div class="card-text text-center"><img src="../assets/images/uploads/blog/<?=$row['photo']; ?>" height="150px"></div>
                        </div>
                    </div>


                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Blog Başlığı</span>
                        </div>
                        <input type="text" name="title" class="form-control" value="<?=$row['title']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <hr>
                    <h6 class="text-center">Sadece Bilginiz var ise META inputlarını doldurun. Aksi takdirde <u>SEO</u> puanınız olumsuz etkilenebilir.</h6>
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Meta Description</span>
                        </div>
                        <input type="text" name="meta_description" class="form-control" value="<?=$row['meta_description']; ?>"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Meta Keywords</span>
                        </div>
                        <input type="text" name="meta_keywords" class="form-control" value="<?=$row['meta_keywords']; ?>"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>




                    <textarea id="editor" class="ckeditor"  name="content" placeholder="Blog İçeriği"><?=$row['content']; ?></textarea>



                    <br>
                    <div class="container-fluid text-center">
                        <button type="submit" onclick="data_cu('#edit_blog','edit_blog',<?=$row['id']; ?>)" class="btn btn-success btn-icon-split w-50">
                            <span class="text">Kaydet</span>
                        </button>
                    </div>
                </form>




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




                <?php break;


            case 'fileds_of_activity': ?>
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800 text-center">Faaliyet Alanları Listesi</h1>
                        <a href="index.php?page=add_blog" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                            <span class="text">Yeni Faaliyet Alanı Ekle</span>
                        </a>
                    </div>
                    <br>
                    <!-- /.container-fluid -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Özellik Listesi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>S.NO:</th>
                                        <th>ID</th>
                                        <th>Blog Adı</th>
                                        <th>Blog Açıklaması</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $blog = $crud->read('fileds_of_activity');
                                    $sno = 0;
                                    while ($row = $blog->fetch(PDO::FETCH_ASSOC)){ $sno++;
                                        ?>
                                        <tr class="data-<?=$row['id']; ?>">
                                            <td><?=$sno; ?></td>
                                            <td><?=$row['id']; ?></td>
                                            <td><?=$row['title']; ?></td>
                                            <td><?=divide($row['content'],50) ; ?></td>
                                            <td>
                                                <a href="index.php?page=edit_fileds_of_activity&id=<?=$row['id']; ?>" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                                    <span class="text">Düzenle</span>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="submit" onclick="data_d('delete_fileds_of_activity',<?=$row['id']; ?>)" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                    <span class="text">Sil</span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <?php break;


            case 'add_fileds_of_activity': ?>



                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">Faaliyet Alanı Ekleme İşlemi</h1>
                </div>
                <!-- /.container-fluid -->



                <form action="#" method="POST" id="create_fileds_of_activity">


                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Alan Başlığı</span>
                        </div>
                        <input type="text" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <hr>


                    <textarea id="editor" class="ckeditor" name="content" placeholder="Alan İçeriği"></textarea>



                    <br>
                    <div class="container-fluid text-center">
                        <button type="submit" onclick="data_cu('#create_fileds_of_activity','create_fileds_of_activity')" class="btn btn-success btn-icon-split w-50">
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




                <?php break;


            case 'edit_fileds_of_activity':
                $row = $crud->read_with_id('fileds_of_activity',$_GET['id'])->fetch(PDO::FETCH_ASSOC);
                ?>



                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">Faaliyet Alanı Düzenleme İşlemi</h1>
                </div>
                <!-- /.container-fluid -->



                <form action="#" method="POST" id="edit_fileds_of_activity">


                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Alan Başlığı</span>
                        </div>
                        <input type="text" name="title" class="form-control" value="<?=$row['title']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <hr>


                    <textarea id="editor" class="ckeditor" name="content" placeholder="Alan İçeriği"><?=$row['content']; ?></textarea>



                    <br>
                    <div class="container-fluid text-center">
                        <button type="submit" onclick="data_cu('#edit_fileds_of_activity','edit_fileds_of_activity',<?=$row['id']; ?>)" class="btn btn-success btn-icon-split w-50">
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




                <?php break;


                //Project
            case 'project': ?>
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800 text-center">Proje Listesi</h1>
                        <a href="index.php?page=add_project" class="btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                            <span class="text">Yeni Proje Ekle</span>
                        </a>
                    </div>
                    <br>
                    <!-- /.container-fluid -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Özellik Listesi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Proje Fotoğrafı</th>
                                        <th>S.NO:</th>
                                        <th>ID</th>
                                        <th>Proje Adı</th>
                                        <th>Proje Zamanı</th>
                                        <th>Proje Açıklaması</th>
                                        <th>Proje Durumu</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $project = $crud->read('project');
                                    $sno = 0;
                                    while ($row = $project->fetch(PDO::FETCH_ASSOC)){ $sno++;
                                        $photo = json_decode($row['photo']);
                                        ?>
                                        <tr class="data-<?=$row['id']; ?>">
                                            <td><img src="../assets/images/uploads/projects/<?=$photo[0]; ?>" class="hover-zoom" width="100px" height="50px"> </td>
                                            <td><?=$sno; ?></td>
                                            <td><?=$row['id']; ?></td>
                                            <td><?=$row['name']; ?></td>
                                            <td><?=$row['time']; ?></td>
                                            <td><?=divide($row['content'],50) ; ?></td>
                                            <td><?=$row['status'] == '1' ? 'Devam Ediyor' : 'Tamamlandı'; ?></td>
                                            <td>
                                                <a href="index.php?page=edit_project&id=<?=$row['id']; ?>" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                                    <span class="text">Düzenle</span>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="submit" onclick="data_d('delete_project',<?=$row['id']; ?>)" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                    <span class="text">Sil</span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <?php break;


            case 'add_project': ?>



                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">Proje Ekleme İşlemi</h1>
                </div>
                <!-- /.container-fluid -->



                <form action="#" method="POST" id="create_project" enctype="multipart/form-data">
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Proje Görseli:</span>
                        </div>

                        <div class="custom-file">
                            <input type="file" name="my_file[]" multiple class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">...</label>
                        </div>
                    </div>


                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Proje Başlığı</span>
                        </div>
                        <input type="text" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <hr>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Proje Zamanı</span>
                        </div>
                        <input type="text" name="time" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Proje Durumu</span>
                        </div>
                        <select class="form-control form-select" name="status" aria-label="Default select example">
                            <option value="1">Devam Ediyor</option>
                            <option value="2">Tamamlandı</option>
                        </select>
                    </div>




                    <textarea id="editor" class="ckeditor"  name="content" placeholder="Blog İçeriği"></textarea>



                    <br>
                    <div class="container-fluid text-center">
                        <button type="submit" onclick="data_cu('#create_project','create_project')" class="btn btn-success btn-icon-split w-50">
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




                <?php break;

            case 'edit_project':
                $row = $crud->read_with_id('project',$_GET['id'])->fetch(PDO::FETCH_ASSOC);
                $photo = json_decode($row['photo']);
                ?>



                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-gray-800 text-center">Proje Düzenleme İşlemi</h1>
                </div>
                <!-- /.container-fluid -->



                <form action="#" method="POST" id="edit_project" enctype="multipart/form-data">
                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Proje Görseli:</span>
                        </div>

                        <div class="custom-file">
                            <input type="file" name="my_file[]" multiple class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">...</label>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header text-center">
                            <h5 class="mt-2"><b>Mevcut Yüklü Görseller</b></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <?php for ($i = 0; $i < count($photo); $i++){ ?>
                            <div class="card-text text-center"><img src="../assets/images/uploads/projects/<?=$photo[$i]; ?>" height="150px"></div>
                            <?php } ?>

                        </div>
                    </div>


                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Proje Adı</span>
                        </div>
                        <input type="text" name="title" value="<?=$row['name'] ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <hr>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Proje Zamanı</span>
                        </div>
                        <input type="text" name="time" class="form-control" value="<?=$row['time']; ?>"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3 w-50 mx-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Proje Durumu</span>
                        </div>
                        <select class="form-control form-select" name="status" aria-label="Default select example">
                            <option value="1">Devam Ediyor</option>
                            <option value="2">Tamamlandı</option>
                        </select>
                    </div>




                    <textarea id="editor" class="ckeditor"  name="content" placeholder="Proje İçeriği"><?=$row['content']; ?></textarea>



                    <br>
                    <div class="container-fluid text-center">
                        <button type="submit" onclick="data_cu('#edit_project','edit_project',<?=$_GET['id']; ?>)" class="btn btn-success btn-icon-split w-50">
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




                <?php break;



            case 'contact_form': ?>
            
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800 text-center">İletişim Formu</h1>
                    </div>
                    <br>
                    <!-- /.container-fluid -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Özellik Listesi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>S.NO:</th>
                                        <th>ID</th>
                                        <th>İsim</th>
                                        <th>Soyisim</th>
                                        <th>Mail</th>
                                        <th>Telefon Numarası</th>
                                        <th>Mesaj</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contact = $crud->read('contact_form');
                                    $sno = 0; //sequence_number
                                    while ($row = $contact->fetch(PDO::FETCH_ASSOC)){ $sno++;
                                        ?>
                                        <tr class="data-<?=$contact['id']; ?>">
                                            <td><?=$sno; ?></td>
                                            <td><?=$row['id']; ?></td>
                                            <td><?=$row['name']; ?></td>
                                            <td><?=$row['surname']; ?></td>
                                            <td><?=$row['mail']; ?></td>
                                            <td><?=$row['phone']; ?></td>
                                            <td><?=$row['message']; ?></td>
                                            <td>
                                                <button type="button" onclick="data_d('delete_contact_form',<?=$row['id']; ?>)" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                    <span class="text">Sil</span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


                <?php break;


            case 'site_settings': ?>
                    <!-- Begin Page Content -->
                    <form action="#" method="POST" id="company_info">
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-4 text-gray-800 text-center">Firma Bilgileri</h1>
                            <div class="input-group mb-3 w-50 ml-auto mr-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-default">URL</label>
                                </div>
                                <input type="text" name="company_url" id="inputGroupSelect01" class="form-control" value="<?=$company_info['url']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3 w-50 ml-auto mr-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect02" id="inputGroup-sizing-default">Firma İsmi</label>
                                </div>
                                <input type="text" name="company_title" id="inputGroupSelect02" class="form-control" value="<?=$company_info['company_name']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3 w-50 ml-auto mr-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect03" id="inputGroup-sizing-default">Firma Açıklama Mesajı</label>
                                </div>
                                <input type="text" name="company_description" id="inputGroupSelect03" class="form-control" value="<?=$company_info['description']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                <span>(Bu metin Google'da isminiz aratıldığında başlık altında ki açıklama metni olarakta görülür.)</span>
                            </div>

                            <div class="input-group mb-3 w-50 ml-auto mr-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect04" id="inputGroup-sizing-default">Firma Anahtar Kelimeleri</label>
                                </div>
                                <input type="text" name="company_keywords" id="inputGroupSelect04" class="form-control" value="<?=$company_info['keywords']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                <span>(SEO Hakkında tecrübeniz yok ise lütfen buralara dokunmayın. Aksi halde sitenize Google'da ciddi zararlar verebilirsiniz. Keywordsleri ',' kullanarak yazmayı unutmayın.)</span>
                            </div>

                            <div class="input-group mb-3 w-50 ml-auto mr-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect05" id="inputGroup-sizing-default">Firma Telefon Numarası</label>
                                </div>
                                <input type="text" name="company_phone" id="inputGroupSelect05" class="form-control" value="<?=$company_info['phone']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3 w-50 ml-auto mr-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect07" id="inputGroup-sizing-default">İletişim Mail Adresi</label>
                                </div>
                                <input type="text" name="company_mail" id="inputGroupSelect07" class="form-control" value="<?=$company_info['mail']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3 w-50 ml-auto mr-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect08" id="inputGroup-sizing-default">Firma Facebook Adresi</label>
                                </div>
                                <input type="text" name="company_facebook" id="inputGroupSelect08" class="form-control" value="<?=$company_info['facebook']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3 w-50 ml-auto mr-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect09" id="inputGroup-sizing-default">Firma Twitter Adresi</label>
                                </div>
                                <input type="text" name="company_twitter" id="inputGroupSelect09" class="form-control" value="<?=$company_info['twitter']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3 w-50 ml-auto mr-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect10" id="inputGroup-sizing-default">Firma Instagram Adresi</label>
                                </div>
                                <input type="text" name="company_instagram" id="inputGroupSelect10" class="form-control" value="<?=$company_info['instagram'] ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3 w-50 ml-auto mr-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect12" id="inputGroup-sizing-default">Firma Linkedin Adresi</label>
                                </div>
                                <input type="text" name="company_linkedin" id="inputGroupSelect12" class="form-control" value="<?=$company_info['linkedin']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>


                            <div class="input-group mb-3 w-50 ml-auto mr-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect12" id="inputGroup-sizing-default">Firma Tanıtım Videosu</label>
                                </div>
                                <input type="text" name="company_video" id="inputGroupSelect12" class="form-control" value="<?=$company_info['video']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>




                            <div class="container-fluid text-center">
                                <button type="submit" name="company_info" onclick="data_cu('#company_info','company_info')" class="btn btn-success btn-icon-split w-50">
                                    <span class="text">Düzenle</span>
                                </button>
                            </div>
                        </div>

                        <!-- /.container-fluid -->
                    </form>

            <?php break;



            default:
                die('Default geldi');
                header("location:index.php?page=index");
                break;

            }

            ?>

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

    <?php include 'logout-modal.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script type="text/javascript">
        /*

        ReadMe:
        Create = C
        Read = R
        Update = U
        Delete = D

        example:
        cr = Create & Read

        Create + R = Read = cr (Create & Read)


        ---------------------------------------

        data_operation

        1 = Data Create
        2 = Data Update
        3 = Data Delete

        */
        let saved_pr = 0;

        function data_cu(which_form,operation,id = null){ //create - update data function
            $(which_form).submit(function(event){
                event.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    type: "POST",
                    url: "../settings/operations.php?operation=" + operation + "&id=" + id,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success:function (data){
                        console.log(JSON.stringify(data,null,4));
                        let status = JSON.parse(data);
                        Swal.fire({
                            title: status.title,
                            text: status.message,
                            icon: status.status,
                            confirmButtonText: 'Tamam',
                            showCancelButton: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = status.link;
                            }
                        })
                    }
                });
            });
        } //data_cu (Data Create & Update) Function END

        function data_d(operation,id){ //Data Delete Function
            Swal.fire({
                title: 'Emin misin?',
                text: "Bu özelliği sildiğinde; bu özellik bir daha kullanılamayacak, Web Sitesinde gözükmeyecek ve sistemden silinecektir. Onaylıyor musun? ",
                icon: 'warning',
                iconColor: 'red',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Sil',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        data: {data_id:id},
                        url: "../settings/operations.php?operation=" + operation,
                        success:function (data){
                            $(".data-"+id).css("display","none");
                            console.log(data);
                            let status = JSON.parse(data);
                            Swal.fire({
                                title: status.title,
                                text: status.message,
                                icon: status.status,
                                confirmButtonText: 'Tamam',
                            })
                        }
                    })
                }
            })
        } //data_d (Data Create) Function END
    </script>

</body>

</html>

<?php
}
else{
    header("location:login.php");
}


?>
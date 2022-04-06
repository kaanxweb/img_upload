
<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['login'])){
    require_once '../settings/crud.php';
    $crud = new crud();
    $login_control = $crud->login_control(htmlspecialchars($_POST['username']),htmlspecialchars($_POST['password']));
    if ($login_control == TRUE){
        header("location:index.php");
    }
    else{
        header("location:login.php?status=no");
    }
}


if (!isset($_SESSION['admin'])){
?>
<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Isco Software&nbsp;|&nbsp;Yönetim Paneli</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
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
                                        <h1 class="h4 text-gray-900 mb-4">IscoSoftware | Yönetim Paneli</h1>
                                    </div>
                                    <form class="user" action="#" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="username" aria-describedby="emailHelp"
                                                placeholder="Kullanıcı Adınızı Girin">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Şifrenizi Girin">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                          Giriş Yap
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
    header("location:index.php");
}
?>
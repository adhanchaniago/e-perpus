<?php 
    
    session_start();
    include 'auth/config.php';

    if (isset($_SESSION['loginAdmin'])) {
        header("Location: superadmin");
    }

    if (isset($_SESSION['loginUsers'])) {
        header("Location: index");
    }

    if (isset($_POST['login']) === true) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $selectDataLogin = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'");

        if (mysqli_num_rows($selectDataLogin) === 1) {
            $getDataLogin = mysqli_fetch_array($selectDataLogin);
            if (password_verify($password, $getDataLogin['password'])) {
                if ($getDataLogin['type'] === 'admin') {

                    $_SESSION['username'] = $getDataLogin['username'];
                    $_SESSION['loginAdmin'] = true;
                    $_SESSION['email'] = $getDataLogin['email'];
                    $_SESSION['no_hp'] = $getDataLogin['no_hp'];
                    $id = $_SESSION['id'] = $getDataLogin['id'];
                    $_SESSION['type'] = $getDataLogin['type'];
                    $_SESSION['session_id'] = $getDataLogin['session_id'];

                    $updateOnline = mysqli_query($link, "UPDATE users SET aktif = 'online' WHERE id = '$id'");

                    echo '<script src="assets/libs/vendor/jquery-3.2.1.min.js"></script>';
                    echo '<script>

                        $(document).ready(function(){
                            toastr.options = {
                              "closeButton": true,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-right",
                              "showDuration": "1000",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                        }

                        toastr.success("Login Berhasil", "Success")
                    });

                    </script>';

                    echo '<meta http-equiv="refresh" content="5; url=superadmin/index">';
                }else if ($getDataLogin['type'] === 'users') {
                    
                    $_SESSION['username'] = $getDataLogin['username'];
                    $_SESSION['loginUsers'] = true;
                    $_SESSION['email'] = $getDataLogin['email'];
                    $_SESSION['no_hp'] = $getDataLogin['no_hp'];
                    $id = $_SESSION['id'] = $getDataLogin['id'];
                    $_SESSION['type'] = $getDataLogin['type'];
                    $_SESSION['session_id'] = $getDataLogin['session_id'];

                    $updateOnline = mysqli_query($link, "UPDATE users SET aktif = 'online' WHERE id = '$id'");

                    echo '<script src="assets/libs/vendor/jquery-3.2.1.min.js"></script>';
                    echo '<script>

                        $(document).ready(function(){
                            toastr.options = {
                              "closeButton": true,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-right",
                              "showDuration": "1000",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                        }

                        toastr.success("Login Berhasil", "Success")
                    });

                    </script>';

                    echo '<meta http-equiv="refresh" content="5; url=index">';
                }else if ($getDataLogin['type'] === 'superadmin') {
                    $_SESSION['username'] = $getDataLogin['username'];
                    $_SESSION['loginAdmin'] = true;
                    $_SESSION['email'] = $getDataLogin['email'];
                    $_SESSION['no_hp'] = $getDataLogin['no_hp'];
                    $id = $_SESSION['id'] = $getDataLogin['id'];
                    $_SESSION['type'] = $getDataLogin['type'];
                    $_SESSION['session_id'] = $getDataLogin['session_id'];

                     $updateOnline = mysqli_query($link, "UPDATE users SET aktif = 'online' WHERE id = '$id'");

                    echo '<script src="assets/libs/vendor/jquery-3.2.1.min.js"></script>';
                    echo '<script>

                        $(document).ready(function(){
                            toastr.options = {
                              "closeButton": true,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-right",
                              "showDuration": "1000",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                        }

                        toastr.success("Login Berhasil", "Success")
                    });

                    </script>';

                    echo '<meta http-equiv="refresh" content="5; url=superadmin/index">';
                }
            }else{
                echo '<script src="assets/libs/vendor/jquery-3.2.1.min.js"></script>';
                    echo '<script>

                        $(document).ready(function(){
                            toastr.options = {
                              "closeButton": true,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-right",
                              "showDuration": "1000",
                              "hideDuration": "1000",
                              "timeOut": "3000",
                              "extendedTimeOut": "1000",
                        }

                        toastr.error("Password yang anda masukkan salah", "Error")
                    });

                    </script>';

                    echo '<meta http-equiv="refresh" content="3; url=login">'; 
            }
        }else{
           echo '<script src="assets/libs/vendor/jquery-3.2.1.min.js"></script>';
                    echo '<script>

                        $(document).ready(function(){
                            toastr.options = {
                              "closeButton": true,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-right",
                              "showDuration": "1000",
                              "hideDuration": "1000",
                              "timeOut": "3000",
                              "extendedTimeOut": "1000",
                        }

                        toastr.error("Username tidak ditemukan", "Error")
                    });

                    </script>';

                    echo '<meta http-equiv="refresh" content="3; url=login">'; 
        }
    }
    
    
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="E- Perpus merupakan kumpulan berbagai macam ebook yang bisa anda download kapanpun">
    <link rel="shortcut icon" href="assets/libs/images/smkn5.jpg">

    <!-- Title Page-->
    <title>Login Member</title>

    <!-- Fontfaces CSS-->

    <link href="assets/libs/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Captcha -->

    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- Bootstrap CSS-->
    <link href="assets/libs/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/libs/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!--  Toastr -->

    <link rel="stylesheet" type="text/css" href="assets/libs/vendor/toastr/toastr.css">
    <link rel="stylesheet" type="text/css" href="assets/libs/vendor/toastr/toastr.min.css">

    <!-- Main CSS-->
    <link href="assets/libs/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <h2 style="text-align: center; padding: 30px;">E- Perpus Member Login</h2>
                    <div class="login-content">
                        <!-- <div class="login-logo">
                            <a href="#">
                                <img src="assets/libs/images/exploiterid.png" alt="ExploiterID">
                            </a>
                        </div> -->
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" placeholder="Masukkan username" required="" autocomplete="off" name="username" id="username" minlength="4">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" minlength="6" placeholder="Masukkan password" autocomplete="off" required="">
                                </div>
                                <button type="submit" name="login" class="au-btn au-btn--block au-btn--green m-b-20">Login</button>
                            </form>
                            <!-- x -->
                            <p style="text-align: center;">Belum mempunyai akun? <a href="register">Daftar</a></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                Ingin menjadi <a href="https://api.whatsapp.com/send?phone=6289602362015&text=Hallo saya ingin menjadi admin di e-perpus smkn5. Username %3A Email %3A No Handphone %3A Password %3A">Admin</a> atau <a href="https://api.whatsapp.com/send?phone=6289602362015&text=Hallo saya ingin menjadi superadmin di e-perpus smkn5.  Username %3A Email %3A No Handphone %3A Password %3A">Superadmin</a>
                <p>
                <strong style="margin-top: 30px;">&copy; 2020 by Zamzam Syahputra</strong>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="assets/libs/vendor/jquery-3.2.1.min.js"></script>
    <script src="assets/libs/vendor/toastr/toastr.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/libs/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/libs/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/libs/vendor/slick/slick.min.js">
    </script>

    <script src="assets/libs/vendor/wow/wow.min.js"></script>
    <script src="assets/libs/vendor/animsition/animsition.min.js"></script>
    <script src="assets/libs/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/libs/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/libs/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/libs/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/libs/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/libs/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/libs/vendor/select2/select2.min.js">
    </script>
    <script src="assets/libs/vendor/bootstrap-validate/bootstrap-validate.js"></script>

    <!-- Bootstrap Validate Main -->
    <script>
        
        bootstrapValidate('#username', 'min:4:Masukkan nama minimal 4 huruf');
        bootstrapValidate('#password', 'min:4:Masukkan nama minimal 6 huruf');

    </script>
    

    <!-- Main JS-->
    <script src="assets/libs/js/main.js"></script>

</body>

</html>
<!-- end document-->
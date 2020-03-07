<?php 
    
    include 'auth/config.php';
    error_reporting(0);
    if (isset($_POST['register']) === true) {
        $type = 'users';
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $no_hp = htmlspecialchars($_POST['no_hp']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($link, $_POST['confirm_password']);

        $querySelect = mysqli_query($link, "SELECT username FROM users WHERE username = '$username'");
        $queryUsername = mysqli_fetch_array($querySelect);

        if ($username === $queryUsername['username']) {
            echo '<script src="assets/libs/sweetalert/sweetalert.min.js"></script>';
            echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
            echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Register Error',
                    text:  'Username sudah terdaftar di database',
                    type: 'error',
                    timer: 4000,
                    showConfirmButton: false
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                     window.location.replace('register');
                     } ,4000); 
            </script>";
            return false;
        }

        if ($confirm_password !== $password) {
            echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
            echo '<script src="assets/libs/sweetalert/sweetalert.min.js"></script>';
             echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Register Error',
                    text:  'Password yang anda masukkan tidak sesuai',
                    type: 'error',
                    timer: 4000,
                    showConfirmButton: false
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                     window.location.replace('register');
                     } ,4000); 
            </script>";
            return false;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $queryInsert = mysqli_query($link, "INSERT INTO users (id, username, email, no_hp, password, type) VALUES ('', '$username', '$email', '$no_hp', '$hash', '$type')");

        if (mysqli_affected_rows($link) > 0) {
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

                        toastr.success("Register Berhasil", "Success")
                    });

                    </script>';

                    echo '<meta http-equiv="refresh" content="3; url=login">';

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

                        toastr.error("Register Gagal", "Error")
                    });

                    </script>';

                    echo '<meta http-equiv="refresh" content="3; url=register">';
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
    <title>Register Member</title>

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
                    <h2 style="text-align: center; padding: 30px;">E- Perpus Register Member</h2>
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
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" placeholder="Masukkan email" required="" autocomplete="off" name="email" id="email" minlength="4">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="number" name="no_hp" class="form-control" placeholder="Masukkan nomor" minlength="9" required="" autocomplete="off" id="no_hp">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" minlength="6" placeholder="Masukkan password" autocomplete="off" required="">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" minlength="6" placeholder="Confirm Password" autocomplete="off" required="">
                                </div>
                                <button type="submit" name="register" class="au-btn au-btn--block au-btn--green m-b-20">Register</button>
                            </form>
                            <!-- x -->
                            <p style="text-align: center;">Sudah mempunyai akun? <a href="login">Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
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
        bootstrapValidate('#email', 'email:Masukkan email dengan benar');
        bootstrapValidate('#no_hp', 'min:9:Masukkan nomor minimal 9 angka');
        bootstrapValidate('#password', 'min:6:Masukkan nama minimal 6 huruf');
        bootstrapValidate('#confirm_password', 'matches:#password:Password yang anda masukkan tidak sesuai');

    </script>
    

    <!-- Main JS-->
    <script src="assets/libs/js/main.js"></script>

</body>

</html>
<!-- end document-->
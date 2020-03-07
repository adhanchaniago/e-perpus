<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="assets/libs/sweetalert/sweetalert.min.js"></script>
<style type="text/css">
    *{
        font-family: sans-serif;
    }
</style>
<?php 
    
    include 'auth/config.php';
    session_start();
    session_destroy();
    $id = $_SESSION['id'];

     $queryAktif = mysqli_query($link, "UPDATE users SET aktif = 'offline' WHERE id = '$id'");

    if (!$_SESSION) {
        header("Location: index");
    }

     echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'success',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Logout Berhasil',
                    text:  'Redirecting...',
                    type: 'success',
                    timer: 4000,
                    showConfirmButton: false
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                     window.location.replace('index');
                     } ,4000); 
            </script>";

 ?>
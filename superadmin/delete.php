<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="../assets/libs/sweetalert/sweetalert.min.js"></script>
<style type="text/css">
	*{
		font-family: sans-serif;
	}
</style>

<?php 
	
	session_start();

	include '../auth/config.php';
	include '../auth/sessions.php';

	if (!$_SESSION) {
		header("Location: ../index");
	}

	$id_ebook = $_GET['id_ebook'];
	$session_id = $_GET['session_id'];

	$queryDelete = mysqli_query($link, "DELETE FROM ebook WHERE id_ebook = '$id_ebook' AND session_id = '$session_id'");

	if ($queryDelete) {
		echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'success',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Success',
                    text:  'Ebook berhasil di hapus',
                    type: 'success',
                    timer: 2000,
                    showConfirmButton: false
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                     window.location.replace('reports');
                     } ,2000); 
            </script>";	
	}else{
		echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Error',
                    text:  'Ebook gagal di hapus',
                    type: 'error',
                    timer: 2000,
                    showConfirmButton: false
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                     window.location.replace('reports');
                     } ,2000); 
            </script>";	
	}

 ?>
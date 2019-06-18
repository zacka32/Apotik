<script src="dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="dist/sweetalert.css">
<?php

  session_start();
  session_destroy();
//  echo "<center>Anda telah sukses keluar sistem <b>[LOGOUT]<b>";

// Apabila setelah logout langsung menuju halaman utama website, aktifkan baris di bawah ini:
echo "<script type='text/javascript'>
            setTimeout(function () {  
              swal({
              title: 'Logout',
              text: 'Anda telah logout, terima kasih ',
              imageUrl: 'png/logout.jpg'
              });
              
            },10); 
            window.setTimeout(function(){ 
              window.location.replace('index.php');
            } ,2000); 
          </script>";
  // header('location:http://www.alamatwebsite.com');
?>

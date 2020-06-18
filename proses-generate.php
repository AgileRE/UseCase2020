<?php 

include('functions.php');

$id_sistem = $_GET["id"];

if (prosesGenerate($id_sistem) != false){
    echo "
      <script>
        alert('UI berhasil di-generate!');
        document.location.href = 'generate-sistem.php'
      </script>
      ";
  } else {
    echo "
      <script>
        alert('UI gagal di-generate!');
        document.location.href = 'generate-sistem.php'
      </script>
      ";
  }
  ?>

?>
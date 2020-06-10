<?php
require 'functions.php';
$id_aktor = $_GET["id"];
$aktor = query("SELECT * FROM `aktor` WHERE id_aktor = $id_aktor");
$idSistem = $aktor[0]['id_sistem'];

if (hapusAktor($id_aktor) > 0){
  echo "
    <script>
      alert('Aktor berhasil dihapus!');
      document.location.href = 'detail-sistem.php?id=".$idSistem."'
    </script>
    ";
} else {
  echo "
    <script>
      alert('Aktor gagal dihapus!');
      document.location.href = 'detail-sistem.php?id=".$idSistem."'
    </script>
    ";
}
?>

<?php
require 'functions.php';

$id_fitur = $_GET['id'];
$fitur = detailFitur($id_fitur);

$sql = "SELECT * FROM `fitur` WHERE id_fitur = '$id_fitur'";
$nama_fitur = query($sql);

$idAktor = $nama_fitur[0]['id_aktor'];

if (hapusFitur($id_fitur) > 0){
  echo "
    <script>
      alert('Aktor berhasil dihapus!');
      document.location.href = 'detail-aktor.php?id=".$idAktor."'
    </script>
    ";
} else {
  echo "
    <script>
      alert('Aktor gagal dihapus!');
      document.location.href = 'detail-aktor.php?id=".$idAktor."'
    </script>
    ";
}
?>

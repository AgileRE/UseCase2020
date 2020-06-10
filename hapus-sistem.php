<?php
require 'functions.php';
$id_sistem = $_GET["id"];

if (hapusSistem($id_sistem) > 0){
  echo "
    <script>
      alert('Sistem berhasil dihapus!');
      document.location.href = 'index.php'
    </script>
    ";
} else {
  echo "
    <script>
      alert('Sistem gagal dihapus!');
      document.location.href = 'index.php'
    </script>
    ";
}
?>

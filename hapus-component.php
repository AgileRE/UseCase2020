<?php
require 'functions.php';

$id_component = $_GET['id'];

$sql = "SELECT * FROM `component_view` WHERE id_component = '$id_component'";
$component = query($sql);
$idView = $component[0]['id_view'];

$sql = "SELECT * FROM `view` WHERE id_view = '$idView'";
$view = query($sql);
$idFitur = $view[0]['id_fitur'];

// $sql = "SELECT * FROM `fitur` WHERE id_fitur = '$idFitur'";
// $view = query($sql);
// $idAktor = $view[0]['id_aktor'];


if (hapusComponent($id_component) > 0){
  echo "
    <script>
      alert('Component berhasil dihapus!');
      document.location.href = 'component-view.php?id=".$idFitur."'
    </script>
    ";
} else {
  echo "
    <script>
      alert('Component gagal dihapus!');
      document.location.href = 'component-view.php?id=".$idFitur."'
    </script>
    ";
}
?>

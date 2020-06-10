<?php

include('functions.php');

$idAktor = $_GET['id'];
$aktor = query("SELECT * FROM `aktor` WHERE id_aktor = $idAktor");
$idSistem = $aktor[0]['id_sistem'];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
    if (ubahAktor($_POST)){
        echo "
        <script>
            alert('Perubahan berhasil disimpan!');
            document.location.href = 'detail-sistem.php?id=".$idSistem."'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Perubahan gagal disimpan!');
        document.location.href = 'detail-sistem.php?id=".$idSistem."'
        </script>";
    }

}

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ubah Data Aktor</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="index.php">Kelola Data Sistem</a></li>
                    <li class="breadcrumb-item active">Ubah Data Aktor</li>

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->

<div class="content">
    <div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <dic class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Aktor</h3>
                </div>

                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="nama-aktor" class="col-sm-2 col-form-label">Nama Aktor</label>
                            <div class="col-sm-10">
                                <input name="id-aktor" value="<?=$idAktor?>" type="text" class="form-control" id="nama=aktor" hidden>
                                <input required name="nama-aktor" value="<?= $aktor[0]['nama_aktor']?>" placeholder="Masukkan nama aktor..." type="text" class="form-control" id="nama=aktor">
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn btn-success btn-block" name="submit" type="submit">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </dic>
        </div>
    </div>       
</div>
<!-- /.content -->
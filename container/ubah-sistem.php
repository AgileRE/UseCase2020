<?php

include('functions.php');

$idSistem = $_GET['id'];
$sistem = query("SELECT * FROM `sistem` WHERE id_sistem = $idSistem");

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
    if (ubahSistem($_POST)){
        echo "
        <script>
            alert('Perubahan berhasil disimpan!');
            document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Perubahan gagal disimpan!');
        document.location.href = 'index.php'
        </script>";
    }

}

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ubah Data Sistem</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kelola Data Sistem</li>
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
                    <h3 class="card-title">Data Sistem</h3>
                </div>

                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="nama=sistem" class="col-sm-2 col-form-label">Nama Sistem</label>
                            <div class="col-sm-10">
                                <input name="id-sistem" value="<?=$idSistem?>" placeholder="Masukkan nama sistem..." type="text" class="form-control" id="nama=sistem" hidden>
                                <input name="nama-sistem" value="<?= $sistem[0]['nama_sistem']?>" placeholder="Masukkan nama sistem..." type="text" class="form-control" id="nama=sistem">
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
</div>
<!-- /.content -->
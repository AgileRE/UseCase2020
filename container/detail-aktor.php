<?php
include('functions.php');

$id_aktor = $_GET['id'];
$fitur = listFitur($id_aktor);

$sql = "SELECT * FROM `aktor` WHERE id_aktor = '$id_aktor'";
$nama_aktor = query($sql);

$idSistem = $nama_aktor[0]['id_sistem'];
$sql = "SELECT * FROM `sistem` WHERE id_sistem = '$idSistem'";
$sistem = query($sql);

if (isset($_POST["submit"])){
    if (tambahFitur($_POST, $id_aktor) > 0){
        echo "
        <script>
            alert('Aktor berhasil ditambahkan!');
            document.location.href = 'detail-aktor.php?id=$id_aktor'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Aktor gagal ditambahkan!');
        document.location.href = 'detail-aktor.php?id=$id_aktor'
        </script>";
    }

}
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Aktor : <?= $nama_aktor[0]['nama_aktor']?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Kelola Data Sistem</a></li>                    
                    <li class="breadcrumb-item"><a href="detail-sistem.php?id=<?=$idSistem?>">Detail Sistem : <?= $sistem[0]['nama_sistem']?></a></li> 
                    <li class="breadcrumb-item active">Detail Aktor: <?= $nama_aktor[0]['nama_aktor']?></li>
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
                    <h3 class="card-title">Tambah Data Fitur</h3>
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="nama-fitur" class="col-sm-2 col-form-label">Nama Fitur</label>
                            <div class="col-sm-10">
                                <input name="nama-fitur" placeholder="Masukkan nama fitur..." type="text" class="form-control" id="nama-fitur">
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn btn-success btn-block" name="submit" type="submit">+ Tambah Data</button>
                        </div>
                    </form>
                </div>
            </dic>
        </div>
    </div>
        <div class="row">
        <div class="col-12">


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Data Fitur</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">


                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="text-center table table-bordered table-striped dataTable" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 5px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 219px;">Nama Fitur</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 194px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; foreach($fitur as $fit): ?>
                                        <tr role="row" class="<?php if($i%2==0): echo "even"; else: echo "odd"; endif?>">
                                            <td class="sorting_1"><?= ++$i ?></td>
                                            <td><?= $fit['nama_fitur'] ?></td>
                                            <td>
                                                <!-- <a href="ubah-fitur.php?id=<//?= $fit['id_fitur'] ?>" class="btn btn-sm btn-warning">Ubah</a> -->
                                                <a href="detail-fitur.php?id=<?= $fit['id_fitur'] ?>" class="btn btn-sm btn-info">Data Use Case Scenario</a>
                                                <a href="component-view.php?id=<?= $fit['id_fitur'] ?>" class="btn btn-sm btn-secondary">Data Component View</a>
                                                <a href="hapus-fitur.php?id=<?= $fit['id_fitur'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                    <tfoot>

                                        <tr>
                                            <th rowspan="1" colspan="1">No</th>
                                            <th rowspan="1" colspan="1">Nama Fitur</th>
                                            <th rowspan="1" colspan="1">Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

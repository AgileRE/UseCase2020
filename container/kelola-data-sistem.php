<?php

include('functions.php');

$sistem = listSistem();

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
    if (tambahSistem($_POST) > 0){
        echo "
        <script>
            alert('Sistem berhasil ditambahkan!');
            document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Sistem gagal ditambahkan!');
        document.location.href = 'index.php'
        </script>";
    }

}

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Kelola Data Sistem</h1>
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
                    <h3 class="card-title">Tambah Data Sistem</h3>
                </div>

                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="nama=sistem" class="col-sm-2 col-form-label">Nama Sistem</label>
                            <div class="col-sm-10">
                                <input name="nama-sistem" placeholder="Masukkan nama sistem..." type="text" class="form-control" id="nama=sistem">
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
                    <h3 class="card-title">Tabel Data Sistem</h3>
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
                                                style="width: 219px;">Nama Sistem</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 194px;">Aksi</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; foreach($sistem as $sis): ?>
                                        <tr role="row" class="<?php if($i%2==0): echo "even"; else: echo "odd"; endif?>">
                                            <td class="sorting_1"><?= ++$i ?></td>
                                            <td><?= $sis['nama_sistem'] ?></td>
                                            <td>
                                                <a href="ubah-sistem.php?id=<?= $sis['id_sistem'] ?>" class="btn btn-sm btn-warning">Ubah</a>
                                                <a href="detail-sistem.php?id=<?= $sis['id_sistem'] ?>" class="btn btn-sm btn-info">Data Aktor</a>
                                                <a href="hapus-sistem.php?id=<?= $sis['id_sistem'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>                                           
                                        </tr>            
                                    <?php endforeach ?>                            
                                    </tbody>
                                    <tfoot>
                                        
                                        <tr>
                                            <th rowspan="1" colspan="1">No</th>
                                            <th rowspan="1" colspan="1">Nama Sistem</th>
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
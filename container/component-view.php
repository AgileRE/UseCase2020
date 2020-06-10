<?php 
    include('functions.php');
    if (isset($_POST["submit"])){
        if (simpanTitle($_POST)){
            echo "
            <script>
                alert('Informasi title berhasil disimpan!');
                history.go(-1);                
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Informasi title gagal disimpan!');
            history.go(-1);        
            </script>";
        }
    
    }

    $id_fitur = $_GET['id'];    
    $nama_fitur = query("SELECT * FROM fitur WHERE id_fitur = $id_fitur");        
    $view = query("SELECT * FROM view WHERE id_fitur = $id_fitur");     
    if(count($view) == 0){
        $idView = '';
        $title = '';
    } else {
        $idView =$view[0]['id_view'];
        $title =$view[0]['title'];
    }
    $component_view = query("SELECT nama_component, jenis_component FROM `component_view` INNER JOIN `view` ON component_view.id_view = view.id_view INNER JOIN `fitur` ON fitur.id_fitur = view.id_fitur WHERE fitur.id_fitur ='$id_fitur'");    
    $id_fitur = $_GET['id'];
    

    $idAktor = $nama_fitur[0]['id_aktor'];
    $sql = "SELECT * FROM `aktor` WHERE id_aktor = '$idAktor'";
    $aktor = query($sql);

    $idSistem = $aktor[0]['id_sistem'];
    $sql = "SELECT * FROM `sistem` WHERE id_sistem = '$idSistem'";
    $sistem = query($sql);
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data View dan Component : <br> <?= $nama_fitur[0]['nama_fitur']?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Kelola Data Sistem</a></li>  
                    <li class="breadcrumb-item"><a href="detail-aktor.php?id=<?=$idSistem?>">Data Sistem : <?= $sistem[0]['nama_sistem']?></a></li>
                    <li class="breadcrumb-item"><a href="detail-aktor.php?id=<?=$idAktor?>">Data Aktor : <?= $aktor[0]['nama_aktor']?></a></li> 
                    <li class="breadcrumb-item"><a href="detail-fitur.php?id=<?= $id_fitur ?>">Detail Fitur  : <?= $nama_fitur[0]['nama_fitur'] ?></a></li>  
                    <li class="breadcrumb-item active">Data View dan Component</li>
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
                    <h3 class="card-title">Informasi View</h3>
                </div>

                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="nama=sistem" class="col-sm-2 col-form-label">Title Halaman</label>
                            <div class="col-sm-10">
                                <input name="id-view" value="<?= $idView ?>" placeholder="Masukkan title halaman..." type="text" class="form-control" id="nama=sistem" hidden>
                                <input name="nama-title" value="<?=$title?>" placeholder="Masukkan title halaman..." type="text" class="form-control" id="nama=sistem">
                            </div>
                        </div>

                        <div class="row">
                            <?php if (count($view) == 0):?>
                            <button class="btn btn-success btn-block" name="submit" disabled type="submit">Simpan Informasi</button>    
                            <?php else: ?>
                                <button class="btn btn-success btn-block" name="submit" type="submit">Simpan Informasi</button>
                            <?php endif ?>
                            
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
                        <h3 class="card-title">Tabel Data Component</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1"
                                        class="text-center table table-bordered table-striped dataTable" role="grid"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 5px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                                    style="width: 219px;">Nama
                                                    Component</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending"
                                                    style="width: 219px;">Tipe
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 194px;">
                                                    Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            foreach($component_view as $component): ?>
                                            <tr role="row"
                                                class="<?php if($i%2==0): echo "even"; else: echo "odd"; endif?>">
                                                <td class="sorting_1"><?= $i ?></td>
                                                <td><?= $component['nama_component'] ?></td>
                                                <td><?= $component['jenis_component'] ?></td>
                                                <td>
                                                    <a href="ubah-component.php" class="btn btn-sm btn-warning">Ubah</a>
                                                    <!-- Split button -->

                                                    <a href="hapus-fitur.php" class="btn btn-sm btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                            endforeach ?>
                                        </tbody>               
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include('functions.php');

    $id_component = $_GET['id'];          
    $component = query("SELECT * FROM component_view WHERE id_component = $id_component");    
    

    $idView = $component[0]['id_view'];
    $view = query("SELECT * FROM view WHERE id_view = $idView");  
    

    $idFitur = $view[0]['id_fitur'];
    $fitur = query("SELECT * FROM fitur WHERE id_fitur = $idFitur");          

    $idAktor = $fitur[0]['id_aktor'];
    $sql = "SELECT * FROM `aktor` WHERE id_aktor = '$idAktor'";
    $aktor = query($sql);

    $idSistem = $aktor[0]['id_sistem'];
    $sql = "SELECT * FROM `sistem` WHERE id_sistem = '$idSistem'";
    $sistem = query($sql);

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
    if (ubahComponent($_POST)){
        echo "
        <script>
            alert('Perubahan berhasil disimpan!');
            document.location.href = 'component-view.php?id=".$idFitur."'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Perubahan gagal disimpan!');
        document.location.href = 'component-view.php?id=".$idFitur."'
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
                    <li class="breadcrumb-item"><a href="index.php">Kelola Data Sistem</a></li>  
                    <li class="breadcrumb-item"><a href="detail-aktor.php?id=<?=$idSistem?>">Data Sistem : <?= $sistem[0]['nama_sistem']?></a></li>
                    <li class="breadcrumb-item"><a href="detail-aktor.php?id=<?=$idAktor?>">Data Aktor : <?= $aktor[0]['nama_aktor']?></a></li> 
                    <li class="breadcrumb-item"><a href="detail-fitur.php?id=<?= $idFitur ?>">Detail Fitur  : <?= $fitur[0]['nama_fitur'] ?></a></li>  
                    <li class="breadcrumb-item"><a href="component-view.php?id=<?= $idFitur ?>">Data View dan Component</a></li>  
                    <li class="breadcrumb-item active">Ubah : Data View dan Component</li>
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
                    <h3 class="card-title">Data Component View</h3>
                </div>

                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="nama-aktor" class="col-sm-2 col-form-label">Nama Component</label>
                            <div class="col-sm-10">
                                <input name="id-aktor" value="<?=$id_component?>" type="text" class="form-control" hidden>
                                <input required name="nama-component" value="<?= $component[0]['nama_component']?>" placeholder="Masukkan nama component..." type="text" class="form-control" id="nama-component">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama-aktor" class="col-sm-2 col-form-label">Tipe Component</label>
                            <div class="col-sm-10">
                                <select name="tipe-component" id=""></select>
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
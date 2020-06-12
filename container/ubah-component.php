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

    //cek inisial tipe component (ciri kas ubah data)
    $tipeComponent = $component[0]['jenis_component'];
    $jumlahDataTerdeteksi = 0; //belum ditentukan (component)
    if($tipeComponent == "Form"){
        $sql = "SELECT * FROM `info_form` WHERE id_component_view = '$id_component'";
        $cek = query($sql);
        $jumlahDataTerdeteksi = count($cek);
    } elseif($tipeComponent == "Tabel") {
        $sql = "SELECT * FROM `info_tabel` WHERE id_component_view = '$id_component'";
        $cek = query($sql);
        $jumlahDataTerdeteksi = count($cek);
    } elseif($tipeComponent == "Tombol") {
        $sql = "SELECT * FROM `info_tombol` WHERE id_component_view = '$id_component'";
        $cek = query($sql);
        $jumlahDataTerdeteksi = count($cek);
    }

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
                                <input name="id-component" value="<?=$id_component?>" type="text" class="form-control" hidden>
                                <input required name="nama-component" value="<?= $component[0]['nama_component']?>" placeholder="Masukkan nama component..." type="text" class="form-control" id="nama-component">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipe-component" class="col-sm-2 col-form-label">Tipe Component</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="tipe-component" id="tipe-component">
                                    <option <?php if($component[0]['jenis_component'] == "Belum Ditentukan"): echo "selected"; endif; ?> value="Belum Ditentukan">Belum Ditentukan</option>
                                    <option <?php if($component[0]['jenis_component'] == "Form"): echo "selected"; endif; ?> value="Form">Form</option>
                                    <option <?php if($component[0]['jenis_component'] == "Tabel"): echo "selected"; endif; ?> value="Tabel">Tabel</option>
                                    <option <?php if($component[0]['jenis_component'] == "Tombol"): echo "selected"; endif; ?> value="Tombol">Tombol</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-warning btn-block" name="tetapkan" type="submit">Tetapkan</button>
                            </div>
                        </div>
                        <?php if(isset($_POST["tetapkan"])): ?>
                        
                            <?php if ($_POST["tipe-component"] == "Belum Ditentukan"): ?>
                            <script>
                                alert("Anda harus menentukan tipe component terlebih dahulu");
                            </script>
                            <?php elseif($_POST["tipe-component"] == "Form"): ?>
                                <div class="form-group row">                               
                                    <label for="label-form" class="col-sm-2 col-form-label">Label Form</label>
                                    <div class="col-sm-10">                                    
                                        <input name="label-form" placeholder="Masukkan label form..." type="text" class="form-control" id="nama-tombol   ">
                                    </div>
                                </div>
                                <div class="form-group row">                               
                                    <label for="tipe-form" class="col-sm-2 col-form-label">Tipe Form</label>
                                    <div class="col-sm-10">                                    
                                        <input name="tipe-form" placeholder="Masukkan tipe form..." type="text" class="form-control" id="nama-tombol   ">
                                    </div>
                                </div>
                                <div class="form-group row">                               
                                    <label for="placeholder-form" class="col-sm-2 col-form-label">Placeholder Form</label>
                                    <div class="col-sm-10">                                    
                                        <input name="placeholder-form" placeholder="Masukkan placeholder form..." type="text" class="form-control" id="nama-tombol   ">
                                    </div>
                                </div>
                            <?php elseif($_POST["tipe-component"] == "Tabel"): ?>
                                <div class="form-group row">                               
                                    <label for="jumlah-kolom" class="col-sm-2 col-form-label">Jumlah Kolom</label>
                                    <div class="col-sm-8">                                    
                                        <input name="jumlah-kolom" placeholder="Masukkan jumlah kolom..." type="text" class="form-control" id="nama-tombol   ">
                                    </div>
                                    <div class="col-sm-2">                                    
                                        <button class="btn btn-warning btn-block" name="tetapkan-kolom" type="submit">Tetapkan</button>
                                    </div>
                                </div>                                
                            <?php elseif($_POST["tipe-component"] == "Tombol"): ?> 
                                <div class="form-group row">                               
                                    <label for="nama-tombol" class="col-sm-2 col-form-label">Nama Tombol</label>
                                    <div class="col-sm-10">                                    
                                        <input name="nama-tombol" placeholder="Masukkan nama tombol..." type="text" class="form-control" id="nama-tombol   ">
                                    </div>
                                </div>
                                <div class="form-group row">                               
                                    <label for="tipe-tombol" class="col-sm-2 col-form-label">Tipe Tombol</label>
                                    <div class="col-sm-10">                                    
                                        <input name="tipe-tombol" placeholder="Masukkan tipe tombol..." type="text" class="form-control" id="nama-tombol   ">
                                    </div>
                                </div>
                            <?php endif ?>                        
                        <?php endif ?>
                        <?php if(isset($_POST["tetapkan-kolom"])): ?>
                            <?php for($i=1;$i<=$_POST["jumlah-kolom"];$i++): ?>
                                <div class="form-group row">                               
                                    <label for="nama-kolom-<?= $i ?>" class="col-sm-2 col-form-label">Nama Kolom</label>
                                    <div class="col-sm-10">                                    
                                        <input name="nama-kolom-<?= $i ?>" placeholder="Masukkan nama kolom..." type="text" class="form-control" id="nama-tombol   ">
                                    </div>                                            
                                </div>
                            <?php endfor ?>
                        <?php endif ?>
                        <?php if(!isset($_POST["tetapkan-kolom"]) && !isset($_POST["tetapkan"])): ?>
                            <?php if($jumlahDataTerdeteksi > 0):?>
                                <?php if($tipeComponent == "Form"): ?>
                                    <div class="form-group row">                               
                                        <label for="label-form" class="col-sm-2 col-form-label">Label Form</label>
                                        <div class="col-sm-10">                                    
                                            <input value="<?= $cek[0]['label_form']?>" name="label-form" placeholder="Masukkan label form..." type="text" class="form-control" id="nama-tombol   ">
                                        </div>
                                    </div>
                                    <div class="form-group row">                               
                                        <label for="tipe-form" class="col-sm-2 col-form-label">Tipe Form</label>
                                        <div class="col-sm-10">                                    
                                            <input value="<?= $cek[0]['tipe_form']?>" name="tipe-form" placeholder="Masukkan tipe form..." type="text" class="form-control" id="nama-tombol   ">
                                        </div>
                                    </div>
                                    <div class="form-group row">                               
                                        <label for="placeholder-form" class="col-sm-2 col-form-label">Placeholder Form</label>
                                        <div class="col-sm-10">                                    
                                            <input value="<?= $cek[0]['placeholder_form']?>" name="placeholder-form" placeholder="Masukkan placeholder form..." type="text" class="form-control" id="nama-tombol   ">
                                        </div>
                                    </div>
                                <?php elseif($tipeComponent == "Tabel"): ?>                                    
                                    <?php for($i=1;$i<=$jumlahDataTerdeteksi;$i++): ?>
                                        <div class="form-group row">                               
                                            <label for="nama-kolom-<?= $i ?>" class="col-sm-2 col-form-label">Nama Kolom</label>
                                            <div class="col-sm-10">                                    
                                                <input value="<?= $cek[$i-1]["nama_kolom"]?>" name="nama-kolom-<?= $i ?>" placeholder="Masukkan nama kolom..." type="text" class="form-control" id="nama-tombol   ">
                                            </div>                                            
                                        </div>
                                    <?php endfor ?>
                                <?php elseif($tipeComponent == "Tombol"): ?>
                                    <div class="form-group row">                               
                                        <label for="nama-tombol" class="col-sm-2 col-form-label">Nama Tombol</label>
                                        <div class="col-sm-10">                                    
                                            <input value="<?= $cek[0]['nama_tombol'] ?>" name="nama-tombol" placeholder="Masukkan nama tombol..." type="text" class="form-control" id="nama-tombol   ">
                                        </div>
                                    </div>
                                    <div class="form-group row">                               
                                        <label for="tipe-tombol" class="col-sm-2 col-form-label">Tipe Tombol</label>
                                        <div class="col-sm-10">                                    
                                            <input value="<?= $cek[0]['jenis_tombol'] ?>" name="tipe-tombol" placeholder="Masukkan tipe tombol..." type="text" class="form-control" id="nama-tombol   ">
                                        </div>
                                    </div>                                
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>


                        <div class="row">
                            <button class="btn btn-success btn-block" name="submit" type="submit">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </dic>
        </div>
    </div>       
</div>

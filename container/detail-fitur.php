<?php
include('functions.php');

$id_fitur = $_GET['id'];
$fitur = detailFitur($id_fitur);

$sql = "SELECT * FROM `fitur` WHERE id_fitur = '$id_fitur'";
$nama_fitur = query($sql);

$idAktor = $nama_fitur[0]['id_aktor'];
$sql = "SELECT * FROM `aktor` WHERE id_aktor = '$idAktor'";
$aktor = query($sql);

$idSistem = $aktor[0]['id_sistem'];
$sql = "SELECT * FROM `sistem` WHERE id_sistem = '$idSistem'";
$sistem = query($sql);

if (isset($_POST["submit"])){
  // var_dump(explode(PHP_EOL,$_POST['scenario-normal']));die;
    if (tambahScenario($_POST, $id_fitur)){
        echo "
        <script>
            alert('Scenario berhasil disimpan!');
            document.location.href = 'component-view.php?id=$id_fitur'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Scenario gagal disimpan!');
        document.location.href = 'detail-fitur.php?id=$id_fitur'
        </script>";
    }

}
?>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Fitur : <?= $nama_fitur[0]['nama_fitur']?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Kelola Data Sistem</a></li>
                    <li class="breadcrumb-item"><a href="detail-aktor.php?id=<?=$idSistem?>">Detail Sistem : <?= $sistem[0]['nama_sistem']?></a></li>
                    <li class="breadcrumb-item"><a href="detail-aktor.php?id=<?=$idAktor?>">Detail Aktor : <?= $aktor[0]['nama_aktor']?></a></li>
                    <li class="breadcrumb-item active">Detail Fitur :  <?= $nama_fitur[0]['nama_fitur']?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->

 <!-- Main content -->
    <section class="content">


      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Use Case Scenario</h3>
            </div>
            <div class="card-body">
            <div class="form-group">
            <form action="" method="post">
                <label for="inputName">Nama Aktor</label>
                <input type="text" id="inputName" class="form-control" value="<?= $fitur[0]['nama_aktor']?>" disabled>
              </div>
              <div class="form-group">
                <label for="inputName">Nama Fitur</label>
                <input 
                <?php if($fitur[0]['nama_fitur'] != ''):?>
                  value='<?= $fitur[0]['nama_fitur'] ?>'
                <?php endif ?>
                
                
                name="nama-fitur" type="text" id="inputName" class="form-control" value="<?= $fitur[0]['nama_fitur']?>">
              </div>
              <div class="form-group">
                <label for="deskripsi-fitur">Deskripsi Fitur</label>
                <input
                <?php if($fitur[0]['deskripsi'] != ''):?>
                  value='<?= $fitur[0]['deskripsi'] ?>'
                <?php endif ?>
                
                 name="deskripsi-fitur" type="text" id="deskripsi-fitur" class="form-control">
              </div>
              <div class="form-group">
                <label for="kondisi-awal">Kondisi Awal</label>
                <input
                <?php if($fitur[0]['kondisi_awal'] != ''):?>
                  value='<?= $fitur[0]['kondisi_awal'] ?>'
                <?php endif ?>
                
                
                 name="kondisi-awal" type="text" id="kondisi-awal" class="form-control">
              </div>
              <div class="form-group">
                <label for="kondisi-akhir">Kondisi Akhir</label>
                <input
                <?php if($fitur[0]['kondisi_akhir'] != ''):?>
                  value='<?= $fitur[0]['kondisi_akhir'] ?>'
                <?php endif ?>
                
                
                 name="kondisi-akhir" type="text" id="kondisi-akhir" class="form-control">
              </div>
              <div class="form-group">
                <label for="scenario-normal">Scenario Normal</label>
<textarea id="scenario-normal" name="scenario-normal" class="form-control" rows="4"
placeholder="1. ________
2. ________
3. ________">
<?php if($fitur[0]['scenario_normal'] != ''):?>
<?= $fitur[0]['scenario_normal'] ?>
                <?php endif ?>

</textarea>
              </div>
              <div class="form-group">
                <label for="scenario-alternatif">Scenario Alternatif</label>
                <textarea id="scenario-alternatif"  name="scenario-alternatif" class="form-control" rows="4"
placeholder="1. ________
2. ________
3. ________">
<?php if($fitur[0]['scenario_alternatif'] != ''):?>
<?= $fitur[0]['scenario_alternatif'] ?>
                <?php endif ?>
                </textarea>
              </div>
              <div class="form-group">
                <label for="scenario-exception">Scenario Exception</label>
                <textarea id="scenario-exception" name="scenario-exception" class="form-control" rows="4"
placeholder="1. ________
2. ________
3. ________">
<?php if($fitur[0]['scenario_exception'] != ''):?>
<?= $fitur[0]['scenario_exception'] ?>
                <?php endif ?>
                </textarea>
              </div>

              <button type="submit" name="submit" class="btn btn-success btn-block">Simpan dan ke Component View</button>
            </div>
            </form>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
          <!-- /.card -->


        </div>
        <!-- <div class="row">
        <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Use Case Scenario</h3>
            </div>
            <div class="card-body">
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
                    <?php// for($i=1;$i<5;$i++): ?>
                        <tr role="row" class="<?php// if($i%2==0): echo "even"; else: echo "odd"; endif?>">
                            <td class="sorting_1"><?//= $i ?></td>
                            <td>Fitur <?//= $i ?></td>
                            <td>
                                <a href="ubah-fitur.php" class="btn btn-sm btn-warning">Ubah</a>
                                <a href="detail-fitur.php" class="btn btn-sm btn-info">Data Use Case Scenario</a>
                                <a href="hapus-fitur.php" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php// endfor ?>
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
    </!-->
      </div>
    </section>
    <!-- /.content -->
<!-- /.content -->

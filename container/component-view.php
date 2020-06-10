<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Component View : Fitur 1</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Component View</li>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Data Component View</h3>
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
                                            <?php for($i=1;$i<5;$i++): ?>
                                            <tr role="row"
                                                class="<?php if($i%2==0): echo "even"; else: echo "odd"; endif?>">
                                                <td class="sorting_1"><?= $i ?></td>
                                                <td>Component <?= $i ?></td>
                                                <td>Tabel</td>
                                                <td>
                                                    <a href="ubah-component.php" class="btn btn-sm btn-warning">Ubah</a>
                                                    <!-- Split button -->

                                                    <a href="hapus-fitur.php" class="btn btn-sm btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php endfor ?>
                                        </tbody>
                                        <tfoot>

                                            <tr>
                                                <th rowspan="1" colspan="1">No</th>
                                                <th rowspan="1" colspan="1">Nama Component</th>
                                                <th rowspan="1" colspan="1">Tipe</th>
                                                <th rowspan="1" colspan="1">Aksi</th>
                                            </tr>
                                        </tfoot>
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
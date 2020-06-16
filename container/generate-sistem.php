<?php

include('functions.php');

$sistem = query("SELECT * FROM sistem");

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Generate Sistem</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>                    
                    <li class="breadcrumb-item active">Generate Sistem</li>
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
                                    <?php 
                                    $i= 0;
                                    foreach($sistem as $sis): ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?=++$i?></td>
                                            <td><?= $sis['nama_sistem']?></td>                                            
                                            <td>      
                                                <?php if(cekPernahGenerate($sis['id_sistem'])): ?>   
                                                    <a href="#" class="btn btn-sm btn-warning">Generate Ulang</a>
                                                <?php else: ?>
                                                    <a href="#" class="btn btn-sm btn-success">Generate</a>
                                                <?php endif ?>                                                                                       
                                            </td>                                           
                                        </tr>   
                                    <?php endforeach ?>
                                        
                                        <!-- <tr role="row" class="even">
                                            <td class="sorting_1">2</td>
                                            <td>Sistem Akademik Unair 2</td>
                                            <td>                                                
                                                <a href="#" class="btn btn-sm btn-warning">Generate Ulang</a>
                                            </td>                                           
                                        </tr>                                                                     -->
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
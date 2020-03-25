<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Fitur 2 Sistem</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Fitur 2 Sistem</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
	
	<!-- <div class="row">
		<div class="col-md-3 col-vlg-3 col-sm-6">
			<div class="tiles green m-b-10">
              <div class="tiles-body">
			  <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title text-black">Overall Visitors </div>
			         <div class="widget-stats">
                      <div class="wrapper transparent">
                     <!--  <?php $ov=mysqli_query($con,"select * from usercheck");
					  $num=mysqli_num_rows($ov);
					  ?>-->
						<!--<span class="item-title">Overall Visitors</span> <span class="item-count animate-number semi-bold" <!-- data-value="<?php echo $num;?>" --> <!--data-animation-duration="700">0</span> 
					  <!--</div>
                    </div> 
					<div class="widget-stats ">
                      <div class="wrapper last">
                        <!-- <?php
					   $tdate=date("Y/m/d");

					    $tv1=mysqli_query($con,"select * from usercheck where logindate='$tdate'");
					  $num11=mysqli_num_rows($tv1);
					  ?> -->



						<!--<span class="item-title">Today</span> <span class="item-count animate-number semi-bold" <!--data-value="<?php echo $num11;?>" --> <!--data-animation-duration="700">0</span> <?php

									?>
					 <!--</div>
                    </div> -->
					
	
	<!-- //PHP nya kuhilangin tanda ? -->

     <div class="row">
        <!--<div class="col-12"> -->
		<div class="col-md-3 col-vlg-3 col-sm-6">
            <dic class="card">
                <div class="card-header">
                    <h3 class="card-title">Skenario 1</h3>
                </div>

               <div class="card-body">
                    <form action="">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-10 col-form-label">Ini adalah skenario 1 dari Fitur 2</label>
                            <!--<div class="col-sm-10">
                                <input placeholder="Masukkan nama sistem..." type="text" class="form-control" id="inputPassword">
                            </div>-->
                        </div>

                        <div class="row">
                            <button class="btn btn-success btn-block" type="submit">Detail</button>
                        </div>
                    </form>
                </div>
            </dic> 
        </div>
		
		<div class="col-md-3 col-vlg-3 col-sm-6">
            <dic class="card">
                <div class="card-header">
                    <h3 class="card-title">Skenario 2</h3>
                </div>

               <div class="card-body">
                    <form action="">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-10 col-form-label">Ini adalah skenario 2 dari Fitur 2</label>
                            <!--<div class="col-sm-10">
                                <input placeholder="Masukkan nama sistem..." type="text" class="form-control" id="inputPassword">
                            </div>-->
                        </div>

                        <div class="row">
                            <button class="btn btn-success btn-block" type="submit">Detail</button>
                        </div>
                    </form>
                </div>
            </dic> 
        </div>
		<div class="col-md-3 col-vlg-3 col-sm-6">
            <dic class="card">
                <div class="card-header">
                    <h3 class="card-title">Skenario 3</h3>
                </div>

               <div class="card-body">
                    <form action="">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-10 col-form-label">Ini adalah skenario 3 dari Fitur 2</label>
                            <!--<div class="col-sm-10">
                                <input placeholder="Masukkan nama sistem..." type="text" class="form-control" id="inputPassword">
                            </div>-->
                        </div>

                        <div class="row">
                            <button class="btn btn-success btn-block" type="submit">Detail</button>
                        </div>
                    </form>
                </div>
            </dic> 
        </div>
    </div>
        <!--<div class="row">-->
        <div class="col-12">
    
    
            <!--<div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Data Sistem</h3>
                </div>-->
                <!-- /.card-header -->
                <!--<div class="card-body">
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
                                    <?php for($i=1;$i<19;$i++): ?>
                                        <tr role="row" class="<?php if($i%2==0): echo "even"; else: echo "odd"; endif?>">
                                            <td class="sorting_1"><?= $i ?></td>
                                            <td>Sistem Akademik Unair</td>
                                            <td>
                                                <a href="ubah-sistem.php" class="btn btn-sm btn-warning">Ubah</a>
                                                <a href="detail-sistem.php" class="btn btn-sm btn-info">Data Aktor</a>
                                                <a href="hapus-sistem.php" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>                                           
                                        </tr>            
                                    <?php endfor ?>                            
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
<!--<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Fitur 2 Sistem</h1>
            </div><!-- /.col -->
            <!--<div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Fitur 2 Sistem</li>
                </ol>
            </div><!-- /.col -->
        <!--</div><!-- /.row -->
    <!--</div><!-- /.container-fluid -->
<!--</div>
<!-- /.content-header -->

<!-- Main content -->

<!--<div class="content">
    <div class="container-fluid">
    
       <div class="row">
        <div class="col-12">
	
    
            <!--<div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Data Sistem</h3>
                </div>
                <!-- /.card-header -->
                <!--<div class="card-body">
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
                                    
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>Sistem Akademik Unair 1</td>
                                            <td>                                                
                                                <a href="#" class="btn btn-sm btn-success">Generate</a>
                                            </td>                                           
                                        </tr>   
                                        <tr role="row" class="even">
                                            <td class="sorting_1">2</td>
                                            <td>Sistem Akademik Unair 2</td>
                                            <td>                                                
                                                <a href="#" class="btn btn-sm btn-warning">Generate Ulang</a>
                                            </td>                                           
                                        </tr>                                                                    
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
<html>
      <head>

           <title>Unduh Dokumen</title>

           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

      </head>

      <body>

           <div class="container">

                <br/>

                <h1>Unduh Dokumen</h1>

                <form name="zips" method="post">

                     <table class="table table-bordered">

                          <tr>

                               <th>*</th>

                               <th>Dokumen</th>

                          </tr>
                          <?php
                          $check = scandir("dokumen");
                          for ($a = 2;$a < count($check);$a++){?>
                            <tr>

                                 <td><input type="checkbox" name="files[]" value="<?php echo $check[$a]?>" /></td>

                                 <td><?php echo $check[$a]?></td>

                            </tr>
                          <?php
                          }
                           ?>

                          <tr>

                               <td colspan="2"><input type="submit" name="submit" value="Unduh ZIP" />&nbsp;

                               <input type="reset" name="reset" value="Reset" /></td>

                          </tr>

                     </table>

                </form>

           </div>

      </body>

 </html>

 <?php
 $error = "";
 $post = $_POST;
 if (isset($post['submit'])){
   $file_folder = "dokumen/";
   if(extension_loaded('zip')) {   //memeriksa ekstensi zip
        if(isset($post['files']) and count($post['files']) > 0) {   //memeriksa file yang dipilih

                   $zip = new ZipArchive(); // Load zip library

                   $zip_name = time().".zip";  // nama Zip

                   if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE) {   //Membuka file zip untuk memuat file

                        $error .= "* Maaf Download ZIP gagal";

                   }
                   foreach($post['files'] as $file){

                                    $zip->addFile($file_folder.$file); // Menambahkan files ke zip

                               }

                               $zip->close();

                               if(file_exists($zip_name))  {  // Unduh Zip

                                    header('Content-type: application/zip');

                                    header('Content-Disposition: attachment; filename="'.$zip_name.'"');

                                    readfile($zip_name);

                                    unlink($zip_name);

                               }

                          }else {

                               $error .= "* Tidak ada file yang di pilih";

                          }

                     } else {

                          $error .= "* Zip ekstensi tidak ada";

                     }

                }

  ?>
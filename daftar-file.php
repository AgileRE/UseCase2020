<?php

 $error = "";

 if(isset($_POST['submit']))  {

      $post = $_POST;

      $file_folder = "files/"; // folder untuk load file

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
<html>

      <head>

           <title>Cara Membuat File Zip Download Dengan PHP</title>

           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

      </head>

      <body>

           <div class="container">

                <br />

                <h1>Files</h1>

                <form name="zips" method="post">

                     <?php echo $error; ?>

                     <table class="table table-bordered">

                          <tr>

                               <th>*</th>

                               <th>Gambar</th>

                          </tr>

                          <tr>

                               <td><input type="checkbox" name="files[]" value="image1.jpg" /></td>

                               <td>Gambar 1</td>

                          </tr>

                          <tr>

                               <td><input type="checkbox" name="files[]" value="image2.jpg" /></td>

                               <td>Gambar 2</td>

                          </tr>

                          <tr>

                               <td><input type="checkbox" name="files[]" value="image3.jpg" /></td>

                               <td>Gambar 3</td>

                          </tr>

                          <tr>

                               <td><input type="checkbox" name="files[]" value="image4.jpg" /></td>

                               <td>Gambar 4</td>

                          </tr>

                          <tr>

                               <td colspan="2"><input type="submit" name="submit" value="Download ZIP" />&nbsp;

                               <input type="reset" name="reset" value="Reset" /></td>

                          </tr>

                     </table>

                </form>

           </div>

      </body>

 </html>

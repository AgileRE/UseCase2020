<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "usecase_psi");

function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}

function listFitur($id_aktor){
    global $conn;
    $sql = "SELECT * FROM `fitur` WHERE id_aktor = '$id_aktor'";

    return query($sql);
}

function detailFitur($id_fitur){
    global $conn;
    $sql = "SELECT * FROM `fitur` INNER JOIN aktor ON fitur.id_aktor = aktor.id_aktor WHERE id_fitur = '$id_fitur'";
// echo $sql;die;
    return query($sql);
}


function listAktor($id_sistem){
    global $conn;
    $sql = "SELECT * FROM `aktor` WHERE id_sistem = '$id_sistem'";

    return query($sql);
}

function listSistem(){
    global $conn;
    $sql = "SELECT * FROM `sistem`";

    return query($sql);
}

function tambahScenario($data, $id_fitur){
    global $conn;

    $deskripsiFitur = htmlspecialchars(trim($data["deskripsi-fitur"]));  
    $kondisiAwal = htmlspecialchars(trim($data["kondisi-awal"]));  
    $kondisiAkhir = htmlspecialchars(trim($data["kondisi-akhir"]));  
    $scenarioNormal = htmlspecialchars(trim($data["scenario-normal"]));  
    $scenarioAlternatif = htmlspecialchars(trim($data["scenario-alternatif"]));  
    $scenarioException = htmlspecialchars(trim($data["scenario-exception"]));  
    
    $arraySN = explode(PHP_EOL,trim($scenarioNormal));
    $arraySA = explode(PHP_EOL,trim($scenarioAlternatif));
    $arraySE = explode(PHP_EOL,trim($scenarioException));

    //tiap baris di textarea scenarionormal divek apakah punya @halaman_view
    foreach ($arraySN as $key => $value) {
      $pecah = explode(" ",$value);

      foreach ($pecah as $key => $value2) {
        if (strpos($value2, '@') !== false) {
          //masukkan @halaman_view ke tabel 'view'         

          $sql = "SELECT * FROM `view` WHERE id_fitur = '$id_fitur'";
          $jumlahRecord = count(query($sql));

          if ($jumlahRecord > 0){
            $sql = "UPDATE `view` SET nama_view = '$value2' WHERE id_fitur = '$id_fitur'";
            mysqli_query($conn, $sql);

            $sql = "SELECT * FROM `view` WHERE id_fitur ='$id_fitur'";                        
            $id_view = query($sql)[0]['id_view'];
            echo "Update " .$value2." ke tabel view";      
            echo "<br>";
            
          } else {
            $sql = "INSERT INTO `view` (id_fitur, nama_view) VALUES ('$id_fitur', '$value2')";
            mysqli_query($conn, $sql);
            echo "Masukkan " .$value2." ke tabel view";      
            echo "<br>";

            $id_view = mysqli_insert_id($conn);
          }
          
        }    
      }
            
    }    

    foreach ($arraySN as $key => $value) {
      $pecah = explode(" ",$value);

      foreach ($pecah as $key2 => $value2) {
        # code...
        if (strpos($value2, '#') !== false) {
          //ambil id @view yang barusan dimasukkan
          //masukkan id view dan nama_component ke tabel component_view   
          $sql = "SELECT * FROM `component_view` WHERE nama_component = '$value2'";
          $jumlahRecord = count(query($sql));
          
          if ($jumlahRecord == 0){
            echo "Masukkan ".$value2." ke tabel component view";      
            echo "<br>";

            $sql = "INSERT INTO `component_view` (id_view, nama_component) VALUES ('$id_view', '$value2')";
            mysqli_query($conn, $sql);
          }
          
        }     
      }
  
    }
    // die; // sampai sini dulu yaa

    // ----> minta masukkan title untuk view tsb
    // for setiap component_view pada view tsb (select pake id view), isi jenis_component di tabel component_view
    //kalau milih :
    // - tabel pilih berapa kolom, dan tiap kolom namanya apa aja
    // - form typenya apa (text file dsb)
    // - tombol tulisannya apa

    //kalau datanya belum ada tinggal tambah
    // kalau daranya sudah ada di tambah lagi aja gapapa
    //jadi dicek dulu apakah sudah ada view dengan id_fitur yang sedang ingin ditambahkan
    //ingat 1 fitur, cuma ada 1 view


    //di component view dashboard bisa hapus dan ubah jenis component
    // die;
  
    $query = "UPDATE `fitur` SET deskripsi = '$deskripsiFitur', kondisi_awal = '$kondisiAwal', kondisi_akhir = '$kondisiAkhir', scenario_normal = '$scenarioNormal', scenario_alternatif = '$scenarioAlternatif', scenario_exception = '$scenarioException' WHERE id_fitur = '$id_fitur'";

    
    mysqli_query($conn, $query);
  
    return mysqli_affected_rows($conn);
  }

function tambahSistem($data){
  global $conn;

  $namaSistem = htmlspecialchars($data["nama-sistem"]);  

  $query = "INSERT INTO sistem
              VALUES ('','$namaSistem')
              ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function tambahAktor($data, $id_sistem){
    global $conn;
  
    $namaAktor = htmlspecialchars($data["nama-aktor"]);  
  
    $query = "INSERT INTO aktor
                VALUES ('','$namaAktor', '$id_sistem')
                ";
    mysqli_query($conn, $query);
  
    return mysqli_affected_rows($conn);
  }

  function tambahFitur($data, $id_aktor){
    global $conn;
  
    $namaFitur = htmlspecialchars($data["nama-fitur"]);  
  
    $query = "INSERT INTO `fitur` (nama_fitur, id_aktor)
    VALUES ('$namaFitur', $id_aktor)";

    // echo $query;die;
    mysqli_query($conn, $query);
  
    return mysqli_affected_rows($conn);
  }

function upload(){
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload

  if ($error === 4){
    echo "<script>
            alert('pilih gambar terlebih dahulu!')
          </script>

    ";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.',$namaFile);
  // dimas.jpg = ['dimas']['jpg']
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
    echo "<script>
            alert('YANG KAMU UPLOAD BUKAN GAMBAR TAUK! :)')
          </script>

    ";
    return false;
  }

  // cek ukuran gambar terlalu besar
  if ($ukuranFile > 1000000){
    echo "<script>
            alert('ukuran file gambar terlalu besar!')
          </script>

    ";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  // var_dump($namaFileBaru); die;
  move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

  return $namaFileBaru;
}

function hapus($id){
  global $conn;
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function ubah($data){
  global $conn;
  $id = $data["id"];
  $nrp = htmlspecialchars($data["nrp"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);

  $gambarLama = htmlspecialchars($data["gambarLama"]);

  if ($_FILES['gambar']['error'] === 4){
    $gambar = $gambarLama;
    // var_dump($gambar); die;
  } else {
    $gambar = upload();
    // var_dump($gambar); die;
  }
  // $gambar = htmlspecialchars($data["gambar"]);

  $query = "UPDATE mahasiswa SET
              nrp = '$nrp',
              nama = '$nama',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
              WHERE id = $id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cari($keyword){
  $query = "SELECT * FROM mahasiswa
            WHERE
            nama LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
  return query($query);
}

function registrasi($data){
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)){
    echo "<script>
            alert('username sudah terdaftar!')
          </script>

    ";
    return false;
  }

  // cek konfirmasi password
  if ( $password !== $password2){
    echo "<script>
            alert('password tidak sama!')
          </script>

    ";
    return false;
  }
  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  // var_dump($password);

  // tambahkan userbaru ke database
  mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

  return mysqli_affected_rows($conn);

}
?>

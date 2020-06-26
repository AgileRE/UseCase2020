<!-- <h1>USE CASE (incomplete)</h1>
Use Case merupakan sebuah teknik yang digunakan dalam pengembangan sebuah software atau sistem informasi untuk menangkap kebutuhan fungsional dari sistem yang bersangkutan. Use Case menjelaskan interaksi yang terjadi antara 'aktor' dengan sistem yang ada. 
<p><p>Project ini memiliki konsep dimana user dapat mengubah Use Case beserta Use Case Scenarionya menjadi UI.
Kami menyediakan beberapa template, dimana nantinya User dapat mengisi form untuk fitur apa saja yang akan ada di UI, berdasarkan Use Case Scenarionya. UI hasil inputan User ditampilkan dalam bentuk HTML. 
<p>Aplikasi ini berbasis website dengan bahasa pemograman PHP, dan database SQLite.
Berdasarkan penjelasan sebelumnya, cara untuk menggunakan use case adalah sebagai berikut:
<p>1. User membuka aplikasi, lalu mengisi form yang akan memuat informasi (nama sistem, aktor, fitur, use case scenario)untuk sistem. 
<p>2. User juga dapat  mengisi data tambahan untuk melengkapi data-data yang tidak diperoleh dari data use case. 
<p>3. Dan sistem akan menambahkan seluruh informasi yang didapat kedalam database
<p>4. Setelah data berhasil masuk ke database, sistem meng-generate informasi tersebut menjadi HTML. User juga dapat melihat preview hasil generate template UI dalam bentuk html
<p>5. User dapat mengunduh hasil generate dalam bentuk ZIP.
<p>Petujuk tambahan dari Use Case, adalah:
<p>1.Multi User, merupakan fitur tambahan yang dapat upload dari metadata power designer -->

# Tentang Aplikasi UseCase2020
Aplikasi UseCase2020 merupakan aplikasi yang dapat digunakan untuk men-*generate* data use case menjadi sebuah *User Interface* atau UI yang berbasis HTML dan CSS. Aplikasi ini berbasis web menggunakan Bahasa Pemrograman PHP, Bootstrap 4, Template Dashboard AdminLTE3, dan database MySQl.

# Cara Kerja Aplikasi
Pada aplikasi ini anda akan diminta untuk memasukkan data-data usecase. Data-data tersebut meliputi :
* Nama Sistem
* Nama Aktor
* Nama Fitur
* Use Case Scenario Fitur

Adapun data-data tambahan yang bisa dikutomisasi untuk hasil *generate* UI yakni :
* Data Title
* Data Component View

Terdapat 2 jenis konsep yang harus dipahami :
1. View
    >View atau halaman view ini merupakan representasi UI dari tiap fitur. Pada sebuah fitur akan terdapat satu view dan bisa berisi Component View sebanyak-banyaknya. 

    >Penulisan view ditandai dengan tanda @ lalu diikuti dengan nama view. Nama view tidak boleh menggunakan spasi. Apabila ingin menggunakan spasi, anda bisa menggantinya dengan tanda _ (underscore).

    >Contoh penulisan : @halaman_login dan @fitur_tambah_mahasiswa

2. Component View
    >Component View merupakan representasi komponen-komponen yang bisa diletakkan pada sebuah View. Penulisannya dengan cara menggunakan tanda # lalu diikuti dengan dengan jenis component view , setelah itu nama component.

    >#jeniscomponent_namacomponent

    >Pada aplikasi ini disediakan beberapa jenis Component View yang sering digunakan, yaitu :
 
        Jenis Component | Format Penulisan
        ------------ | -------------
        Form | #form_nama_component
        Tabel | #tabel_nama_component
        Tombol | #tombol_nama_component

    Sistem akan meng-*generate* UI dengan hasil akhir berupa file berekstensi .zip. Di dalamnya terdapat folder :

    >hasil/id_sistem/

    Di dalam folder tersebut akan terdapat folder lagi sesuai nama aktor dan sejumlah aktor yang dimiliki oleh sistem tersebut. Jadi apabila sistem kita memiliki 2 aktor yakni *Aktor* 1 dan *Aktor 2* maka struktur folder akan terlihat seperti ini :

    >hasil/id_sistem/Aktor 1
    >hasil/id_sistem/Aktor 2

    Di dalam folder tiap aktor, akan berisi file-file *User Interface* hasil generate dengan format html. Sehingga kurang lebih akan tampak seperti ini :
    
    >hasil/id_sistem/Aktor 1/fitur1.html
    >hasil/id_sistem/Aktor 1/fitur2.html
    >hasil/id_sistem/Aktor 1/fitur3.html
    >hasil/id_sistem/Aktor 1/fiturN.html

    >hasil/id_sistem/Aktor 2/fitur1.html
    >hasil/id_sistem/Aktor 2/fitur2.html
    >hasil/id_sistem/Aktor 2/fitur3.html
    >hasil/id_sistem/Aktor 2/fiturN.html

    File-fila hasil generate tersebut akan disimpan pada folder *UseCase2020/hasil/* sehingga anda bisa mengaksesnya melalui link http://localhost/UseCase2020/hasil/. Sedangkan untuk file .zip akan disimpan di folder *UseCase2020/download/* sehingga anda bisa mengaksesnya melalui link http://localhost/UseCase2020/download/.

# Cara Penginstalan
Berikut ini adalah langkah-langkah untuk menginstal Aplikasi UseCase 2020 :

1. Download dan install XAMPP (https://www.apachefriends.org/index.html)
2. Clone atau download secara manual aplikasi UseCase 2020 dari repository GitHub
3. Letakkan folder aplikasi di dalam folder XAMPP/htdocs/
4. Nyalakan Server Apache dan MySQL melalui aplikasi XAMPP
5. Pada browser lakukan import database dengan cara buka http://localhost/phpmyadmin
6. Buat sebuah database baru bernama *usecase_psi*
7. Import file sql *usecase_psi.sql* yang terletak di folder *UseCase2020*
8. Akses aplikasi melalui http://localhost/UseCase2020/

Apabila tidak ada kesalahan maka aplikasi akan tampil seperti pada gambar di bawah ini
![Image of Yaktocat](https://octodex.github.com/images/yaktocat.png)


# Cara Penggunaan
Tutorial ini akan dilakukan mulai tahap dari awal pembuatan sistem hingga berhasil men-*generate* UI. Pastikan sebelum mengikuti tutorial ini anda sudah mengistal aplikasi dengan benar. Jika belum, silahkan ikuti "Cara Penginstalan" sebelumnya.

Berikut ini cara penggunaan Aplikasi UseCase 2020 :
1. Buat sistem dengan memasukkan nama sistem
2. Buat aktor pada sistem yang telah dibuat, ingat bahwa satu sistem dapat terdiri dari beberapa aktor
3. Untuk setiap aktor kita bisa membuat fitur sesuai keinginan
4. Lengkapi Use Case Scenario sesuai dengan konsep dasar yang telah dijelaskan di bagian "Cara Kerja Aplikasi" lalu tekan tombol *Simpan dan Ke Component View*
5. Maka tampil halaman Component View dan sudah otomatis mengambil component-component yang kita sebutkan pada Use Case Scenario.
6. Lengkapi atau ubah Component View klik Ubah
7. Isikan pengaturan sesuai dengan yang anda inginkan
8. Setelah melengkapi semuanya saatnya untuk mengenerate sistem, akses dengan klik fitur Generate Sistem pada sidebar sebelah kiri
9. Lalu klik Generate pada sistem yang diinginkan
10. Download file .zip dengan klik fitur Hasil Generate dan download pada sistem yang diinginkan



# Anggota Kelompok
* Edwardus Bagas N. 		    0811711633003
* Dimas Agung P. 		        0811711633006
* Ainun Zainiyah 		        0811711633015
* Rana Amira 			        0811711633021
* Arya Surya S. 			    0811711633026
* Aini Latifah			        0811711633027
* Chrisatyo Arian S. 		    0811711633032
* Avril Audi H. 			    0811711633034
* M. Fikri Ksatria D 		    0811711633040
* M. Arif Yudhistira M. 	    0811711633046
* Maseta Rahma 		            0811711633047
* Dimas Satria B. P. 		    0811711633048
* Adriana Artamevia D. 	        0811711633052
* Naeson Soeterio U. 		    0811711633056

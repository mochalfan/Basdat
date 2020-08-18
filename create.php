<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nim=input($_POST["nim"]);
        $nama_mahasiswa=input($_POST["nama_mahasiswa"]);
        $jurusan=input($_POST["jurusan"]);

        //Query input menginput data kedalam tabel mahasiswa
        $sql="insert into mahasiswa (nim,nama_mahasiswa,jurusan) values
		('$nim','$nama_mahasiswa','$jurusan')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <br>
    <br>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>NIM:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan NIM" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Masukan Nama" required/>

        </div>
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required/>

        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="index.php" class="btn btn-primary" role="button">Batal</a>
    </form>
</div>
</body>
</html>
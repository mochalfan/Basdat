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

        $kode_matakuliah=input($_POST["kode_matakuliah"]);
        $nama_matakuliah=input($_POST["nama_matakuliah"]);
        $sks=input($_POST["sks"]);

        //Query input menginput data kedalam tabel matakuliah
        $sql="insert into matakuliah (kode_matakuliah,nama_matakuliah,sks) values
		('$kode_matakuliah','$nama_matakuliah','$sks')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:matakuliah.php");
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
            <label>Kode Matakuliah:</label>
            <input type="text" name="kode_matakuliah" class="form-control" placeholder="Masukan Kode Matakuliah" required />

        </div>
        <div class="form-group">
            <label>Nama Matakuliah:</label>
            <input type="text" name="nama_matakuliah" class="form-control" placeholder="Masukan Nama Matakuliah" required/>

        </div>
        <div class="form-group">
            <label>SKS:</label>
            <input type="text" name="sks" class="form-control" placeholder="Masukan SKS" required/>

        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="matakuliah.php" class="btn btn-primary" role="button">Batal</a>
    </form>
</div>
</body>
</html>
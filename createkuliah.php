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
        $kode_matakuliah=input($_POST["kode_matakuliah"]);
        $nip=input($_POST["nip"]);
        $nilai=input($_POST["nilai"]);

        //Query input menginput data kedalam tabel perkuliahan
        $sql="insert into perkuliahan (nim,kode_matakuliah,nip,nilai) values
		('$nim','$kode_matakuliah','$nip','$nilai')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:perkuliahan.php");
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
            <label>Kode NIM:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan NIM" required />

        </div>
        <div class="form-group">
            <label>Nama Kode Matakuliah:</label>
            <input type="text" name="kode_matakuliah" class="form-control" placeholder="Masukan Kode Matakuliah" required/>

        </div>
        <div class="form-group">
            <label>NIP:</label>
            <input type="text" name="nip" class="form-control" placeholder="Masukan NIP" required/>

        </div>
        <div class="form-group">
            <label>Nilai:</label>
            <input type="text" name="nilai" class="form-control" placeholder="Masukan Nilai" required/>

        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="perkuliahan.php" class="btn btn-primary" role="button">Batal</a>
    </form>
</div>
</body>
</html>
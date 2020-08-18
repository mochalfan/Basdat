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

        $nip=input($_POST["nip"]);
        $nama_dosen=input($_POST["nama_dosen"]);
        $matakuliah=input($_POST["matakuliah"]);

        //Query input menginput data kedalam tabel dosen
        $sql="insert into dosen (nip,nama_dosen,matakuliah) values
		('$nip','$nama_dosen','$matakuliah')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:dosen.php");
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
            <label>NIP:</label>
            <input type="text" name="nip" class="form-control" placeholder="Masukan NIP" required />

        </div>
        <div class="form-group">
            <label>Dosen:</label>
            <input type="text" name="nama_dosen" class="form-control" placeholder="Masukan Nama" required/>

        </div>
        <div class="form-group">
            <label>Matakuliah:</label>
            <input type="text" name="matakuliah" class="form-control" placeholder="Masukan Matakuliah" required/>

        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="dosen.php" class="btn btn-primary" role="button">Batal</a>
    </form>
</div>
</body>
</html>
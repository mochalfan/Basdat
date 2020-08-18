<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Matakuliah</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama kode_matakuliah
    if (isset($_GET['kode_matakuliah'])) {
        $kode_matakuliah=input($_GET["kode_matakuliah"]);

        $sql="select * from matakuliah where kode_matakuliah=$kode_matakuliah";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $kode_matakuliah=htmlspecialchars($_POST["kode_matakuliah"]);
        $nama_matakuliah=input($_POST["nama_matakuliah"]);
        $sks=input($_POST["sks"]);

        //Query update data pada tabel Matakuliah
        $sql="update matakuliah set
            nama_matakuliah='$nama_matakuliah',
			sks='$sks'
			where kode_matakuliah=$kode_matakuliah";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:matakuliah.php");
        }
        else {
            
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <br>
    <br>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama_matakuliah" class="form-control" placeholder="Masukan Nama Matakuliah" required/>

        </div>
        
        <div class="form-group">
            <label>SKS:</label>
            <input type="text" name="sks" class="form-control" placeholder="Masukan SKS" required/>

        </div>

        <input type="hidden" name="kode_matakuliah" value="<?php echo $data['kode_matakuliah']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="matakuliah.php" class="btn btn-primary" role="button">Batal</a>

    </form>
</div>
</body>
</html>
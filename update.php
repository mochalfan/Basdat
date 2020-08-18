<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Mahasiswa</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nim
    if (isset($_GET['nim'])) {
        $nim=input($_GET["nim"]);

        $sql="select * from mahasiswa where nim=$nim";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nim=htmlspecialchars($_POST["nim"]);
        $nama_mahasiswa=input($_POST["nama_mahasiswa"]);
        $jurusan=input($_POST["jurusan"]);

        //Query update data pada tabel Mahasiswa
        $sql="update mahasiswa set
			nama_mahasiswa='$nama_mahasiswa',
			jurusan='$jurusan'
			where nim=$nim";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
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
            <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Masukan Nama" required/>

        </div>
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required/>

        </div>

        <input type="hidden" name="nim" value="<?php echo $data['nim']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="index.php" class="btn btn-primary" role="button">Batal</a>

    </form>
</div>
</body>
</html>
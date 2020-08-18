<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Perkuliahan</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id
    if (isset($_GET['id'])) {
        $id=input($_GET["id"]);

        $sql="select * from perkuliahan where id=$id";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id=htmlspecialchars($_POST["id"]);
        $kode_matakuliah=input($_POST["kode_matakuliah"]);
        $nilai=input($_POST["nilai"]);

        //Query update data pada tabel perkuliahan
        $sql="update perkuliahan set
            kode_matakuliah='$kode_matakuliah',
            nilai='$nilai'
			where id=$id";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:perkuliahan.php");
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
            <label>Kode Matakuliah:</label>
            <input type="text" name="kode_matakuliah" class="form-control" placeholder="Masukan Kode Matakuliah" required/>

        </div>
        <div class="form-group">
            <label>Nilai:</label>
            <input type="text" name="nilai" class="form-control" placeholder="Masukan Nilai" required/>

        </div>
        

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="perkuliahan.php" class="btn btn-primary" role="button">Batal</a>

    </form>
</div>
</body>
</html>
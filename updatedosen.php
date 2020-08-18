<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Dosen</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nip
    if (isset($_GET['nip'])) {
        $nip=input($_GET["nip"]);

        $sql="select * from dosen where nip=$nip";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nip=htmlspecialchars($_POST["nip"]);
        $nama_dosen=input($_POST["nama_dosen"]);
        $matakuliah=input($_POST["matakuliah"]);

        //Query update data pada tabel Dosen
        $sql="update dosen set
            nama_dosen='$nama_dosen',
			matakuliah='$matakuliah'
			where nip=$nip";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:dosen.php");
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
            <input type="text" name="nama_dosen" class="form-control" placeholder="Masukan Nama" required/>

        </div>
        <div class="form-group">
            <label>Matakuliah:</label>
            <input type="text" name="matakuliah" class="form-control" placeholder="Masukan Matakuliah" required/>

        </div>

        <input type="hidden" name="nip" value="<?php echo $data['nip']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="dosen.php" class="btn btn-primary" role="button">Batal</a>

    </form>
</div>
</body>
</html>
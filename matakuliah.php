<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
  <span class="navbar-brand mb-0 h1">Universitas Komputer Indonesia</span>
</nav>
</div>
<div class="container">
    <br>
    <h4>Tabel Data Matakuliah</h4>
    <a href="menu.php" class="btn btn-primary" role="button">Kembali</a>
    <a href="creatematkul.php" class="btn btn-primary" role="button">Tambah Data</a>    
    <br>
<?php

    include "koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama kode_matakuliah
    if (isset($_GET['kode_matakuliah'])) {
        $kode_matakuliah=htmlspecialchars($_GET["kode_matakuliah"]);

        $sql="delete from matakuliah where kode_matakuliah='$kode_matakuliah' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:matakuliah.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>
    
    
    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Matakuliah</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from matakuliah order by kode_matakuliah asc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["kode_matakuliah"]; ?></td>
                <td><?php echo $data["nama_matakuliah"];   ?></td>
                <td><?php echo $data["sks"];   ?></td>
                <td>
                    <a href="updatematkul.php?kode_matakuliah=<?php echo htmlspecialchars($data['kode_matakuliah']); ?>" class="btn btn-warning" role="button">Edit</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?kode_matakuliah=<?php echo $data['kode_matakuliah']; ?>" class="btn btn-danger" role="button">Hapus</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <hr color='black'>
    
 
</div>
</body>
</html>
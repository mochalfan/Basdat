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
    <h4>Tabel Data Dosen</h4>
    <a href="menu.php" class="btn btn-primary" role="button">Kembali</a>

    <a href="createdosen.php" class="btn btn-primary" role="button">Tambah Data</a>    
    <br>
<?php

    include "koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama nip
    if (isset($_GET['nip'])) {
        $nip=htmlspecialchars($_GET["nip"]);

        $sql="delete from dosen where nip='$nip' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:dosen.php");

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
            <th>NIP</th>
            <th>Nama Dosen</th>
            <th>Matakuliah</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from dosen order by nip asc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nip"]; ?></td>
                <td><?php echo $data["nama_dosen"];   ?></td>
                <td><?php echo $data["matakuliah"];   ?></td>
                <td>
                    <a href="updatedosen.php?nip=<?php echo htmlspecialchars($data['nip']); ?>" class="btn btn-warning" role="button">Edit</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?nip=<?php echo $data['nip']; ?>" class="btn btn-danger" role="button">Hapus</a>
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
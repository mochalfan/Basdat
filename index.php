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
    <h4>Tabel Data Mahasiswa</h4>
    <a href="menu.php" class="btn btn-primary" role="button">Kembali</a>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    <br>
<?php

    include "koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama nim
    if (isset($_GET['nim'])) {
        $nim=htmlspecialchars($_GET["nim"]);

        $sql="delete from mahasiswa where nim='$nim' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

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
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Jurusan</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from mahasiswa order by nim asc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nim"]; ?></td>
                <td><?php echo $data["nama_mahasiswa"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td>
                    <a href="update.php?nim=<?php echo htmlspecialchars($data['nim']); ?>" class="btn btn-warning" role="button">Edit</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?nim=<?php echo $data['nim']; ?>" class="btn btn-danger" role="button">Hapus</a>
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
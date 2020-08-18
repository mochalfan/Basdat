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
    <h4>Tabel Data Perkuliahan</h4> 
    <a href="menu.php" class="btn btn-primary" role="button">Kembali</a>
    <a href="createkuliah.php" class="btn btn-primary" role="button">Tambah Data</a>   
    <br>
<?php

    include "koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama id
    if (isset($_GET['id'])) {
        $id=htmlspecialchars($_GET["id"]);

        $sql="delete from perkuliahan where id='$id' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tnimak
            if ($hasil) {
                header("Location:perkuliahan.php");

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
            <th>Kode Matakuliah</th>
            <th>NIP</th>
            <th>Nilai</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from perkuliahan";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nim"]; ?></td>
                <td><?php echo $data["kode_matakuliah"];   ?></td>
                <td><?php echo $data["nip"];   ?></td>
                <td><?php echo $data["nilai"];   ?></td>
                <td>
                    <a href="updatekuliah.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Edit</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">Hapus</a>
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
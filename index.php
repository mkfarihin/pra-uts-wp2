<?php
//koneksi database
$server = "localhost";
$user = "root";
$pass = "";
$database = "tugas_wp2";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

//jika tombol simpan di klik
if (isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO data_siswa (nim, nama, kelas, alamat, prodi)
                                VALUE   ('$_POST[tnim]',
                                        '$_POST[tnama]',
                                        '$_POST[tkelas]',
                                        '$_POST[talamat]',
                                        '$_POST[tprodi]')
                                        ");
    if ($simpan) {
        echo "<script>
                alert('Simpan data suksess!');
                document.location='index.php';
            </script>";
    } else {
        echo "<script>
                alert('Simpan data GAGAL!');
                document.location='index.php';
            </script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>DATA MAHASISWA</title>
    <link rel="stylesheet" typo="text/css" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <h1 class="text-center">DATA MAHASISWA</h1>
        <h2 class="text-center">UBSI</h2>


        <div class="card mt-3">
            <div class="card header bg-primary text-white">
                Form input data mahasiswa
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Nim</label>
                        <input type="text" name="tnim" class="form-control" placeholder="input nim anda disini!" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="tnama" class="form-control" placeholder="input nama anda disini!" required>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="tkelas" class="form-control" placeholder="input kelas anda disini!" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="talamat" class="form-control" placeholder="input alamat anda disini!"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Program Studi</label>
                        <select class="form-control" name="tprodi">
                            <option></option>
                            <option value="D3-MI">D3 - MI</option>
                            <option value="S1-SI">S1 - SI</option>
                            <option value="S1-TI">S1 - TI</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                    <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

                </form>
            </div>
        </div>



        <div class="card mt-3">
            <div class="card header bg-success text-white">
                Data Mahasiswa
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Program Studi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * from data_siswa order by id desc");
                    while ($data = mysqli_fetch_array($tampil)) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nim'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['kelas'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['prodi'] ?></td>
                            <td>
                                <a href="#" class="btn btn-warning"> Edit </a>
                                <a href="#" class="btn btn-danger"> Hapus </a>
                            </td>
                        </tr>
                    <?php endwhile; //penutup perulangan 
                    ?>
                </table>
            </div>
        </div>


        <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>
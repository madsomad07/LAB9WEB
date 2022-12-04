<?php
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Data Barang</h1>
        <div class="main">
            <table class="table table-bordered border-primary">
            <thead class="table-primary">
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Katagori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
</thead>
                <?php if($result): ?>
                    <?php while($row = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><img src="gambar/<?= $row['gambar'];?>" alt="<?=$row['Nama'];?>"></td>
                <td><?= $row['Nama'];?></td>
                <td><?= $row['Kategori'];?></td>
                <td><?= $row['Harga_Beli'];?></td>
                <td><?= $row['Harga_Jual'];?></td>
                <td><?= $row['Stok'];?></td>
                <td>
                <a href="ubah.php?id=<? $row['Id_barang']; ?>">ubah</a>
                <a href="ubah.php?id=<? $row['Id_barang']; ?>>" onclick="
                    return confirm('Apakah anda yakin ingin menghapusnya?');">hapus</a>
                </td>
            </tr>
            <?php endwhile; else: ?>
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
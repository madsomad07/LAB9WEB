<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit']))
{
    $nama = $_POST['Nama'];
    $kategori = $_POST['Kategori'];
    $harga_jual = $_POST['Harga_Jual'];
    $harga_beli = $_POST['Harga_Beli'];
    $stok = $_POST['Stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;
    if ($file_gambar['error'] == 0)
    {
        $filename = str_replace(' ', '_',$file_gambar['name']);
        $destination = dirname(__FILE__) .'/gambar/' . $filename;
        if(move_uploaded_file($file_gambar['tmp_name'], $destination))
        {
            $gambar = 'gambar/' . $filename;;
        }
    }
    $sql = 'INSERT INTO data_barang (Nama, Kategori,Harga_Jual, Harga_Beli,
    Stok, Gambar) ';
    $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}',
    '{$harga_beli}', '{$stok}', '{$gambar}')";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css" />
        <title>Tambah Barang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Tambah Barang</h1>
            <div class="main">
                <form method="post" action="tambah.php"
                enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="addon-wrapping">Nama Barang</span>
                    <input type="text" class="form-control" placeholder="Harus Di Isi" aria-label="Nama Barang" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                    <select class="form-select" id="inputGroupSelect01">
                        <option value="Komputer">Komputer</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Hand Phone">Hand Phone</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="addon-wrapping">Harga Jual</span>
                    <input type="text" class="form-control" aria-label="Harga Jual" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping">Harga Beli</span>
                    <input type="text" class="form-control" aria-label="Harga Beli" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="addon-wrapping">Stok</span>
                    <input type="text" class="form-control" aria-label="Stok" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile02">Input Gambar</label>
                <input type="file" class="form-control" id="inputGroupFile02">
            </div>
            <div class="submit">
                <input type="submit" class="btn btn-primary" name="submit" value="Simpan" />
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $kode_toko = htmlspecialchars($_POST['kode_toko']);
    $nama_toko = htmlspecialchars($_POST['nama_toko']);
    $ip_gateway = htmlspecialchars($_POST['ip_gateway']);
    $ip_stb = htmlspecialchars($_POST['ip_stb']);
    $ip_wdcp = htmlspecialchars($_POST['ip_wdcp']);

    $query = "INSERT INTO tokolbk (kode_toko, nama_toko, ip_gateway, ip_stb, ip_wdcp) 
    VALUES ('$kode_toko', '$nama_toko', '$ip_gateway', '$ip_stb', '$ip_wdcp')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "data berhasil di tambahkan";
    } else {
        echo "data gagal di tambahkan";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Toko</title>
</head>

<body>
    <ul>
        <form action="" method="post">
            <li><input type="text" name="kode_toko" required placeholder="Kode Toko"></li>
            <li><input type="text" name="nama_toko" required placeholder="Nama Toko"></li>
            <li><input type="text" name="ip_gateway" required placeholder="Ip Gateway"></li>
            <li><input type="text" name="ip_stb" required placeholder="Ip Stb"></li>
            <li><input type="text" name="ip_wdcp" required placeholder="Ip Wdcp"></li>
            <li><button type="submit" name="submit">Tambah</button></li>
        </form>
    </ul>
    <a href="mysql.php">Kembali</a>
</body>

</html>
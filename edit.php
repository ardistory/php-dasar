<?php
require_once 'koneksi.php';
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tokolbk WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $kode_toko = htmlspecialchars($_POST['kode_toko']);
    $nama_toko = htmlspecialchars($_POST['nama_toko']);
    $ip_gateway = htmlspecialchars($_POST['ip_gateway']);
    $ip_stb = htmlspecialchars($_POST['ip_stb']);
    $ip_wdcp = htmlspecialchars($_POST['ip_wdcp']);

    $query = mysqli_query($conn, "UPDATE tokolbk SET kode_toko='$kode_toko', nama_toko='$nama_toko', ip_gateway='$ip_gateway', ip_stb='$ip_stb', ip_wdcp='$ip_wdcp' WHERE id=$id");
    if ($query) {
        echo "data berhasil di update";
    } else {
        echo "data gagal di update";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <ul>
        <form action="" method="post">
            <li><label for="kode_toko">Kode Toko : </label><input type="text" id="kode_toko" name="kode_toko" placeholder="Kode Toko" value="<?= $data['kode_toko']; ?>"></li>
            <li><label for="nama_toko">Nama Toko : </label><input type="text" name="nama_toko" placeholder="Nama Toko" value="<?= $data['nama_toko']; ?>"></li>
            <li><label for="ip_gateway">Ip Gateway : </label><input type="text" name="ip_gateway" placeholder="Ip Gateway" value="<?= $data['ip_gateway']; ?>"></li>
            <li><label for="ip_stb">Ip Stb : </label><input type="text" name="ip_stb" placeholder="Ip Stb" value="<?= $data['ip_stb']; ?>"></li>
            <li><label for="ip_wdcp">Ip Wdcp : </label><input type="text" name="ip_wdcp" placeholder="Ip Wdcp" value="<?= $data['ip_wdcp']; ?>"></li>
            <button type="submit" name="submit">UPDATE</button>
        </form>
    </ul>
    <a href="mysql.php">Kembali</a>
</body>

</html>
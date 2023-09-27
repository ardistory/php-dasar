<?php
require_once 'koneksi.php';
$tokolbk = query("SELECT * FROM tokolbk");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Daftar Toko Indomaret Cabang Lebak</h1>
    <a href="tambah.php">Tambah Toko</a>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Kode Toko</th>
            <th>Nama Toko</th>
            <th>Ip Gateway</th>
            <th>Ip STB</th>
            <th>Ip WDCP</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($tokolbk as $toko) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><a href="edit.php?id=<?= $toko['id']; ?>">Edit</a>|<a href="hapus.php?id=<?= $toko['id']; ?>">Hapus</a></td>
                <td><?= $toko["kode_toko"]; ?></td>
                <td><?= $toko["nama_toko"]; ?></td>
                <td><?= $toko["ip_gateway"]; ?></td>
                <td><?= $toko["ip_stb"]; ?></td>
                <td><?= $toko["ip_wdcp"]; ?></td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>

</html>
<?php
require_once 'koneksi.php';
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM tokolbk WHERE id=$id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus</title>
</head>

<body>
    <p>Hapus Berhasil!</p>
    <a href="mysql.php">Kembali</a>
</body>

</html>
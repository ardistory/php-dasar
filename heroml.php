<?php
if (!isset($_GET["nama"]) || !isset($_GET["gambar"])) {
    header("Location: array_assosiatif.php");
    exit;
}
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
    <ul>
        <li>
            <img src="img/<?= $_GET["gambar"]; ?>">
        </li>
        <li>
            <?= $_GET["nama"]; ?>
        </li>
    </ul>
    <a href="array_assosiatif.php">Kembali</a>
</body>

</html>
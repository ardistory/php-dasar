<?php

//array assosiatif

$hero = [
    [
        "nama" => "Alucard",
        "gambar" => "alucard.jpg"
    ],
    [
        "nama" => "Harith",
        "gambar" => "harith.jpg"
    ],
    [
        "nama" => "Benedetta",
        "gambar" => "benedetta.jpg"
    ],
    [
        "nama" => "Claude",
        "gambar" => "claude.jpg"
    ],
    [
        "nama" => "Estes",
        "gambar" => "estes.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero ML</title>
    <style>
        li {
            list-style: none;
        }

        body ul li a {
            text-decoration: none;
        }

        img {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <h1>Hero Mobile Legends</h1>
    <ul>
        <?php foreach ($hero as $hr) : ?>
            <li><a href="heroml.php?nama=<?= $hr["nama"]; ?>&gambar=<?= $hr["gambar"]; ?>"><?= $hr["nama"]; ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
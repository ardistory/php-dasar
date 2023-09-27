<?php

$conn = mysqli_connect('127.0.0.1', 'edp', 'edplbk321', 'belajar_php_database');
$query = mysqli_query($conn, "SELECT * FROM latihan_upload");
if (mysqli_num_rows($query) > 0) {
    $datas = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $datas[] = $row;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_POST['upload'])) {
        //cek apakah ada file yang di upload
        if ($_FILES['gambar']['error'] == 4) {
            echo "<script>alert('Silahkan pilih photo terlebih dahulu!');</script>";
        } else {
            $namaFile = $_FILES['gambar']['name'];
            $sizeFile = $_FILES['gambar']['size'];
            $tmpName = $_FILES['gambar']['tmp_name'];
            $nik = htmlspecialchars(trim($_POST['nik']));

            //cek ekstensi file
            $supportFile = ['jpg', 'jpeg', 'png', 'gif'];
            $ekstensiFile = explode(".", $namaFile);
            $ekstensiFile = strtolower(end($ekstensiFile));
            if (!in_array($ekstensiFile, $supportFile)) {
                echo "<script>alert('File tidak didukung!');</script>";
            } else {
                //cek ukuran file
                if ($sizeFile > 1000000) {
                    echo "<script>alert('Ukuran file terlalu besar!');</script>";
                } else {
                    //upload file ke server
                    $nama = explode('.', $namaFile);
                    $namaFileBaru =  $nama[0] . '_' . uniqid();
                    $namaFileBaru .= '.';
                    $namaFileBaru .= $ekstensiFile;
                    move_uploaded_file($tmpName, "img/$namaFileBaru");
                    mysqli_query($conn, "INSERT INTO latihan_upload (nama_file, nik) VALUES ('$namaFileBaru', '$nik')");
                    // echo "<script>alert('File berhasil di upload!');</script>";
                    $_SESSION['notif'] = "Berhasil Tambah Data!";
                    // header("Location: upload.php");
                }
            }
        }
    }
    ?>
    <div class="container">
        <?php
        if (isset($_SESSION['notif'])) {
            echo "<div class='alert alert-success' role='alert'>" . $_SESSION['notif'] . "</div>";
        }
        unset($_SESSION['notif']);
        ?>
        <div class="shadow p-3 mb-5 bg-white rounded">
            <ul class="list-group">
                <?php foreach ($datas as $row) : ?>
                    <li class="list-group-item"><label for="gambar">Nama File : <?= $row['nama_file']; ?></label></li>
                    <li class="list-group-item"><img src="img/<?= $row['nama_file']; ?>" id="gambar" style="border: 1px solid grey; padding: 3px; border-radius: 3px; width:100px; height: auto;"></li>
                <?php endforeach; ?>
                </br>
                <li class="list-group-item">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label">Nik</label>
                            </div>
                            <div class="col-auto">
                <li class="list-group-item"><input type="text" name="nik" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline"></li>
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Must be 8-20 characters long.
            </span>
        </div>
    </div>
    <li class="list-group-item"><input type="file" name="gambar"></li>
    <li class="list-group-item"><button type="submit" name="upload" class="btn btn-warning">Upload</button></li>
    </form>
    </li>
    </ul>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>
<?php
if (isset($_POST["submit"])) {
    if ($_POST["user"] == "ardi" && $_POST["password"] == 123) {
        header("Location: admin.php");
        exit;
    } else {
        $salah = true;
    }
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
    <?php if (isset($salah)) : ?>
        <p style="color: red;">Maaf, User Salah!</p>
    <?php endif; ?>
    <form action="" method="post">
        <input type="text" name="user">
        <input type="password" name="password">
        <button type="submit" name="submit">Login</button>
    </form>
</body>

</html>
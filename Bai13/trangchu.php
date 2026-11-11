<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bạn đã đăng nhập thành công !</h1>
    <?php
    session_start();
    if (!isset($_SESSION["dangNhap"])) {
        header("location: dangnhap.php");
    }

    ?>
</body>

</html>
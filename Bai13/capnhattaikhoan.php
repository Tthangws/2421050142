<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        input {
            margin: 2px;
            border-radius: 8px;
            font-size: 20px;
        }

        .them-tk {
            padding: 5px;
            background-color: #87a4e2;
            border-radius: 15px;
        }

        h3 {
            margin: 5px 5px 0px 5px;
        }

        .gioi-tinh {
            margin: 5px;
        }

        button {
            padding: 10px;
            border-radius: 18px;
            background-color: #2563EB;
            color: #F1F5F9;
            width: 220px;
            cursor: pointer;
        }

        body {
            background-color: #F1F5F9;
        }

        form {
            width: fit-content;
            margin: 10px auto;
            background-color: #FFFFFF;
            padding: 10px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .ngay-sinh {
            margin: 0px 50px 0px -33px;
        }
    </style>
</head>

<body>

<?php
    $id = $_GET['id'];
    $sql = "select * from users where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);


?>


    <form action="index.php?page_layout=capnhattaikhoan&id=<?php echo $id?>"  method="POST">
        <h1 class="them-tk">Cập nhật tài khoản</h1>
        <div class="">
            <h3>Tên đăng nhập</h3>
            <input type="text" name="tenDangNhap" id="" placeholder="a-z,0-9" value="<?php echo $user['ten_dang_nhap']?>">
        </div>
        <div class="">
            <h3>Mật khẩu</h3>
            <input type="password" name="matkhau" id="" placeholder="Mật khẩu" value="<?php echo $user['mat_khau']?>" >
        </div>

        <div class="">
            <h3>Email</h3>
            <input type="email" name="email" id="" placeholder="xxx@gmail.com" value="<?php echo $user['email']?>">
        </div>

        <div class="">
            <h3>Họ và tên</h3>
            <input type="text" name="hoten" id="" placeholder="Họ và tên" value="<?php echo $user['ho_ten']?>">
        </div>

        <div class="ngay-sinh">
            <h3>Ngày sinh</h3>
            <input type="date" name="ngaysinh" id="" placeholder="Ngày sinh" value="<?php echo $user['ngay_sinh']?>">
        </div>

        <div class="">
            <h3>Số điện thoại</h3>
            <input type="tel" name="sdt" id="" placeholder="0-9" value="<?php echo $user['so_dien_thoai']?> "id="">
        </div>

        <div class="gioi-tinh">
            <h3>Giới tính</h3>
            Nam<input type="radio" name="gioitinh" id="" value="1">
            Nữ<input type="radio" name="gioitinh" id="" value="0">
        </div>

        <div class="">
            <button>Submit</button>
        </div>
    </form>

    <?php
    if (
        isset($_POST['tenDangNhap']) &&
        isset($_POST['matkhau']) &&
        isset($_POST['email']) &&
        isset($_POST['hoten']) &&
        isset($_POST['ngaysinh']) &&
        isset($_POST['sdt']) &&
        isset($_POST['gioitinh'])
    ) {
        $tenDangNhap = $_POST['tenDangNhap'];
        $matkhau = $_POST['matkhau'];
        $email = $_POST['email'];
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $sdt = $_POST['sdt'];
        $gioitinh = $_POST['gioitinh'];
        if (
            !empty($tenDangNhap) &&
            !empty($matkhau) &&
            !empty($email) &&
            !empty($hoten) &&
            !empty($ngaysinh) &&
            !empty($sdt)
        ) {
            //người dùng nhập đủ thông tin
            $sql = "UPDATE `users` 
            SET `ten_dang_nhap`='$tenDangNhap',`mat_khau`='$matkhau',`email`='$email',`ho_ten`='$hoten',`ngay_sinh`='$ngaysinh',`so_dien_thoai`='$sdt',`gioi_tinh`='$gioitinh'
            WHERE id = '$id'";
            //echo $sql;
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: index.php?page_layout=taikhoan");
            } else {
                echo "Cập nhật người dùng thất bại!";
            }
        } else {
            //người dùng nhập thiếu thông tin
            echo "<p style='color: red'>Vui lòng nhập đầy đủ thông tin</p>";
        }
    }

    ?>



</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 100%;
        }
        tr, th, td{
            border: 1px solid black;
        }
        .btn-add{
            background-color: green;
            padding:10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Tài khoản</h1>
    <div style="margin: 20px 0";>
    <a class="btn-add" href = "index.php?page_layout=themtaikhoan">Thêm tài khoản</a>
    </div>
    <?php
    $sql = "select * from users";
    $result = mysqli_query($conn, $sql);
    ?>

    <table>
        <tr>
            <th>id</td>
            <th>Tên đăng nhập</td>
            <th>Mật khẩu</td>
            <th>email</td>
            <th>Họ tên</td>
            <th>Ngày sinh</td>
            <th>Số điện thoại</td>
            <th>Giới tính</td>
        </tr>
        <?php
            while($row = mysqli_fetch_array($result))
            {
        ?>

        
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['ten_dang_nhap'] ?></td>
            <td><?php echo $row['mat_khau'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['ho_ten'] ?></td>
            <td><?php echo $row['ngay_sinh'] ?></td>
            <td><?php echo $row['so_dien_thoai'] ?></td>
            <td><?php echo $row['gioi_tinh'] ?></td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>
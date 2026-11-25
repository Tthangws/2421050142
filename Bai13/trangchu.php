<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        table{
            width: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        tr, th, td{
            border: 1px solid black;
        }
        .btn-add{
            background-color: green;
            padding:10px;
            border-radius: 10px;
            color: aliceblue;
        }
        .cap-nhat{
            background-color: aquamarine;
            color: black;
            padding:1px;
            border-radius: 5px;
            margin: 3px;
        }
        .xoa{
            background-color: red;
            color: black;
            padding:1px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Trang chủ</h1>
    <div style="margin: 20px 0";>
    <h3 class="btn-add" href = "index.php?page_layout=themtaikhoan">Tổng số người dùng:</a>
    </div>
    <?php
    $sql = "select * from users";
    $result = mysqli_query($conn, $sql);
    ?>

    <table>
        <tr>
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
            <td><?php echo $row['ho_ten'] ?></td>
            <td><?php echo $row['ngay_sinh'] ?></td>
            <td><?php echo $row['so_dien_thoai'] ?></td>
            <td><?php echo $row['gioi_tinh']==true?"Nam":"Nữ" ?></td>
        </tr>
        <?php
            }
        ?>
    </table>
<!-- ---------------------------------------------------------------------------------------------------------- -->
    <div style="margin: 20px 0";>
    <h3 class="btn-add" href = "index.php?page_layout=themtaikhoan">Tổng số phim:</a>
    </div>
    <?php
    $sql = "select * from phim";
    $result = mysqli_query($conn, $sql);
    ?>

    <table>
        <tr>
            <th>Tên phim</th>
            <th>Quốc gia</th>
            <th>Năm</th>
            <th>Độ tuổi</th>
            <th>Mô tả</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['ten_phim']; ?></td>
                <td><?php echo $row['quoc_gia']; ?></td>
                <td><?php echo $row['nam']; ?></td>
                <td><?php echo $row['do_tuoi']; ?></td>
                <td><?php echo $row['mo_ta']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
<!-- ----------------------------------------------------------------------------------------------------- -->
 <div style="margin: 20px 0";>
    <h3 class="btn-add" href = "index.php?page_layout=themtaikhoan">Tổng số thể loại, đạo diễn, diễn viên:</a>
    </div>
<?php
// Truy vấn đếm tổng số dòng của từng bảng
$sql_the_loai  = "SELECT COUNT(*) AS tong FROM `the_loai`";
$sql_dao_dien  = "SELECT COUNT(*) AS tong FROM `dao_dien`";
$sql_dien_vien = "SELECT COUNT(*) AS tong FROM `dien_vien`";

$tong_the_loai  = mysqli_fetch_assoc(mysqli_query($conn, $sql_the_loai))['tong'];
$tong_dao_dien  = mysqli_fetch_assoc(mysqli_query($conn, $sql_dao_dien))['tong'];
$tong_dien_vien = mysqli_fetch_assoc(mysqli_query($conn, $sql_dien_vien))['tong'];
?>

    <table>
        <tr>
            <th>Danh mục</th>
            <th>Tổng số lượng</th>
        </tr>
        <tr>
            <td>Thể loại</td>
            <td><strong><?php echo $tong_the_loai; ?></strong></td>
        </tr>
        <tr>
            <td>Đạo diễn</td>
            <td><strong><?php echo $tong_dao_dien; ?></strong></td>
        </tr>
        <tr>
            <td>Diễn viên</td>
            <td><strong><?php echo $tong_dien_vien; ?></strong></td>
        </tr>
    </table>
</body>
</html>
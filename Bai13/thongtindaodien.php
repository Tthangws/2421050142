<?php
$id = $_GET['id'];
$sql = "SELECT * FROM `dao_dien` WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đạo diễn</title>
    <style>
        table {
            width: 100%;
            margin: 18px 0px;
            border-collapse: collapse;
        }
        tr, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        .btn-back {
            display: inline-block;
            padding: 6px 12px;
            background-color: #87a4e2;
            color: black;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <h1>Thông tin đạo diễn</h1>
    <a href="index.php?page_layout=phim" class="btn-back">← Quay lại danh sách phim</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Quốc gia</th>
            <th>Mô tả</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ho_ten']; ?></td>
                <td><?php echo $row['ngay_sinh']; ?></td>
                <td><?php echo $row['quoc_gia']; ?></td>
                <td><?php echo $row['mo_ta']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
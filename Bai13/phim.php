<?php
// 1. Bổ sung câu lệnh lấy toàn bộ dữ liệu từ bảng phim
$sql = "SELECT * FROM `phim`";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phim</title>
    <style>
        table{
            width: 100%;
            margin:18px 0px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        tr, th, td{
            border: 1px solid black;
        }
        .btn-add{
            background-color:  dodgerblue;
            padding:10px;
            border-radius: 10px;

        }
        .capnhat{
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
        .thongtindaodien{
            text-decoration:none;
            color:black;
            margin:0px 0px 0px 40px;
            padding:1px;
            background-color: antiquewhite;
            border-radius:10px;
        }
    </style>
</head>
<body>
    <h1>Phim</h1>
    <a href="index.php?page_layout=themphim" class="btn-add">Thêm phim</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên phim</th>
            <th>Quốc gia</th>
            <th>ID đạo diễn</th>
            <th>Năm</th>
            <th>Độ tuổi</th>
            <th>Mô tả</th>
            <th>Trailer</th>
            <th>Poster</th>
            <th>Chức năng</th>
            
        </tr>
        


        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ten_phim']; ?></td>
                <td><?php echo $row['quoc_gia']; ?></td>
                <td><?php echo $row['dao_dien_id']; ?><a href="index.php?page_layout=thongtindaodien&id=<?php echo $row['dao_dien_id']; ?>" class="thongtindaodien">Xem thông tin</a></td>
                <td><?php echo $row['nam']; ?></td>
                <td><?php echo $row['do_tuoi']; ?></td>
                <td><?php echo $row['mo_ta']; ?></td>
                <td><?php echo $row['trailer']; ?></td>
                <td>
                    <img src="upload/<?php echo $row['phim_poster']; ?>" width="80">
                </td>
                <td>
                    <a href="index.php?page_layout=capnhatphim&id=<?php echo $row['id']; ?>" class="capnhat">Cập nhật</a>
                    <a href="index.php?page_layout=xoaphim&id=<?php echo $row['id']; ?>" class="xoa">Xóa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
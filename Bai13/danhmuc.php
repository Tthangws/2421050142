<?php
// 1. Lấy danh sách tất cả thể loại kèm số lượng phim thuộc thể loại đó
$sql_the_loai = "SELECT the_loai.*, COUNT(phim_the_loai.phim_id) AS so_luong 
                 FROM `the_loai` 
                 LEFT JOIN `phim_the_loai` ON the_loai.id = phim_the_loai.the_loai_id 
                 GROUP BY the_loai.id";
$result_tl = mysqli_query($conn, $sql_the_loai);

// 2. Xử lý lọc danh sách phim khi người dùng bấm chọn 1 thể loại
if (isset($_GET['the_loai_id']) && !empty($_GET['the_loai_id'])) {
    $tl_id = $_GET['the_loai_id'];
    $sql_phim = "SELECT phim.* FROM `phim` 
                 JOIN `phim_the_loai` ON phim.id = phim_the_loai.phim_id 
                 WHERE phim_the_loai.the_loai_id = '$tl_id'";
} else {
    // Mặc định hiển thị toàn bộ phim nếu chưa chọn thể loại nào
    $tl_id = 0;
    $sql_phim = "SELECT * FROM `phim`";
}
$result_phim = mysqli_query($conn, $sql_phim);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục phim</title>
    <style>
        .ds-danhmuc {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 15px 0 25px 0;
        }
        .btn-dm {
            padding: 8px 16px;
            background-color: antiquewhite;
            color: black;
            text-decoration: none;
            border-radius: 20px;
            border: 1px solid #ccc;
            font-weight: bold;
        }
        .btn-dm.active {
            background-color: #1a3a8a;
            color: white;
            border-color: #1a3a8a;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Danh mục thể loại phim</h1>

    <!-- Thanh nút bấm lọc theo từng thể loại -->
    <div class="ds-danhmuc">
        <a href="index.php?page_layout=danhmuc" class="btn-dm <?php if ($tl_id == 0) echo 'active'; ?>">
            Tất cả phim
        </a>
        <?php while ($tl = mysqli_fetch_assoc($result_tl)) { ?>
            <a href="index.php?page_layout=danhmuc&the_loai_id=<?php echo $tl['id']; ?>" 
               class="btn-dm <?php if ($tl_id == $tl['id']) echo 'active'; ?>">
                <?php echo $tl['ten_the_loai']; ?> (<?php echo $tl['so_luong']; ?>)
            </a>
        <?php } ?>
    </div>

    <!-- Bảng hiển thị danh sách phim sau khi lọc -->
    <table>
        <tr>
            <th>ID</th>
            <th>Tên phim</th>
            <th>Quốc gia</th>
            <th>Năm</th>
            <th>Độ tuổi</th>
            <th>Mô tả</th>
        </tr>
        <?php
        if (mysqli_num_rows($result_phim) > 0) {
            while ($row = mysqli_fetch_assoc($result_phim)) {
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['ten_phim']; ?></td>
                    <td><?php echo $row['quoc_gia']; ?></td>
                    <td><?php echo $row['nam']; ?></td>
                    <td><?php echo $row['do_tuoi']; ?></td>
                    <td><?php echo $row['mo_ta']; ?></td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>Chưa có bộ phim nào thuộc thể loại này!</td></tr>";
        }
        ?>
    </table>
</body>
</html>
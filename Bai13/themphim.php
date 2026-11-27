<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phim</title>
    <style>
        .khoi {
            border: 1px solid black;
            border-radius: 10px;
            width: 250px;
            margin: 10vh auto;
            background-color: antiquewhite;
        }

        .i-text input,
        .i-text select {
            padding: 5px 0;
            margin: 10px 0;
            width: 100%;
        }

        button {
            padding: 5px 0;
            width: 100%;
        }

        form {
            padding: 10px;
        }

        h1 {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <?php
    include 'connect.php';
    $sql_dd = "SELECT * FROM dao_dien";
    $result_dd = mysqli_query($conn, $sql_dd);

    $sql_tl = "SELECT * FROM the_loai";
    $result_tl = mysqli_query($conn, $sql_tl);
    ?>

    <h1>Thêm phim</h1>
    <form class="khoi" action="index.php?page_layout=themphim" method="POST" enctype="multipart/form-data">
        <div class="i-text">
            <input type="text" name="tenPhim" placeholder="Tên phim">
        </div>
        <div class="i-text">
            <input type="text" name="quocGia" placeholder="Quốc gia">
        </div>

        <div class="i-text">
            <select name="theLoai">
                <option value="">Chọn thể loại</option>
                <?php
                while ($tl = mysqli_fetch_array($result_tl)) {
                    ?>
                    <option value="<?php echo $tl['id'] ?>"> <?php echo $tl['ten_the_loai'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="i-text">
            <select name="daoDien">
                <option value="">Chọn đạo diễn</option>
                <?php
                while ($dd = mysqli_fetch_array($result_dd)) {
                    ?>
                    <option value="<?php echo $dd['id'] ?>"> <?php echo $dd['ho_ten'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="i-text">
            <input type="number" name="nam" placeholder="Năm">
        </div>
        <div class="i-text">
            <input type="number" name="doTuoi" placeholder="Độ tuổi">
        </div>
        <div class="i-text">
            <input type="text" name="moTa" placeholder="Mô tả">
        </div>
        <div class="i-text">
            Trailer<input type="file" name="trailer">
        </div>
        <div class="i-text">
            Poster<input type="file" name="poster">
        </div>
        <button type="submit" name="submit">Thêm</button>
    </form>

    <?php
    if (
        isset($_POST['tenPhim']) &&
        isset($_POST['quocGia']) &&
        isset($_POST['theLoai']) &&
        isset($_POST['daoDien']) &&
        isset($_POST['nam']) &&
        isset($_POST['doTuoi']) &&
        isset($_POST['moTa'])
    ) {
        $tenphim   = $_POST['tenPhim'];
        $quocgia   = $_POST['quocGia'];
        $theloaiid = $_POST['theLoai'];
        $daodienid = $_POST['daoDien'];
        $nam       = $_POST['nam'];
        $dotuoi    = $_POST['doTuoi'];
        $mota      = $_POST['moTa'];
        $trailer   = $_FILES['trailer']['name'];
        $poster    = $_FILES['poster']['name'];

        if (
            !empty($tenphim) &&
            !empty($quocgia) &&
            !empty($theloaiid) &&
            !empty($daodienid) &&
            !empty($nam) &&
            $dotuoi !== '' &&
            !empty($mota) &&
            !empty($trailer) &&
            !empty($poster)
        ) {
            ######### Bắt đầu xử lý thêm ảnh #########
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["poster"]["name"]);

            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Kiểm tra xem file ảnh có hợp lệ không
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["poster"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File không phải là ảnh.<br>";
                    $uploadOk = 0;
                }
            }

            // Kiểm tra nếu file đã tồn tại
            if (file_exists($target_file)) {
                echo "File này đã tồn tại trên hệ thống.<br>";
                $uploadOk = 2;
            }

            // Cho phép các định dạng file ảnh nhất định
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf"
                && $imageFileType != "gif"
            ) {
                echo "Chỉ những file JPG, JPEG, PDF, PNG & GIF mới được chấp nhận.<br>";
                $uploadOk = 0;
            }
            ######### Kết thúc xử lý ảnh #########

            if ($uploadOk == 0) {
                echo "File của bạn chưa được tải lên";
            } else {
                // Lưu file ảnh và trailer vào thư mục upload/
                if ($uploadOk == 1) {
                    move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file);
                }
                move_uploaded_file($_FILES["trailer"]["tmp_name"], $target_dir . basename($trailer));

                $sql = "INSERT INTO `phim` (`ten_phim`, `quoc_gia`, `dao_dien_id`, `nam`, `do_tuoi`, `mo_ta`, `trailer`, `phim_poster`) 
                        VALUES ('$tenphim', '$quocgia', '$daodienid', '$nam', '$dotuoi', '$mota', '$trailer', '$poster')";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    // Lưu thêm thể loại vào bảng phim_the_loai
                    $phim_id = mysqli_insert_id($conn);
                    mysqli_query($conn, "INSERT INTO `phim_the_loai` (`phim_id`, `the_loai_id`) VALUES ('$phim_id', '$theloaiid')");

                    echo "<script>window.location.href = 'index.php?page_layout=phim';</script>";
                    exit();
                } else {
                    echo "Thêm phim thất bại!";
                }
            }
        } else {
            echo "<p style='color: red'>Vui lòng nhập đầy đủ thông tin</p>";
        }
    }
    ?>
</body>

</html>
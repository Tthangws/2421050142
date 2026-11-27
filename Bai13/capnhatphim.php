<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật phim</title>
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
            gap: 10px;
        }

        .ngay-sinh {
            margin: 0px 50px 0px -33px;
        }
    </style>
</head>

<body>
    <?php
    $id = $_GET['id'];
    $sql = "select * from phim where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $phim = mysqli_fetch_assoc($result);
    ?>
    <h1>Cập nhật</h1>
    <form class="khoi" action="index.php?page_layout=capnhatphim&id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
        <div class="i-text">
            <input type="text" name="tenphim" value="<?php echo $phim['ten_phim'] ?>" id="" placeholder="Tên phim">
        </div>
        <div class="i-text">
            <input type="text" name="quocgia" value="<?php echo $phim['quoc_gia'] ?>" id="" placeholder="Quốc gia">
        </div>
        <div class="i-text">
            <input type="number" name="daodienid" value="<?php echo $phim['dao_dien_id'] ?>" id=""
                placeholder="Đạo diẽn id">
        </div>
        <div class="i-text">
            <input type="number" name="nam" value="<?php echo $phim['nam'] ?>" id="" placeholder="Năm">
        </div>
        <div class="i-text">
            <input type="text" name="dotuoi" value="<?php echo $phim['do_tuoi'] ?>" id="" placeholder="Độ tuổi">
        </div>
        <div class="i-text">
            <input type="text" name="mota" value="<?php echo $phim['mo_ta'] ?>" id="" placeholder="Mô tả">
        </div>
        <div class="i-text">
            Trailer<input type="file" name="trailer" value="<?php echo $phim['trailer'] ?>" id="">
        </div>
        <div class="i-text">
            Poster<input type="file" name="poster" value="<?php echo $phim['phim_poster'] ?>" id="" >
        </div>
        <button>Update</button>
    </form>

    <?php
    if (
        isset($_POST['tenphim']) &&
        isset($_POST['quocgia']) &&
        isset($_POST['daodienid']) &&
        isset($_POST['nam']) &&
        isset($_POST['dotuoi']) &&
        isset($_POST['mota']) &&
        isset($_FILES['trailer']['name']) &&
        isset($_FILES['poster']['name'])
    ) {
        $tenphim = $_POST['tenphim'];
        $quocgia = $_POST['quocgia'];
        $daodienid = $_POST['daodienid'];
        $nam = $_POST['nam'];
        $dotuoi = $_POST['dotuoi'];
        $mota = $_POST['mota'];
        $trailer = $_FILES['trailer']['name'];
        $poster = $_FILES['poster']['name'];
        if (
            !empty($tenphim) &&
            !empty($quocgia) &&
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

                $sql = "UPDATE `phim` 
                SET `ten_phim`='$tenphim',`quoc_gia`='$quocgia',`dao_dien_id`='$daodienid',`nam`='$nam',`do_tuoi`='$dotuoi',`mo_ta`='$mota',`trailer`='$trailer',`phim_poster`='$poster'
                WHERE id = '$id'";

                $result = mysqli_query($conn, $sql);

            }
        } else {
            echo "<p style='color: red'>Vui lòng nhập đầy đủ thông tin</p>";
        }
    }

    ?>
</body>

</html>
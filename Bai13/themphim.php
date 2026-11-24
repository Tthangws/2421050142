<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phim</title>
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
            gap:10px;
        }

        .ngay-sinh {
            margin: 0px 50px 0px -33px;
        }
    </style>
</head>
<body>
    <h1>Thêm phim</h1>
    <form class="khoi" action="index.php?page_layout=themphim" method="POST">
        <div class="i-text">
            <input type="text" name="tenphim" placeholder="Tên phim">
        </div>
        <div class="i-text">
            <input type="text" name="quocgia" placeholder="Quốc gia">
        </div>
        <div class="i-text">
            <input type="number" name="daodienid" placeholder="ID Đạo diễn">
        </div>
        <div class="i-text">
            <input type="number" name="nam" placeholder="Năm">
        </div>
        <div class="i-text">
            <input type="number" name="dotuoi" placeholder="Độ tuổi">
        </div>
        <div class="i-text">
            <input type="text" name="mota" placeholder="Mô tả">
        </div>
        <button>Thêm</button>
    </form>

    <?php
    if (
        isset($_POST['tenphim']) && 
        isset($_POST['quocgia']) && 
        isset($_POST['daodienid']) && 
        isset($_POST['nam']) &&
        isset($_POST['dotuoi']) &&
        isset($_POST['mota'])
    ) {
        $tenphim   = $_POST['tenphim'];
        $quocgia   = $_POST['quocgia'];
        $daodienid = $_POST['daodienid'];
        $nam       = $_POST['nam'];
        $dotuoi    = $_POST['dotuoi'];
        $mota      = $_POST['mota'];

        if (
            !empty($tenphim) && 
            !empty($quocgia) && 
            !empty($daodienid) && 
            !empty($nam) &&
            $dotuoi !== '' &&
            !empty($mota)
        ) {
            $sql = "INSERT INTO `phim` (`ten_phim`, `quoc_gia`, `dao_dien_id`, `nam`, `do_tuoi`, `mo_ta`) 
                    VALUES ('$tenphim', '$quocgia', '$daodienid', '$nam', '$dotuoi', '$mota')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>window.location.href = 'index.php?page_layout=phim';</script>";
                exit();
            } else {
                echo "Thêm phim thất bại!";
            }
        } else {
            echo "<p style='color: red'>Vui lòng nhập đầy đủ thông tin</p>";
        }
    }
    ?>
</body>
</html>
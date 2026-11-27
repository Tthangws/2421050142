<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thể loại</title>
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
    <h1>Thêm thể loại</h1>
    <form class="khoi" action="index.php?page_layout=themtheloai" method="POST">
        <div class="i-text">
            <input type="text" name="tentheloai" placeholder="Tên thể loại">
        </div>
        <button>Submit</button>
    </form>

    <?php
    if (
        isset($_POST['tentheloai']) 
    ) {
        $tentheloai   = $_POST['tentheloai'];

        if (
            !empty($tentheloai)
        ) {
            $sql = "INSERT INTO `the_loai` (`ten_the_loai`) 
                    VALUES ('$tentheloai')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>window.location.href = 'index.php?page_layout=danhmuc';</script>";
                exit();
            } else {
                echo "Thêm thể loại thất bại!";
            }
        } else {
            echo "<p style='color: red'>Vui lòng nhập đầy đủ thông tin</p>";
        }
    }
    ?>
</body>
</html>
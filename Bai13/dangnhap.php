<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: powderblue;
        }
        .khoi {
            border: 1px solid black;
            border-radius: 10px;
            width: 250px;
            margin: 20vh auto;
            background-color: antiquewhite;
        }

        input {
            padding: 5px 0;
            margin: 10px 0;
            border-radius:9px;
        }

        button{
            font-size: 15px;
            border-radius:10px;
            padding 15px;
            background-color: deepskyblue;
            width: 70%;
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
    <div class="khoi">
        <div style="width: 80%; margin: auto; text-align: center" class="">
            <h1>Đăng nhập</h1>
            <form action="dangnhap.php" method="POST">
                <div class="">
                    <input type="text" name="tenDangNhap" id="" placeholder="Tên đăng nhập">
                </div>
                <div>
                    <input type="password" name="matKhau" id="" placeholder="Mật khẩu">
                </div>
                <div class="">
                    <button type="submit">Đăng nhập</button>
                </div>
            </form>

            <?php
            // su dung include de ket noi 2 file php
            include 'connect.php';
            session_start();
                if(isset($_POST['tenDangNhap']) && isset($_POST['matKhau'])){
                    $tenDangNhap = $_POST['tenDangNhap'];
                    $matKhau = $_POST['matKhau'];

                    $sql = "SELECT * FROM users where ten_dang_nhap = '$tenDangNhap' and mat_khau = '$matKhau'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result)>0){
                        
                        $_SESSION["dangNhap"] = "thanhcong";
                        header("Location: index.php");

                    }else{
                        echo "<br>Alert: Tên đăng nhập hoặc mk k chính xác !";
                    }
                }







            ?>
        </div>

    </div>

</body>

</html>
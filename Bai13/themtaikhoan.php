<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        input{
            margin: 2px;
            border-radius: 9px;
            font-size: 20px;
        }
        .them-tk{
            padding:5px;
            background-color: #87a4e2;
            border-radius: 15px;
        }
        h3{
            margin: 5px 5px 0px 5px ;
        }
        .gioi-tinh{
            margin:5px;
        }
        button{
            padding: 10px;
            border-radius: 18px;
            background-color: #2563EB;
            color: #F1F5F9;
            width: 220px;
            cursor: pointer;
        }
        body{
            background-color: #F1F5F9;
        }
        form{
            width: fit-content;
            margin: 10px auto;
            background-color: #FFFFFF;
            padding: 10px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .ngay-sinh{
            margin: 0px 50px 0px -33px;
        }
    </style>
</head>
<body>
    

    <form action="" method="POST">
        <h1 class="them-tk">Thêm tài khoản</h1>
        <div class="">
            <h3>Tên đăng nhập</h3>
            <input type="text" name="text" id="" placeholder="a-z,0-9">
        </div>
        <div class="">
            <h3>Mật khẩu</h3>
            <input type="password" name="password" id="" placeholder="Mật khẩu">
        </div>

        <div class="">
            <h3>Email</h3>
            <input type="mail" name="mail" id="" placeholder="xxx@gmail.com">
        </div>

        <div class="">
            <h3>Họ và tên</h3>
            <input type="text" name="text" id="" placeholder="Họ và tên">
        </div>

        <div class="ngay-sinh">
            <h3>Ngày sinh</h3>
        <input type="date" name="date" id="" placeholder="Ngày sinh">
        </div>

        <div class="">
            <h3>Số điện thoại</h3>
            <input type="tel" name="tel" id="" placeholder="0-9">
        </div>

        <div class="gioi-tinh">
            <h3>Giới tính</h3>
            Nam<input type="radio" name="radio" id="" placeholder="Giới tính">
            Nữ<input type="radio" name="radio" id="" placeholder="Giới tính">
        </div>

        <div class="">
            <button>Submit</button>
        </div>
    </form>

  
    
</body>
</html>
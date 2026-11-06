<?php
    // Nội dung php đặt ở vị trí này
    echo "nội dung in ra màn hình <br>";

    // khai báo biến, bắt đầu bằng $
    $hoTen = "Trong Thang";
    $tuoi = 29;
    echo $hoTen ." ". $tuoi."<br>";

    //trả về độ dài chuỗi
    echo strlen($hoTen)."<br>";

    // đếm số từ
    echo str_word_count($hoTen)."<br>";

    // tìm kiếm ký tự trong chuỗi
    echo strpos($hoTen, "o"). "<br>";

    // Thay thế ký tự trong chuỗi
    echo str_replace("Trong", "Nguyen",$hoTen)."<br>";

    $soThuNhat = 10;
    $soThuHai = 5;

    // Phép cộng,trừ, nhân, chia lấy nguyên, chia lấy dư
    echo $soThuNhat + $soThuHai."<br>";
    echo $soThuNhat - $soThuHai."<br>";
    echo $soThuNhat * $soThuHai."<br>";
    echo $soThuNhat / $soThuHai."<br>";
    echo $soThuNhat % $soThuHai."<br>";

    // Toán tử gán
    # += -= /= %=
    $soThuNhat += $soThuHai;
    echo $soThuNhat . "<br>";
    $soThuNhat -= $soThuHai;
    echo $soThuNhat . "<br>";
    $soThuNhat /= $soThuHai;
    echo $soThuNhat . "<br>";
    $soThuNhat %= $soThuHai;
    echo $soThuNhat . "<br>";

    // Toán tủ so sánh: ==, !=, >, <, >=, <=, ===
    echo $soThuNhat == $soThuHai ."<br>";

    // Câu đk
    // if("đk"){
    //     //logic
    // }
    // elseif("đk"){
    //     //logic
    // }else{
    //     //logic
    // }

    // Kiểm tra tổng của số thứ nhtas và sô thứ 2
    // Nếu < 15 thì in ra nhỏ hơn 15
    // = 15 và còn lại

    $soThuNhat = 20;
    $soThuHai = 5;
    if(($soThuNhat+$soThuHai) < 15 ){
        echo "Nhỏ hơn 15";
    }elseif(($soThuNhat+$soThuHai) == 15){
        echo "Bằng 15";
    }else{
        echo "Lớn hơn 15";
    }


    // switch case
    $color = "red";
    switch($color){
        case "red":
            echo "<br>";
            echo "IS RED";
            echo "<br>";
            break;

        case "blue":
            echo "<br>";
            echo "IS BLUE";
            echo "<br>";
            break;

        default:
            echo "<br>";
            echo "NO COLOR";
            echo "<br>";
            break;
    }
    
    // for
    for($i = 0; $i <= 10; $i++){
        echo $i . "<br>";
    }

    // Mảng
    echo "<br>";
    $mang = ["Anh", "Trong Thang", "Vu Anh"];
    // đếm phần tử
    echo count ($mang)."<br>";
    echo $mang[2]."<br>";

    $mang[] = "Quang Anh";
    print_r($mang);

    echo "<br>";
    unset($mang[3]);
    print_r($mang);



?>
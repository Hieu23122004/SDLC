<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
       ID: <input type="text" name="id" > <br>
       UserName: <input type="text" name ="username"><br>
       Password :<input type="password" name ="password"> <br>
       Email :<input type="text" name ="email"> <br>
       <input type="submit" name="submit" value="Register">
</form>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Bước 1: Kết nối và chọn DB
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SDLC_2";    
    // Kết nối
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    else{
        echo "kết nối thành công";
    }
// Bước 2: Xây dựng câu truy vấn
//Nhận dữ liệu từ form
$id = $_POST["id"];
$username=$_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$sql ="INSERT INTO users VALUES('$id','$username','$password','$email')";
//Bước 3: Thực thi truy vấn
$result = mysqli_query($conn,$sql);
//Bước 4: Xử lý kết quả truy vấn
if($result){
    echo "Thêm thành công";
}
else{
    echo " Thêm thất bại";
}
}
    ?>
</body>
</html>
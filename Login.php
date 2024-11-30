<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input:focus {
            border-color: #007BFF;
            outline: none;
        }
        .btn-login {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .alert {
            margin-top: 15px;
            text-align: center;
            color: #e74c3c;
        }
    </style>
</head>
<body>
<form method = "post">
   UserName: <input type="text" name ="username"> <br>
   Password: <input type="password" name = "password"> <br>
   <input type="submit" name="login" value="Login" /></form>
</form>
<?php  
  $connect = mysqli_connect('localhost','root','','SDLC_2');
 if(!$connect){
  echo"Kết nối thất bại";
 }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"]; 
   //Lựa từ bảng user cột username = username nhập từ form và cột password có giá trị bằng giá trị nhập từ form
   $sql="select * from users where username='$username' AND password='$password'";
   //Thực thi truy vấn từ database
       $result = mysqli_query($connect,$sql);
   //Xử lý kết quả truy vấn: đếm số lượng hàng trong kết quả truy vấn
       $check_login = mysqli_num_rows($result);   
       if($check_login == 0){
        echo "<script>alert('Password or username is incorrect, please try again!')</script>";
        exit();
      }  
      if($check_login > 0){ 
       echo "<script>alert('You have logged in successfully !')</script>";  
     }
   
  }
  ?>

</body>
</html>
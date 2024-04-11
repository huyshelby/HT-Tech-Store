<?php



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #frmregister {
            width: 650px;
            margin: auto;
            border: 2px solid darkblue;
            padding: 10px 10px;
        }

        #frmregister>div {
            margin-bottom: 15px;
        }

        #frmregister>div>label {
            display: block;
        }

        #frmregister>div>input {
            padding: 8px;
            outline: none;
            width: 90%;
        }

        #frmregister>div>button {
            width: 130px;
            height: 35px;
        }
        a{
            color: red;
        }
    </style>
</head>

<body>  
    <form id="frmregister" action="register__" method="post">
        <h1 style="text-align: center;">Form đăng ký</h1>
        <div>
            <label for="">Họ tên</label> <input type="text" name="hoten" id="" required>
        </div>
        <div>
            <label for="">Email</label> <input type="email" name="email" id="" required>
        </div>
        <div>
            <label for="">Mật khẩu</label> <input type="password" name="matkhau" id="" required>
        </div>
        <div>
            <label for="">Địa chỉ</label> <input type="text" name="diachi" id="" required>
        </div>
        <div>
            <label for="">Điện thoại</label> <input type="number" name="dienthoai" id="" required>
        </div>
        <div>
            <button type="submit">Đăng ký</button>
            <a href="login">Đăng nhập tại đây</a>
        </div>
    </form>
</body>

</html>
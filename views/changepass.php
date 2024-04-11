<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #frmchangepass {
            width: 650px;
            margin: auto;
            border: 2px solid darkblue;
            padding: 10px 10px;
        }

        #frmchangepass>div {
            margin-bottom: 15px;
        }

        #frmchangepass>div>label {
            display: block;
        }

        #frmchangepass>div>input {
            padding: 8px;
            outline: none;
            width: 90%;
        }

        #frmchangepass>div>button {
            width: 130px;
            height: 35px;
        }
    </style>
</head>

<body>
    <form action="changepass_" method="post" id="frmchangepass">
        <h1 style="text-align: center;">Change Password</h1>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" id="" disabled value="<?= $_SESSION['email'] ?>">
        </div>
        <div><label for="">Mật khẩu cũ</label> <input type="password" name="matkhauCu" id="" required></div>
        <div><label for="">Mật khẩu thay đổi</label> <input type="password" name="matkhauMoi1" id="" required></div>
        <div><label for="">Nhập lại mật khẩu</label> <input type="password" name="matkhauMoi2" id="" required></div>
        <div><button type="submit">Đổi mật khẩu</button></div>
    </form>
</body>

</html>
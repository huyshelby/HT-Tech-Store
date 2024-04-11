<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #frmlogin {
            width: 650px;
            margin: auto;
            border: 2px solid darkblue;
            padding: 10px 10px;
        }

        #frmlogin>div {
            margin-bottom: 15px;
        }

        #frmlogin>div>label {
            display: block;
        }

        #frmlogin>div>input {
            padding: 8px;
            outline: none;
            width: 80%;
        }

        #frmlogin>div>button {
            width: 130px;
            height: 35px;
        }
    </style>
</head>

<body>
    <form id="frmlogin" action="<?= ROOT_URL ?>admin/login_" method="post">
    <h1 style="text-align: center;">Form đăng nhập</h1>
        <div> <label>Email</label> <input type="email" name="email"> </div>
        <div> <label>Mật khẩu</label> <input type="password" name="matkhau"> </div>
        <div> <button type="submit">Đăng nhập</button> </div>
    </form>

</body>

</html>
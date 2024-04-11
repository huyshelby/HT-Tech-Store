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
            width: 90%;
        }

        #frmlogin>div>button {
            width: 130px;
            height: 35px;
        }

        /* form {
            max-width: 400px;
            margin: 0 auto;
        }

        label,
        input {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        } */
        a{
            color: red;
        }
    </style>
</head>

<body>

    <form id="frmlogin" action="login_" method="post">
        <h1 style="text-align: center;">Form đăng nhập</h1>
        <div>
            <label for="">Email</label> <input type="email" name="email" id="" placeholder="abc@gmail.com" required>
        </div>
        <div>
            <label for="">Mật khẩu</label> <input type="password" name="matkhau" id="" placeholder="****" required>
        </div>
        <div>
            <button type="submit">Đăng nhập</button>
            <a href="register">Đăng ký tại đây</a>
        </div>

        
    </form>
    <!-- <form>
        <h1>Đăng nhập</h1>

        <label for="email">Email</label>
        <input type="email" id="email" name="email">

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="matkhau">

        <button type="submit">Đăng nhập</button>
    </form> -->
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #frmcheckout {
            width: 700px;
            margin: auto;
        }

        #frmcheckout>div {
            margin-bottom: 15px;
        }

        #frmcheckout>div>label {
            color: darkblue;
            display: block;
        }

        #frmcheckout>div>input {
            width: 95%;
            padding: 10px;
            outline: none;
        }

        #frmcheckout>div>button {
            width: 120px;
            height: 35px;
        }
    </style>
</head>

<body>
    <?php
    // session_unset();    
        if(isset($_SESSION['cart'])==false || count($_SESSION['cart']) == 0){
            echo "Bạn chưa có sản phẩm";
        } else{
            echo ' 
            <form id="frmcheckout" action="checkout_" method="post">
            <div>
                <label for="">Họ tên</label> <input type="text" name="hoten" id="" required>
            </div>
            <div>
                <label for="">Email</label> <input type="email" name="email" id="" required>
            </div>
            <div>
                <label for="">Địa chỉ</label> <input type="text" name="diachi" id="" required>
            </div>
            <div>
                <label for="">Điện thoại</label> <input type="number" name="dienthoai" min="0" id="" required>
            </div>
            <div>
                <label for=""></label> <button type="submit">Lưu đơn hàng</button>
            </div>
        </form>
            ';
        }
    ?>
     
</body>

</html>
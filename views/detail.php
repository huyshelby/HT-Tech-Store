<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #chitietsp {
            display: grid;
            grid-template-columns: 40% auto;
            gap: 30px;
        }

        #chitietsp>#trai>img {
            max-width: 100%;
            margin: 10px;
        }

        #chitietsp #phai>h1 {
            font-size: 24px;
        }

        #chitietsp #phai>p {
            font-size: 20px;
        }

        #chitietsp form button:nth-child(1) {
            background: darkcyan;
            padding: 10px 15px;
            border: none;
            color: white
        }

        #chitietsp form button:nth-child(2) {
            background: orange;
            padding: 10px 15px;
            border: none;
            color: white
        }
        form a{
            text-decoration: none;
            color: white;
            padding: 8px 17px;
            background-color: blue;
        }
    </style>
</head>

<body>
    <div id="chitietsp">
        <div id="trai">
            <img src="<?= $sp['hinh'] ?>" alt="">
        </div>
        <div id="phai">
            <h1>Tên sản phẩm: <?= $sp['ten_sp'] ?></h1>
            <p>Giá gốc: <?= number_format($sp['gia'], 0); ?> VNĐ </p>
            <p>Khuyến mãi: <?= number_format($sp['gia_km'], 0); ?>VNĐ</p>
            <p>Ngày: <?= date('d/m/y', strtotime($sp['ngay'])); ?></p>
            <form action="addtocart" method="get">
                <!-- <button type="button">Quay lại</button> -->
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ROOT_URL . '' ?>">Quay lại</a>
                <a href="<?= ROOT_URL."addtocart?id=".$sp['id_sp'] ?> &soluong=1">Thêm vào giỏ hàng</a>
            </form>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a{
            text-decoration: none;
            padding: 15px;
            background-color: burlywood;
            color: white;
        }
        #last{
            display: flex;
            margin-top: 10px;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="cart">
        <h1 style="text-align: center;">Trang giỏ hàng</h1>
        <?php $tongtien = $tongsoluong = 0; ?>
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($_SESSION['cart'] as $id_sp => $soluong) { ?>
                        <?php
                        // session_unset();
                        $sp = $this->model->detail($id_sp);
                        $tien = $sp['gia'] * $soluong;
                        $tongtien = $tongtien + $tien;
                        $tongsoluong = $tongsoluong + $soluong; // -3-4-5-10
                        ?>
                        <td><span><?= $sp['ten_sp'] ?></span></td>
                        <td><input type="number" name="soluong[]" value="<?= $soluong ?>"></td>
                        <td><span><?= number_format($sp['gia'], 0) ?></span></td>
                        <td><span><?= number_format($tien, 0) ?></span></td>
                </tr>
            <?php }
            ?>
            </tbody>
            
        </table>
        <div id="last">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ROOT_URL . '' ?>">Trở lại trang trước</a>
                <a href="checkout">Thanh tóan đơn hàng</a>
            </div>
    </div>
</body>

</html>
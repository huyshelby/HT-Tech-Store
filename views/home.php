<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #spnoibat h2,
    #spxemnhieu h2 {
        font-size: 22px;
        padding: 8px;
        background: darkcyan;
        color: white;
        margin: 0
    }

    #listsp {
        display: grid;
        grid-template-columns: auto auto auto;
        gap: 20px;
    }

    #listsp>.sp {
        text-align: center;
    }

    #listsp>.sp h4 {
        margin: 5px;
    }

    #listsp>.sp a {
        text-decoration: none;
        color: black
    }

    #listsp>.sp a:hover {
        color: red;
    }

    #listsp>.sp b {
        color: darkorange;
        font-size: 18px;
        ;
    }

    #listsp>.sp>img {
        max-width: 98%;
        height: 180px;
        margin-bottom: 5px
    }
    </style>
</head>
<body>
<div id="spnoibat">
        <h2>Sản phẩm nổi bật</h2>
        <div id="listsp">
            <?php foreach ($spnb as $sp) { ?>
                <div class="sp">
                    <h4>
                        <a href="<?= ROOT_URL . "sp?id=" . $sp['id_sp'] ?>">
                            <?= $sp['ten_sp'] ?>
                        </a>
                    </h4>
                    <img src="<?= $sp['hinh'] ?>" alt="">
                    <p><b>Giá <?= number_format($sp['gia'], 0, "", ".") ?> VNĐ</b></p>
                    <p>
                        <a href="<?= ROOT_URL."addtocart?id=".$sp['id_sp'] ?> &soluong=1">Thêm vào giỏ hàng</a>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
    <hr>
    <div id="spxemnhieu">
        <h2>Sản phẩm xem nhiều</h2>
        <div id="listsp">
            <?php foreach ($spxn as $sp) { ?>
                <div class="sp">
                    <h4>
                        <a href="<?= ROOT_URL . "sp?id_sp=" . $sp['id_sp'] ?>">
                            <?= $sp['ten_sp'] ?>
                        </a>
                    </h4>
                    <img src="<?= $sp['hinh'] ?>" alt="">
                    <p><b>Giá <?= number_format($sp['gia'], 0, "", ".") ?> VNĐ</b></p>
                    <p>
                        <a href="<?= ROOT_URL."addtocart?id=".$sp['id_sp'] ?> &soluong=1">Thêm vào giỏ hàng</a>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
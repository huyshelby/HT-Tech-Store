<!-- <h1>Sản phẩm trong loại</h1> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #sptrongloai h2 {
            margin: 0;
            font-size: 23px;
            border-bottom: 1px solid darkorange;
            padding: 8px
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

        #pagination {
            margin: 20px;
            text-align: center;
            font-size: 20px;
        }

        #pagination a {
            text-decoration: none;
            color: chocolate;
            font-weight: 900;
            margin: 5px;
        }

        #pagination a:hover {
            color: darkblue;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div id="sptrongloai">
        <h2>Sản phẩm trong loại <?= $ten_loai ?></h2>
        <div id="listsp">
            <?php foreach ($listsp as $sp) { ?>
                <div class="sp">
                    <h4><a href="<?= "sp?id=".$sp['id_sp'] ?>"><?= $sp['ten_sp'] ?></a></h4>
                    <h4>
                        <a href="<?= ROOT_URL . "sp?id=" . $sp['id_sp'] ?>"></a>
                    </h4>
                    <img src="<?= $sp['hinh'] ?>" alt="">
                    <b><?= number_format($sp['gia'], 0) ?>VNĐ</b>
                    <p>
                        <a href="<?= ROOT_URL."addtocart?id=".$sp['id_sp'] ?> &soluong=1">Thêm vào giỏ hàng</a>
                    </p>
                </div>

            <?php  } ?>
        </div>

        <div id="pagination">
            <?php if ($pageNum>=2) { ?>
                <a href="<?= "loai?idloai=$idloai&page=1"; ?>">Trang đầu</a>
            <?php } ?>

            <?php if ($pagePrev>=1) { ?>
                <a href="<?= "loai?idloai=$idloai&page=$pagePrev"; ?>">Trang trước</a>
            <?php } ?>

            <?php if ($pageNext<$tongSoTrang) { ?>
                <a href="<?= "loai?idloai=$idloai&page=$pageNext"; ?>">Trang sau</a>
            <?php } ?>

            <?php if ($pageNum<$tongSoTrang) { ?>
                <a href="<?=  "loai?idloai=$idloai&page=$tongSoTrang"; ?>">Trang cuối</a>
            <?php } ?>
        </div>

    </div>
</body>

</html>
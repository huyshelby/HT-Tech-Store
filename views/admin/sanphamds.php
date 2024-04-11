<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> -->
    <script src="https://kit.fontawesome.com/d2ad07b7f4.js" crossorigin="anonymous"></script>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        p>a {
            text-decoration: none;
            padding: 10px;
            background-color: burlywood;
            color: white;
            font-size: 20px;
        }


        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
        }

        .pagination a.active {
            background-color: darkorange;
            color: white;
            border: 1px solid darkorange;
        }

        .pagination a.activee {
            background-color: blue;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
        }

    </style>
</head>

<body>
    <h1 style="text-align: center;">Danh sách sản phẩm</h1>
    <p><a href="<?= ADMIN ?>add">Thêm sản phẩm</a></p>
    <?php

    if (isset($params['id'])) { ?>
        <form action="" method="post">
            <button>Xóa</button>
            <button>không</button>
        </form>
    <?php
    }

    ?>
    <table>
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm

                    <?php
                    if (!isset($params['order'])) {
                    ?>
                        <a href="sp?order=asc&col=ten_sp">↑</a>
                        <?php
                    }
                    if (isset($params['order'])) {
                        if ($params['order'] == 'asc') {
                        ?>
                            <a href="sp?order=desc&col=ten_sp">↓</a>
                        <?php
                        }
                        if ($params['order'] == 'desc') {
                        ?>
                            <a href="sp?order=asc&col=ten_sp">↑</a>
                    <?php
                        }
                    }
                    ?>

                </th>
                <th>loại</th>
                <th>Giá
                    <?php
                    if (!isset($params['order'])) {
                    ?>
                        <a href="sp?order=asc&col=gia">↑</a>
                        <?php
                    }
                    if (isset($params['order'])) {
                        if ($params['order'] == 'asc') {
                        ?>
                            <a href="sp?order=desc&col=gia">↓</a>
                        <?php
                        }
                        if ($params['order'] == 'desc') {
                        ?>
                            <a href="sp?order=asc&col=gia">↑</a>
                    <?php
                        }
                    }
                    ?>
                </th>
                <th>Giá khuyến mãi</th>
                <th>Hình</th>
                <th>Ngày</th>
                <th>Ẩn hiện</th>
                <th>Nổi bật</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // echo $sort;
            foreach ($listsp as $i => $sp) { ?>
                <tr>
                    <td><?= $sp['id_sp'] ?></td>
                    <td><?= $sp['ten_sp'] ?></td>
                    <td><?php
                        if (!empty($sp['id_loai']) && isset($sp['id_loai'])) {
                            $a = $this->model->laytenloai($sp['id_loai']);
                            echo $a;
                        } else {
                            echo "";
                        }
                        ?></td>
                    <td><?= number_format($sp['gia'], 0, '', '.') ?> VNĐ</td>
                    <td><?= number_format($sp['gia_km'], 0, '', '.') ?> VNĐ</td>
                    <td><img src="<?= $sp['hinh'] ?>" width="100" alt=""></td>
                    <td><?= $sp['ngay'] ?></td>
                    <td><?= $sp['anhien'] == 0 ? "Ẩn" : "Hiện" ?></td>
                    <td><?= $sp['hot'] == 0 ? "Bình thường" : "Nổi bật" ?></td>
                    <td>
                        <a href="edit?id=<?= $sp['id_sp'] ?>">Sửa</a>
                        <a href="delete?id_sp=<?= $sp['id_sp'] ?>">Xóa</a>

                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <div class="" style="text-align: center;">
        <?php
        
        if ($pageNum > 1) { ?>
            <div class="pagination">
                <a href="sp?page=<?= $pagePrev ?>" class="activee"><i class="fa-solid fa-angles-left"></i></a>
                <?php
                if ($pageNum > 3) { ?>
                    <a>...</a>
                <?php
                }
                ?>
            </div>
            <?php
        }
        if($pageNum > 3){ 
            $a = 1;
            ?>
            <div class="pagination">
                <a href="sp?page=<?= $a ?>" class="activee"><?= $a ?></i></a>
            </div>
        <?php
        }
        for ($i = 1; $i < $tongsotrang; $i++) {
            if ($i != $pageNum) {
                if ($i > $pageNum - 3 && $i < $pageNum + 3) { ?>
                    <div class="pagination">
                        <a href="sp?page=<?= $i ?>" class="active"><?= $i ?></a>
                    </div>
                <?php
                }
            } else { ?>
                <div class="pagination">
                    <strong><a href=""><?= $i ?></a></strong>
                </div>
            <?php
            }
        }
        if($pageNum < $tongsotrang - 3){ ?>
            <div class="pagination">
                <a href="sp?page=<?= $tongsotrang ?>" class="activee"><?= $tongsotrang ?></i></a>
            </div>
        <?php
        }
        if ($pageNum < $tongsotrang - 1) { ?>
            <div class="pagination">
                <a>...</a>
                <a href="sp?page=<?= $pageNext ?>" class="activee"><i class="fa-solid fa-angles-right"></i></a>
            </div>
        <?php
        }
        

        ?>
    </div>
</body>

</html>
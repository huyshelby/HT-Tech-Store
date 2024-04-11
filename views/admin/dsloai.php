<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/d2ad07b7f4.js" crossorigin="anonymous"></script>

    <style>
        #danhsachLoaiSP {
            width: 800px;
            margin: auto;
        }

        #danhsachLoaiSP h2 {
            margin: 0;
            font-size: 23px;
            padding: 8px;
            background-color: darkcyan;
            color: white;
        }

        #listLoaiSP>.loai {
            border: 1px solid darkcyan;
            padding: 10px;
            display: grid;
            grid-template-columns: 400px auto auto auto
        }

        #listLoaiSP>.loai>*:last-child {
            text-align: right;
        }

        #listLoaiSP>.loai a {
            text-decoration: none;
            color: black
        }

        #listLoaiSP>.loai a:hover {
            color: red;
        }

        #listLoaiSP>.loai b {
            color: darkorange;
            font-size: 18px;
        }


        #pagination{
            margin: auto;
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

        p>a {
            text-decoration: none;
            padding: 10px;
            background-color: burlywood;
            color: white;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <p><a href="<?= ADMIN ?>addloai">Thêm loại sản phẩm</a></p>
    <div id="danhsachLoaiSP">
        <h2 style="text-align: center;">Danh sách loại sản phẩm</h2>
        <div id="listLoaiSP">
            <div class="loai">
                <b>Tên loại</b> <b>Thứ tự</b> <b>Ẩn hiện</b> <b>Action</b>
            </div>
            <?php
            foreach ($listLoaiSP as $loai) {
            ?>
                <div class="loai">
                    <span><?= $loai['ten_loai'] ?></span>
                    <span><?= $loai['thutu'] ?></span>
                    <span><?= $loai['anhien'] == 0 ? "Đang ẩn" : "Đang hiện" ?></span>
                    <span>
                        <a href="<?= ADMIN ?>editloai?id_loai=<?= $loai['id_loai'] ?>">Sửa</a>
                        <a href="<?= ADMIN ?>deleteloai?id_loai=<?= $loai['id_loai'] ?>" onclick="return confirm('Xóa hả ní?')">Xóa</a>
                    </span>
                </div>

            <?php
            }
            ?>
        </div>
    </div>


    <!-- pagination -->
    <div id="pagination" class="">
        <?php

        if ($pageNum > 1) { ?>
            <div class="pagination">
                <a href="loai?page=<?= $pagePrev ?>" class="activee"><i class="fa-solid fa-angles-left"></i></a>
            </div>
        <?php
        }
        for ($i = 1; $i <= $tongsotrang; $i++) {
            if ($i != $pageNum) {
                if ($i > $pageNum - 3 && $i < $pageNum + 3) { ?>
                    <div class="pagination">
                        <a href="loai?page=<?= $i ?>" class="active"><?= $i ?></a>
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
        if ($pageNum < $tongsotrang - 1) { ?>
            <div class="pagination">
                <a>...</a>
                <a href="loai?page=<?= $pageNext ?>" class="activee"><i class="fa-solid fa-angles-right"></i></a>
            </div>
        <?php
        }


        ?>
    </div>
</body>

</html>
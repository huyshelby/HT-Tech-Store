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
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID bài viết</th>
                <th>Tiêu đề</th>
                <th>Ngày</th>
                <th>Số lần xem</th>
                <th>Nội dung</th>
                <th>Hình</th>
                <th>Ẩn hiện</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // echo $sort;
            foreach ($baiviet as $bv) { ?>
                <tr>
                    <td><?= $bv['id_bv'] ?></td>
                    <td><?= $bv['tieu_de'] ?></td>
                    <td><?= $bv['ngay'] ?></td>
                    <td><?= $bv['so_lan_xem'] ?></td>
                    <td><?= $bv['noi_dung'] ?></td>
                    <td><?= $bv['hinh'] ?></td>
                    <!-- <td><img src="./imgne/<?= $bv['hinh'] ?>" width="100" alt=""></td> -->
                    <td><?= $bv['an_hien'] == 0 ? "Ẩn" : "Hiện" ?></td>
                    <td>
                        <a href="editbv?id=<?= $bv['id_bv'] ?>">Sửa</a>
                        <a href="deletebv?id=<?= $bv['id_bv'] ?>" onclick="return confirm('Chắc chắn xóa ?')">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>
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
                <th>ID tin tức</th>
                <th>Tiêu đề</th>
                <th>Ngày</th>
                <th>Số lần xem</th>
                <th>Nội dung</th>
                <th>Hình</th>
                <th>Nổi bật</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tin as $t) { ?>
                <tr>
                    <td><?= $t['idtin'] ?></td>
                    <td><?= $t['tieude'] ?></td>
                    <td><?= $t['ngaydang'] ?></td>
                    <td><?= $t['luotxem'] ?></td>
                    <td><?= $t['noidung'] ?></td>
                    <td><?= $t['urlhinh'] ?></td>
                    <!-- <td><img src="../public/img/<?= $t['urlhinh'] ?>" width="100" alt="Đây là hình tin tức"></td> -->
                    <td><?= $t['hot'] == 0 ? "Bình thường" : "Nổi bật" ?></td>
                    <!-- <td>
                        <a href="editbv?id=<?= $t['idtin'] ?>">Sửa</a>
                        <a href="deletetin?id=<?= $t['idtin'] ?>" onclick="return confirm('Chắc chắn xóa ?')">Xóa</a>
                    </td> -->
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>
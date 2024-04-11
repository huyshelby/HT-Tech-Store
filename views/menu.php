<!-- <nav> THANH MENU </nav> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #thanhmenu {
            padding: 0;
            margin: 0;
            list-style: none;
            text-align: center;
        }

        #thanhmenu>li {
            display: inline;
            line-height: 60px;
            margin: 5px;
        }

        #thanhmenu>li>a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            text-transform: uppercase;
        }

        #thanhmenu>li>a:hover {
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
    <ul id="thanhmenu">
        <li><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
        <?php foreach ($this->listloai as $loai) { ?>
            <li>
                <a href="<?= "loai?idloai=" . $loai['id_loai']; ?>">
                <?= $loai['ten_loai'] ?>
            </a>
            </li>
        <?php } ?>
    </ul>
</body>

</html>
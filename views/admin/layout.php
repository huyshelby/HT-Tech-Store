<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #container {
            width: 1200px;
            margin: auto;
        }

        #container>header {
            height: 80px;
            background-color: darkcyan;
        }

        #container>nav {
            height: 45px;
            background-color: darkorange;
        }

        #container>main {
            min-height: 400px;
            display: flex;
            background-color: lightcyan;
        }

        #container>main>article {
            width: 100%;
        }

        #thanhmenu {
            padding: 0;
            margin: 0;
            list-style: none;
            text-align: center;
            font-family: Verdana
        }

        #thanhmenu>li {
            display: inline;
            line-height: 45px;
            margin: 5px;
        }

        #thanhmenu>li>a {
            text-decoration: none;
            color: lightcyan;
            font-weight: 600;
            text-transform: uppercase;
        }

        #thanhmenu>li>a:hover {
            color: yellow;
        }

        #container>header {
            position: relative;
        }

        #userinfo {
            position: absolute;
            bottom: 10px;
            right: 20px;
            color: yellow
        }
    </style>
</head>

<body>
    <div id="container">
        <header>
            <b id="userinfo">
                <?php if (isset($_SESSION['hoten'])) echo "Hi " . $_SESSION['hoten']; ?>
            </b>
            <!-- <b><a href="<?=ADMIN?>logout">Thoát</a></b> -->
        </header>
        <nav>
            <ul id="thanhmenu">
                <li><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
                <li><a href="<?= ADMIN ?>loai">Quản trị danh mục</a></li>
                <li><a href="<?= ADMIN ?>sp">Quản trị sản phẩm</a></li>
                <li><a href="<?= ADMIN ?>loai">Quản trị loại hàng</a></li>
                <li><a href="#">Quản trị đơn hàng</a></li>
                <li><a href="<?=ADMIN?>logout">Thoát</a></li>
                <!-- <li><a href="#">Thoat</a></li> -->
            </ul>
        </nav>
        <main>
            <article>
                <?php
                if (empty($view_content)) {
                    $view_content = "sanphamds.php";
                    include $view_content;
                } else {
                    include $view_content;
                }
                ?>
            </article>
        </main>
    </div>
</body>

</html>
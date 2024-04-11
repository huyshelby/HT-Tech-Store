<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #333;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav a {
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            /* font-weight: bold; */
        }

        header a::after {
            content: '';
            width: 0;
            height: 2px;
            background: red;
            position: absolute;
            left: 0;
            bottom: -4px;
            transition: width 0.3s ease;
        }

        header a:hover::after {
            width: 90%;
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            position: relative;
        }

        .login-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 18px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-btn:hover {
            background-color: #0062cc;
        }

        .logout-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 18px;
            cursor: pointer;
            font-size: 16px;
        }

        .logout-btn:hover {
            background-color: #0062cc;
        }
    </style>
</head>

<body>
    <!-- <div style="display: flex; justify-content: space-between;">
    <header> THÔNG TIN HEADER</header>
    <a href="<?= ROOT_URL ?>showcart"><img src="<?= PUBLIC_URL ?>/img/shopping-cart.png" style="width:50px;height:50px" alt=""></a>
    </div>     -->
    <header>
        <div class="logo">
            <img src="<?= PUBLIC_URL ?>/img/logo.png" style="width:100px;height:100px" alt="">
        </div>

        <nav>
            <ul>
                <li><a href="<?= ROOT_URL ?>" class="active">Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Sản phẩm</a></li>
                <li><a href="#">Tin tức</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </nav>

        <div class="header-right">
            <?php
            if (!isset($_SESSION['id_user'])) {
                echo '
                    <form action="login" method="post">
                    <button class="login-btn">Đăng nhập</button>
                </form>
                    ';
            } else{
                echo '
                    <form action="logout" method="post">
                    <button class="logout-btn">Đăng xuất</button>
                </form>
                    ';
            }
            ?>

        </div>
    </header>


    <script>
        // const links = document.querySelectorAll('nav a');

        // links.forEach(link => {
        //     link.addEventListener('mouseover', () => {
        //         link.classList.add('active');
        //     });

        //     link.addEventListener('mouseleave', () => {
        //         link.classList.remove('active');
        //     });
        // });
    </script>
</body>

</html>
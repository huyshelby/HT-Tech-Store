<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h2>Về Chúng Tôi</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tortor sapien, aliquam sit amet est vitae, interdum mollis nisl. Sed porta auctor massa, vitae elementum turpis finibus ut. Curabitur tristique ante lorem, sed congue ante dapibus in.
                </p>
            </div>

            <div class="footer-section links">
                <h2>Liên Kết Hữu Ích</h2>
                <ul>
                    <li><a href="#">Trang Chủ</a></li>
                    <li><a href="#">Về Chúng Tôi</a></li>
                    <li><a href="#">Sản Phẩm</a></li>
                    <li><a href="#">Dịch Vụ</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                </ul>
            </div>

            <div class="footer-section contact">
                <h2>Liên Hệ</h2>
                <ul>
                    <li>Địa Chỉ: 236 Hoàng Quốc Việt, Cầu Giấy, Hà Nội</li>
                    <li>Điện Thoại: 0123 456 789</li>
                    <li>Email: info@website.com</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; 2023 Công Ty TNHH ABC. All rights reserved.
        </div>
    </footer>

    <style>
        a{
            text-decoration: none;
        }
        footer {
            background: #333;
            color: #fff;
            padding: 2em;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
        }

        .footer-section {
            width: 30%;
        }

        footer h2 {
            color: #0f90f3;
            margin-bottom: 1em;
        }

        footer li {
            margin-bottom: 0.5em;
        }

        footer a {
            color: #fff;
        }

        .footer-bottom {
            background: #000;
            padding: 1em;
            text-align: center;
        }
    </style>

    <script>
        // Thêm hiệu ứng khi hover vào link
        const links = document.querySelectorAll('footer a');

        links.forEach(link => {
            link.addEventListener('mouseover', () => {
                link.style.textDecoration = 'underline';
            });

            link.addEventListener('mouseout', () => {
                link.style.textDecoration = 'none';
            });
        });
    </script>

</body>

</html>
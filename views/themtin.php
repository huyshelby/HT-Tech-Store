<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #frmthemsp {
            width: 900px;
            margin: auto;
            border: 2px solid darkblue;
            padding: 10px 10px;
        }

        #frmthemsp>div {
            margin-bottom: 15px;
        }

        #frmthemsp>div>label {
            display: block;
        }

        #frmthemsp .txt {
            height: 40px;
            outline: none;
            width: 100%;
        }

        #frmthemsp>div>button {
            width: 130px;
            height: 35px;
        }

        #frmthemsp .haicot {
            display: flex;
            justify-content: space-between
        }

        #frmthemsp .haicot>div {
            width: 48%;
        }

        #frmthemsp #noidung {
            height: 120px;
        }
    </style>
</head>

<body>
    <?php
        if(isset($_SESSION['check'])){ ?>
            <h1 style="text-align: center;"><?= $_SESSION['check']; ?></h1>
            <?php
                session_unset();
                // header("Refresh:1,".ROOT_URL."addtin");
            ?>
            <?php
        }
    ?>
    <form action="addtin_" id="frmthemsp" method="post" enctype="multipart/form-data">
        <h1 style="text-align: center;">Thêm tin</h1>
        <div class="haicot">
            <div> <label for="">Tiêu đề</label> <input type="text"  name="tieude" id="" class="txt"></div>
            <div> <label for="">Ngày đăng</label> <input type="date"  name="ngay_dang" id="" class="txt"></div>
        </div>
        <div class="haicot">
            <div>
                <label for="">Lượt xem</label>
                <input type="number" name="luot_xem"  class="txt">
            </div>
        </div>
        <div class="haicot">
            <div> <label for="">Hot</label>
                <input type="radio" name="hot"  value="0" id="" checked> Bình thường
                <input type="radio" name="hot"  value="1" id=""> Nổi bật
            </div>
        </div>
        <div>
            <label for="">Nội dung</label>
            <textarea name="noi_dung" id="noidung"  class="txt" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="">URL hình</label> <input type="file" name="url_hinh" class="txt" id="">
        </div>
        <div><button type="submit">Thêm</button></div>
    </form>
</body>

</html>
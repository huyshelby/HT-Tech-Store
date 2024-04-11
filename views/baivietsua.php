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
    <form action="editbv_" id="frmthemsp" method="post" enctype="multipart/form-data">
        <h1 style="text-align: center;">Thêm bài viết</h1>
        <div class="haicot">
            <div> <label for="">Tiêu đề</label> <input type="text" name="tieu_de" id="" class="txt" value="<?= $bv['tieu_de'] ?>"></div>
            <div> <label for="">Ngày thêm</label> <input type="date" name="ngay" id="" class="txt" value="<?= $bv['ngay'] ?>"></div>
        </div>
        <div class="haicot">
            <div>
                <label for="">Số lần xem</label>
                <input type="number" name="so_lan_xem" value="<?= $bv['so_lan_xem'] ?>" class="txt">
            </div>
        </div>
        <div class="haicot">
            <div> <label for="">Ẩn hiện</label>
                <input type="radio" name="anhien" <?= $bv['an_hien'] == 0 ? "checked" : "" ?> value="0" id=""> Ẩn
                <input type="radio" name="anhien" <?= $bv['an_hien'] == 1 ? "checked" : "" ?> value="1" id="" checked> Hiện
            </div>
        </div>
        <div>
            <label for="">Nội dung</label>
            <textarea name="noidung" id="noidung" value="<?= $bv['noi_dung'] ?>" class="txt" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="">Hình</label> <input type="file" name="hinh" class="txt" id="">
            <p><?= $bv['hinh'] ?></p>
        </div>
        <div><input type="hidden" name="id_bv" value="<?= $bv['id_bv'] ?>"></div>
        <div><button type="submit">Thêm</button></div>
    </form>
</body>

</html>
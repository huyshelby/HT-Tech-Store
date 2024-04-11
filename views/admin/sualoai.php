<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #frmsualoaisp {
            width: 600px;
            margin: auto;
            border: 2px solid darkblue;
            padding: 10px 10px;
        }

        #frmsualoaisp>div {
            margin-bottom: 15px;
        }

        #frmsualoaisp>div>label {
            display: block;
        }

        #frmsualoaisp>div>button {
            width: 180px;
            height: 35px;
        }

        #frmsualoaisp .txt {
            height: 40px;
            outline: none;
            width: 100%;
        }
    </style>
</head>

<body>
    <form id="frmsualoaisp" action="<?= ADMIN ?>editloai_" method="post">
    <h1 style="text-align: center;">Cập nhật loại</h1>
        <div><label>Tên loại sản phẩm</label>
            <input class="txt" type="text" name="ten_loai" value="<?= $loai['ten_loai'] ?>">
        </div>
        <div> <label>Thứ tự</label>
            <input class="txt" type="number" name="thutu" value="<?= $loai['thutu'] ?>">
        </div>
        <div> <label>Ẩn hiện</label>
            <input type="radio" name="anhien" value="0" <?= $loai['anhien'] == 0 ? "checked" : ""; ?>>Ẩn
            <input type="radio" name="anhien" value="1" <?= $loai['anhien'] == 1 ? "checked" : "" ?>>Hiện
        </div>
        <input type="hidden" name="id_loai" value="<?= $loai['id_loai'] ?>">
        <div> <button type="submit">Cập nhật loại sản phẩm</button> </div>
    </form>

</body>

</html>
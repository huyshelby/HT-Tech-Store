<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #frmthemloaisp {
            width: 600px;
            margin: auto;
            border: 2px solid darkblue;
            padding: 10px;
        }

        #frmthemloaisp>div {
            margin-bottom: 15px;
        }

        #frmthemloaisp>div>label {
            display: block;
        }

        #frmthemloaisp>div>button {
            width: 180px;
            height: 35px;
        }

        #frmthemloaisp .txt {
            height: 40px;
            outline: none;
            width: 100%;
        }
    </style>
</head>

<body>
    <form id="frmthemloaisp" action="<?= ADMIN ?>addloai_" method="post">
        <h1 style="text-align: center;">Thêm loại</h1>
        <div>
            <label for="">Tên loại sản phẩm</label>
            <input type="text" class="txt" name="ten_loai" required>
        </div>
        <div>
            <label for="">Thứ tự</label>
            <input type="number" class="txt" name="thutu" required>
        </div>
        <div>
            <label for="">Ẩn hiện</label>
            <input type="radio" name="anhien" checked value="0"> Ẩn
            <input type="radio" name="anhien" value="1"> Hiện
        </div>
        <div>
            <button type="submit">Thêm loại sản phẩm</button>
        </div>
    </form>
</body>

</html>
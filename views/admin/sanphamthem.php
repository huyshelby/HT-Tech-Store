<!-- <h1>Them san pham</h1> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tiny.cloud/1/z49gfo6l2x9ft0swezj4tgdhm8k4lumgs6adzcxmlad6z8v0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mota',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
        });
    </script>
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

        #frmthemsp #mota {
            height: 120px;
        }
    </style>
</head>

<body>
    <form action="<?= ROOT_URL ?>admin/add_" id="frmthemsp" method="post" enctype="multipart/form-data">
        <h1 style="text-align: center;">Thêm sản phẩm</h1>
        <div class="haicot">
            <div> <label for="">Tên sản phẩm</label> <input type="text" name="ten_sp" id="" class="txt"></div>
            <div> <label for="">Ngày thêm</label> <input type="date" name="ngay" id="" class="txt"></div>
        </div>
        <div class="haicot">
            <div> <label for="">Giá</label> <input type="number" name="gia" id="" class="txt"></div>
            <div> <label for="">Giá khuyến mãi</label> <input type="number" name="gia_km" id="" class="txt"></div>
        </div>
        
        <div class="haicot">
            <div> <label for="">Ẩn hiện</label>
                <input type="radio" name="anhien" value="0" id=""> Ẩn
                <input type="radio" name="anhien" value="1" id="" checked> Hiện
            </div>
            <div> <label for="">Nổi bật</label>
                <input type="radio" name="hot" value="0" id="" checked> Bình thường
                <input type="radio" name="hot" value="1" id=""> Nổi bật
            </div>
        </div>
        <div>
            <label for="">Mô tả</label>
            <textarea name="mota" id="mota" class="txt" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="">Hình</label> <input type="file" name="hinh" class="txt" id="">
        </div>

        <div class="haicot">
            <div> <label for="">Loại</label> 
            <select name="loai" id="">
                <?php
                    foreach ($type as $sp) { ?>
                        <option  value="<?= $sp['id_loai'] ?>"> <?= $sp['ten_loai'] ?> </option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div><button type="submit">Thêm</button></div>
    </form>
</body>
</html>
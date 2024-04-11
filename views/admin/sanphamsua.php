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
        #frmsuasp {
            width: 900px;
            margin: auto;
            border: 2px solid darkblue;
            padding: 10px 10px;
        }

        #frmsuasp>div {
            margin-bottom: 15px;
        }

        #frmsuasp>div>label {
            display: block;
        }

        #frmsuasp .txt {
            height: 40px;
            outline: none;
            width: 100%;
        }

        #frmsuasp>div>button {
            width: 130px;
            height: 35px;
        }

        #frmsuasp .haicot {
            display: flex;
            justify-content: space-between
        }

        #frmsuasp .haicot>div {
            width: 48%;
        }

        #frmsuasp #mota {
            height: 120px;
        }
    </style>
</head>

<body>


    <form action="<?= ROOT_URL ?>admin/edit_" id="frmsuasp" method="post">
        <div class="haicot">
            <div> <label for="">Ten san pham</label> <input type="text" name="ten_sp" id="" class="txt" value="<?= $sp['ten_sp'] ?>"></div>
            <div> <label for="">Ngay</label> <input type="date" name="ngay" id="" class="txt" value="<?= $sp['ngay'] ?>"></div>
        </div>
        <div class="haicot">
            <div> <label for="">Gia</label> <input type="number" name="gia" id="" class="txt" value="<?= $sp['gia'] ?>"></div>
            <div> <label for="">Gia km</label> <input type="number" name="gia_km" id="" class="txt" value="<?= $sp['gia_km'] ?>"></div>
        </div>
        <div class="haicot">
            <div> <label for="">An hien</label>
                <input type="radio" name="anhien" value="0" id="" <?= $sp['anhien'] == 0 ? "checked" : "" ?>> An
                <input type="radio" name="anhien" value="1" id="" <?= $sp['anhien'] == 1 ? "checked" : "" ?>> Hien
            </div>
            <div> <label for="">Noi bat</label>
                <input type="radio" name="hot" value="0" id="" <?= $sp['hot'] == 0 ? "checked" : "" ?>> Binh thuong
                <input type="radio" name="hot" value="1" id="" <?= $sp['hot'] == 1 ? "checked" : "" ?>> Noi bat
            </div>
        </div>
        <div>
            <label for="">Mo ta</label>
            <textarea name="mota" id="mota" class="txt" cols="30" rows="10"><?= $sp['mota'] ?></textarea>
        </div>
        <div>
            <label for="">Hinh</label> <input type="file" name="hinh" class="txt" id=""><br>
            <i><?= $sp['hinh'] ?></i>
        </div>
        <div class="haicot">
            <div> <label for="">Loại</label>
                <select name="loai" class="">
                    <?php foreach ($type as $t) {
                        if ($t['id_loai'] == $sp['id_loai']) { ?>
                            <option value="<?= $sp['id_loai'] ?>"><?= $t['ten_loai'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $t['id_loai'] ?>"><?= $t['ten_loai'] ?></option>
                    <?php
                        }
                    }; ?>
                </select>

            </div>
            <div>
                <input type="hidden" value="<?= $sp['id_sp'] ?>" name="id_sp" id="">
                <button type="submit">Cập nhật</button>
            </div>
    </form>
</body>

</html>
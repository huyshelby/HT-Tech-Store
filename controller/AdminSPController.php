<?php
require_once "model/sanpham.php";
class AdminSPController
{
    private $model = null;
    function __construct()
    {
        $this->model = new sanpham();
    }
    function index()
    {
        $this->checkLoginAdmin();
        global $params;
        $col = isset($params['col']) ? $params['col'] : 'id_sp';
        $sort = isset($params['order']) ? $params['order'] : 'asc';
        $pageSize = isset($params['pageSize']) ?  $params['pageSize'] : 10;
        $demsp = $this->model->demSp();
        $tongsotrang = ceil($demsp / $pageSize);
        $pageNum = isset($params['page']) && $params['page'] >= 1  && $params['page'] <= $tongsotrang  ? $params['page'] : 1;
        $pagePrev = $pageNum - 1;
        $pageNext = $pageNum + 1;
        
        $listsp = $this->model->danhsachsanpham($pageNum, $pageSize, $col, $sort);
        $title_page = "Danh sach san pham";
        $view_content = "sanphamds.php";
        include "views/admin/layout.php";
    }
    function add()
    {
        $type = $this->model->layListLoai();
        $title_page = "Them san pham";
        $view_content = "sanphamthem.php";
        include "views/admin/layout.php";
    }
    function add_()
    {
        $this->checkLoginAdmin();
        $ten_sp = trim(strip_tags($_POST['ten_sp']));
        $ngay = trim(strip_tags($_POST['ngay']));
        $gia = (int) trim(strip_tags($_POST['gia']));
        $gia_km = (int) trim(strip_tags($_POST['gia_km']));
        $anhien = trim(strip_tags($_POST['anhien']));
        $hot = trim(strip_tags($_POST['hot']));
        $mota = $_POST['mota'];
        $hinh = $_FILES['hinh'];
        $id_loai = (int)trim(strip_tags($_POST['loai']));
        $this->model->luusp($ten_sp, $ngay, $gia, $gia_km, $anhien, $hot, $mota, $hinh['name'], $id_loai);
?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Thêm sản phẩm thành công',
            })
        </script>
        <?php
        header("Refresh: 2, " . ADMIN . "sp");
    }
    function edit()
    {
        $this->checkLoginAdmin();
        global $params;
        $id = $params['id'];
        $id_check = $this->model->detail($id);
        if (isset($id_check) && $id_check != "") {
            $type = $this->model->layListLoai();
            $sp = $id_check;
            $title_page = "Chinh sua san pham";
            $view_content = "views/admin/sanphamsua.php";
            include "views/admin/layout.php";
        } else { ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Mã sản phẩm không tồn tại !',
                })
            </script>
        <?php
            header("Refresh:2, url = " . ADMIN . "sp");
        }
    }

    function edit_()
    {
        $this->checkLoginAdmin();
        $id_sp = trim(strip_tags($_POST['id_sp']));
        $ten_sp = trim(strip_tags($_POST['ten_sp']));
        $ngay = trim(strip_tags($_POST['ngay']));
        $gia = (int) trim(strip_tags($_POST['gia']));
        $gia_km = (int) trim(strip_tags($_POST['gia_km']));
        $anhien = trim(strip_tags($_POST['anhien']));
        $hot = trim(strip_tags($_POST['hot']));
        $mota = $_POST['mota'];
        $id_loai = $_POST['loai'];
        $this->model->capnhatsanpham($id_sp, $ten_sp, $ngay, $gia, $gia_km, $anhien, $hot, $mota, $id_loai);
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Cập nhật thành công',
            })
        </script>
        <?php
        header("Refresh: 2, " . ADMIN . "sp");
    }

    function delete()
    {
        $this->checkLoginAdmin();
        global $params;
        $id = $params['id_sp'];
        $id_check = $this->model->detail($id);
        if (isset($id_check) && $id_check != "") {
            if (isset($params['id_sp'])) { ?>
                <form action="" method="post">
                    <input type="submit" value="Có" class="yes" name="yes">
                    <!-- <input type="submit" value="No" class="no" name="no"> -->
                    <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ROOT_URL . '' ?>" style="text-decoration: none;">Không</a>
                </form>

                <?php
                if (isset($_POST['yes'])) {
                    $id = $params['id_sp'];
                    $this->model->xoaSp($id); ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            text: 'Xóa thành công',
                        })
                    </script>
                <?php
                    header("Refresh: 2, " . ADMIN . "sp");
                }
            }
        } else{ ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Mã sản phẩm không tồn tại !',
                })
            </script>
            <?php
            header("Refresh:2, url = " . ADMIN . "sp");
        }
    }

    function checkLoginAdmin(){        
        if (isset($_SESSION['vaitro'])==false || $_SESSION['vaitro']!=1){
            $_SESSION['back'] =  $_SERVER['REQUEST_URI'];
            header("location:". ROOT_URL."login");
            exit();
        }
    }
    
}

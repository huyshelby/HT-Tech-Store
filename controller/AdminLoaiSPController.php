<?php
require_once "model/loai.php";
class AdminLoaiSPController
{
    private $model = null;
    function __construct()
    {
        $this->model = new loai();
    }
    function index()
    {
        $this->checkLoginAdmin();
        global $params;
        // $col = isset($params['col']) ? $params['col'] : 'id_sp';
        // $sort = isset($params['order']) ? $params['order'] : 'asc';
        $pageSize = isset($params['pageSize']) ?  $params['pageSize'] : 5;
        $demloaisp = $this->model->demLoaiSp();
        $tongsotrang = ceil($demloaisp / $pageSize);
        $pageNum = isset($params['page']) && $params['page'] >= 1  && $params['page'] <= $tongsotrang  ? $params['page'] : 1;
        $pagePrev = $pageNum - 1;
        $pageNext = $pageNum + 1;
        $listLoaiSP = $this->model->dsLoaiSP($pageNum, $pageSize);
        $title_page = 'Danh sách loại';
        $view_content = 'dsloai.php';
        include 'views/admin/layout.php';
    }
    function add()
    {
        $this->checkLoginAdmin();
        // $a = $this->model->select();    
        $title_page = 'add';
        $view_content = 'themloai.php';
        include "views/admin/layout.php";
    }
    function add_()
    {
        $this->checkLoginAdmin();
        $ten_loai = trim(strip_tags($_POST['ten_loai']));
        $thutu = $_POST['thutu'];
        $anhien = $_POST['anhien'];

        $a = $this->model->select($ten_loai);
        if ($a == true) {
?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Tên loại đã tồn tại',
                })
            </script>

        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Thêm thành công',
                })
            </script>

        <?php

            $this->model->add($ten_loai, $thutu, $anhien);
        }
        ?>
    <?php
        header("refresh:2, url=" . ADMIN . 'loai');
    }

    function edit()
    {
        $this->checkLoginAdmin();
        global $params;
        $id_loai = $params['id_loai'];
        $loai = $this->model->loai_select_by_id($id_loai);
        $title_page = "Sửa loại";
        $view_content = "sualoai.php";
        include "views/admin/layout.php";
    }
    function edit_()
    {
        $this->checkLoginAdmin();
        // global $params;
        // $id_loai = isset($params['id_loai']) ?  $params['id_loai'] : "";
        $id_loai = $_POST['id_loai'];
        $ten_loai = trim(strip_tags($_POST['ten_loai']));
        $thutu = trim(strip_tags($_POST['thutu']));
        $anhien = trim(strip_tags($_POST['anhien']));
        $this->model->update_loai($id_loai, $ten_loai, $thutu, $anhien);
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Cập nhật thành công',
            })
        </script>

        <?php
        header("Refresh:2, url=" . ADMIN . "loai");
    }
    function delete()
    {
        $this->checkLoginAdmin();
        global $params;
        $id = $params['id_loai'];

        $id_check = $this->model->loai_select_by_id($id);
        if (isset($id_check) && $id_check != "") {
            $this->model->deleteLoaiSP($id);

        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Xóa thành công',
                })
            </script>

        <?php
            header("Refresh:2, url=" . ADMIN . "loai");
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Xóa thất bại',
                })
            </script>

<?php
            header("Refresh:2, url=" . ADMIN . "loai");
        }
    }

    function detail()
    {
        echo 'detail';
    }

    function checkLoginAdmin()
    {
        if (isset($_SESSION['vaitro']) == false || $_SESSION['vaitro'] != 1) {
            $_SESSION['back'] =  $_SERVER['REQUEST_URI'];
            header("location:" . ROOT_URL . "login");
            exit();
        }
    }
}


?>
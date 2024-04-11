<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

</body>

</html>
<?php
require_once "model/sanpham.php";

class SanphamController
{
    private $model = null;
    protected $listloai = null;
    function __construct()
    {
        $this->model = new sanpham();
        $this->listloai = $this->model->layListLoai();
    }
    function index()
    {
        // echo "<h1>Kết quả tìm a</h1>";
        $sosp = 6;
        $spnb = $this->model->sanphamNoiBat($sosp);
        $spxn = $this->model->sanphamXemNhieu($sosp);

        $title_page = 'Trung tâm laptop Thành Phát';
        $view_content = 'home.php';
        include 'views/layout.php';
    }
    function detail()
    {
        // echo "<h1>Kết quả tìm b</h1>";
        global $params;
        $id = $params['id'];
        // echo $id;
        // var_export($params['id']);
        $sp = $this->model->detail($id);
        $title_page = $sp['ten_sp'];
        $view_content = "detail.php";
        include "views/layout.php";
    }
    function cat()
    {
        // echo "<h1>Kết quả tìm c</h1>";
        global $params;
        // var_export($params);
        $idloai = $params['idloai'];
        $pageNum = isset($params['page']) == true ? $params['page'] : 1;
        // echo $pageNum;
        $pagePrev = $pageNum - 1;
        $pageNext = $pageNum + 1;
        $pageSize = 12;
        $demsoSP = $this->model->demSPTrongLoai($idloai);
        $tongSoTrang = ceil($demsoSP / $pageSize);
        $listsp = $this->model->sanphamTrongLoai($idloai, $pageNum, $pageSize);
        $ten_loai = $this->model->layTenLoai($idloai);

        $title_page = $ten_loai;
        $view_content = "sptrongloai.php";
        include "views/layout.php";
    }
    function addtocart()
    {
        // session_unset();
        global $params;
        $id_sp = $params['id'];
        // echo $id_sp;
        $soluong = (int) $params['soluong'];
        if (isset($_SESSION['cart'][$id_sp]) == true) {
            $soluong = $_SESSION['cart'][$id_sp] + $soluong;
        }
        $_SESSION['cart'][$id_sp] = $soluong;
        // var_export($_SESSION['cart']);
        // echo "<pre>";
        // print_r($_SESSION['cart'][$id_sp]);
        // echo "</pre>";
        header("location:" . ROOT_URL . "showcart");
    }
    function showcart()
    {
        if (isset($_SESSION['cart']) == false || count($_SESSION['cart']) == 0) {
            include 'views/showcart_empty.php';
        } else {
            include 'views/showcart.php';
        }
    }
    function checkout()
    {
        $title_page = "Thanh toán";
        $view_content = "views/checkout.php";
        include "views/layout.php";
    }
    function checkout_()
    {
        $hoten = trim(strip_tags($_POST['hoten'])); // trim là xóa các ký tự khoảng trắng ở đầu đuôi, strip_tags là xóa các thẻ html, php
        $email = trim(strip_tags($_POST['email']));
        $diachi = trim(strip_tags($_POST['diachi']));
        $dienthoai = trim(strip_tags($_POST['dienthoai']));
        $id_dh = $this->model->luudonhang($hoten, $email, $diachi, $dienthoai);
        $this->model->luuSPTrongGioHang($id_dh);
        // echo "Đã lưu xong đơn hàng $id_dh";
        // if(isset($id_dh)){ 
        // header("Location: layout.php")
        if (isset($id_dh)) { ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Lưu đơn hàng thành công',
                })
            </script>
        <?php
        header("Refresh:2,".ROOT_URL);
        }
    }
    public function searchForrm()
    {
        "<h1>Form Tìm kiếm</h1>";
    }
    public function searchResult()
    {
        echo "<h1>Kết quả tìm</h1>";
    }
}
?>
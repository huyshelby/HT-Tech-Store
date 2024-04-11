<?php
require "model/tin.php";
class TinController{
    private $model = null;
    protected $listloai = null;
    function __construct()
    {
        $this->model = new tin();
        $this->listloai = $this->model->layListLoai();
    }
    function index(){
        $tin = $this->model->select_tin();
        $view_content = "tinds.php";
        include "views/layout.php";
    }
    function add(){
        $view_content = "themtin.php";
        include "views/layout.php";
    }

    function add_(){
        $tieude = trim(strip_tags($_POST['tieude']));
        $ngay = trim(strip_tags($_POST['ngay_dang']));
        $luot_xem = trim(strip_tags($_POST['luot_xem']));
        $hot = trim(strip_tags($_POST['hot']));
        $noidung = trim(strip_tags($_POST['noi_dung']));
        $hinh = $_FILES['url_hinh'];
        move_uploaded_file($hinh['tmp_name'], "public/img/" . (string)$hinh['name']);
        if(!empty($tieude) && !empty($ngay) && !empty($luot_xem) && !empty($noidung)){
            $this->model->add($tieude,$ngay,$luot_xem,$hot,$noidung,$hinh['name']); 
        } 
        
        // if(empty($tieude) && empty($ngay) && empty($luot_xem) && empty($noidung)){
        //     $_SESSION['check'] = "Bạn chưa nhập đủ thông tin";
        // //      // header("Refresh:2,".ROOT_URL."addtin");
        //      header("Location:".ROOT_URL."addtin");
        // } 

        if(empty($tieude)){
            $_SESSION['check'] = "Bạn chưa nhập tiêu đề tin tức";
            // header("Refresh:2,".ROOT_URL."addtin");
            header("Location:".ROOT_URL."addtin");
        }
        if(empty($ngay)){
            $_SESSION['check'] = "Bạn chưa nhập ngày đăng tin tức";
             // header("Refresh:2,".ROOT_URL."addtin");
             header("Location:".ROOT_URL."addtin");
        }
        if(empty($luot_xem)){
            $_SESSION['check'] = "Bạn chưa nhập lượt xem";
             // header("Refresh:2,".ROOT_URL."addtin");
             header("Location:".ROOT_URL."addtin");
        }
        if(empty($noidung)){
            $_SESSION['check'] = "Bạn chưa nhập nội dung tin tức";
             // header("Refresh:2,".ROOT_URL."addtin");
             header("Location:".ROOT_URL."addtin");
        }
        // else{
        //     // echo "Vui lòng nhập đủ thông tin";
        //     $_SESSION['check'] = "Bạn chưa nhập đủ thông tin";
        //      // header("Refresh:2,".ROOT_URL."addtin");
        //      header("Location:".ROOT_URL."addtin");
        // }
        echo "Thêm thành công";
        header("Refresh:2,".ROOT_URL."tin");
    }

    function delete(){
        global $params;
        $id = $params['id'];
        $this->model->delete_tin($id);
        echo "Xóa thành công";
        header("Refresh:2,".ROOT_URL."tin");
    }

}
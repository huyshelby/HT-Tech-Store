<?php

require "model/baiviet.php";
class BaivietController{
    private $model = null;
    protected $listloai = null;
    function __construct()
    {
        $this->model = new baiviet();
        $this->listloai = $this->model->layListLoai();
    }

    function index(){
        $baiviet = $this->model->select_baiviet();
        $view_content = "baivietds.php";
        include "views/layout.php";
    }
    function add(){
        $view_content = "baivietthem.php";
        include "views/layout.php";
    }
    function add_(){
        $tieu_de = trim(strip_tags($_POST['tieu_de']));
        $ngay = trim(strip_tags($_POST['ngay']));
        $so_lan_xem = trim(strip_tags($_POST['so_lan_xem']));
        $anhien = trim(strip_tags($_POST['anhien']));
        $noidung = trim(strip_tags($_POST['noidung']));
        $hinh = $_FILES['hinh'];
        move_uploaded_file($hinh['tmp_name'], "public/img/" . (string)$hinh['name']);
        // echo "<pre>";
        // print_r($hinh);
        // echo "</pre>";
        $this->model->add($tieu_de, $ngay, $so_lan_xem, $anhien, $noidung, $hinh['name']);
        echo "Thêm thành công";
    }
    function edit(){
        global $params;
        $id = $params['id'];
        $bv = $this->model->bv_select_by_id($id);
        $view_content = 'baivietsua.php';
        include "views/layout.php";
    }

    function edit_(){
        $id = $_POST['id_bv'];
        $tieu_de = trim(strip_tags($_POST['tieu_de']));
        $ngay = trim(strip_tags($_POST['ngay']));
        $so_lan_xem = trim(strip_tags($_POST['so_lan_xem']));
        $anhien = trim(strip_tags($_POST['anhien']));
        $noidung = trim(strip_tags($_POST['noidung']));
        $hinh = $_FILES['hinh'];
        // echo $hinh;
        echo "<pre>";
        print_r($hinh);
        echo "</pre>";
        if(isset($hinh['name'])){
            move_uploaded_file($hinh['tmp_name'], "public/img/" . (string)$hinh['name']);
            $this->model->bv_update($tieu_de, $ngay, $so_lan_xem, $anhien, $noidung, $hinh['name'], $id);
            die();
        }else{

            $this->model->bv_updatee($tieu_de, $ngay, $so_lan_xem, $anhien, $noidung,$id);
        }
        echo "Thay đổi thành công";
    }

    function delete(){
        global $params;
        $id = $params['id'];
        $this->model->delete_bv($id);
    }

}
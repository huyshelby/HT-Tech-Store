<?php

require_once "model/user.php";
class AdminController{
    private $model = null;
    function __construct()
    {
        $this->model = new user();
    }
    function index(){
        $this->checkLoginAdmin();
        echo "index";
    }
    function login(){
        include "views/admin/login.php";
    } 
    function login_(){
        $email = trim(strip_tags($_POST['email']));
        $pass = trim(strip_tags($_POST['matkhau']));
        $kq = $this->model->checkuser($email, $pass);
        if(is_array($kq) == false){
            echo $kq;
            exit();
        }
        if($kq['vaitro'] != 1){
            echo "You are not an admin";
            exit();
        }
        $_SESSION['id_user'] = $kq['id_user'];
        $_SESSION['hoten'] = $kq['hoten'];
        $_SESSION['email'] = $kq['email'];
        $_SESSION['vaitro'] = 1;
        echo "<h1>Login successfully</h2>";
        if(isset($_SESSION['back'])){
            header("Location:".$_SESSION['back']);
            unset($_SESSION['back']);
            exit();
        }
        // echo "<a href='".ADMIN."'Vào xem phần quản trị</a>";
        header("Refresh:2,url=".ADMIN.'sp');
    }
    function logout(){
        $this->checkLoginAdmin();
        session_destroy();
        header("Location:".ROOT_URL);
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
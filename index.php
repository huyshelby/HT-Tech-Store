<?php
// RewriteCond %{REQUEST_FILENAME} !-f
// RewriteCond %{REQUEST_FILENAME} !-d
session_start();
require_once "config.php";
spl_autoload_register(function($class){
    require 'controller/'.$class.".php";
    // echo $class;
});
// $a = $_SERVER['REQUEST_URI'];
// echo $a;
$baseDir= "/banhang/";

$router = [
    'get' => [
        ''  =>  [new SanphamController, 'index'] , 
        'sp' => [new SanphamController, 'detail'] , 
        'loai'=>[new SanphamController, 'cat'] , 
        'tk'  =>[new SanphamController, 'searchForm'] , 
        'addtocart' => [new SanphamController, 'addtocart'],
        'showcart' => [new SanphamController, 'showcart'],
        'checkout' => [new SanphamController, 'checkout'],
        'register' => [new UserController, 'register'],
        'login' => [new UserController, 'login'],
        'logout' => [new UserController, 'logout'],
        'changepass' => [new UserController, 'changepass'],
        'admin/sp' => [new AdminSPController, 'index'],
        'admin/add' => [new AdminSPController, 'add'],
        'admin/edit' => [new AdminSPController, 'edit'],
        'admin/delete' => [new AdminSPController, 'delete'],
        // 'admin/deletee' => [new AdminSPController, 'deletee'],
        'admin/loai' => [new AdminLoaiSPController, 'index'],
        'admin/addloai' => [new AdminLoaiSPController, 'add'],
        'admin/editloai' => [new AdminLoaiSPController, 'edit'],
        'admin/deleteloai' => [new AdminLoaiSPController, 'delete'],
        'admin' => [new AdminController, 'index'],
        'admin/login' => [new AdminController, 'login'],
        'admin/logout' => [new AdminController, 'logout'],
        'addbaiviet' => [new BaivietController, 'add'],
        'baiviet' => [new BaivietController, 'index'],
        'editbv' => [new BaivietController, 'edit'],
        'deletebv' => [new BaivietController, 'delete'],
        'tin' => [new TinController, 'index'],
        'addtin' => [new TinController, 'add'],
        'deletetin' => [new TinController, 'delete'],
        
    ], 
    'post' => [
        'tk' =>[new SanphamController, 'searchResult'] , 
        'checkout_' => [new SanphamController, 'checkout_'],
        'register__' => [new UserController, 'register__'],
        'login' => [new UserController, 'login'],
        'login_' => [new UserController, 'login_'],
        'logout' => [new UserController, 'logout'],
        'changepass_' => [new UserController, 'changepass_'],
        'admin/add_' => [new AdminSPController, 'add_'],
        'admin/edit_' => [new AdminSPController, 'edit_'],
        'admin/delete' => [new AdminSPController, 'delete'],
        'admin/addloai_' => [new AdminLoaiSPController, 'add_'],
        'admin/editloai_' => [new AdminLoaiSPController, 'edit_'],
        'admin/deleteloai' => [new AdminLoaiSPController, 'delete'],
        'admin/login_' => [new AdminController, 'login_'],
        'addbaiviet_' => [new BaivietController, 'add_'],
        'editbv_' => [new BaivietController, 'edit_'],
        'addtin_' => [new TinController, 'add_'],
    ]
];
// $i = $_SERVER['REQUEST_URI'];
// echo strlen($i);
// echo "URI =" . $i . "<br>";

// $path = substr($_SERVER['REQUEST_URI'], strlen($baseDir));//Loai?idloai=1&page=3
// echo "Path = " .$path . '<br>';
    // $arr = explode("?",$path);  // ['Loai', 'idloai=1&page=3]

    // echo "<pre>";
    // print_r($arr);
    // echo "</pre>";

    // $route = strtolower($arr[0]);  //loai

    // if(isset($arr[0]) && !isset($_POST['tk'])){
    //     $route = strtolower($arr[0]);
    // } else{
    //     $route = strtolower($_POST['tk']);
    // } 
    
    // echo "route =" . $route . "<br>";
    $path = substr($_SERVER['REQUEST_URI'], strlen($baseDir));//Loai?idloai=1&page=3
    $arr = explode("?",$path);  // ['Loai', 'idloai=1&page=3]
    $route = strtolower($arr[0]);  //loai
    if (count($arr)>=2) parse_str($arr[1],$params);  // [idloai=>1, page=>3]
    else $params = [];
    $method = strtolower($_SERVER['REQUEST_METHOD']); //get
    if (!array_key_exists($method, $router)) die("Method không phù hợp:". $method);
    if (!array_key_exists($route, $router[$method])) die("Route đâu có:". $route);
    $action = $router[$method][$route];  // [0 => SanphamController, 1 => detail]
    call_user_func( $action );
    // echo "<h1>Trang web đang bảo trì</h1>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="" method="post">
        <input type="submit" value="tk" name="tk"> 
    </form> -->
    <?php
        // include "views/layout.php";
        // echo $params;
    ?>
    
</body>
</html>
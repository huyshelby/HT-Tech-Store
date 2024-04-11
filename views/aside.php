<!-- <aside>THÔNG TIN BỔ SUNG</aside> -->
<?php
if(isset($_SESSION['id_user'])){
    if($_SESSION['vaitro'] == 1){
        echo '<a href="'. ADMIN . 'sp">Trang admin</a>';   
    }
}
?>

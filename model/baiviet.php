<?php
require_once "database.php";
class baiviet extends database{
    function layListLoai()
    {
        $sql = "SELECT id_loai, ten_loai, thutu, anhien FROM loai where anhien=1 order by thutu";
        return $this->query($sql);
    }
    function add($tieu_de, $ngay, $so_lan_xem, $anhien, $noidung, $hinh){
        $sql = "INSERT INTO baiviet set tieu_de =:td, ngay =:ngay, so_lan_xem =:slx, an_hien =:ah, noi_dung =:nd, hinh =:h";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("td",$tieu_de, PDO::PARAM_STR);
        $stmt->bindParam("ngay",$ngay, PDO::PARAM_STR);
        $stmt->bindParam("slx",$so_lan_xem, PDO::PARAM_STR);
        $stmt->bindParam("ah",$anhien, PDO::PARAM_STR);
        $stmt->bindParam("nd",$noidung, PDO::PARAM_STR);
        $stmt->bindParam("h",$hinh, PDO::PARAM_STR);
        $stmt->execute();
    }
    function select_baiviet(){
        $sql = "SELECT * from baiviet";
        return $this->query($sql);
    }
    function bv_select_by_id($id){
        $sql = "SELECT * from baiviet where id_bv = $id";
        return $this->queryOne($sql);
    }

    function bv_update($tieu_de, $ngay, $so_lan_xem, $anhien, $noidung, $hinh, $id){
        $sql = "UPDATE baiviet set tieu_de =:td, ngay =:ngay, so_lan_xem =:slx, an_hien =:ah, noi_dung =:nd, hinh =:h where id_bv =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("td",$tieu_de, PDO::PARAM_STR);
        $stmt->bindParam("ngay",$ngay, PDO::PARAM_STR);
        $stmt->bindParam("slx",$so_lan_xem, PDO::PARAM_STR);
        $stmt->bindParam("ah",$anhien, PDO::PARAM_STR);
        $stmt->bindParam("nd",$noidung, PDO::PARAM_STR);
        $stmt->bindParam("h",$hinh, PDO::PARAM_STR);
        $stmt->bindParam("id",$id,PDO::PARAM_STR);
        $stmt->execute();
    }

    function bv_updatee($tieu_de, $ngay, $so_lan_xem, $anhien, $noidung, $id){
        $sql = "UPDATE baiviet set tieu_de =:td, ngay =:ngay, so_lan_xem =:slx, an_hien =:ah, noi_dung =:nd, hinh =:h where id_bv =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("td",$tieu_de, PDO::PARAM_STR);
        $stmt->bindParam("ngay",$ngay, PDO::PARAM_STR);
        $stmt->bindParam("slx",$so_lan_xem, PDO::PARAM_STR);
        $stmt->bindParam("ah",$anhien, PDO::PARAM_STR);
        $stmt->bindParam("nd",$noidung, PDO::PARAM_STR);
        $stmt->bindParam("id",$id,PDO::PARAM_STR);
        $stmt->execute();
    }
    function delete_bv($id){
        $sql = "DELETE from baiviet where id_bv =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

    }
}
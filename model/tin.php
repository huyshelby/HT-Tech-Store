<?php
require_once "database.php";
class tin extends database{
    function layListLoai()
    {
        $sql = "SELECT id_loai, ten_loai, thutu, anhien FROM loai where anhien=1 order by thutu";
        return $this->query($sql);
    }
    function add($tieude,$ngay,$luot_xem,$hot,$noidung,$hinh){
        $sql = "INSERT INTO tintuc set tieude =:td, urlhinh =:hinh, ngaydang =:ngay, luotxem =:lx, noidung =:nd, hot =:h";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("td",$tieude, PDO::PARAM_STR);
        $stmt->bindParam("hinh",$hinh, PDO::PARAM_STR);
        $stmt->bindParam("ngay",$ngay, PDO::PARAM_STR);
        $stmt->bindParam("lx",$luot_xem, PDO::PARAM_STR);
        $stmt->bindParam("nd",$noidung, PDO::PARAM_STR);
        $stmt->bindParam("h",$hot, PDO::PARAM_STR);
        $stmt->execute();
    }
    function select_tin(){
        $sql = "SELECT * from tintuc";
        return $this->query($sql);
    }
    function delete_tin($id){
        $sql = "DELETE from tintuc where idtin =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

    }
}
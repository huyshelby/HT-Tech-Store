<?php

require_once "database.php"; 
class loai extends database{
    function add($ten_loai, $thutu, $anhien){
        $sql = "INSERT INTO loai SET ten_loai =:tl, thutu =:tt, anhien =:ah";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(":tl", $ten_loai, PDO::PARAM_STR);
        $stmt->bindParam(":tt", $thutu, PDO::PARAM_STR);
        $stmt->bindParam(":ah", $anhien, PDO::PARAM_STR);
        $stmt->execute();
    }
    function select($ten_loai){
        $sql = "SELECT * from loai where ten_loai = '$ten_loai'";
        return $this->queryOne($sql);
    }
    function loai_select_by_id($id_loai){
        $sql = "SELECT * from loai where id_loai = $id_loai";
        return $this->queryOne($sql);
    }
    function update_loai($id_loai, $ten_loai, $thutu, $anhien){
        $sql = "UPDATE loai set ten_loai =:tl, thutu =:tt, anhien =:ah where id_loai =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":tl", $ten_loai, PDO::PARAM_STR);
        $stmt->bindParam(":tt", $thutu, PDO::PARAM_STR);
        $stmt->bindParam(":ah", $anhien, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id_loai, PDO::PARAM_INT);
        $stmt->execute();
    }
    function dsLoaiSP($pageNum, $pageSize){
        $startRow = ($pageNum-1) * $pageSize;
        $sql = "SELECT * FROM loai order by id_loai limit $startRow, $pageSize";
        return $this->query($sql);
    }
    function demLoaiSp(){
        $sql = "SELECT count(id_loai) as dem from loai";
        $row = $this->queryOne($sql);
        return $row['dem'];
    }
    function deleteLoaiSP($id){
        $sql = "DELETE from loai where id_loai =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}

?>
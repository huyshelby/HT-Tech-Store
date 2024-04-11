<?php

require_once "database.php";
class sanpham extends database
{
    function detail($id_sp = 0)
    {
        $sql = "SELECT id_sp,id_loai, ten_sp, gia, gia_km, hinh,soluotxem, ngay , hot, anhien, mota
            FROM sanpham WHERE id_sp = $id_sp";
        return $this->queryOne($sql);
    }

    function sanphamTrongLoai($id_loai = 0, $pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT id_sp, ten_sp, gia, gia_km, hinh FROM sanpham where id_loai=$id_loai ORDER BY ngay DESC LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }
    function layTenLoai($id_loai = 0)
    {
        $sql = "SELECT ten_loai FROM loai where id_loai = $id_loai";
        $row = $this->queryOne($sql);
        return $row['ten_loai'];
    }
    function demSPTrongLoai($id_loai = 0)
    {
        $sql = "SELECT count(id_sp) as dem FROM sanpham where id_loai = $id_loai";
        $row = $this->queryOne($sql);
        return $row['dem'];
    }
    function layListLoai()
    {
        $sql = "SELECT id_loai, ten_loai, thutu, anhien FROM loai where anhien=1 order by thutu";
        return $this->query($sql);
    }
    function sanphamXemNhieu($sosp = 9)
    {
        $sql = "SELECT id_sp, ten_sp, gia, hinh FROM sanpham order by soluotxem desc limit 0, $sosp";
        return $this->query($sql);
    }

    function sanphamNoiBat($sosp = 9)
    {
        $sql = "SELECT id_sp, ten_sp, gia, gia_km, hinh from sanpham where hot = 1 order by ngay desc limit 0, $sosp";
        return $this->query($sql);
    }

    function luudonhang($hoten, $email, $diachi, $dienthoai)
    {
        $sql = "INSERT INTO donhang SET hoten =:ht, email =:em, diachi =:dc, dienthoai =:dt";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ht", $hoten, PDO::PARAM_STR);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->bindParam(":dc", $diachi, PDO::PARAM_STR);
        $stmt->bindParam(":dt", $dienthoai, PDO::PARAM_STR);
        $stmt->execute();
        $idDH = $this->conn->lastInsertId();
        return $idDH;
    }

    function luuSPTrongGioHang($id_dh)
    {
        foreach ($_SESSION['cart'] as $id_sp => $soluong) {
            $sp = $this->detail($id_sp);
            $sql = "INSERT INTO donhangchitiet SET id_dh =:id_dh, id_sp =:id_sp, ten_sp =:ten_sp, soluong =:sl, gia =:gia";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id_dh", $id_dh, PDO::PARAM_INT);
            $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
            $stmt->bindParam(":ten_sp", $sp['ten_sp'], PDO::PARAM_STR);
            $stmt->bindParam(":sl", $soluong, PDO::PARAM_INT);
            $stmt->bindParam(":gia", $sp['gia'], PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    function luusp($ten_sp, $ngay, $gia, $gia_km, $anhien, $hot, $mota, $hinh, $id_loai)
    {
        $sql = "INSERT INTO sanpham SET ten_sp =:t_sp, ngay =:ngay, gia =:gia, gia_km =:gia_km, anhien =:ah, hot =:hot, mota =:mt, hinh =:hinh, id_loai=:loai";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":t_sp", $ten_sp, PDO::PARAM_STR);
        $stmt->bindParam(":gia", $gia, PDO::PARAM_INT);
        $stmt->bindParam(":gia_km", $gia_km, PDO::PARAM_INT);
        $stmt->bindParam(":ngay", $ngay, PDO::PARAM_STR);
        $stmt->bindParam(":hot", $hot, PDO::PARAM_INT);
        $stmt->bindParam(":ah", $anhien, PDO::PARAM_INT);
        $stmt->bindParam(":mt", $mota, PDO::PARAM_STR);
        $stmt->bindParam(":hinh", $hinh, PDO::PARAM_STR);
        $stmt->bindParam(":loai", $id_loai, PDO::PARAM_STR);
        $stmt->execute();
    }

    function capnhatsanpham($id_sp, $ten_sp, $ngay, $gia, $gia_km, $anhien, $hot, $mota, $id_loai)
    {
        $sql = "UPDATE sanpham SET ten_sp =:t_sp, ngay =:ngay, gia =:gia, gia_km =:gia_km, anhien =:ah, hot =:hot, mota =:mt, id_loai =:loai where id_sp =:id_sp";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":t_sp", $ten_sp, PDO::PARAM_STR);
        $stmt->bindParam(":gia", $gia, PDO::PARAM_INT);
        $stmt->bindParam(":gia_km", $gia_km, PDO::PARAM_INT);
        $stmt->bindParam(":ngay", $ngay, PDO::PARAM_STR);
        $stmt->bindParam(":hot", $hot, PDO::PARAM_INT);
        $stmt->bindParam(":ah", $anhien, PDO::PARAM_INT);
        $stmt->bindParam(":mt", $mota, PDO::PARAM_STR);
        $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_STR);
        $stmt->bindParam(":loai", $id_loai, PDO::PARAM_STR);
        $stmt->execute();
        // $stmt->bindParam(":hinh", $hinh, PDO::PARAM_STR);
    }

    function danhsachsanpham($pageNum, $pageSize, $col, $sort)
    {
        $startRow = ($pageNum-1) * $pageSize;
        $sql = "SELECT * FROM sanpham order by $col $sort limit $startRow, $pageSize";
        return $this->query($sql);
    }
    function demSp(){
        $sql = "SELECT count(id_sp) as dem from sanpham";
        $row = $this->queryOne($sql);
        return $row['dem'];
    }

    function xoaSp($id){
        $sql = "DELETE FROM sanpham where id_sp =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

    }
}

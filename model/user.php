<?php
require_once "database.php";
class user extends database{
    function luuUser($hoten, $email, $mk_mh, $diachi, $dienthoai){
        $sql = "INSERT INTO users SET hoten =:ht, email =:em, matkhau =:mk, diachi =:dc, dienthoai =:dt";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ht", $hoten, PDO::PARAM_STR);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->bindParam(":mk", $mk_mh, PDO::PARAM_STR);
        $stmt->bindParam(":dc", $diachi, PDO::PARAM_STR);
        $stmt->bindParam(":dt", $dienthoai, PDO::PARAM_INT);
        $stmt->execute();
        $id_user = $this->conn->lastInsertId();
        return $id_user;
    }
    function checkuser($email, $matkhau){
        $sql = "SELECT * FROM users where email =:em";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":em",$email, PDO::PARAM_STR);
        $stmt->execute();
        $recordnum = $stmt->rowCount();
        if($recordnum != 1){
            echo "Email không tồn tại";
            return header("Refresh:2,".ROOT_URL."login");
        }
        $user = $stmt->fetch();
        $mk_mh = $user['matkhau'];
        if(password_verify($matkhau, $mk_mh) == false){
            echo "Mật khẩu không đúng";
            return header("Refresh:2,".ROOT_URL."login");
        } else{
            return $user;
        }
    }
    function changepass($email, $mk_mh){
        $sql = "UPDATE users set matkhau =:mk where email =:em";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":mk", $mk_mh, PDO::PARAM_STR);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->execute();
    }

    function checkvaitro($id_user){
        $sql = "SELECT vaitro FROM users where id_user =:us";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":us",$id_user, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
}

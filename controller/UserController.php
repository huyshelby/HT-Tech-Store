<?php
require_once "model/user.php";
class UserController
{
    private $model = null;
    function __construct()
    {
        $this->model = new user;
    }
    function register()
    {
        include "views/register.php";
    }
    function register__()
    {
        $hoten = trim(strip_tags($_POST['hoten']));
        $email = trim(strip_tags($_POST['email']));
        $matkhau = trim(strip_tags($_POST['matkhau']));
        $mk_mh = password_hash($matkhau, PASSWORD_BCRYPT);
        $diachi = trim(strip_tags($_POST['diachi']));
        $dienthoai = trim(strip_tags($_POST['dienthoai']));
        $id_user = $this->model->luuUser($hoten, $email, $mk_mh, $diachi, $dienthoai);
        // echo "Đã lưu User thành công";
?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Đăng ký thành công',
            })
        </script>
        <?php
        header("refresh:2; " . ROOT_URL);
    }
    function login()
    {
        include "views/login.php";
    }
    function login_()
    {
        // $email = trim(strip_tags($_POST['email']));
        // $matkhau = trim(strip_tags($_POST['matkhau']));
        // $kq = $this->model->checkuser($email, $matkhau);

        // session_unset();
        // if (is_array($kq) == true) {
        //     $_SESSION['id_user'] = $kq['id_user'];
        //     $_SESSION['hoten'] = $kq['hoten'];
        //     $_SESSION['email'] = $kq['email'];
        //     $_SESSION['vaitro'] = $kq['vaitro'];
        // ?>
             <script>
        //         Swal.fire({
        //             icon: 'success',
        //             text: 'Đăng nhập thành công',
        //         })
        //     </script>
         <?php
        //     header("Refresh: 2, " . ROOT_URL);
        // } else {
        //     echo $kq;
        // }
        $email = trim(strip_tags($_POST['email']));
        $pass = trim(strip_tags($_POST['matkhau']));
        $kq = $this->model->checkuser($email, $pass);
        if(is_array($kq) == false){
            echo $kq;
            exit();
        }
        if($kq['vaitro'] != 1){
            echo "You are not an admin";
            header("Refresh:2, url=".ROOT_URL."login");
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
    }

    function logout()
    {
        session_unset();
        // echo "Bạn đã đăng xuất";
        ?>

        <script>
            Swal.fire({
                icon: 'success',
                text: 'Đăng xuất thành công',
            })
        </script>

        <?php
        header("Refresh:2, url = " . ROOT_URL);
    }

    function changepass()
    {
        include "views/changepass.php";
    }
    function changepass_()
    {
        $email = $_SESSION['email'];
        $matkhauCu = trim(strip_tags($_POST['matkhauCu']));
        $kq = $this->model->checkuser($email, $matkhauCu);
        if (is_string($kq) == true) { // pass cũ không đúng
            echo $kq;
            return;
        }
        $matkhauMoi1 = trim(strip_tags($_POST['matkhauMoi1']));
        $matkhauMoi2 = trim(strip_tags($_POST['matkhauMoi2']));
        if (strlen($matkhauMoi1) > 10) { ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Mật khẩu quá dài',
                })
            </script>
        <?php
            header("Refresh: 2, " . ROOT_URL . "changepass");
            return;
        }
        if ($matkhauMoi1 != $matkhauMoi2) { ?>

            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Mật khẩu không trùng nhau',
                })
            </script>
        <?php
            header("Refresh: 2, " . ROOT_URL . "changepass");
            return;
        }
        $mk_mh = password_hash($matkhauMoi1, PASSWORD_BCRYPT);
        $kq = $this->model->changepass($email, $mk_mh);
        if (is_string($kq) == true) {
            echo $kq;
            return;
        }
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Đổi mật khẩu thành công',
            })
        </script>
<?php
        header("Refresh: 2," . ROOT_URL);
    }
}

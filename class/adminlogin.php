<?php
$filepath=realpath(dirname(__FILE__));
include '../lib/session.php';
Session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helper/format.php');
?>
<?php
class adminlogin
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function loginadmin($adminUser, $adminPassword)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPassword = $this->fm->validation($adminPassword);
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPassword = mysqli_real_escape_string($this->db->link, $adminPassword);
        if (empty($adminUser) || empty($adminPassword)) {
            $alert = "Tài khoản hoặc mật khẩu không được để trống";
            return $alert;
        } else {
            $query = "SELECT * from table_admin where adminUser='$adminUser' and adminPassword='$adminPassword'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set('login',true);
                Session::set('adminId',$value['adminID']);
                Session::set('adminUser',$value['adminUser']);
                Session::set('adminName',$value['adminName']);
                header('Location:index.php');
            }
            else{
                $alert='Điền sai thông tin tài khoản hoặc mật khẩu';
                return $alert;
            }
        }
    }
}
?>
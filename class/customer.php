<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helper/format.php');
?>
<?php
class customer
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customer($data){
        $cusName = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        if ($cusName == null || $email == null ||$zipcode== null || $password == null ||$address == null || $phone == null) {
            $alert = "Không được để trống thông tin ";
            return $alert;
        }
        else{
            $check_email="SELECT * from table_customor where email='$email' limit 1";
            $check=$this->db->select($check_email);
            if($check){
                $alert="Email đã được đăng kí";
                echo $alert;
            }
            else{
                $query = "INSERT INTO table_customor(cusName,email,zipcode,password,address,phone) VALUES('$cusName','$email','$zipcode','$password','$address','$phone')";
            $result = $this->db->insert($query);
            if ($result != false) {
                $alert = "<span class='success'>Tạo tài khoản thành công </span>";
                return $alert;
            } else {
                $alert = "<span class='error1'>Tạo tài khoản không thành công</span>";
                return $alert;
            }
            }
        }

    }
    public function logincs($data){
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        if($email==null||$password==null)
        {
            $alert="Không được để trống tài khoản hoặc mật khẩu";
            return $alert;
        }
        else{
            $check_accout="SELECT * from table_customor where email='$email' and password='$password'";
            $result_login=$this->db->select($check_accout);
            if($result_login==true)
            {
                $result=$result_login->fetch_assoc();
                Session::set('customer_login',true);
                Session::set('customer_id',$result['cusID']);
                Session::set('customer_name',$result['cusName']);
                header("Location:index.php");
            }
            else{
                $alert="Thông tin đăng nhập không chính xác";
            return $alert;

            }
        }

    }
    public function showcustomer($id){
        $show="SELECT * from table_customor where cusID='$id'";
            $result=$this->db->select($show);
            return $result;
    }
    public function napcustomer($id,$data){
        $money = mysqli_real_escape_string($this->db->link, $data['sotien']);
        if($money==null)
        {
            $alert = "<span>Nhập số tiền để nạp</span>";
            return $alert;
        }
        else{
            $nap = "UPDATE table_customor set money=money+'$money' where cusID='$id'";
            $result=$this->db->update($nap);
            if ($result != false) {
                $alert = "<span class='success'>Nạp tiền thành công </span>";
                return $alert;
            } else {
                $alert = "<span>Nạp tiền thất bại</span>";
                return $alert;
            }
        }
     
    }
    public function chuyenkhoancustomer($id,$data){
        $money = mysqli_real_escape_string($this->db->link, $data['sotien']);
        $name = mysqli_real_escape_string($this->db->link, $data['nguoinhan']);
        if($money==null||$name==null){
            $alert = "<span>Nhập thiếu thông tin mời nhập lại</span>";
            return $alert;
        }
        else{
            $show="SELECT * from table_customor where cusID='$id'";
            $result_money=$this->db->select($show);
            $values=$result_money->fetch_assoc();
            $checkname="SELECT * from table_customor where email='$name'";
            $result_name=$this->db->select($checkname);
           
            if($result_name==false)
            {
                $alert = "<span>Tài khoản không tồn tại, nhập đúng tên để chuyển khoản</span>";
                return $alert;
            }else{
                if($values['money']>$money){
                    $chuyen = "UPDATE table_customor set money=money-'$money' where cusID='$id'";
                    $result_chuyen=$this->db->update($chuyen);
                    $nhan = "UPDATE table_customor set money=money+'$money' where email='$name'";
                    $result_chuyen=$this->db->update($nhan);
                    $alert = "<span>Chuyển tiền thành công</span>";
                    return $alert;
                }
                else{
                    $alert = "<span>Số tiền trong tài khoản không đủ!</span>";
                    return $alert;
                }
            }
            
           
            
        }

    }
    public function paycart($id){   
        
        
        $sessID = session_id();
        $query_cart="SELECT SUM(price*quality) as 'total' FROM table_cart WHERE sessID='$sessID'";
        $result =$this->db->select($query_cart);
        $var=$result->fetch_assoc();
        $d=$var['total'];
        if($var['total']==null){
            $alert = "<span>Chưa có hàng trong giỏ đồ để thanh toán</span>";
            return $alert;

        }else{
            $show="SELECT * from table_customor where cusID='$id'";
            $result_cus=$this->db->select($show);
            $values=$result_cus->fetch_assoc();
            if($values['money']<$var['total']){
                $alert = "<span>Số tiền trong tài khoản không đủ để thanh toán</span>";
                    return $alert;
            }else{
                $pay = "UPDATE table_customor set money=money-$d where cusID='$id'";
                    $result_pay=$this->db->update($pay);
                    $query="DELETE From table_cart where sessID='$sessID'";
                    $result_del =$this->db->delete($query);
                    $alert = "<span>Thanh toán thành công</span>";
                    return $alert;
            }
        }
        
        

    }
    public function update_customer($data){
        $cusName = mysqli_real_escape_string($this->db->link, $data['name']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        if ($cusName == null  ||$zipcode== null ||$address == null || $phone == null) {
            $alert = "Không được để trống thông tin ";
            return $alert;
        }
        else{
            
            $query = "INSERT INTO table_customor(cusName,zipcode,address,phone) VALUES('$cusName','$zipcode','$address','$phone')";
            $result = $this->db->update($query);
            if ($result != false) {
                $alert = "<span class='success'>Cập nhật thông tin tài khoản thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error1'>Cập nhật thất bại vui lòng thử lại</span>";
                return $alert;
            }
            }
        }
        public function update_pass($id,$data){
            $old = mysqli_real_escape_string($this->db->link, $data['oldpass']);
            $new = mysqli_real_escape_string($this->db->link, $data['newpass']);
            if($old==null||$new==null){
                $alert="Không để trống thông tin";
                return $alert;
            }else{
                $query="SELECT * FROM table_customor WHERE password='$old'";
                $checkpass=$this->db->select($query);
                if(!$checkpass){
                    $alert="Mật khẩu không chính xác";
                    return $alert;
                }else{
                    $ud = "UPDATE table_customor set password='$new' where cusID='$id'";
                    $update=$this->db->update($ud);
                    $alert="Thay đổi mật khẩu thành công";
                    return $alert;
                }
            }


           




        }

    }

   

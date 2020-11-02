<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helper/format.php');
?>

<?php
class cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addtocart($id,$quantily){
        $login_check=Session::get('customer_login');
           if($login_check==true){
            $quantily = $this->fm->validation($quantily);
            $quantily = mysqli_real_escape_string($this->db->link,$quantily);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $sessID = session_id();
            $query="SELECT * From table_product where productID='$id'";
            $result=$this->db->select($query)->fetch_assoc();
                $query_in = "INSERT INTO table_cart(productID,sessID,productName,price,quality,image) VALUES('$id','$sessID','$result[productName]','$result[price]','$quantily','$result[image]')";
                $result_in = $this->db->insert($query_in);
                if ($result_in) {
                    header("Location:cart.php");
                    
                } else {
                    header('Location:404.php');
                }

           }else{
            header("Location:login.php");
           }
        
        
        
       
    }
    public function getproductcart()
    {
        $sessID = session_id();
        $query="SELECT * From table_cart where sessID='$sessID'";
        $result =$this->db->select($query);
        return $result;
    }
    public function update_quantily_cart($cartID,$quantily){
        $quantily = mysqli_real_escape_string($this->db->link,$quantily);
        $cartID = mysqli_real_escape_string($this->db->link, $cartID);
        $query="UPDATE table_cart set quality='$quantily' where cartID='$cartID'";
        $result=$this->db->update($query);
        if($result)
        {
            $msg='<span style="color:green">Cập nhật số lượng sản phẩm thành công</span>';
            header("Location:cart.php");
            return $msg;
        }else{
            $msg='<span style="color:red">Không cập nhật thành công số lượng sản phẩm</span>';
            return $msg;
        }
    }
    public function delete_product($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE from table_cart where cartID='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            header("Location:cart.php");
        } else {
            $alert = '<span style="color:red">Xóa không thành công</span>';;
            return $alert;
        }
    }
    public function check_cart(){
        $sessID = session_id();
        $query="SELECT * From table_cart where sessID='$sessID'";
        $result =$this->db->select($query);
        return $result;
    }
    public function deldatacart(){
        $sessID = session_id();
        $query="DELETE From table_cart where sessID='$sessID'";
        $result =$this->db->delete($query);
        return $result;
    }
    public function totalmoney()
    {
        $sessID = session_id();
        $query="SELECT SUM(price*quality) as 'total' FROM table_cart WHERE sessID='$sessID'";
        $result =$this->db->select($query);
        $var=$result->fetch_assoc();
        return $var['total'];

    }
   
}
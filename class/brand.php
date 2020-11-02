<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helper/format.php');
?>
<?php
class brand
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($brandName)
    {
        $brandName = $this->fm->validation($brandName);
        
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
      
        if (empty($brandName)) {
            $alert = "Thương hiệu không được để trống";
            return $alert;
        } else {
            $query = "INSERT table_brand(brandName) VALUES('$brandName')";
            $result = $this->db->insert($query);
            if($result !=false)
            {
                $alert="<span class='success'>Thêm thương thành công </span>";
                return $alert;
            }
            else{
                $alert="<span class='error1'>Thêm thương hiệu không  thành công </span>";
                return $alert;
            }
        }
      
    }
    public function showbrand()
    {
        $query = "SELECT * from table_brand order by brandID desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getbrandbyid($id)
    {
        $query = "SELECT * from table_brand where brandID=$id";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_brand($brandName,$id)
    {
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($brandName)) {
            $alert = "Thương hiệu không được để trống";
            return $alert;
        } else {
            $query = "UPDATE table_brand set brandName='$brandName' where brandID='$id'";
            $result = $this->db->update($query);
            if($result !=false)
            {
                
                $alert="<span class='success'>Cập nhật thương hiệu thành công </span>";
                return $alert;
            }
            else{
                $alert="<span class='error1'>Thương hiệu không cập nhật thành công </span>";
                return $alert;
            }  
    }
}
public function delete_brand($id)
{    
    $id = mysqli_real_escape_string($this->db->link, $id);    
        $query = "DELETE from table_brand where brandID='$id'";
        $result = $this->db->delete($query);
        if($result)
            {
                
                $alert="<span class='success'>Xóa thương hiệu thành công </span>";
                return $alert;
            }
            else{
                $alert="<span class='error1'>Xóa không thành công </span>";
                return $alert;
            }  
}
}
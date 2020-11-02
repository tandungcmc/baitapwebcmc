<?php
$file_path=realpath(dirname(__FILE__));
include_once ($file_path.'/../lib/database.php');
include_once ($file_path.'/../helper/format.php');
?>
<?php
class catgory
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($catName)
    {
        $catName = $this->fm->validation($catName);
        
        $catName = mysqli_real_escape_string($this->db->link, $catName);
      
        if (empty($catName)) {
            $alert = "Danh mục không được để trống";
            return $alert;
        } else {
            $query = "INSERT table_category(catName) VALUES('$catName')";
            $result = $this->db->insert($query);
            if($result !=false)
            {
                $alert="<span class='success'>Thêm danh mục thành công </span>";
                return $alert;
            }
            else{
                $alert="<span class='error1'>Danh mục không thêm thành công </span>";
                return $alert;
            }
        }
      
    }
    public function showcategory()
    {
        $query = "SELECT * from table_category order by catID desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getcatbyid($id)
    {
        $query = "SELECT * from table_category where catID=$id";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_category($catName,$id)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $id = mysqli_real_escape_string($this->db->link, $id);
      
        if (empty($catName)) {
            $alert = "Danh mục không được để trống";
            return $alert;
        } else {
            $query = "UPDATE table_category set catName='$catName' where catID='$id'";
            $result = $this->db->update($query);
            if($result !=false)
            {
                
                $alert="<span class='success'>Cập nhật danh mục thành công </span>";
                return $alert;
            }
            else{
                $alert="<span class='error1'>Danh mục không cập nhật thành công </span>";
                return $alert;
            }  
    }
}
public function delete_category($id)
{    
    $id = mysqli_real_escape_string($this->db->link, $id);    
        $query = "DELETE from table_category where catID='$id'";
        $result = $this->db->delete($query);
        if($result)
            {
                
                $alert="<span class='success'>Xóa danh mục thành công </span>";
                return $alert;
            }
            else{
                $alert="<span class='error1'>Xóa không thành công </span>";
                return $alert;
            }  
}
public function showcat($id){
    $query="SELECT * From table_category where catID='$id'";
    $result =$this->db->select($query);
    return $result;
}
}
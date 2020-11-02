<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helper/format.php');
?>
<?php
class product
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
        
    }
    public function insert_product($data, $files)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catName = mysqli_real_escape_string($this->db->link, $data['catName']);
        $brandName = mysqli_real_escape_string($this->db->link, $data['brandName']);
        $productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        //kiem tra hinh anh
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image = 'upload/'.$unique_image;


        if ($productName == null || $catName == null || $brandName == null || $productdesc == null || $price == null || $type == null || $file_name == null) {
            $alert = "Các trường trong sản phẩm không được để trống";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $upload_image);
            $query = "INSERT INTO table_product(productName,catID,brandID,productdesc,type,price,image) VALUES('$productName','$catName','$brandName','$productdesc','$type','$price','$unique_image')";
            $result = $this->db->insert($query);
            if ($result != false) {
                $alert = "<span class='success'>Thêm sản phẩm thành công </span>";
                return $alert;
            } else {
                $alert = "<span class='error1'>Thêm sản phẩm không  thành công </span>";
                return $alert;
            }
        }
    }
    public function showproduct()
    {
        $query = "SELECT table_product.*,table_category.catName,table_brand.brandName from table_product join table_category on table_product.catID=table_category.catID
        join table_brand on table_product.brandID=table_brand.brandID
         order by productID desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbyid($id)
    {
        $query = "SELECT * from table_product where productID=$id";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($data, $files, $id)
    {


        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catName = mysqli_real_escape_string($this->db->link, $data['catName']);
        $brandName = mysqli_real_escape_string($this->db->link, $data['brandName']);
        $productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        //kiem tra hinh anh
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = 'upload/'.$unique_image;
        if ($productName == null || $catName == null || $brandName == null || $productdesc == null || $price == null || $type == null) {
            $alert = "Các trường trong sản phẩm không được để trống";
            return $alert;
        } else {
            if (!empty($file_name)) { //neu chon anh
                if ($file_size > 1024) {
                    $alert = "<span class='error'>Ảnh kích thước nhỏ hơn 1Mb</span>";
                    return $alert;
                } elseif (in_array($file_ext, $permited) === false) {
                    $alert = "<span class='error'>Bạn chỉ được update  các file: " . implode(',', $permited) . " </span>";
                    return $alert;
                }
                $query = "UPDATE table_product set productName='$productName',catID='$catName',brandID='$brandName',price='$price',type='$type',productdesc='$productdesc',image='$unique_image'
                
                 where productID='$id'";
            } else {
                $query = "UPDATE table_product set productName='$productName',catID='$catName',brandID='$brandName',price='$price',type='$type',productdesc='$productdesc'
                 where productID='$id'";
            }
        }
        $result = $this->db->update($query);
        if ($result != false) {

            $alert = "<span class='success'>Cập nhật sản phẩm thành công </span>";
            return $alert;
        } else {
            $alert = "<span class='error1'>sản phẩm không cập nhật thành công </span>";
            return $alert;
        }
    }
    public function delete_product($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE from table_product where productID='$id'";
        $result = $this->db->delete($query);
        if ($result) {

            $alert = "<span class='success'>Xóa sản phẩm thành công </span>";
            return $alert;
        } else {
            $alert = '<span style="color:red">Xóa không thành công</span>';;
            return $alert;
        }
    }
    public function getproduct_feathered()
    {
        $query = "SELECT * from table_product where type='1' limit 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function productnew()
    {
        $query = "SELECT * from table_product order by productID desc limit 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getdetail($id)
    {$query = "SELECT table_product.*,table_category.catName,table_brand.brandName from table_product join table_category on table_product.catID=table_category.catID
        join table_brand on table_product.brandID=table_brand.brandID
         where table_product.productID='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_bycat($id)
    {
        $query = "SELECT * from table_product where catID=$id order by catID";
        $result = $this->db->select($query);
        return $result;

    }
    public function getproductall(){
        $query = "SELECT * from table_product";
        $result = $this->db->select($query);
        return $result;
    }
}

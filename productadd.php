<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/catgory.php';?>
<?php include '../class/brand.php' ?>
<?php include '../class/product.php' ?>
<?php
$pd = new product();
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit']))
    {
        
        $insertPd = $pd->insert_product($_POST,$_FILES);
    } 
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <div class="block">
        <?php
					if(isset($insertPd))
					echo $insertPd;
					?>               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name='productName' placeholder="Nhập sản phẩm..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giống chó</label>
                    </td>
                    <td>
                        <select id="select" name="catName">
                        <option>Chọn con giống</option>
                        <?php
                            $cat= new catgory();
                            $catlist=$cat->showcategory();
                            if($catlist) {
                                while($result=$catlist->fetch_assoc())
                                {
                            ?>
                            <option value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>
                            <?php      }
                            }?>

                      
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Phân loại</label>
                    </td>
                    <td>
                        <select id="select" name="brandName">
                            <option>Chọn hình thức phân loại</option>
                            <?php
                            $brand= new brand();
                            $brandlist=$brand->showbrand();
                            if($brandlist) {
                                while($result=$brandlist->fetch_assoc())
                                {
                            ?>
                            <option value="<?php echo $result['brandID'] ?>"><?php echo $result['brandName'] ?></option>
                            <?php      }
                            }?>

                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name='productdesc' class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá tiền</label>
                    </td>
                    <td>
                        <input type="text" name='price' placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input name="image" type="file" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="1">Featured</option>
                            <option value="0">Non-Featured</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>



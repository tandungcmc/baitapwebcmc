<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/catgory.php';?>
<?php include '../class/brand.php' ?>
<?php include '../class/product.php' ?>
<?php
$pd = new product();
 if (!isset($_GET['productid']) || $_GET['productid'] == null) echo "<script>window.location=productlist.php</script>";
else {
    $id = $_GET['productid'];
}
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['productid']))
    {
        
        $updatetPd = $pd->update_product($_POST,$_FILES,$id);
    } 
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit sản phẩm</h2>
        <div class="block">
        <?php
					if(isset($updatetPd))
					echo $updatetPd;
                    ?> 
                    <?php
                    $get_product_id=$pd->getproductbyid($id);
                    if($get_product_id)
                    {
                        while($result_product=$get_product_id->fetch_assoc())
                        {

                  

                    
                    ?>

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name='productName' value="<?php echo $result_product['productName'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catName">
                        <option>Select category</option>
                        <?php
                            $cat= new catgory();
                            $catlist=$cat->showcategory();
                            if($catlist) {
                                while($result=$catlist->fetch_assoc())
                                {
                            ?>
                            <option 
                            <?php 
                            if($result['catID']==$result_product['catID']){
                                echo 'selected';
                            }
                            ?>
                            value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>
                            <?php      }
                            }?>

                      
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandName">
                            <option>Select Brand</option>
                            <?php
                            $brand= new brand();
                            $brandlist=$brand->showbrand();
                            if($brandlist) {
                                while($result=$brandlist->fetch_assoc())
                                {
                            ?>
                            <option 
                            <?php 
                            if($result['brandID']==$result_product['brandID']){
                                echo 'selected';
                            }
                            ?>
                            value="<?php echo $result['brandID'] ?>"><?php echo $result['brandName'] ?></option>
                            <?php      }
                            }?>

                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name='productdesc' class="tinymce"><?php echo $result_product['productdesc'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name='price' value="<?php echo $result_product['price'] ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result['image']?>" >
                        <br>

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
                            <?php 
                            if($result_product['type']==1){
                            ?>
                            <option selected value="1">Featured</option>
                            <option  value="0">Non-Featured</option>
                            <?php
                            }else{
                                ?>
                                <option value="1">Featured</option>
                                <option  selected  value="0">Non-Featured</option>
                                <?php
                             }
                             ?>

                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
      }
    }
            ?>
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



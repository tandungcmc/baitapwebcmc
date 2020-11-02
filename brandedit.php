<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../class/brand.php' ?>
<?php if (!isset($_GET['brandid']) || $_GET['brandid'] == null) echo "<script>window.lobrandion=brandlist.php</script>";
else {
    $id = $_GET['brandid'];
}
$brand = new brand();
if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $brandName = $_POST['brandname'];
        $update = $brand->update_brand($brandName,$id);
    }
   ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa phân loại</h2>
        <div class="block copyblock">
            <?php
            if (isset($update))
                echo $update;
            ?>
            <?php
                $get_brand_name=$brand->getbrandbyid($id);
                if($get_brand_name){
                    while($result=$get_brand_name->fetch_assoc())
                    {
            ?>
            <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" name='brandname' value=""  placeholder="Sửa phân loại cho sản phẩm ..." class="medium" />
                                    <!-- <?php echo $brandName;
                                    echo $id; ?> -->
                                </td>
                            </tr>
                            <tr>
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
<?php include 'inc/footer.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../class/catgory.php' ?>
<?php if (!isset($_GET['catid']) || $_GET['catid'] == null) echo "<script>window.location=catlist.php</script>";
else {
    $id = $_GET['catid'];
}
$cat = new catgory();
if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $catName = $_POST['catname'];
        $update = $cat->update_category($catName,$id);
    }
   ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa con giống</h2>
        <div class="block copyblock">
            <?php
            if (isset($update))
                echo $update;
            ?>
            <?php
                $get_cat_name=$cat->getcatbyid($id);
                if($get_cat_name){
                    while($result=$get_cat_name->fetch_assoc())
                    {
            ?>
            <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" name='catname' value=""  placeholder="Sửa con giống cho sản phẩm ..." class="medium" />
                                    <!-- <?php echo $catName;
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
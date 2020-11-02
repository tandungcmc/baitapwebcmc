<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/catgory.php'?>
<?php
$cat=new catgory();
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$catName = $_POST["catname"];
	$insert_cat = $cat->insert_category($catName);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm con giống</h2>
               <div class="block copyblock"> 
               <?php 
                if(isset($insert_cat))
                echo $insert_cat;
                ?>
                 <form action='catadd.php' method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name='catname' placeholder="Thêm sản phẩm ..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
<?php
include './inclu/header.php';
include './inclu/body.php';
?>
  <?php 
           $login_check=Session::get('customer_login');
           if($login_check==false)
           {
               header("Location:login.php");
           }
        
           ?> 
<div class="main">
	
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Feature Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getproduct = $product->getproduct_feathered();
			if ($getproduct) {
				while ($result = $getproduct->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?proid=<?php echo $result['productID'] ?>" class="details"><img width="200px" height="120" src="admin/upload/<?php echo $result['image']  ?>" alt="" /></a>
						<h2><?php echo $result['productName'] ?></h2>
						<p><?php echo $result['productdesc'] ?></p>
						<p><span class="price"><?php echo $result['price'] ?> VNĐ</span></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productID'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			}
			?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>New Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
		<?php 
			 $product_new=$product->getproduct_feathered();
			 if($product_new)
			 {
				 while($result_new=$product_new->fetch_assoc())
				 {
			  ?>
		
		<div class="grid_1_of_4 images_1_of_4">
		<a href="preview.php?proid=<?php echo $result_new['productID'] ?>" class="details"><img width="200px" height="120" src="admin/upload/<?php echo $result_new['image'] ?>" alt="" /></a>
						<h2><?php echo $result_new['productName'] ?></h2>
						<p><?php echo $result_new['productdesc'] ?></p>
						<p><span class="price"><?php echo $result_new['price'] ?> VNĐ</span></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result_new['productID'] ?>" class="details">Details</a></span></div>
					</div>
			<?php
				 }
				} 
			?>

		</div>
	</div>
</div>
<?php
include './inclu/footer.php';
?>
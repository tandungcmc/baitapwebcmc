<?php
include './inclu/header.php';
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
			$getproduct = $product->getproductall();
			if ($getproduct) {
				while ($result = $getproduct->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?proid=<?php echo $result['productID'] ?>" class="details"><img width="200px" height="120" src="admin/upload/<?php echo $result['image'] ?>" alt="" /></a>
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
	</div>
</div>
<?php
include './inclu/footer.php';
?>
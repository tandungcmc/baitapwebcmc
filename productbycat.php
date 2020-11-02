<?php
include './inclu/header.php';
?>
<?php if (!isset($_GET['catid']) || $_GET['catid'] == null) echo "<script>window.location=404.php</script>";
else {
	$id = $_GET['catid'];
}


?>
<div class="main">
	<div class="content">
		<?php 
		$getcatname=$cat->showcat($id);
		if($getcatname)
		{
			while($result_namecat=$getcatname->fetch_assoc())
			{

		
		?>
		<div class="content_top">
			<div class="heading">
				<h3>Category :   <?php echo $result_namecat['catName']?></h3>
			</div>
			<div class="clear"></div>
		</div>
		<?php	}
		} ?>
		<div class="section group">
			<?php
			$getproduct_bycat = $product->getproduct_bycat($id);
			if ($getproduct_bycat) {
				while ($result = $getproduct_bycat->fetch_assoc()) {


			?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview-3.php"><img src="admin/upload/<?php echo $result['image'] ?>" alt="" />
						</a>
						<h2><?php echo $result['productName']?> </h2>
						<p><?php echo $result['productdesc']?></p>
						<p><span class="price"><?php echo $result['price']?> VNĐ</span></p>
						<div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
					</div>
			<?php	  }
			}else{
				echo "Không có sản phẩm nào";
			} ?>
		</div>



	</div>
</div>
</div>
<?php include './inclu/footer.php'; ?>
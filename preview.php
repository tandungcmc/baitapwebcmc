<?php
include './inclu/header.php';
?>
<?php
if (!isset($_GET['proid']) || $_GET['proid'] == null) echo "<script>window.location=404.php</script>";
else {
	$id = $_GET['proid'];
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {

           
	$quantily = $_POST['quanlity'];
	$addtocart = $ct->addtocart($id,$quantily);
	}
?>
<div class="main">
	<div class="content">
		<div class="section group">
			<?php
			$get_product = $product->getdetail($id);
			if ($get_product) {
				while ($reuslt_detail = $get_product->fetch_assoc()) {


			?>
					<div class="cont-desc span_1_of_2">
						<div class="grid images_3_of_2">
							<img src="admin/upload/<?php echo $reuslt_detail['image'] ?>"  alt="" />
						</div>
						<div class="desc span_3_of_2">
							<h2><?php echo $reuslt_detail['productName'] ?></h2>
							<p><?php echo $reuslt_detail['productdesc'] ?></p>
							<div class="price">
								<p>Price: <span><?php echo $reuslt_detail['price'] ?>VNĐ</span></p>
								<p>Category: <span><?php echo $reuslt_detail['catName'] ?></span></p>
								<p>Brand:<span><?php echo $reuslt_detail['brandName'] ?></span></p>
							</div>
							<div class="add-cart">
								<form action="" method="post">
									<input type="number" class="buyfield" name="quanlity" value="1" min='0'/>
									<input type="submit" class="buysubmit" name="submit" value="Buy Now" 
									/>
								</form>
							
							</div>
						</div>
				<?php }
			} ?>
				

					</div>
					<div class="rightsidebar span_3_of_1">
						<h2>CATEGORIES</h2>
						<ul>
							<?php 
							$getall_cat=$cat->showcategory();
							if($getall_cat)
							{
								while($reuslt_allcat=$getall_cat->fetch_assoc())
								{

							
							?>
							<li><a href="productbycat.php?catid=<?php echo $reuslt_allcat['catID'] ?>"><?php echo $reuslt_allcat['catName'] ?></a></li>
							<?php 
								}
							}
							?>

						</ul>

					</div>
		</div>
	</div>
</div>
<?php include './inclu/footer.php' ?>
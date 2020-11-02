<?php
$getproduct1 = $product->getproductbyid(19);
$result1=$getproduct1->fetch_assoc();
$getproduct2 = $product->getproductbyid(20);
$result2=$getproduct2->fetch_assoc();
$getproduct3 = $product->getproductbyid(21);
$result3=$getproduct3->fetch_assoc();
$getproduct4 = $product->getproductbyid(24);
$result4=$getproduct4->fetch_assoc();
?>
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						
					<a href="preview.php?proid=<?php echo $result1['productID'] ?>" class="details"><img width="200px" height="120" src="admin/upload/<?php echo $result1['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result1['productName'] ?></h2>
						<p><?php echo $result1['productdesc'] ?></p>
						<p><span class="price"><?php echo $result1['price'] ?> VNĐ</span></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result1['productID'] ?>" class="details">Details</a></span></div>
				   </div>
			   </div>			
			   <div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						
					<a href="preview.php?proid=<?php echo $result2['productID'] ?>" class="details"><img width="200px" height="120" src="admin/upload/<?php echo $result2['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result2['productName'] ?></h2>
						<p><?php echo $result2['productdesc'] ?></p>
						<p><span class="price"><?php echo $result2['price'] ?> VNĐ</span></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result2['productID'] ?>" class="details">Details</a></span></div>
				   </div>
			   </div>
			</div>
			<div class="section group">
			<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						
					<a href="preview.php?proid=<?php echo $result3['productID'] ?>" class="details"><img width="200px" height="120" src="admin/upload/<?php echo $result3['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result3['productName'] ?></h2>
						<p><?php echo $result3['productdesc'] ?></p>
						<p><span class="price"><?php echo $result3['price'] ?> VNĐ</span></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result3['productID'] ?>" class="details">Details</a></span></div>
				   </div>
			   </div>			
			   <div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						
					<a 
					href="preview.php?proid=<?php echo $result4['productID'] ?>"
					 class="details"><img width="200px" height="120" src="admin/upload/<?php echo $result4['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result4['productName'] ?></h2>
						<p><?php echo $result4['productdesc'] ?></p>
						<p><span class="price"><?php echo $result4['price'] ?> VNĐ</span></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result4['productID'] ?>" class="details">Details</a></span></div>
				   </div>
			   </div>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/hình-ảnh-con-chó - Copy.jpg" height="" alt=""/></li>
						
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>
<?php
include './inclu/header.php';
?>
<?php 
if (isset($_GET['cartid'])){
    $id = $_GET['cartid'];
    $delete = $ct->delete_product($id);
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
	$quantily = $_POST['quality'];
	$cartID = $_POST['cartID'];
	$update_quantily_cart = $ct->update_quantily_cart($cartID,$quantily);
	
}
?>
<?php 
if (isset($_GET['paycart'])){
	
	$id = Session::get('customer_id');
	$paymoney=Session::get("sum");
	$paycart=$cs->paycart($id,$paymoney);
		
}
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
					<h2>Your Cart</h2>
					<?php 
					
					if(isset($update_quantily_cart))
					{
						echo $update_quantily_cart;
					}
					?>
					<?php 
					if(isset($paycart)){
						echo $paycart;
					}
					?>
				
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
							$getproduct_tocart=$ct->getproductcart();
							if($getproduct_tocart)
							{
								$subtotal=0;
								while($result = $getproduct_tocart->fetch_assoc())
								{
									

							
							?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/upload/<?php echo $reuslt['image'] ?>"alt=""></td>
								<td><?php echo $result['price'] ?></td>
								
								<td>
									<form action="" method="post">
									<input type="hidden" name="cartID"  value="<?php echo $result['cartID'] ?>"/>
										<input type="number" name="quality" min ='0' value="<?php echo $result['quality'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php 
								$total = $result['price']*$result['quality'];
								
								echo $total;
								?></td>
								<td><a onclick="return confirm('Bạn có muốn xóa không ??')" href="?cartid=<?php echo $result['cartID'] ?>">Delete</a></td>
							</tr>
							<?php $subtotal+=$total;
								}
							}?>
									
						</table>
						<?php 
								$check_cart=$ct->check_cart();
								if($check_cart){
								
								
								?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php echo $subtotal ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php $total= $subtotal*1.1;
								echo $total;
								Session::set('sum',$total);
								?></td>
							</tr>
					   </table>
								<?php }else{
									echo "Không có sản phẩm";
									}?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="?paycart"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php include './inclu/footer.php' ?>

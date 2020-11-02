<?php include './inclu/header.php' ?>


<?php 
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit']))
{
	$updateCs = $cs->update_customer($_POST);
} 
?>
<?php 
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login']))
{
	$logincs = $cs->logincs($_POST);
} 
?>
 <div class="main">
    <div class="content">
    	<div class="register_account">
			<h3>Edit Account</h3>
			<?php 
			if(isset($updateCs))
			{
				echo $updateCs;
			}
			?>
    		<form action="" method="post">
                <?php 
                $id=Session::get('customer_id');
                $show=$cs->showcustomer($id);
                $val=$show->fetch_assoc();
                ?>
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
                                <?php ?>
                            <input type="text" name="name" value="<?php echo $val['cusName'] ?>" >
                               
							</div>	
							<div>
								<input type="text" name="zipcode" value="<?php echo $val['zipcode'] ?>">
							</div>
						
		    			 </td>
		    			<td>
						
		    		<div>
						<input type="text" name="address" value="<?php echo $val['address'] ?>">
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" value="<?php echo $val['phone'] ?>">
		          </div>
				  
				
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" value="Update" class="grey"></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
   <?php include'./inclu/footer.php' ?>
<?php
include './inclu/header.php';
?>
<?php 
if(isset($_POST['change']))
{
    $id = Session::get('customer_id');
            $updatepass=$cs->update_pass($id,$_POST);
}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
                      <h2>Change password</h2>
                      <?php
                      if(isset($updatepass))
                      echo $updatepass;
                      ?>
					  <form action="" method="post">
					    	<div>
                                <span><label>Old password</label></span>
                                <span><input type="text" name='oldpass' value="" placeholder="Enter old password.."></span>
						   		
                            </div>
                            <div>
                                <span><label>New password</label></span>
                                <span><input type="text" name='newpass' value="" placeholder="Enter new password.."></span>	   		
                            </div>
                            <div>
                            <span><input type="submit" name='change' value="Đổi password"></span>
                            </div>
						   
					    </form>
				  </div>
  				</div>
			
			  </div>    	
    </div>
 </div>
 
<?php
include './inclu/footer.php';
?>


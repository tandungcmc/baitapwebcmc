<?php
include './inclu/header.php';
?>
<?php 
if(isset($_POST['nap']))
{
    $id = Session::get('customer_id');
            $nap=$cs->napcustomer($id,$_POST);
}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
                      <h2>Nạp tiền</h2>
                      <?php
                      if(isset($nap))
                      echo $nap;
                      ?>
					  <form action="" method="post">
					    	<div>
                                <span><input type="text" name='sotien' value="" placeholder="Nhập số tiền để nạp"></span>
						   		<span><input type="submit" name='nap' value="Nạp lần đầu đi"></span>
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


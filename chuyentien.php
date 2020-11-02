<?php
include './inclu/header.php';
?>
<?php 
if(isset($_POST['chuyenkhoan']))
{
    $id = Session::get('customer_id');
            $chuyenkhoan=$cs->chuyenkhoancustomer($id,$_POST);
}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
                      <h2>Chuyển tiền</h2>
                      <?php
                      if(isset($chuyenkhoan))
                      echo $chuyenkhoan;
                      ?>
					  <form action="" method="post">
					    	<div>
                                <span><label>Tên tài khoản người nhận</label></span>
                                <span><input type="text" name='nguoinhan' value="" placeholder="Nhập tên người nhận tiền"></span>
						   		
                            </div>
                            <div>
                                <span><label>Số tiền chuyển</label></span>
                                <span><input type="text" name='sotien' value="" placeholder="Nhập số tiền để chuyển"></span>
						   		
                            </div>

                            <div>
                            <span><input type="submit" name='chuyenkhoan' value="Chuyển khoản"></span>
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


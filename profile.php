<?php
include './inclu/header.php';

?>

<div class="main">
	
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3><a href="profile.php">PROFILE</a></h3>
                
            </div>
            <div class="heading">
				<h3><a href="editcus.php">Edit</a></h3>
            </div>
            <div class="heading">
				<h3><a href="changepass.php">Change password</a></h3>
            </div>
            
			<div class="clear"></div>
		</div>
		<table class="tblone">
            <?php
            $id = Session::get('customer_id');
            $get_cus=$cs->showcustomer($id);
            if($get_cus)
            {
                while($result=$get_cus->fetch_assoc())
                {

          
            ?>
            <tr>
                <td>Họ tên</td>
                <td></td>
                <td><?php echo $result['cusName']?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td></td>
                <td><?php echo $result['email']?></td>
            </tr>
            <tr>
                <td>Zipcode</td>
                <td></td>
                <td><?php echo $result['zipcode']?></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td></td>
                <td><?php echo $result['address']?></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td></td>
                <td><?php echo $result['phone']?></td>
            </tr>
            <tr>
                <td>Số dư tài khoản</td>
                <td></td>
                <td><?php echo $result['money']." VNĐ"?></td>
            </tr>
            <?php       }
            }?>
        </table>

		</div>
	</div>
<?php
include './inclu/footer.php';
?>
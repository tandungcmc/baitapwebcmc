<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
	include_once 'lib/database.php';
	
	spl_autoload_register(function($classname){
		include_once "class/".$classname.".php";
	});

	$db = new Database();
	$us = new user();
    $ct = new cart();
	$cat= new catgory();
	$brand = new brand();
	$product = new product();
	$cs= new customer();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>MICMIC SHOP</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/dogily-logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
								<?php 
								$check_cart=$ct->check_cart();
								if($check_cart){
									$sum = $ct->totalmoney();
									echo $sum*1.1 ."VNĐ";
								}
								else{
									echo "";
								}
								
								?></span>
							</a>
						</div>
				  </div>
				  <?php 
				 if(isset($_GET['cusid'])){
					 $delcart=$ct->deldatacart();
					 Session::destroy();
				 } 
				  ?>
		   <div class="login">    <?php 
           $login_check=Session::get('customer_login');
           if($login_check==true)
           {
               echo '<a href="?cusid='.Session::get("customer_id").'">Logout</a>';
           }
           else{
               echo '<a href="login.php">Login</a>';
           }
           ?> </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang chủ</a></li>
	  <li><a href="products.php">Sản phẩm</a> </li>
	 
	  <li><a href="cart.php">Giỏ hàng</a></li>
	  
	  <?php
	  if($login_check==true){?>
		<li><a href="naptien.php">Nạp tiền</a> </li>
		<li><a href="chuyentien.php">Chuyển tiền</a> </li>
		<li><a href="profile.php">Profile</a> </li>
		<?php
	  }
	   ?>
	  <div class="clear"></div>
	</ul>
</div>
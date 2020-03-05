<?php 
include 'auth/connect.php';
include 'auth/auth.php';
$uid=$_SESSION['user'];
$id=$_GET['id'];
$sql1=mysqli_query($conn, "select * from users where userid=$uid");
$user=mysqli_fetch_assoc($sql1);
$sql=mysqli_query($conn, "select * from plan where pid=$id");
$row=mysqli_fetch_assoc($sql);


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Fitness | Pricing</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<!-- grid-slider -->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<!-- //grid-slider -->
<!-- Add fancyBox main JS and CSS files -->
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
		<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
		
</head>
<body>
	<div class="header-bottom">
		 <div class="container">
			<div class="header-bottom_left">
				<i class="phone"> </i><span>+95 9768677143</span>
			</div>
			<div class="social">	
			   <ul>	
				  <li class="facebook"><a href="#"><span> </span></a></li>
				  <li class="twitter"><a href="#"><span> </span></a></li>
				  <li class="pinterest"><a href="#"><span> </span></a></li>	
				  <li class="google"><a href="#"><span> </span></a></li>
				  <li class="tumblr"><a href="#"><span> </span></a></li>
				  <li class="instagram"><a href="#"><span> </span></a></li>	
				  <li class="rss"><a href="#"><span> </span></a></li>							
			   </ul>
		   </div>
		   <div class="clear"></div>
		</div>
	  </div>
	<!-- end header_bottom -->
	<!-- start menu -->
    <div class="menu" id="menu">
	  <div class="container">
		 <div class="logo">
			<a href="index.php"><img src="images/logo2-white.png" alt=""/></a>
		 </div>
		 <div class="h_menu4"><!-- start h_menu4 -->
		   <a class="toggleMenu" href="#">Menu</a>
			 <ul class="nav">
			   <li class="active"><a href="index.php">Home</a></li>
			   <li><a href="about.php">About</a></li>
			   <li><a href="trainers.php">Trainers</a></li>
			   <li><a href="classes.php">Classes</a></li>
			   <li><a href="pricing.php">Pricing</a></li>
			   <li><a href="contact.php">Contact</a></li>

			   <?php if (!isset($_SESSION['user'])): ?>
			   <li><a href="register.php">Register</a></li>
			   <?php else: ?>
			   <li><a href="profile.php">Profile</a></li>
			   <?php endif; ?>

			 </ul>
			  <script type="text/javascript" src="js/nav.js"></script>
		  </div><!-- end h_menu4 -->
		 <div class="clear"></div>
	  </div>
	</div>
<div id="small-dialog">
									<div class="pop_up">
									 	<div class="payment-online-form-left">
											<form method="post" action="processes/ft-payment.php">
												<h4><span class="shipping"> </span>Buy Plan</h4>
												<ul>

													<li><input class="text-box-dark" type="text" value="<?php echo($user['username']) ?>" readonly name="username"></li>
													<li><input class="text-box-dark" type="text" value="<?php echo($row['planName']) ?>" name="pname" readonly ></li>
												</ul>
												<ul>
													<li><input class="text-box-dark" type="text" value="<?php echo($row['amount']." MMK")?>"></li>
													<li><input class="text-box-dark" type="hidden" value="<?php echo($row['pid']) ?>" readonly name="pid"></li>
													
												</ul>
												<ul>
													<li><input class="text-box-dark" type="text" placeholder="Phone" name="phone"></li>
													<li><input class="text-box-dark" type="hidden" value="<?php echo($user['userid']) ?>" name="uid" readonly></li>
													
													<div class="clear"> </div>
												</ul>
												<div class="clear"> </div>
											<ul class="payment-type">
												<style type="text/css">
													.localpay{
														widows: 70px;
														height: 70px;
													}
												</style>
												<h4><span class="payment"> </span> Payments</h4>
												<li>
													<span class="col_checkbox">
													<input id="3" class="css-checkbox1" type="radio" name="payment" value="WAVEpay" checked="">
													<label for="3" name="demo_lbl_1" class="css-label1"> </label>
													<a href="" ><img src="payments/wave.svg" class="localpay"></a>
													</span>
												</li>
												<li>
													<span class="col_checkbox">
														<input id="4" class="css-checkbox2" type="radio" name="payment" value="KBZpay" checked="">
														<label for="4" name="demo_lbl_2" class="css-label2"> </label>
														<a href="" ><img src="payments/kbzpay.png" class="localpay"></a>
													</span>
												</li>
												<div class="clear"> </div>
											</ul>
												
												<ul class="payment-sendbtns">
													<li><input type="reset" value="Reset"></li>
													<li><input type="submit" value="Process Plan"></li>
												</ul> 
												<div class="clear"> </div>
											</form>
										</div>
						  			</div>
								</div>
								<div class="footer-bottom">
		   <div class="container">
		 	 <div class="row section group">
				
				<div class="col-md-6">
					<div class="f-logo">
						<img src="images/logo2-white.png" alt=""/>
					</div>
					<p class="m_9">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis</p>
					<p class="address">Phone : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">(+95) 9768677143</span></p>
					<p class="address">Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">fitnessgymservice@gmail.com</span></p>
				</div>
				<div class="col-md-6">
					<ul class="list">
						<h4 class="m_7">Menu</h4>
						<li><a href="#">About</a></li>
						<li><a href="#trainers">Trainers</a></li>
						<li><a href="#">Classes</a></li>
						<li><a href="#">Pricing</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
					<ul class="list1">
						<h4 class="m_7">Community</h4>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Forum</a></li>
						<li><a href="#">Support</a></li>
						<li><a href="#">Newsletter</a></li>
					</ul>
				</div>
				<div class="clear"></div>
	  		  </div>
		 	</div>
		 </div>
		 <div class="copyright">
		  <div class="container">
		    <div class="copy">
		        <p>© 2020 Template by <a href="http://Fitness-GYM.com" target="_blank"> Fitness-GYM</a></p>
		    </div>
		    <div class="social">	
			   <ul>	
				  <li class="facebook"><a href="#"><span> </span></a></li>
				  <li class="twitter"><a href="#"><span> </span></a></li>
				  <li class="pinterest"><a href="#"><span> </span></a></li>	
				  <li class="google"><a href="#"><span> </span></a></li>
				  <li class="tumblr"><a href="#"><span> </span></a></li>
				  <li class="instagram"><a href="#"><span> </span></a></li>	
				  <li class="rss"><a href="#"><span> </span></a></li>							
			   </ul>
		    </div>
		   <div class="clear"></div>
		  </div>
</body>
</html>
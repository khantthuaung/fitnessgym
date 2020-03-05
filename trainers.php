<?php include 'auth/connect.php';
 $sql="select * from trainers";
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Fitness | Trainers</title>
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
<!-- //grid-slider -->
<!---calender-style---->
<link rel="stylesheet" href="css/jquery-ui.css" />
<!---//calender-style---->				  
</head>
<body>
<!-- start header_bottom -->
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
	  <!-- start menu -->
    <div class="menu">
	  <div class="container">
		 <div class="logo">
			<a href="index.php"><img src="images/logo2-white.png" alt=""/></a>
		 </div>
		 <div class="h_menu4"><!-- start h_menu4 -->
		   <a class="toggleMenu" href="#">Menu</a>
			 <ul class="nav">
			   <li><a href="index.php">Home</a></li>
			   <li><a href="about.php">About</a></li>
			   <li class="active"><a href="trainers.php">Trainers</a></li>
			   <li><a href="classes.php">Classes</a></li>
			   <li><a href="blog.php">Blog</a></li>
			   <li><a href="pricing.php">Pricing</a></li>
			   <li><a href="contact.php">Contact</a></li>
			 </ul>
			  <script type="text/javascript" src="js/nav.js"></script>
		  </div><!-- end h_menu4 -->
		 <div class="clear"></div>
	  </div>
	</div>
	<!-- end menu -->
	<div class="main">
	   <div class="about_banner_img"><img src="images/about_img.jpg" class="img-responsive" alt=""/></div>
		 <div class="about_banner_wrap">
      	    <h1 class="m_11">About Us</h1>
      	 </div>
      	 <div class="about-wrapper">
      	    <div class="container">
		       <div class="row about-top">
				 <div class="col-md-5">
				  <img src="images/logologo.png" class="img-responsive" alt=""/> 
			     </div>
				 <div class="col-md-7 about-left-text">
				   <h2>Trainers</h2>
				   <p>Fitness Trainers Team</p>
				   <h4><span class="m_12">Fitness-UIT</span></h4>
				 </div>
                 <div class="clear"></div>	
               </div>
		    </div>
	      </div>
	      <div class="container">
	       <div class="about_trainer">
		      <h3 class="m_2">Our Trainers</h3>
		      <div class="row about_box">

		      	<?php 
		      $result=mysqli_query($conn, $sql);
		      while ($row=mysqli_fetch_assoc($result)):?>
		      	<a href="profile-trainer.php?id=<?php echo($row['id']) ?>">
		      	<div class="col-md-4">
				  <div class="box1">
				  	<div class="box1_left">
 					  <img src="admin/trainers/<?php echo($row['photo']) ?>" class="img-responsive" alt=""/>				  		
					  <div class="desc1">
						<h3><?php echo $row['name']; ?><br></a>
							<span class="m_text"><?php echo $row['role']; ?></span></h3>
						<p>Age: <?php echo $row['age']; ?></p>
						
						<div class="clear"></div>
					 </div>
					</div>
					<div class="box1_right">
 					 <h4>Qualifications</h4>
 					 <p><?php echo $row['qualifications']; ?> </p>
 					  <h4>Speciality</h4>
 					 <p class="para1"><?php echo $row['speciality']; ?></p>
				    </div>
				   <div class="clear"></div>
				  </div>
				</div><br>

			<?php endwhile; ?>
			
		   </div>
	    </div>
	    <div class="map">
			

			<iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.4044020589404!2d96.13308881437565!3d16.855878122353833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1936f625d4ba7%3A0x9676670831769962!2sUniversity%20Of%20Information%20Technology!5e0!3m2!1sen!2smm!4v1581865615258!5m2!1sen!2smm" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

			<br /><small><a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.4044020589404!2d96.13308881437565!3d16.855878122353833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1936f625d4ba7%3A0x9676670831769962!2sUniversity%20Of%20Information%20Technology!5e0!3m2!1sen!2smm!4v1581865688243!5m2!1sen!2smm" style="color:#666;font-size:12px;text-align:left"> </a></small>
			<div class="opening_hours">
			 <ul class="times">
			 	<h3>Opening <span class="opening">Hours</span></h3>

			 	<?php $hour=mysqli_query($conn,"select * from opening_hours" );
			 			while ($row=mysqli_fetch_assoc($hour)): ?>
			 	<li><i class="calender"> </i><span class="week"><?php echo $row['day']; ?></span><div class="hours">h.<?php echo $row['start']; ?>-h.<?php echo $row['end']; ?></div>  <div class="clear"></div></li>
			 <?php endwhile; ?>
			 	
			 	<h4>Enjoy it!</h4>
			 </ul>
		    </div>
		 </div>
	   <div class="about_gallery">
	   	<script src="js/jquery-ui.js"></script>
		 	<div class="container">
		 	  <div class="col-md-8">
		     	 <h3 class="m_2">Gallery</h3>
		     	 <div id="ca-container" class="ca-container">
				    <div class="ca-wrapper">
				         <div class="ca-item ca-item-1">
						   <div class="ca-item-main">
								<div class="ca-icon"> </div>
								<div class="ca-icon1"> </div>
							</div>
						  </div>
						<div class="ca-item ca-item-2">
							<div class="ca-item-main">
								<div class="ca-icon"> </div>
								<div class="ca-icon2"> </div>
							</div>
						</div>
						<div class="ca-item ca-item-3">
							<div class="ca-item-main">
								<div class="ca-icon"> </div>
								<div class="ca-icon3"> </div>
							</div>
						</div>
						<div class="ca-item ca-item-4">
							<div class="ca-item-main">
								<div class="ca-icon"> </div>
								<div class="ca-icon4"> </div>
						     </div>
						</div>
						<div class="ca-item ca-item-5">
							<div class="ca-item-main">
								<div class="ca-icon"> </div>
								<div class="ca-icon5"> </div>
							</div>
						</div>
						<div class="ca-item ca-item-6">
							<div class="ca-item-main">
								<div class="ca-icon"> </div>
								<div class="ca-icon6"> </div>
							</div>
						</div>
						<div class="ca-item ca-item-7">
							<div class="ca-item-main">
								<div class="ca-icon"> </div>
								<div class="ca-icon7"> </div>
							</div>
						</div>
						<div class="ca-item ca-item-8">
							<div class="ca-item-main">
								<div class="ca-icon"> </div>
								<div class="ca-icon"> </div>
							</div>
						</div>
			    </div>
			 </div>
			 <script type="text/javascript">
				$('#ca-container').contentcarousel();
			</script>
		   </div>
		   <div class="col-md-4">
		   	 <h3 class="m_2">Partner</h3>
			  <ul class="partner">
			  	<li><img src="images/p6.png" alt=""/></li>
			  	<li><img src="images/p5.png" alt=""/></li>
			  	<li><img src="images/p4.png" alt=""/></li>
			  	<li><img src="images/p3.png" alt=""/></li>
			  	<li><img src="images/p2.png" alt=""/></li>
			  	<li><img src="images/p1.png" alt=""/></li>
			  	 <div class="clear"></div>
			  </ul>
		    </div>
	       <div class="clear"></div>
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
						<li><a href="#">Trainers</a></li>
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
	     </div>
</body>
</html>
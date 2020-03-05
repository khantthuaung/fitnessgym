<?php include_once 'auth/connect.php'; ?>


<!DOCTYPE HTML>
<html>
<head>
<title>Fitness | Blog</title>
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
			   <li><a href="trainers.php">Trainers</a></li>
			   <li><a href="classes.php">Classes</a></li>
			   <li class="active"><a href="blog.php">Blog</a></li>
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
       <div class="about_banner_img"><img src="images/blog_img1.jpg" class="img-responsive" alt=""/></div>
		 <div class="about_banner_wrap">
      	    <h1 class="m_11">Blog</h1>
      	</div>
      	<div class="border"> </div>
      	<div class="container">
      		<div class="row single-top">
		  	   <div class="col-md-8">

<?php $res=mysqli_query($conn, "select * from posts");
while ($posts=mysqli_fetch_assoc($res)):

$id=$posts['id'];
	$sql3=mysqli_query($conn, "select COUNT(*) from comments where p_id=$id");
		$row3=mysqli_fetch_assoc($sql3);?>
		  	   	<div class="blog_box">
				 <div class="blog_grid">
				  <h3><a href="blog_single.php"><?php echo($posts['title']) ?></a></h3>
				  <a href="blog_single.php"><img src="posts/<?php echo($posts['media']) ?>" class="img-responsive" alt=""/></a>
				  <div class="singe_desc">
				    <p><?php echo($posts['content']) ?></p>
				     <div class="comments">
		  				<ul class="links">
		  					<li><a href="#"><i class="blog_icon1"> </i><br><span><?php echo($posts['created_date']) ?></span></a></li>
		  					
		  					<li><a href="blog_single.php?id=<?php echo($posts['id']) ?>"><i class="blog_icon4"> </i><br><span><?php echo($row3['COUNT(*)']) ?></span></a></li>
		  				</ul>
		  				<div class="btn_blog"><a href="blog_single.php?id=<?php echo($posts['id']) ?>">Read More</a>
			            </div>
		  		        <div class="clear"></div>
		  		     </div>
				  </div>
				 </div>
				</div>

<?php endwhile;  ?>
				
				
			   </div>
			   <div class="col-md-4 ">
			    	
					<ul class="single_times">

					 	<h3>Opening <span class="opening">Hours</span></h3>
					 <?php $hours=mysqli_query($conn, "select * from opening_hours");
					 	while ($times=mysqli_fetch_assoc($hours)):?>
					 	<li><i class="calender"> </i><span class="week_class"><?php echo($times['day']) ?></span><div class="hours_class">h.<?php echo($times['start']) ?>-h.<?php echo($times['end']) ?></div>  <div class="clear"></div></li>
					 <?php endwhile; ?>
					 	
					 </ul>
					  <div class="course_demo">
				          <ul id="flexiselDemo3">	
							<?php $res=mysqli_query($conn,'select * from trainers');

		          	while ($trainers=mysqli_fetch_assoc($res)):?>
					<li><a href="profile-trainer.php?id=<?php echo($trainers['id']) ?>"><img src="admin/trainers/<?php echo($trainers['photo']) ?>" />
						<div class="desc">
						<h3><?php echo($trainers['name']) ?><br><span class="m_text"><?php echo($trainers['role']) ?></span></h3>
						<p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>
						
						<div class="clear"></div>
					</div></li></a>
				<?php endwhile; ?>	    	  	       	   	    	
						</ul>
				<script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo3").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
			    	responsiveBreakpoints: { 
			    		portrait: { 
			    			changePoint:480,
			    			visibleItems: 1
			    		}, 
			    		landscape: { 
			    			changePoint:640,
			    			visibleItems: 2
			    		},
			    		tablet: { 
			    			changePoint:768,
			    			visibleItems: 2
			    		}
			    	}
			    });
			    
			});
		</script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	  </div>
			  
				  
				     <div class="clear"></div>
					  </ul>
		   	     </div>
				<div class="clear"></div>
			  </div>
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
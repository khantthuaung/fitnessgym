<?php include_once 'auth/connect.php';
session_start();
		$id=$_GET['id'];
		$sql=mysqli_query($conn, "select * from posts where id='$id'");
		$posts=mysqli_fetch_assoc($sql);

		$sql2=mysqli_query($conn, "select * from comments where p_id=$id");
		

		$sql3=mysqli_query($conn, "select COUNT(*) from comments where p_id=$id");
		$row3=mysqli_fetch_assoc($sql3);



 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Fitness | Blog Single</title>
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
			<a href="index.php"><img src="images/logo2-white.png" class="img-responsive" alt=""/></a>
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
       <div class="about_banner_img"><img src="images/blog_single.jpg"  class="img-responsive" alt=""/></div>
		 <div class="about_banner_wrap">
      	    <h1 class="m_11">Blog<span class="class_1">&nbsp;&nbsp; &gt;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo($posts['title']) ?></span></h1>
      	</div>
      	<div class="border"> </div>
      	<div class="container">
		  <div class="row single-top">
		  	   <div class="col-md-8">
		  	     <div class="blog_single_grid">
				  <ul class="links_blog">
				  	<h3><a href="blog_single.php?id=<?php echo($id)?>"><?php echo($posts['title']) ?></a></h3>
		  			<li><a href="#"><i class="blog_icon5"> </i><span><?php echo($posts['created_date']) ?></span></a> <div class="clear"></div></li>
		  		<li><a href="#"><i class="blog_icon8"> </i><span><?php echo($row3['COUNT(*)']) ?></span></a><div class="clear"></div></li>
		  		  </ul>
				  <img src="posts/<?php echo($posts['media']) ?>" class="img-responsive" alt=""/>
				  <div class="blog_single_desc">
				    <p class="m_16"><?php echo($posts['content']) ?></p>
				   
				  </div>
				
				 <ul class="comments">
				 	<h4><?php echo($row3['COUNT(*)']) ?> Comments</h4>
				 	<?php while ($row2=mysqli_fetch_assoc($sql2)):
				 		$sql4=mysqli_query($conn,"SELECT comments.*,users.* FROM comments LEFT JOIN users ON comments.u_id = users.userid");
				 		$cmt=mysqli_fetch_assoc($sql4);
				 		?>
			        <li>
			        	<ul class="comment_head">
			        		<h5><?php echo($cmt['username']) ?>&nbsp;&nbsp;&nbsp; <span class="m_21"><a href="#"><?php echo($row2['created_date']) ?></a></span></h5> <div class="reply1"></div><div class="clear"></div>
			        	</ul>
			            <i class="preview"> </i>
			            <div class="data">
			               <p><?php echo($row2['text']) ?></p>
			            </div>
			            <div class="clear"></div>
			        </li>
			    <?php endwhile; ?>
			       
			        <?php if (!isset($_SESSION['user'])):?>
			        	<div class="btn3">
				       <a href="login.php">Login to Comment</a>
			         </div>	
			       	<?php else:
			       		$uid=$_SESSION['user'];
			       		$sql1=mysqli_query($conn, "select * from users where userid=$uid");
			       		$user=mysqli_fetch_assoc($sql1);

			       	 ?>
	  			 	<h4>Leave a comment</h4>
	  			  <form id="commentform" action="processes/post_comments.php" method="post">
	  			  	<input type="hidden" name="pid" value="<?php echo($id) ?>">
				     <p class="comment-form-author"><label for="author">Name</label>
						<input id="author" name="author" value="<?php echo $user['username'] ?>" type="text" value="" size="30" readonly>
					 </p>
					 <p class="comment-form-email">
						<label for="email">Email</label>
						<input id="email" name="email" type="text" value="<?php echo($user['email']) ?>" size="30" aria-required="true" readonly>
					 </p>
					 
					 <p class="comment-form-comment">
						<label for="comment">Comment</label>
						<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
					 </p>
					<p class="form-submit">
			           <input name="submit" type="submit" id="submit" value="Send">
					</p>
					<div class="clear"></div>
				   </form>
				<?php endif; ?>
				  </ul>
			    </div>
			   </div>
			   <div class="col-md-4">
			    	
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
					  <br><br><br><br><br>
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
<?php
include 'auth/auth.php';
include 'auth/connect.php';		
$id=$_SESSION['user'];

$sql="select * from users where userid='$id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);

$sql2="select * from health_status where uid='$id'";
$res2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($res2);

$sql3="SELECT enrolls_to.uid,enrolls_to.pid,users.username,users.userid,plan.* FROM enrolls_to LEFT JOIN users ON enrolls_to.uid = users.userid LEFT JOIN plan ON enrolls_to.pid=plan.pid";
$res3=mysqli_query($conn, $sql3);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Fitness | <?php echo $row['username']?></title>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style type="text/css">
    input[type="text"]{
    border: 1px solid #EEE;
    outline-color:#00BFF0;
    width: 96%;
    font-size: 1em;
    padding: 0.5em;
    font-family: 'Open Sans', sans-serif;
    }
    .profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
</style>
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
			   <li><a href="profile.php">Profile</a></li>
			  

			 </ul>
			  <script type="text/javascript" src="js/nav.js"></script>
		  </div><!-- end h_menu4 -->
		 <div class="clear"></div>
	  </div>
	</div>
	<!-- end menu -->
<div class="container emp-profile">
            <form method="post" action="processes/update.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="profile-img">
                            <img src="users/<?php echo($row['photo']) ?>" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="profile"/>
                            </div>
                            <p>Hover the button to see the pic name you chose.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-4" >
                        <div class="profile-head">
                                    <h5>
                                        <input type="hidden" name="id" value="<?php echo($row['userid'])?>">
                                        <?php echo($row['username']) ?>
                                        
                                    </h5>
                                    <h6>
                                        Age: <?php echo($row['age']) ?>
                                    </h6>
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Save"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p style="text-decoration: underline;">Purchased Plans</p>
                            
                            <?php while ($row3=mysqli_fetch_assoc($res3)):?>
                            <a href=""><?php echo($row3['planName']) ?></a><br/>
                            
                            <?php endwhile; ?>
                            <p style="text-decoration: underline;">Current Plan</p>
                            <a href=""></a><br/>
                            <a href=""></a><br/>
                            <a href=""></a><br/>
                            <a href=""></a><br/>
                            <a href=""></a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active details" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row" style="display: none;">
                                            <div class="col-md-6" >
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['userid']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="username" value="<?php echo($row['username'])?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Age</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="age" value="<?php echo($row['age'])?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="email" value="<?php echo($row['email'])?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="phone" value="<?php echo($row['mobile'])?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Height</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="height" value="<?php echo($row2['height'])?>"> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Weight</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="weight" value="<?php echo($row2['weight'])?>"> 
                                            </div>
                                        </div>
                                        
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>           
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
						<li><a href="about.php">About</a></li>
						<li><a href="trainers.php">Trainers</a></li>
						<li><a href="classes.php">Classes</a></li>
						<li><a href="pricing.php">Pricing</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
					<ul class="list1">
						<h4 class="m_7">Community</h4>
						<li><a href="blog.php">Blog</a></li>
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
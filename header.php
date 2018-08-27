<?php
if(isset($_SESSION['stdid'])){
$sql="select * from quiz_users where id='".$_SESSION['stdid']."'";
$rs=mysql_query($sql);
$ro=mysql_fetch_array($rs);
}
?>
<header class="header">			<!-- shell ftpes://
-->
			<div class="shell">
			<div align="right"  style="color:#FFFFFF; font-size:10px; font-weight:bold"><?php if(!isset($_SESSION['stdid'])){
		?><a href="loginNow.php" style="color:#FFFFFF; font-size:10px; font-weight:bold; text-decoration:none">User Login ||&nbsp;</a>
		<?php } ?>

		
		<a href="admin/index.php" target="_blank" style="color:#FFFFFF; font-size:10px; font-weight:bold; text-decoration:none">Admin Login</a></div>

				<h1 style="color:#FFFFFF">Quiz Management System</h1>
				<!-- navigation -->
				<?php if(isset($_SESSION['stdname'])){
				?>
				<h1 align="right" style="color:#CCCCCC">Welcome :: <?php echo ucfirst($_SESSION['stdname']);?></h1>
				<?php } ?>

				<nav id="navigation">
					<ul>
						<li class="active"><a href="index.php" on>Home</a></li>
						<li ><a href="aboutUs">About</a></li>
								<li><a href="quiztestoption.php">Quiz Test</a></li>

						<li><a href="portfolio.php">Portfolio</a></li>
						<li><a href="contactUs?msg=1">contacts </a></li>
										<?php if(isset($_SESSION['stdname'])){?>
										<li><a href="result.php">Result </a></li>
										<li><a href="logout.php">LogOut </a></li>
						<?php } ?>

					</ul>
				</nav>
				<!-- navigation -->
			</div>
			<!-- end of shell -->
		</header>
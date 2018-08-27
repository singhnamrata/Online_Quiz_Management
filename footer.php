<div id="footer">
		<!-- shell -->
		<div class="shell">
			<div class="widgets">
				
				<div class="widget">
					<h4>CATEGORIES</h4>
					<ul>
						<li><a href="#">Website &amp; Development</a></li>
						<li><a href="#">Beautiful Backgrounds</a></li>
						<li><a href="#">Customisation</a></li>
					</ul>
				</div>

	<?php
				$sql="select * from gallery limit 0,4";
				$rs=mysql_query($sql);
				
				?>
	
				<div class="widget gallery-widget">
					<h4>GALLERY</h4>
					<ul>
					<?php while($ro=mysql_fetch_array($rs)){?>

						<li><a href="#"><img src="gimages/<?php echo $ro['photo']; ?>" alt="" /></a></li>
					
					<?php } ?>

					</ul>
				</div>

				<div class="widget">
					<h4>Web Lab</h4>
					<ul>
						<li><a href="#">More About Us</a></li>
						<li><a href="#">Our Mission</a></li>
						<li><a href="#">Get in Touch with UsMore</a></li>
					</ul>
				</div>

				<div class="widget contact-widget">
					<h4>Contacts</h4>
					<p class="address-ico">
						West Sagarpur<br />
						,Near Shankar Park Delhi-110046 
						<br />
						<a href="http://www.apackweb.com" style="text-decoration:none" target="_blank">www.apackweb.com</a>
						
					</p>

					<p class="phone-ico">
						Phone: +91 7428 7346 90
						Fax: +91 7428 7346 90
					</p>
					<a href="#" class="chat-btn"><span class="chat-ico"></span>Client Sheet</a>
				</div>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- end of widgets -->

			<!-- footer-bottom -->
			
		<!-- end of shell -->
	</div>
	
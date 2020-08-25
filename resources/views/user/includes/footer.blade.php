<footer>
	<div class="wrap clearfix">
		<!--column-->
		<article class="one-fourth">
			<h3>Book Your Travel</h3>
			<p>238 Hoàng Quốc Việt, Bắc Từ Liêm, Hà Nội</p>
			<p><em>P:</em> 24/7 customer support: 1800 1989</p>
			<p><em>E:</em> <a href="javascript:" title="booking@mail.com">booking@mail.com</a></p>
		</article>
		<!--//column-->
		
		<!--column-->
		<article class="one-fourth">
			<h3>Customer support</h3>
			<ul>
				<li><a href="javascript:" title="Faq">Faq</a></li>
				<li><a href="javascript:" title="How do I make a reservation?">How do I make a reservation?</a></li>
			<li><a href="javascript:" title="Payment options">Payment options</a></li>
				<li><a href="javascript:" title="Booking tips">Booking tips</a></li>
			</ul>
		</article>
		<!--//column-->
		
		<!--column-->
		<article class="one-fourth">
			<h3>Follow us</h3>
			<ul class="social">
				<li class="facebook"><a href="javascript:" title="facebook">facebook</a></li>
				<li class="youtube"><a href="javascript:" title="youtube">youtube</a></li>
				<li class="rss"><a href="javascript:" title="rss">rss</a></li>
				<!-- <li class="linkedin"><a href="javascript:" title="linkedin">linkedin</a></li> -->
				<li class="googleplus"><a href="javascript:" title="googleplus">googleplus</a></li>
				<li class="twitter"><a href="javascript:" title="twitter">twitter</a></li>
				<!-- <li class="vimeo"><a href="javascript:" title="vimeo">vimeo</a></li> -->
				<li class="pinterest"><a href="javascript:" title="pinterest">pinterest</a></li>
			</ul>
		</article>
		<!--//column-->
		
		<!--column-->
		<article class="one-fourth">
			<h3>Don’t miss our exclusive offers</h3>
			<!-- <form id="newsletter" action="newsletter.php" method="post"> -->
				<fieldset>
					<input type="email" id="email_signup" name="email_signup" placeholder="Enter your email here" />
					<input type="submit" id="signUp"  name="signUp" value="Signup" onclick="singUp()" class="gradient-button" />
				</fieldset>
			<!-- </form> -->
		</article>
		<!--//column-->
		
		<section class="bottom">
			<p class="copy">Copyright 2012 Book your travel ltd. All rights reserved</p>
			<nav>
				<ul>
					<li><a href="javascript:" title="About us">About us</a></li>
					<li><a href="contact.html" title="Contact">Contact</a></li>
					<li><a href="javascript:" title="Partners">Partners</a></li>
					<li><a href="javascript:" title="Customer service">Customer service</a></li>
					<li><a href="javascript:" title="FAQ">FAQ</a></li>
					<li><a href="javascript:" title="Careers">Careers</a></li>
					<li><a href="javascript:" title="Terms & Conditions">Terms &amp; Conditions</a></li>
					<li><a href="javascript:" title="Privacy statement">Privacy statement</a></li>
				</ul>
			</nav>
		</section>
	</div>
</footer>
<script>
	// Initiate selectnav function
	selectnav();
	function singUp(){
		var email = $('#email_signup').val();
		$("#register").css("display", "block");
		$('#emailRegister').val(email);

		console.log(email);
	}

</script>
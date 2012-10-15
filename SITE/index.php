<?php
	include("rss.php");
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">

		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/screen.css">
		<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>

		<script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
	</head>
	<body>
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
		<![endif]-->

		<div class="header-container">
			<header class="wrapper">
				<nav class='clearfix'>
					<ul class='clearfix'>
						<li><a href="#">OUR LATEST</a></li>
						<li><a href="#">OUT THOUGHTS</a></li>
						<li><a href="#">OUR STORY</a></li>
						<li><a href="#">CONTACT US</a></li>
					</ul>
				</nav>
				<div class='clearfix'>
					<h1 class="title"></h1>
					<p class='slogan'>DCG helps business leaders navigate digital transformation by providing clear, actionable advice across four themes: Consumer Engagement, the Social Enterprise, Innovative Change and Adaptive Technology.</p>
				</div>
			</header>
		</div>

		<div class="main-container">
			<div class="main">

				<div id='steps' class='gray-bg'>
					<article class='clearfix wrapper'>
						<section>
							<div class='inner'>
								<img src='img/consumer-engagement.png' alt='Consumer Engagement'/>
								<h2>Consumer Engagement</h2>
								<p>Marketing is undergoing fundamental change. The new mandate: create high-impact digital experiences that differentiate the brand, drive growth and fuel consumer evangelism. DCG helps leaders create clear maps for how technology can help power new strategies.</p>
							</div>
						</section>
						<section>
							<div class='inner'>
								<img src='img/social-enterprise.png' alt='Social Enterprise'/>
								<h2>Social Enterprise</h2>
								<p>The social business is here ready or not. It has changed the way enterprises earn, learn, communicate and collaborate. It’s no longer a choice of ‘if’ – it’s a question of how. DCG puts clarity around the strategy, process and technology of the socially enabled enterprise.</p>
							</div>
						</section>
						<section>
							<div class='inner'>
								<img src='img/innovation-change.png' alt='Innovation Change'/>
								<h2>Innovation Change</h2>
								<p>Enterprise Technology powers insight that reveals the need for change - but it doesn’t power change itself. For true success, enterprises must implement technological change well and adopt and manage it successfully. DCG helps business leaders to unleash innovative change.</p>
							</div>
						</section>
						<section>
							<div class='inner'>
								<img src='img/adaptive-technology.png' alt='Adaptive Technology'/>
								<h2>Adaptive Technology</h2>
								<p>Technology is both facilitating and disrupting both consumer engagement and social collaboration. Savvy organizations are now architecting technology around systems of engagement. DCG helps business leaders navigate through this architectural transformation.</p>
							</div>
						</section>
					</article>
				</div>

				<div id='definition'>
					<article class='wrapper-small'>
						<header>
							<h1>Because business-as-usual isn’t.</h1>
						</header>
						<section>
							<p>It is in a state of disruption.  Consumers and knowledge workers alike are grabbing control of the reigns and not letting go. The combination of the social web, open standards, the cloud, and ubiquitous mobility to name just a few, represent a field of dreams for empowered audiences to both collaborate and self-satisfy. For organizations, these disruptions represent an opportunity to transform, innovate, engage and develop loyal customers and employees like never before.  The destination may yet be undetermined – but your organization may need help in navigating. If it does – you’ll need clear guidance.</p>
							<p>DCG provides both the clarity and the guidance. We provide research, consulting, events and advisory services to help business leaders navigate the digital transformation.</p>
						</section>
					</article>
				</div>

				<div id='latest'>
					<article class='wrapper clearfix'>
						<header>
							<h1>OUR LATEST</h1>
						</header>
						<section>
							<div class='inner'>
								<h2>News</h2>
								<ul>
									<li>
										<h6>10.06.2012</h6>
										<p><a href='' target='_blank'>Some Headline</a></p>
									</li>
								</ul>
								<a href='' target='_blank'>See All News</a>
							</div>
						</section>
						<section>
							<div class='inner'>
								<h2>Events</h2>
								<ul>
									<li>
										<h6>10.06.2012</h6>
										<p><a href='' target='_blank'>Some Headline</a></p>
									</li>
									<li>
										<h6>10.06.2012</h6>
										<p><a href='' target='_blank'>Some Headline</a></p>
									</li>
								</ul>
								<a href='' target='_blank'>See All Events</a>
							</div>
						</section>
						<section>
							<div class='inner'>
								<h2>Research</h2>
								<ul>
									<li>
										<h6>10.06.2012</h6>
										<p><a href='' target='_blank'>Some Headline</a></p>
									</li>
								</ul>
								<a href='' target='_blank'>See All Research</a>
							</div>
						</section>
						<section class='last'>
							<div class='inner'>
								<h2>Thinking</h2>
								<ul>
									<li>
										<h6>10.06.2012</h6>
										<p><a href='' target='_blank'>Some Headline</a></p>
									</li>
									<li>
										<h6>10.06.2012</h6>
										<p><a href='' target='_blank'>Some Headline</a></p>
									</li>
								</ul>
								<a href='' target='_blank'>See All Thinking</a>
							</div>
						</section>
					</article>
				</div>

				<div id='thoughts' class='clearfix'>
					<article class='wrapper'>
						<header>
							<h1>OUR THOUGHTS</h1>
						</header>
						<div class='contain clearfix'>
							<?php getRSS( 'http://feeds.feedburner.com/digitalclaritygroup/blog', 'thoughtsLoaded' ); ?>
						</div>
					</article>
				</div>

				<div id='social'>
					<article class='wrapper clearfix'>
						<section id='video'>
							<iframe width="560" height="315" src="http://www.youtube.com/embed/videoseries?list=PLI0CjHTl84BwYc3wF7lRASZyE0_htgHnk&amp;hl=en_US" frameborder="0" allowfullscreen></iframe>
						</section>
						<section id='twitter'>
							<div class='inner'>
								<div class='cathymcknight'></div>
								<div class='justclarity'></div>
							</div>
						</section>
					</article>
				</div>

				<div id='story' class='gray-bg'>
					<article class='wrapper'>
						<div class='inner'>
							<header>
								<h1>Our Story</h1>
							</header>
							<section>
								<p>It all started as clear as mud. A group of independent analysts came together, frustrated by the lack of clear direction available to businesses about how to successfully navigate through the digital disruption. Beyond technology vendor grade cards, and esoteric trend papers, these practitioners believed that real clarity was needed. It’s the application of technology that’s important. It’s the real innovative changes that drive success. And, it’s how actual businesses create engagement and governance for both consumers and their teams. Business leaders just needed a little clarity. And the DCG adventure was begun… </p>
							</section>
						</div>
					</article>
				</div>

				<div id='team'>
					<article class='wrapper clearfix'>
						<section>
							<div class='inner'>
								<h3>Scott</h3>
								<img src='img/person.jpg' alt='Scott'/>
								<p class='position'>President</p>
								<p class='sub-position'>Principle Analyst</p>
							</div>
						</section>
						<section>
							<div class='inner'>
								<h3>Cathy</h3>
								<img src='img/person.jpg' alt='Scott'/>
								<p class='position'>President</p>
								<p class='sub-position'>Principle Analyst</p>
							</div>
						</section>
						<section>
							<div class='inner'>
								<h3>Tim</h3>
								<img src='img/person.jpg' alt='Scott'/>
								<p class='position'>President</p>
								<p class='sub-position'>Principle Analyst</p>
							</div>
						</section>
						<section>
							<div class='inner'>
								<h3>Elise</h3>
								<img src='img/person.jpg' alt='Scott'/>
								<p class='position'>President</p>
								<p class='sub-position'>Principle Analyst</p>
							</div>
						</section>
						<section>
							<div class='inner'>
								<h3>Robert</h3>
								<img src='img/person.jpg' alt='Scott'/>
								<p class='position'>President</p>
								<p class='sub-position'>Principle Analyst</p>
							</div>
						</section>
						<section>
							<div class='inner'>
								<h3>Kyle</h3>
								<img src='img/person.jpg' alt='Scott'/>
								<p class='position'>President</p>
								<p class='sub-position'>Principle Analyst</p>
							</div>
						</section>
					</article>
					<div class='edge'>
						<div class='top'></div>
						<div class='mid'></div>
						<div class='btm'></div>
					</div>
				</div>

				<div id='contact'>
					<article class='wrapper clearfix'>
						<header>
							<h1>CONTACT US</h1>
						</header>
						<section class='links'>
							<div class='inner'>
								<h2>Links</h2>
								<ul>
									<li><a href='' target='_blank'><img src='img/twitter.jpg' alt='Twitter'/>Twitter</a></li>
									<li><a href='' target='_blank'><img src='img/facebook.jpg' alt='Facebook'/>Facebook</a></li>
									<li><a href='' target='_blank'><img src='img/blogger.jpg' alt='Blogs'/>Blogs</a></li>
									<li><a href='' target='_blank'><img src='img/rss.jpg' alt='RSS Feed'/>RSS Feed</a></li>
									<li><a href='' target='_blank'><img src='img/slideshare.jpg' alt='Slideshare'/>Slideshare</a></li>
								</ul>
							</div>
						</section>
						<section class='newsletter'>
							<div class='inner'>
								<h2>Sign Up</h2>
								<p>Subscribe to Digital Clarity Group if you'd like to receive our free content designed to help leaders navigate digital transformation.</p>
								<form>
									<input></input>
								</form>
							</div>
						</section>
						<section class='contact last'>
							<div class='inner'>
								<h2>Contact</h2>
								<h4>PR</h4>
								<p class='name'>Robert Rose</p>
								<p class='email'>Email: <a href='mailto:rrose@digitalclaritygroup.com'>rrose@digitalclaritygroup.com</a></p>
								<p class='phone'>Phone: <a href='tel:800-555-5555'>800-555-5555</a></p>
								<h4>General Inquiries</h4>
								<p class='name'>Scott Leiwehr</p>
								<p class='email'>Email: <a href='mailto:sleiwehr@digitalclaritygroup.com'>sleiwehr@digitalclaritygroup.com</a></p>
								<p class='phone'>Phone: <a href='tel:800-555-5555'>800-555-5555</a></p>
							</div>
						</section>
					</article>
				</div>

			</div> <!-- #main -->
		</div> <!-- #main-container -->

		<div class="footer-container">
			<footer class="wrapper">
				<h5>© 2012 Digital Clarity Group, Inc.</h5>
			</footer>
		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>

		<script src="js/jquery.tweet.js"></script>
		<script src="js/main.js"></script>

		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>

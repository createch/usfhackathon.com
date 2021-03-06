<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>The Createch Hackathon</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta property="og:title" content="The Createch Hackathon" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.usfhackathon.com/" />
	<meta property="og:description" content="USF's First Hackathon - On Saturday, October the 6th, join us for a day of epic code, caffeine, free food, and swag! Come to The Createch Hackathon and work with fellow developers to build apps, websites, and software in general. One rule. Your app must relate to USF, Tampa, or Hillsborough." /> 
	<meta property="og:image" content="http://www.usfhackathon.com/assets/the-saturday-your-saturday-could-be-square.jpg" />

	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><![endif]-->

	<!-- The 1140px Grid - http://cssgrid.net/ -->
	<link rel="stylesheet" href="css/1140.css" type="text/css" media="screen" />
	
	<!-- Your styles -->
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />

	<!-- Fonts -->
	<link rel="stylesheet" href="css/webfonts/fonts.css" type="text/css" media="screen" /

	<script type="text/javascript" src="js/lib/css3-mediaqueries.js"></script>

</head>


<body class="landing">

<div class="container header">
	<div class="row">
		<div class="logo">
			<a href="index.html"><img src="images/createch-logo-black.png" border="0"></a>
			<h1>The Createch Hackathon</h1>
		</div>
	</div>
</div>

<div class="container fixed-header-push hide">
	<div class="row">
	</div>
</div>

<!-- Initial: Mailchimp Signup -->
<div id="mc-signup" class="section">
	<div class="container hero">
		<div class="row">
			<center>
			<span class="subtitle serif"><span class="dash autohide w75"></span>Presenting The University of South Florida's First Hackathon<span class="dash autohide w75"></span></span></center>
		</div>
		<div class="row center">
			<h2>The Createch</h2>
			<h1>Hackathon</h1>
		</div>
	</div>
</div>


<div class="container herodetails">
	<div class="row">
		<div class="onecol"></div>
		<div class="threecol heroaction">
			<div class="dash-box center">
				<span class="dash darkgrey"></span>
				<?
					require_once 'config.php';
					require_once 'idiorm/idiorm.php';

					ORM::configure('mysql:host='.$host.';dbname='.$dbname.'');
					ORM::configure('username', $user);
					ORM::configure('password', $pass);

					$max_seats = ORM::for_table('option')->where('name', 'max_guests')->find_one()->value;
					$seats_filled = ORM::for_table('guest')->where('status', 'valid')->count();
					$empty_seats = $max_seats - $seats_filled;
				?>
				<span class="number"><? echo $empty_seats  ?></span>
				<span class="dash darkgrey"></span>
				<span class="text">seats remain</span><br />
				<span class="signedup"><? echo $seats_filled ?> signed up</span>
			</div>
			<div class="serif">
				<span>Saturday, October 6th &mdash; 10am</span><br />
			</div>
			<div id="signup-designer" class="signup button" data-value="designer">Sign Up As A Designer</div>
			<div id="signup-developer" class="signup button" data-value="developer">Sign Up As A Developer</div>
		</div>
		<div class="sevencol last" id="hero1">
			<?
				$ab =  $_GET['ab'] || rand(0,1);
				switch ($ab) {
					case 0: ?>
						<p class="serif">Tired of spending Saturday's doing homework? Or stuck in your dorm? Spending too much time working alone on that side project?</p>
						<p>Make this weekend unlike any other. Join us for a day of epic code, caffeine, free food, and swag!</p>
						<p>Come to The Createch Hackathon and work with fellow developers to build apps, websites, and software in general.</p>						<p>One rule. Your app must relate to USF, Tampa, or Hillsborough. Build anything from an app that shows you the menu at Juniper Dining to a text messaging service that tells you when the next HART bus is coming. And if you don't necessarily know how to build something, the person sitting next to you probably will.</p>
						<h4><a href='javascript:void($("html,body").animate({scrollTop: $(".ideas").offset().top}))' target="_blank">Jump to the ideas &gt;</a></h4>
					<? break;

					case 1: default: ?>
						<p class="serif saturday">The Saturday your Saturday could be.</p>
						<p>Look at your calendar. Now look back at me. Now look at your calendar. Now look back at me.</p>
						<p>See that Saturday on the 6th? That's the Saturday your Saturday could be. Sadly, it isn't. But it could be, if you went to the Createch Hackathon.</p>
						<p>On Saturday, October the 6th, join us for a day of epic code, caffeine, free food, and swag! Come to The Createch Hackathon and work with fellow developers to build apps, websites, and software in general.</p>
						<p>One rule. Your app must relate to USF, Tampa, or Hillsborough. Build anything from an app that shows you the menu at Juniper Dining to a text messaging service that tells you when the next HART bus is coming. And if you don't necessarily know how to build something, the person sitting next to you probably will.</p>
						<h4><a href='javascript:void($("html,body").animate({scrollTop: $(".ideas").offset().top}))' target="_blank">Jump to the ideas &gt;</a></h4>
					<? break;
				}
			?>
		</div>
		<div class="sevencol last hide" id="hero2">
			<form id="signup-form">
				<input class="first autofocus" type="text" name="first" value="" default="First Name*"/>
				<input class="last" type="text" name="last" value="" default="Last Name*" />
				<input class="email" type="text" name="email" value="" default="USF Email Address*" />
				<input class="phone" type="text" name="phone" value="" default="Phone Number*" />
				<input class="website double" type="text" name="website" value="" default="Website/Github/Portfolio" />
				<input type="hidden" name="skill" class="skill" value="" />
				<span class="submit button">Submit</span>
				<div class="error-message"></div>
			</form>
		</div>
		<div class="sevencol last hide" id="hero3">
			<h3>Thank You</h3>
			<div id="signup-message"><br /></div>
		</div>
		<div class="onecol last"></div>
	</div>
</div>
<div class="container news">
	<div class="row">
		<div class="twelvecol">
			<p>We've got a new schedule and new prizes!</p>
			<p>Sponsored by the <a href="http://www.tbtf.org/events/event_details.asp?id=262490" target="_blank">Tampa Bay Technology Forum, check out their Internship Fair</a>. Also sponsored by <a href="http://sites.nielsen.com/careers/university-recruiting/" target="_blank">Nielsen</a>.</p>
		</div>
	</div>
</div>
<div class="container infocols">
	<div class="row">
		<div class="fourcol">
			<h3>Schedule</h3>
			Saturday:
			<ul>
				<li>10:00 -> Breakfast Served</li>
				<li>10:30 -> Pitch Ideas</li>
				<li>11:15 -> Commissioner Sharpe speaks</li>
				<li>11:30 -> Vote on Ideas</li>
				<li>11:45 -> Announce Best Ideas, Form Teams &amp; Code!</li>
				<li>13:30 -> Lunch Served</li>
				<li>18:00 -> Snacks</li>
				<li>19:15 -> Room closes, continue hacking elsewhere</li>
			</ul>
			Sunday:
			<ul>
				<li>23:59 -> Submissions due via GitHub</li>
			</ul>
			Thursday:
			<ul>
				<li>23:59 -> Winners announced</li>
			</ul>
			Friday, Saturday, Sunday:
			<ul>
				<li>Any time -> Pick up your prizes</li>
			</ul>

		</div>
		<div class="fourcol">
			<h3>Judging &amp; Awards</h3>
			<p>Prizes will be awared to 1st, 2nd, and 3rd place.</p>
			<ul>
				<li>Overall Execution</li>
				<li>Code Quality</li>
				<li>Design &amp; Aesthetics</li>
				<li>Usefulness &amp; relevance to USF/Tampa/Hillsborough</li>
			</ul>
			<p>Some of the swag we'll be giving away:</p>
			<ul>
				<li>1st Place - $100 Newegg Gift Cards for each team member</li>
				<li>2nd &amp; 3rd Place - Arduino Uno + Starter Kit for each team member</li>
				<li>Raffle - Arduino Uno + Starter Kit at random times of the day</li>
			</ul>
			<h3>Rules</h3>
			<ul>
				<li>All entries must relate to USF, Tampa or Hillsborough County</li>
				<li>All entries must be submitted via Github</li>
				<li>Teams may consist of up to five developers</li>
				<li>The competition is open to all USF students</li>
				<li>Teams may win 1st place in no more than one category</li>
			</ul>
		</div>
		<div class="fourcol last">
			<h3>Where</h3>
			<p>The Hackathon will be Saturday, October 6th at 10am in the USF Enginering Success Center (Kopp Building 104, 105)</p>
			<h3>What to bring</h3>
			<p>Aside from your brains, you're going to need to bring:</p>
			<ul>
				<li>Ideas to pitch</li>
				<li>Amigos and teammates</li>
				<li>Computer w/ development tools</li>
			</ul>
		</div>
	</div>
</div>

<div class="container ideas">
	<div class="row twelvecol center">
		<h2 class="">Ideas</h2>
		<h4 class="">Got an idea? Share it here.<br />Need an idea? Vote for one here.</h4>
	</div>
	<div class="row">
		<div class="twocol"></div>
		<div class="eightcol" id="ideasrow">
		</div>
		<div class="twocol"></div>
	</div>
</div>

<div class="container footer">
	<div class="row center">
		<div class="logo fourcol">
			<a href="http://www.tbtf.org/events/event_details.asp?id=262490" target="_blank">
				<img class="leaf" src="images/tbtf.jpeg">
				<div>Sponsored by <br /><span>Tampa Bay Technology Forum</span></div>
			</a>
		</div>
		<div class="logo fourcol">
			<a href="http://createch.me" target="_blank">
				<img class="leaf" src="images/createch-logo-black.png">
				<div>Brought to you by<br /><span>Createch At USF</span></div>
			</a>
		</div>
		<div class="logo fourcol last">
			<a href="http://sites.nielsen.com/careers/university-recruiting/" target="_blank">
				<img class="leaf" src="images/nielsen.png">
				<div>Sponsored by <br /><span>Nielsen</span></div>
			</a>
		</div>
	</div>
</div>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="js/lib/happy.js"></script>
<script type="text/javascript" src="js/lib/jquery.cookie.js"></script>
<script type="text/javascript" src="js/landing.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34990699-1']);
  _gaq.push(['_trackPageview']);
  _gaq.push(['_setCustomVar', 1, 'AB Testing','<? echo $ab ?>', 3]);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Live Reload 
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<!-- Weinre  
 <script src="http://131.247.233.193:12345/target/target-script-min.js#2398230876578"></script> 
-->
</body>

</html>
<?php 
@$currentProject = $_GET['p'];

// Projects
$string = file_get_contents("projects.json");
$json = json_decode($string, true);
if(!isset($currentProject)){
	// Homepage - Project List
	$projectList = array();
	foreach ($json['projects'] as $project => $projectData) {
		$projectList[] = '<a href="/?p='.$project.'#projectDetails" title="'.$projectData['title'].'"><img src="'.$projectData['thumbnail'].'" alt="'.$projectData['title'].'"><div><p><strong>'.$projectData['title'].'</strong><small>'.$projectData['type'].'</small></p></div></a>'; // #projectDetails
	} // localtest: /v6design
	$projectList = implode("\n", $projectList);
} else {
	// Project Details
	foreach ($json['projects'] as $project => $projectData) {
		if($project == $currentProject) {
			$title =  $projectData['title'];
			$type =  $projectData['type'];
			$url =  $projectData['url'];
			$description =  $projectData['description'];
			// Mobile Images
			if( isset( $projectData['imgMobile'] ) ){
				$setMobile = array();
				foreach ($projectData['imgMobile'] as $imgKey => $imgprojectData) { 
					$setMobile[] =  '<li><img src="'.$imgprojectData.'" alt="'.$imgKey.'"></li>';
				};
				$setMobile = implode("\n", $setMobile);
			}
			// Desktop Images
			if( isset( $projectData['imgDesktop'] ) ){
				$setDesktop = array();
				foreach ($projectData['imgDesktop'] as $imgKey => $imgprojectData) { // Large Images
					$setDesktop[] = '<li><img src="'.$imgprojectData.'" alt="'.$imgKey.'"></li>';
				};
				$setDesktop = implode("\n", $setDesktop);
			}
			if( isset( $projectData['video'] ) ){
				$video =  $projectData['video'];
			}
		}
	}
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no'  />
	<title>The Portfolio of Chris Simmons</title>
	<meta name="description" content="The portfolio of Chris Simmons. Mobile web developer and designer."/>
	<meta name="keywords" content="mobile, web, design, development, html5, responsive, css3, portfolio, trends, standards, photoshop, graphic design, seo, search engine optomization"/>
	<link rel="stylesheet" href="styles.css">
	<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
	<header>
		<img src="img/logo.png" id="logo" alt="logo">
		<img src="img/typography_header.png" id="typoHeader" alt="I Heart Responsive Design">

		<a name="test"><!-- anchor --></a>

		<nav id="navHeader" class="navMain">
			<a href="#" id="menu"><img src="img/mobile_menu.png" alt="Menu"></a>
			<div id="navWrap">
				<!-- <a href="index.php">Home</a> -->
				<a href="index.php#projects">Projects</a>
				<a href="index.php#experience">Experience</a>
				<a href="index.php#skillset">Skills</a>
				<a href="index.php#footer">Contact</a>
			</div>
		</nav>
	</header>

	<?php if(!isset($currentProject)){ include('home.php'); } else { include('inner.php'); } ?>

	<footer>
		<a name="footer"><!-- anchor --></a>
		<div id="contact">
			<section class="cell">
				<div id="about" style="float: none; margin: auto;">
					<img src="img/typography_footer.png" id="typoFooter" alt="I Heart Responsive Design">
					<a href="resume_low.pdf" id="resume" target="_blank">Download <strong>Resume</strong></a>
					<img src="img/portrait.png" id="portrait" alt="Portrait">
					<p>You may <a href="https://docs.google.com/document/d/1JW6vAQvfEr-rqN9lSwpQNmTzfc2bNt5wIJxstOOmpZ4/edit?usp=sharing" target="_blank">view my resume here</a>. If you have any questions about my work or feel like I would make a great addition to your team please contact me at <a href="mailto:chris@endigodesign.com">chris@endigodesign.com</a>.</p>
					<!-- <p>You can download a high quality version of my resume above or <a href="https://docs.google.com/document/d/1JW6vAQvfEr-rqN9lSwpQNmTzfc2bNt5wIJxstOOmpZ4/edit?usp=sharing" target="_blank">view a Google Docs version</a> here. If you have any questions about my work or feel like I would make a great addition to your team please contact me using the provided form.</p> -->
				</div>
				<!--
				<form id="contactForm" method="post" action="email.php">
					<input type="text" name="name"  id="name"placeholder="Full Name">
					<input type="email" name="email" id="email" placeholder="Email Address">
					<textarea name="message" id="message" cols="30" rows="8" placeholder="Your Message"></textarea>
					<button type="submit" id="submitForm" class="button">Send</button>
				</form>
				-->
			</section>
		</div>
		<div id="bottomInfo">
			<section class="cell">
				<div id="copyright">Created by <a href="mailto:chris@endigodesign.com">Chris Simmons</a> &copy; 2013</div>
				<nav id="social">
					<a href="https://www.facebook.com/chris.simmons.522" target="_blank" title="Facebook"><img src="img/social_facebook.png" alt="Facebook"></a>
					<a href="https://plus.google.com/102648505256321786875/posts" target="_blank" title="Google Plus"><img src="img/social_gplus.png" alt="Google Plus"></a>
					<a href="http://www.linkedin.com/pub/chris-simmons/23/23a/8a5" target="_blank" title="LinkedIn"><img src="img/social_linkedin.png" alt="LinkedIn"></a>
					<a href="https://gist.github.com/endigo9740" target="_blank" title="Github Gist"><img src="img/social_github.png" alt="Github Gist"></a>
				</nav>
			</section>
		</div>
	</footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="js/jquery-scrollspy.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript">
  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-3678140-3']);
	  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>
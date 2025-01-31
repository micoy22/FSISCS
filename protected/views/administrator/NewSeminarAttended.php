<?php
session_start();
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {

	}
} else {
	header("location:index.php?r=site/");
}
?>
<!DOCTYPE html>
<!--[if IE 7 ]> <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <!--> <html class=no-js lang=en> <!-- <![endif]-->
<head>

<!--[if IE ]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <![endif]-->
<meta content='width=device-width, initial-scale=1.0' name=viewport />
<meta content='FSIS' name=keywords />
<meta content='PUP Taguig FSIS' name=description />
<meta content='vCore Team' name=author />
<!-- Page title -->
<title>Faculty | Home</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right'>
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
<!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->
<section class=container-block id=page-body>
<div class=container-inner>
<!-- Page title -->
<header class=container-aligner id=page-title>
<!-- Title and summary -->

<!-- End - Title and summary -->
<!-- Title right side -->
<section class='title-right portfolio-filter'>
<a data-category=design href='http://www.puptaguig.org'>Home</a>
<a class=current-cat data-category=all href="index.php?r=faculty/profile">Profile</a>
<a data-category=design href="index.php?r=faculty/logout">Log out</a>
</section>
<!-- End - Title right side -->
</header>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>

<h2 class=underlined-header>New Seminar Attended</h2>
<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		echo '
		<div class="box-error">
		  <div class="box-content">
			<p>' . $msg . '!</p>
		  </div>
		</div>
		<hr style="margin-top:13px;"/>
		';
	} else {
		echo '
			<ul class=list-info>
			<li style="margin-top:-10px;">* Required Field</li>
			</ul>
			<hr style="margin-top:-8px;"/>
		';
	}
?>
<form id=we action="index.php?r=administrator/processInsertSA" method=POST>

<p style="margin-bottom: 9px;">* TITLE:<input name=sa1 type=text style="width: 420px; margin-top: -28px; margin-left: 15%;"  value='<?php ?>'/></p>
<p style="margin-bottom: 9px;">* NATURE:<input name=sa2 type=text style="width: 420px; margin-top: -28px; margin-left: 15%;"  value='<?php ?>'/></p>
<p style="margin-bottom: 9px;">* SPONSOR:<input name=sa3 type=text style="width: 320px; margin-top: -28px; margin-left: 15%;"  value='<?php ?>'/></p>
<p style="margin-bottom: 9px;">* VENUE:<input name=sa4 type=text style="width: 320px; margin-top: -28px; margin-left: 15%;"  value='<?php ?>'/></p>
<p style="margin-bottom: 9px;">* LEVEL:
<select name=sa5 type=text style="width: 150px; margin-top: -28px; margin-left: 15%;">
<option value='Local'>Local</option>
<option value='Regional'>Regional</option>
<option value='International'>International</option>
</select></p>
<p style="margin-bottom: 9px;">* DATE:
<select name=sa6 type=text style="width: 120px; margin-top: -28px; margin-left: 15%;">
<option value='January'>January</option>
<option value='February'>February</option>
<option value='March'>March</option>
<option value='April'>April</option>
<option value='May'>May</option>
<option value='June'>June</option>
<option value='July'>July</option>
<option value='August'>August</option>
<option value='September'>September</option>
<option value='October'>October</option>
<option value='November'>November</option>
<option value='December'>December</option>
</select>
<select name=sa7 type=text style="width: 60px; margin-top: -37px; margin-left: 36%;">
<?php 
	for($day=1;$day<=32;$day++) {
		echo '
		<option value="' . $day . '">' . $day . '</option>
		';
	}
?>
</select>
<select name=sa8 type=text style="width: 75px; margin-top: -37px; margin-left: 47%;">
<?php 
	for($year=1950;$year<=date("Y");$year++) {
		echo '
		<option value="' . $year . '">' . $year . '</option>
		';
	}
?>
</select>
</p>

<p><center><input type=submit value='Save'/><a href="index.php?r=administrator/sa"><input type=button value='Cancel'/></a></center></p>
</form>
</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Profile</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("profileMenu.php");?>
</ul>
</div>
</section>
</aside>
<!-- End - Page sidebar -->
</div>
</section>
<!-- End - Page body content -->
</div>
</section>
<!-- End - Page body -->

<!-- Page footer -->
<footer id=page-footer>
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
� Copyright 2011 <a href="#" title="Dbooom Themes">vCore Team | PUP Taguig</a> - All Rights Reserved.
</section>
<!-- End - Footer left -->
<!-- Footer right -->
<section id=footer-right>
<ul class=footer-navigation>
<li>
<a href='http://www.puptaguig.org' title=Home>Home</a>
</li>
<li>
<a href='index.php?r=site/about' title=About>About</a>
</li>
<li>
<a href='index.php?r=site/contact' title=Contacts>Contacts</a>
</li>
</ul>
</section>
<!-- End - Footer right -->
</div>
</footer>
<!-- End - Page footer -->
<!-- Theme backgrounds -->
<div id=theme-backgrounds>

<img alt='Asset 4' data-color='#D64333' src='assets/backgrounds/4.jpg.pagespeed.ce.AV4Gchw-qN.jpg' width=1600 height=1064 />

</div>
<!-- End - Theme backgrounds -->
<link href='scripts/libs/switcher/switcher.css' rel=stylesheet />

<!-- Scripts -->
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>

<?php
session_start();
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("location:index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=site/");
}
$res=0;
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
<title>Faculty | Account Modification</title>
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
<?php include("nav.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>
<h2 class=underlined-header>Modify Faculty Account</h2>
<?php 
if (!isset($_GET['msg'])) {

} else {
$msg = $_GET['msg'];
	if($_GET['msgType']=="suc") {
		echo '<div class="box-info">';
		echo '<div class="box-content">';
		echo '<p>' . $msg . '</p>';
		echo '</div>';
		echo '</div>';
		$res=1;
	}
	else if($_GET['msgType']=="err") {
		echo '<div class="box-error">';
		echo '<div class="box-content">';
		echo '<p>' . $msg . '</p>';
		echo '</div>';
		echo '</div>';

	}
}
?>
<!-- End - Item description -->
<ul class="list-info">
	<li><i>Search for faculty account to update.</i></li>
</ul><br />
<form id="" action="index.php?r=administrator/processSearchFA" method=POST>
<p style="margin-bottom: 9px;">EMPLOYEE NO.: <input id=EmpID name=EmpID type=text style="width: 50%; margin-top: -28px; margin-left: 25%;" /></p><br />
<p style="margin-top:-65px; margin-left: 382px;">
<input type=submit value=Search />
</p></form>
<hr /> 
<?php
if ($res==1) {
		$EmpID = $_GET['EmpID'];
		$FullName = $_GET['FullName'];
		echo '
		<section class=\'widget-container widget-recent-posts\'>
		<h3 class=underlined-header style="margin-top:-20px;">Search Result</h3>
		<div>
		<ul class=\'widget-list recent-posts-list\'>
		<!-- Post item -->
		<li>
		<a class=\'element-holder media-link\' href=blog-post.html title=\'Proceed to post\'>
		<img alt=\'Proceed to article\' src=\'./assets/mini-1.jpg.pagespeed.ce.KJ7LLF9TLt.jpg\' width=60 height=60 />
		</a>
		<a class=post-link href=blog-post.html title=\'View Profile\'>
		<strong>' . $EmpID . '</strong>
		</a>
		<p style="margin-top: 0px; margin-left: 200px; width:100%;">
		' . $FullName . '
		</p><br />
		<span class=widget-hint style="margin-top:0px; margin-right:23px;">
		<a href=\'index.php?r=administrator/ufa&empID=' . $EmpID . '\'>Update</a>
		</span>
		</li>
		<!-- End - Post item -->
		</ul>
		</div>
		</section>'; 
}
?>
</section>
<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Faculty Management</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<li>
<a href='index.php?r=administrator/lfa' >List of Faculty Accounts</a>
</li>

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

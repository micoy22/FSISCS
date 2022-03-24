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
<?php include("nav.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>
<?php include("gas.php");?>
<h2 class=underlined-header>Account Settings</h2>
<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		if(isset($_GET['msgType'])) {
			$msgType = $_GET['msgType'];
			if($msgType=='succ') {
			echo '
				<div class="box-info">
				  <div class="box-content">
					<p>' . $msg . '</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top: -5px;" />
				';
			} else {
				echo'
				<div class="box-error">
				  <div class="box-content">
					<p>' . $msg . '</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top: -5px;" />
				';
			}
		}
	} else {
	
	}
?>
<p style="margin-bottom: 9px;">EMPLOYEE ID:<input name=empid type=text style="width: 62%; margin-top: -28px; margin-left: 20%;"  value='<?php echo $EID;?>' disabled="disabled"/></p>
<form id=accsettingsuser action="index.php?r=administrator/processUpdateAccSettings&action=4" method=POST><p />
<p type="hidden" style="margin-bottom: 9px;"><input name=oldempid type="hidden" style="width: 62%; margin-top: -28px; margin-left: 20%;"  value='<?php echo $d1;?>'/></p>
<p style="margin-bottom: 9px;">NEW EMPLOYEE ID:<input name=newempid type=text style="width: 62%; margin-top: -38px; margin-left: 20%;" /></p>
<p><center><input type=submit value='Save Changes' /></center></p>
</form>
<hr />
<p style="margin-bottom: 9px;">USERNAME:<input name=as0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;"  value='<?php echo $d1;?>' disabled="disabled"/></p>
<form id=accsettingsuser action="index.php?r=administrator/processUpdateAccSettings&action=1" method=POST><p />
<p type="hidden" style="margin-bottom: 9px;"><input name=olduser type="hidden" style="width: 62%; margin-top: -28px; margin-left: 20%;"  value='<?php echo $d1;?>'/></p>
<p style="margin-bottom: 9px;">NEW USERNAME:<input name=newuser type=text style="width: 62%; margin-top: -38px; margin-left: 20%;" /></p>
<p><center><input type=submit value='Save Changes' /></center></p>
</form>
<hr />
<form id=accsettingspass action="index.php?r=administrator/processUpdateAccSettings&action=2" method=POST><p />
<p style="margin-bottom: 9px;">OLD PASSWORD: <input name="oldpass" type=password style="width: 62%; margin-top: -28px; margin-left: 20%;" /></p>
<p style="margin-bottom: 9px;">NEW PASSWORD: <input name="newpass" type=password style="width: 62%; margin-top: -28px; margin-left: 20%;" /></p>
<p style="margin-bottom: 9px;">RE-TYPE: <input name="repass" type=password style="width: 62%; margin-top: -28px; margin-left: 20%;" /></p>
<p><center><input type=submit value='Save Changes' /></center></p>
</form>
<hr />
<form id=accsettingsqa action="index.php?r=administrator/processUpdateAccSettings&action=3" method=POST><p />

<p style="margin-bottom: 9px;">SECRET QUESTION: <select name=as6 style="width: 62%; margin-top: -28px; margin-left: 20%;" >
<option value='What is  the name of your favorite pet?'>What is  the name of your favorite pet?</option>
<option value='Where did you meet your spouse?'>Where did you meet your spouse?</option>
<option value='What is the middle name of your mother?'>What is the middle name of your mother?</option>
<option value='What is the last name of your father?'>What is the last name of your father?</option>
<option value='Where did you spent your first honeymoon?'>Where did you spent your first honeymoon?</option>

</select></p>
<p style="margin-bottom: 9px;">ANSWER: <input name=as7 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;"  placeholder='Secret Answer' value='<?php echo $d5;?>'/></p>
<p><center><input type=submit value='Save Changes' /></center></p>
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
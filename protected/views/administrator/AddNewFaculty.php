<?php
session_start();
include("config.php");
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("Location: index.php?r=faculty/");
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
<title>New Faculty | Add</title>
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

<h2 class=underlined-header>Add New Faculty</h2>

<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		if($_GET['msgType']=="succ") {
			echo '
			<div class="box-info">
			  <div class="box-content">
				<p>' . $msg . '</p>
			  </div>
			</div>
			<hr style="margin-top:13px;"/>
			';
		} else {
			echo '
			<div class="box-error">
			  <div class="box-content">
				<p>' . $msg . '</p>
			  </div>
			</div>
			<hr style="margin-top:13px;"/>
			';
		}
	} 
?>

<p>* Required fields.</p>
<hr style="margin-top: -10px;" />
<?php
include("GetTmpFacultyCode.php");
?>
<form id=nfa action="index.php?r=administrator/processInsertNFA" method=POST>
<input type=hidden name=count value="<?php echo $count;?>"/>
<p style="margin-bottom: 9px;">*TEMPORARY FACULTY CODE.: <input readonly name="fcode" type=text style="width: 50%; margin-top: -28px; margin-left: 35%;" value = "<?php echo $newFCode;?>"/></p>
<!--<p style="margin-bottom: 9px;">* EMPLOYEE NO.: <input id=EmpID name=EmpID type=text style="width: 50%; margin-top: -28px; margin-left: 25%;" /></p>-->
<p style="margin-bottom: 9px;">* SURNAME: <input id=sname name=sname type=text style="width: 50%; margin-top: -28px; margin-left: 35%;" required/></p>
<p style="margin-bottom: 9px;">* FIRST NAME: <input id=fname name=fname type=text style="width: 50%; margin-top: -28px; margin-left: 35%;" required/></p>
<p style="margin-bottom: 9px;">* MIDDLE NAME: <input id=mname name=mname type=text style="width: 50%; margin-top: -28px; margin-left: 35%;" required/></p>
<p style="margin-bottom: 9px;">&nbsp;&nbsp NAME EXTENSION: <input id=next name=next type=text style="width: 50%; margin-top: -28px; margin-left: 35%;" /></p>
<p style="margin-bottom: 9px;">* COURSE GROUP: <input name="cgroup" type=text style="width: 50%; margin-top: -28px; margin-left: 35%;" /></p>
	<input type="hidden" name="emptype" style="width: 50%; margin-top: -28px; margin-left: 35%;" value="Part-Time">
	<input type="hidden" name="role" style="width: 50%; margin-top: -28px; margin-left: 35%;" value="Professor">
<p style="margin-bottom: 9px;">* PASSWORD: <input id=pass name=pass type=password style="width: 50%; margin-top: -28px; margin-left: 35%;" required/></p>
<p style="margin-bottom: 9px;">* RE-TYPE: <input id=repass name=repass type=password style="width: 50%; margin-top: -28px; margin-left: 35%;" required/></p>
<br />
<input type = "hidden" name = "sem" value = "<?php echo $_GET['sem'];?>">
<input type = "hidden" name = "sy" value = "<?php echo $_GET['sy'];?>">
<center><p>
<input type=submit value=Submit />
<input type=reset value=Reset />
</p></center>
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

<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("facultyMenu.php");?>
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
© Copyright 2011 <a href="#" title="Dbooom Themes">vCore Team | PUP Taguig</a> - All Rights Reserved.
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

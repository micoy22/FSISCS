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
<title>administrator | Home</title>
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
<meta charset="UTF-8">

	<script type="text/javascript" language="javascript">
		function getFullName()
		{
			var selVal = $("#empIDDDL").val();
			<?php
				include("config.php");
				$sql="SELECT * FROM tbl_personalinformation WHERE EmpID=''";
				$result=mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($result)) {
					echo '<option value="'. $row['EmpID']. '">'. $row['EmpID']. '</option>';
				}
			?>
			document.getElementById("fullname").value="Raffy Cortez";
		}
	</script>
</head>
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

<h2 class=underlined-header>New Faculty with Temporary Substitution</h2>
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
<form id=newproorg action="index.php?r=administrator/processInsertFTS" method=POST>
<p style="margin-bottom: 9px;">* FACULTY NAME:<select name="fts1" style="width: 420px; margin-top: -28px; margin-left: 20%;">
<?php
	include("config.php");
	$sql="SELECT * FROM tbl_personalinformation";
	$result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)) {
		echo '<option value="'. $row['EmpID']. '">'. $row['EmpID']. ' - ' . $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . '</option>';
	}
  ?>
</select></p>
<p style="margin-bottom: 9px;">* SUBJECT:<input name="fts2" type=text style="width: 420px; margin-top: -28px; margin-left: 20%;" placeholder='Subject' /></p>
<p style="margin-bottom: 9px;">* LECTURE:<select name="fts3" type=text style="width: 80px; margin-top: -28px; margin-left: 20%;">
	<option value="1">1 hr</option>
	<option value="2">2 hrs</option>
	<option value="3">3 hrs</option>
	<option value="4">4 hrs</option>
	<option value="5">5 hrs</option>
	<option value="6">6 hrs</option>
</select></p>
<p style="margin-bottom: 9px; margin-top:-38px; margin-left: 220px;">* LABORATORY: <select name="fts4" type=text style="width: 80px; margin-top: -28px; margin-left: 25%;">
	<option value="1">1 hr</option>
	<option value="2">2 hrs</option>
	<option value="3">3 hrs</option>
	<option value="4">4 hrs</option>
	<option value="5">5 hrs</option>
	<option value="6">6 hrs</option>
</select></p>

<p style="margin-bottom: 9px; margin-top:-38px; margin-left: 400px;">* UNITS:<select name="fts5" type=text style="width: 80px; margin-top: -28px; margin-left: 30%;">
	<option value="1">1 hr</option>
	<option value="2">2 hrs</option>
	<option value="3">3 hrs</option>
	<option value="4">4 hrs</option>
	<option value="5">5 hrs</option>
	<option value="6">6 hrs</option>
</select></p>

<p style="margin-bottom: 9px;">* SCHOOL YEAR:<select name="fts6" type=text style="width: 150px; margin-top: -28px; margin-left: 20%;">
	<option value="2011-2012">2011-2012</option>
	<option value="2012-2013">2012-2013</option>
	<option value="2013-2014">2013-2014</option>
	<option value="2014-2015">2014-2015</option>
	<option value="2015-2016">2015-2016</option>
	<option value="2016-2017">2016-2017</option>
</select></p>

<p style="margin-bottom: 9px; margin-top:-38px; margin-left: 300px;">* SEMESTER:<select name="fts7" type=text style="width: 150px; margin-top: -28px; margin-left: 30%;">
	<option value="1">1st Semester</option>
	<option value="2">2nd Semester</option>
	<option value="3">3rd Semester</option>
</select></p>

<p><center><input type=submit value='Save'/>
<a href="index.php?r=administrator/TempSub"><input type=button value='Cancel'/></a></center></p>
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

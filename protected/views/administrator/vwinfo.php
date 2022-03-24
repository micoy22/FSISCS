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
<title>Voluntary Work Details</title>
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
<?php
	if(isset($_GET['orgname']) && isset($_GET['orgadd']) && isset($_GET['fromm']) && isset($_GET['fromd']) && isset($_GET['fromy']) && isset($_GET['tom']) && isset($_GET['tod']) && isset($_GET['toy']) && isset($_GET['hours']) && isset($_GET['pos']) ) {
	
	} else {
		
	} 
?>
<h2 class=underlined-header>Voluntary Work Details</h2>
<ul class=tags-floated-list>
<li>
<a href="index.php?r=administrator/crvw&orgname=<?php echo $_GET['orgname'];?>&orgadd=<?php echo $_GET['orgadd'];?>&fromm=<?php echo $_GET['fromm'];?>&fromd=<?php echo $_GET['fromd'];?>&fromy=<?php echo $_GET['fromy'];?>&tom=<?php echo $_GET['tom'];?>&tod=<?php echo $_GET['tod'];?>&toy=<?php echo $_GET['toy'];?>&hours=<?php echo $_GET['hours'];?>&pos=<?php echo $_GET['pos'];?>" style="margin-top:-50px; margin-left:538px;">Remove</a>
</li>
</ul>
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
				<ul class=list-star>
				<li style="margin-top:-10px;"> Required Field</li>
				</ul>
			<hr style="margin-top:-8px;"/>
		';
	}
?>
<form id=we action="index.php?r=administrator/ProcessUpdateVWork&orgname=<?php echo $_GET['orgname'];?>&orgadd=<?php echo $_GET['orgadd'];?>&fromm=<?php echo $_GET['fromm'];?>&fromd=<?php echo $_GET['fromd'];?>&fromy=<?php echo $_GET['fromy'];?>&tom=<?php echo $_GET['tom'];?>&tod=<?php echo $_GET['tod'];?>&toy=<?php echo $_GET['toy'];?>&hours=<?php echo $_GET['hours'];?>&pos=<?php echo $_GET['pos'];?>" method="post">
<p style="margin-bottom: 9px;">* NAME OF ORGANIZATION:<input name=v1 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $_GET['orgname'];?>'/></p>
<p style="margin-bottom: 9px;"> ADDRESS OF ORGANIZATION:<input name=v2 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $_GET['orgadd'];?>'/></p>
<p style="margin-bottom: 9px;">* INCLUSIVE DATE FROM:
<select name=v3 style="width:20%; margin-top:-28px; margin-left:210px;">
<?php
	$month = $_GET['fromm'];
	$day = $_GET['fromd'];
	$year = $_GET['fromy'];
	switch($month) {
		case 'January': echo'
		<option value="January" selected="selected">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'February': echo'
		<option value="January">January</option>
		<option value="February" selected="selected">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'March': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March" selected="selected">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'April': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April" selected="selected">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'May': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May" selected="selected">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'June': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June" selected="selected">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'July': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July" selected="selected">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'August': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August" selected="selected">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'September': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September" selected="selected">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'October': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October" selected="selected">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'November': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November" selected="selected">November</option>
		<option value="December">December</option>';
		break;
		case 'December': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December" selected="selected">December</option>';
		break;
		
		default: echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;

	}
?>

</select>
<select name=v4 style="width:10%; margin-top:-37px; margin-left:338px;">
<?php 
	for($days=1;$days<=31;$days++) {
		if($days==$day) {
			echo '
			<option value="' . $days . '" selected="selected">' . $days . '</option>
			';
		} else {
			echo '
			<option value="' . $days . '">' . $days . '</option>
			';
		}
	}
?>
</select>
<select name=v5 style="width:15%; margin-top:-37px; margin-left:405px;">
<?php 
	for($years=1950;$years<=date("Y");$years++) {
		if($years==$year) {
			echo '
			<option value="' . $years . '" selected="selected">' . $years . '</option>
			';
		} else {
			echo '
			<option value="' . $years . '">' . $years . '</option>
			';
		}
	}
?>
</select>
<p style="margin-bottom: 9px;">* INCLUSIVE DATE TO:
<select name=v6 style="width:20%; margin-top:-28px; margin-left:210px;">
<?php
	$tmonth = $_GET['tom'];
	$tday = $_GET['tod'];
	$tyear = $_GET['toy'];
	switch($tmonth) {
		case 'January': echo'
		<option value="January" selected="selected">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'February': echo'
		<option value="January">January</option>
		<option value="February" selected="selected">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'March': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March" selected="selected">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'April': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April" selected="selected">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'May': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May" selected="selected">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'June': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June" selected="selected">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'July': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July" selected="selected">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'August': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August" selected="selected">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'September': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September" selected="selected">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'October': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October" selected="selected">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'November': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November" selected="selected">November</option>
		<option value="December">December</option>';
		break;
		case 'December': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December" selected="selected">December</option>';
		break;
		
		default: echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;

	}
?>

</select>
<select name=v7 style="width:10%; margin-top:-37px; margin-left:338px;">
<?php 
	for($days=1;$days<=31;$days++) {
		if($days==$tday) {
			echo '
			<option value="' . $days . '" selected="selected">' . $days . '</option>
			';
		} else {
			echo '
			<option value="' . $days . '">' . $days . '</option>
			';
		}
	}
?>
</select>
<select name=v8 style="width:15%; margin-top:-37px; margin-left:405px;">
<?php 
	for($years=1950;$years<=date("Y");$years++) {
		if($years==$tyear) {
			echo '
			<option value="' . $years . '" selected="selected">' . $years . '</option>
			';
		} else {
			echo '
			<option value="' . $years . '">' . $years . '</option>
			';
		}
	}
	if($tyear=="PRESENT") {
		echo '
		<option value="PRESENT"  selected="selected">Present</option>
		';
	} else {
		echo '
		<option value="PRESENT"  selected="selected">Present</option>
		';
	}
?>
</select>
</p><p style="margin-bottom: 9px; margin-top: 0px;"> NO. OF HOURS:<input name=v9 type=text style="width: 50px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $_GET['hours'];?>'/></p>
<p style="margin-bottom: 9px;">* POSITION/NATURE OF WORK:<input name=v10 type=text style="width: 150px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $_GET['pos'];?>'/></p>
<p><center><input type=submit value='Save Changes'/> <a href="index.php?r=administrator/VoluntaryWork"><input type="button" value='Cancel'/></a></center></p>
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

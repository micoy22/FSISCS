﻿<?php
include("config.php");
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
<title>Faculty | Part Time</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd_tm1.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}
    
#page-title
{
    background-color: black;
    padding: 5px 5px 5px;
    height: 41px;
}
    
#menu_strip
{
    margin-top: 10px;
}
    
#menu_strip a
{
    color: white;
    padding: 10px 10px 10px;
    border-radius: 5px;
}
    
#menu_strip a:hover
{
    background-color: lightgray;
    color: white;
    padding: 10px 10px 10px;
    border-radius: 5px;
}
    
#menu_title
{
    margin-left: 30px;
    background-color: lightgray;
    color: black;
    text-align: center;
    font-family: "Helvetica";
    padding: 5px 5px 5px;
    font-size: 16px;
    width: 100%;
}
    
#options_menu_title
{
    margin-left: 30px;
    background-color: lightgray;
    color: black;
    text-align: center;
    font-family: "Helvetica";
    padding: 5px 5px 5px;
    width: 100%;
}
    
</style>

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
<!-- Page body content -->
<section id="page-body-content">
<div id="page-body-content-inner">
<!-- Page content -->
<div id="page-content">
<!-- Video - HTML5 -->
<section>

<h2 class="underlined-header">Part Time</h2>
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

<form name="frmSched" method = "post" action = "index.php?r=administrator/PartTime">
	<h4 class="underlined-header"><strong>Select School Year</strong></h4>
	<select name = "sy" style="width: 30%;">
		<?php
			$sy = isset($_GET['sy']) ? $_GET['sy'] : (isset($_POST['sy']) ? $_POST['sy'] : '');
			$sql = "SELECT DISTINCT schoolYear FROM tbl_subjectload order by schoolYear DESC";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_array($result)) {
				$selected = $sy == $row['schoolYear'] ? 'selected="selected"' : '';
				echo '<option value="'. $row['schoolYear'] .'" ' . $selected . '>'. $row['schoolYear'] .'</option>';
			}
		?>
	</select>
	<input type="submit" name="btnSubmit" value="Go" />
</form>

<?php
	if(isset($_POST['sy'])){
		$sy = $_POST['sy'];
		echo'
		<a href="index.php?r=administrator/AddPartTime&sy='.$sy.'" class="btn btn-mini"><button>Add</button></a>
		<table class=round-3 style="width:100%; ">
		<thead>
		<tr>
		<th><h5>Name</h5></th>
		<th><h5>Position</h5></th>
		<th><h5>Action</h5></th>
		</tr>
		</thead>

		<tfoot>
		<tr>
		<td colspan=3></td>
		</tr>
		</tfoot>
		<tbody>';
		$sql = "SELECT * FROM tbl_masterlist WHERE Status = 'PT' and schoolYear = '$sy' order by FName ASC";
		$query = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($query)) 
		{
			$Name = $row['FName'];
			$bofcode = $row['FCode'];
			$Position = $row['Position'];
			echo '
				<tr>
				<td style="text-align: left;">'. $Name .'</td>
				<td style="text-align: left;">'. $Position .'</td>
				<td style="text-align: left;"><a href="index.php?r=administrator/EditBO&BOName='.$Name.'&BOFCode='.$bofcode.'" class="btn btn-mini"><button>Edit</button></a></td>
				</tr>
			';
		}
		echo'
		</tbody>
		</table>
		';
	} elseif(isset($_GET['sy'])){
		$sy = $_GET['sy'];
		echo'
		<a href="index.php?r=administrator/AddPartTime&sy='.$sy.'" class="btn btn-mini"><button>Add</button></a>
		<table class=round-3 style="width:100%; ">
		<thead>
		<tr>
		<th><h5>Name</h5></th>
		<th><h5>Position</h5></th>
		<th><h5>Action</h5></th>
		</tr>
		</thead>

		<tfoot>
		<tr>
		<td colspan=3></td>
		</tr>
		</tfoot>
		<tbody>';
		$sql = "SELECT * FROM tbl_masterlist WHERE Status = 'PT' and schoolYear = '$sy' order by FName ASC";
		$query = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($query)) 
		{
			$Name = $row['FName'];
			$Position = $row['Position'];
			$bofcode = $row['FCode'];
			echo '
				<tr>
				<td style="text-align: left;">'. $Name .'</td>
				<td style="text-align: left;">'. $Position .'</td>
				<td style="text-align: left;"><a href="index.php?r=administrator/EditBO&BOName='.$Name.'&BOFCode='.$bofcode.'" class="btn btn-mini"><button>Edit</button></a></td>
				</tr>
			';
		}
		echo'
		</tbody>
		</table>
		';
	}
?>

</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Faculty and Staff Management</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("facultyMenu.php");?>
</ul>
</div>
</section>
</aside>
<!-- End - Page sidebar -->
</div>
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

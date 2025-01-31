<?php
session_start();
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
<title>Curriculum Management | Preview</title>
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
aside.page-sidebar{
display:none;
}

.page-sidebar-right #page-content{
	width:100%;
}
body.page-media.page-sidebar-right{
	width:100%;
}
.page-sidebar-right #page-body-content {
background:url(../../../../FSISCS/images/page-body-bg-white.png);
background-repeat:repeat;
}</style>

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

<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>


<?php foreach($course as $courses): ?>
	
	<details>
		<summary class=underlined-header><?php echo $courses['course_code'] ?></summary>
		<div class="details-content">
		<h4>1st Semester</h4>
		<table class="table table-bordered table-striped table-hover" style="width:100%;">
			<thead>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">CODE</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TITLE</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">LEC</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">LAB</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">UNITS</td>
			</thead>
			<tbody>
				<?php foreach ($PrevCurriculum as $row): ?>
					<?php if ($row['sem'] == 1 AND $row['courseID']==$courses['course']): ?>
						<tr>
							<td style="text-align: center;"><?php echo $row['scode'] ?></td>
							<td style="text-align: left;"><?php echo $row['stitle'] ?></td>
							<td style="text-align: center;"><?php echo $row['hrs_lec'] ?></td>
							<td style="text-align: center;"><?php echo $row['hrs_lab'] ?></td>
							<td style="text-align: center;"><?php echo $row['sunit'] ?></td>
						</tr>
					<?php endif ?>
				<?php endforeach ?>
			</tbody>
		</table>

		<h4>2nd Semester</h4>
		<table class="table table-bordered table-striped table-hover" style="width:100%;">
			<thead>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">CODE</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TITLE</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">LEC</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">LAB</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">UNITS</td>
			</thead>
			<tbody>
				<?php foreach ($PrevCurriculum as $row): ?>
					<?php if ($row['sem'] == 2 AND $row['courseID']==$courses['course']): ?>
						<tr>
							<td style="text-align: center;"><?php echo $row['scode'] ?></td>
							<td style="text-align: left;"><?php echo $row['stitle'] ?></td>
							<td style="text-align: center;"><?php echo $row['hrs_lec'] ?></td>
							<td style="text-align: center;"><?php echo $row['hrs_lab'] ?></td>
							<td style="text-align: center;"><?php echo $row['sunit'] ?></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
		<h4>Summer</h4>
		<table class="table table-bordered table-striped table-hover" style="width:100%;">
			<thead>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">CODE</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TITLE</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">LEC</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">LAB</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">UNITS</td>
			</thead>
			<tbody>
				<?php foreach ($PrevCurriculum as $row): ?>
					<?php if ($row['sem'] == 3 AND $row['courseID']==$courses['course']): ?>
						<tr>
							<td style="text-align: center;"><?php echo $row['scode'] ?></td>
							<td style="text-align: left;"><?php echo $row['stitle'] ?></td>
							<td style="text-align: center;"><?php echo $row['hrs_lec'] ?></td>
							<td style="text-align: center;"><?php echo $row['hrs_lab'] ?></td>
							<td style="text-align: center;"><?php echo $row['sunit'] ?></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
		</div>
		</details>
		<hr>

<?php endforeach;?>

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
<?php include("SchedulingMenu.php");?>
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
<script src='assets/jquery-3.6.0.min.js'></script>
<script src='assets/sweetalert2.all.min.js'></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>
<script type="text/javascript">
	radioHandler = (e)=>{
	if($(e).prop("checked")){
    $("#sub").removeAttr('disabled');
  		}
	}
	

	$("#sub").on('click', function(e){
		e.preventDefault();
		var form = $(this).parents('form');
		Swal.fire({
			title: 'Are you sure?',
			text: 'You want to continue this process?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Confirm',

		}).then((result) => {
			if(result.isConfirmed){
				Swal.fire({
				title: 'Are you sure?',
				text: 'You may have to delete it manually if you continue this',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Confirm',

				}).then((result) => {
					if(result.isConfirmed){
						form.submit();
					}
				})
			}
		})
	})
	
	
</script>
</body>
</html>

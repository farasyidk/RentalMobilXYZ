<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>XYZ Rental Mobil</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="adminis/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<?php
include "include/crud.php";
$db = new Crud();
session_start();
?>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><span>XYZ</span> Rental Mobil</a>
                </div>
                <div class="navbar-collapse collapse ">
                <?php
                $a=""; $b=""; $c=""; $d="";
                if (!empty(@$_GET['eks'])) {
                if ($_GET['eks'] == 1) { $a="class='active'"; }
                if ($_GET['eks'] == 2) { $b="class='active'"; }
                if ($_GET['eks'] == 3) { $c="class='active'"; }
                if ($_GET['eks'] == 4) { $d="class='active'"; }
                if ($_GET['eks'] == 5) { $d="class='active'"; }
            } else { $a="class='active'"; }
                ?>
                    <ul class="nav navbar-nav">
                        <li <?php echo $a; ?>><a href="?eks=1">Mobil</a></li>
                        <li <?php echo $b; ?>><a href="?eks=2">Profil</a></li>
                        <li <?php echo $c; ?>><a href="?eks=3">Pelanggan</a></li>
                        <?php if (empty($_SESSION['user'])) { ?>
                        <li <?php echo $d; ?>><a href="?eks=4">Login</a></li>
                        <?php } else { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Akun<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="?eks=6">Transaksi</a></li>
                                <li><a href="?eks=8">Profil</a></li>
								<li><a href="menu/usr/logout.php">Keluar</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="content">
	<div class="container">
		<!-- Portfolio Projects -->
		<div class="row">
			<div class="col-md-9">
				<!-- content -->
				<?php include "include/select.php"; ?>
				<!-- end content -->
			</div>
			<div class="col-md-3">
				<!-- sidebar -->
				<?php include "include/sidebar.php";?>
				<!-- sidebar -->
			</div>
		</div>
	</div>
	</section>
	<footer>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; Design & Created By </span><a href="http://bootstraptaste.com" target="_blank">Fadqurrosyidik</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript" src="adminis/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="adminis/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>

    <!-- Fungsi datepickier yang digunakan -->
    <script type="text/javascript">
     $('.datepicker').datetimepicker({
            language:  'id',
            weekStart: 1,
            todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
        });
    </script>
</body>
</html>
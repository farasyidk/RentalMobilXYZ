<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Karyawan - XYZ Rental Mobil</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Date Picker -->
    <link href="../adminis/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
include "include/crud.php";
session_start();
if (empty($_SESSION['id_kar'])) {
    header("location:menu/login");
}
?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                <?php 
                $db = new Crud();
                try {
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $new = $db->query("select count(new) as new from transaksi where new = 0");
                $newA = $new->fetch();
                if ($newA[0] == 0) {
                    $neww = "";
                } else {
                    $neww = $newA[0];
                }
                ?>
                    <a href="?eks=2&new=1"><i class="fa fa-bell"><?php echo $neww; ?></i> </a>
                <?php
                if (@$_GET['new'] == 1) {
                $id = $_GET['new'];
                $updatefildN = array('new' => '1');
                $whereN = "new = '0'"; 
                $updateN = $db->update("transaksi",$updatefildN, $whereN);
                if ($updateN) {
                    echo "<script>location='?eks=2';</script>";
                }
            }
                ?>    
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['nama_kar']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="menu/login/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php
            include "include/koneksi.php";
                $a=""; $b=""; $c=""; $d="";
                if (!empty(@$_GET['eks'])) {
                    if ($_GET['eks'] == 1) { $a="class='active'"; }
                    if ($_GET['eks'] == 2) { $b="class='active'"; }
                    if ($_GET['eks'] == 3) { $c="class='active'"; }
                    if ($_GET['eks'] == 4) { $d="class='active'"; }
                } else { $a="class='active'"; }
            ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php echo $a; ?>>
                        <a href="?eks=1"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li <?php echo $b; ?>>
                        <a href="?eks=2"><i class="fa fa-fw fa-bar-chart-o"></i> Transaksi</a>
                    </li>
                    <li <?php echo $c; ?>>
                        <a href="?eks=3"><i class="fa fa-fw fa-table"></i> Data Mobil</a>
                    </li>
                    <li <?php echo $d; ?>>
                        <a href="?eks=4"><i class="fa fa-fw fa-file"></i> Data Pelanggan</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php include "include/select.php"; ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery2.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="../adminis/js/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="js/jquery-2.2.0.js"></script>
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

    <!--file include Bootstrap js dan datepickerbootstrap.js-->

    <script type="text/javascript" src="../adminis/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../adminis/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>

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

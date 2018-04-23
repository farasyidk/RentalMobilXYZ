<style type="text/css">
    #pagination a,
    #pagination span {
        display: block;
        float: left;
        margin: 0 7px 0 0;
        padding: 7px 10px 6px 10px;
        font-size: 12px;
        line-height:12px;
        color: #888;
        font-weight:600;
    }

    #pagination a:hover {
        color: #fff;
        text-decoration:none;
        background: #428bca;
    }

    #pagination span.current {
        background: #333;
        color: #fff;
        font-weight: bold;
}
</style>
<h1 class="page-header">
    Data Transaksi
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="?eks=1">Dashboard</a>
    </li>
    <li class="active">
        <i class="fa fa-fw fa-table"></i> Data Transaksi
    </li>
</ol>
<div class="col-lg-10">
    <div class="table-responsive">
        <div class="form-group">
            <form method="POST" action="#">
                <label class="form-label col-lg-1" for="date01">Dari</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control datepicker"  data-date-format="yyyy-mm-dd" id="datepicker" name="dateFrom">
                </div>
                <label class="form-label col-lg-1" for="date01">Ke</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control datepicker"  data-date-format="yyyy-mm-dd" id="datepicker" name="dateTo">
                </div>
                <input class="btn btn-default" type="submit" value="Cari" name="cari">
            </form>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>No Plat Kendaraan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali Real</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $between = "";
            if (isset($_POST['cari'])) {
                if (!empty($_POST['dateFrom']) and !empty($_POST['dateTo'])) {
                    $from = $_POST['dateFrom'];
                    $to = $_POST['dateTo'];
                    $between = "where TglKembaliReal between '$from' and '$to'";
                }
            }
            $no=1;
            $query = $db->query("SELECT * FROM transaksi $between");
            while ($array = $query->fetch()) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $array['IdPelanggan'] ?></td>
                    <td><?php echo $array['NoPlat']; ?></td>
                    <td><?php echo $array['TglPinjam']; ?></td>
                    <td><?php echo $array['TglKembaliReal']; ?></td>
                    <td><span class="label <?php if ($array['status'] == 'real') { echo 'label-success'; } else { echo 'label-warning'; } ?>"><?php echo $array['status']; ?></span></td>
                    <td>
                        <div class="center">
                            <a class="btn btn-xs btn-success" href='?eks=2&id=<?php echo $array[0]; ?>&stts=<?php echo $array['status'] ?>&ganti=1'><i class="icon icon-white icon-gear"></i>Ubah Status</a> 
                            <a class="btn btn-xs btn-primary" href='?eks=6&id=<?php echo $array[0]; ?>'><i class="icon-edit icon-white"></i>Edit</a> 
                            <a class="btn btn-xs btn-info" href='?eks=5&id=<?php echo $array['0']; ?>'><i class="icon-edit icon-white"></i>Detail</a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="7">
                        <div id="pagination">
                        <?php
                        //$total_results = $db->result
                        ?>
                                <span class="all">Page 1 of 3</span>
                                <span class="current">1</span>
                                <a href="#">2</a>
                                <a href="#">3</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
$db = new Crud();
if (@$_GET['ganti'] == 1) {
    if ($_GET['stts'] == "real") {
            $ganti = "pending";
        } else {
            $ganti = "real";
        }
    $id = $_GET['id'];
    $nik = $_SESSION['id_kar'];
    $updatefild = array('status' => $ganti, 'NIK' => $nik);
    $where = "NoTransaksi = '$id'"; 
    $update = $db->update("transaksi",$updatefild, $where);
    if ($update) {
        echo "<script>location='?eks=2';</script>";
    }
}
?>
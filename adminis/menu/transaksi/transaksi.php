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
<div class="col-lg-8">
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
                    <td><a href="?eks=6">Detail</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
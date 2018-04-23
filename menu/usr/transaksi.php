<section id="inner-headline">
    <div class="container" style="padding: 0">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="?eks=1"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li class="active">Transaksi</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
$id = $_SESSION['id_usr'];
$queryT = $db->query("select transaksi.NoTransaksi as no, type.NmType as nama, transaksi.TglPesan as tglPesan, transaksi.TglPinjam as tglPinjam, transaksi.JamPinjam as jmPinjam, transaksi.status as stts from transaksi,kendaraan,type where IdPelanggan = '$id' and transaksi.NoPlat = kendaraan.NoPlat and kendaraan.IdType = type.IdType");
$row = $queryT->rowCount();
if ($row > 0) { ?>
<div class="col-sm-9 col-lg-9">
<p class="lead text-muted">Daftar Transaksi</p>
<table class="table table-bordered" data-effect="fade">
    <thead>
        <tr>
            <th>No</th>
            <th>Kendaraan</th>
            <th>Tgl Pesan</th>
            <th>Tgl Pinjam</th>
            <th>Jam Pinjam</th>
            <th>Status</th>
            <th>Aksi</th>
            </tr>
    </thead>
    <tbody>
            <?php $no=1;
            while ($array = $queryT->fetch()) {
            ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $array['nama']; ?></td>
            <td><?php echo $array['tglPesan']; ?></td>
            <td><?php echo $array['tglPinjam']; ?></td>
            <td><?php echo $array['jmPinjam']; ?></td>
            <td <?php if ($array['stts'] == 'pending') { echo "bgcolor='yellow'";} ?>><?php echo $array['stts']; ?></td>
            <td><a href="?eks=7&id=<?php echo $array['no']; ?>">Detail</a></td>
        </tr>
            <?php } ?>
    </tbody>
</table>
</div>
<?php } else { ?>
<h3>Anda Belum Melakukan Transaksi</h3>
<?php } ?>
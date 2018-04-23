<h1 class="page-header">
    Data Kendaraan
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="?eks=1">Dashboard</a>
    </li>
    <li class="active">
        <i class="fa fa-fw fa-table"></i> Data Kendaraan
    </li>
</ol>
<div class="col-lg-8">
    <div class="table-responsive">
        <a href="?eks=14"><i class="fa fa-plus"></i>Tambah Kendaraan</a>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Plat</th>
                    <th>Nama Mobil</th>
                    <th>Status Rental</th>
                    <th>Harga Sewa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no=1;
                $query = $db->query("select kendaraan.NoPlat, type.NmType, kendaraan.StatusRental, kendaraan.HargaSewa from kendaraan,type where kendaraan.IdType = type.IdType");
                while ($array = $query->fetch()) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $array['0']; ?></td>
                    <td><?php echo $array['1']; ?></td>
                    <td><?php echo $array['2']; ?></td>
                    <td><?php echo $array['3']; ?></td>
                    <td><a href="?eks=3&id=<?php echo $array['0']; ?>">Edit</a> | <a href="#">Hapus</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

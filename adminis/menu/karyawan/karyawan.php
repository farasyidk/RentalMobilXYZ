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
    Data Pegawai
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="?eks=1">Dashboard</a>
    </li>
    <li class="active">
        <i class="fa fa-fw fa-table"></i> Data Pegawai
    </li>
</ol>
<div class="col-lg-8">
    <section id="karyawan">
        <label>Karyawan</label>
        <div class="table-responsive">
            <a href="?eks=7"><i class="fa fa-plus"></i>Tambah Karyawan</a>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Nama User</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                $query = $db->query("select * from karyawan");
                while ($array = $query->fetch()) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $array['nama'] ?></td>
                        <td><?php echo $array['NmUser']; ?></td>
                        <td><?php echo $array['alamat']; ?></td>
                        <td><?php echo $array['telepon']; ?></td>
                        <td><a href="?eks=3&id=<?php echo $array['0']; ?>">Edit</a> | <a href="?eks=2&h=1&id=<?php echo $array['0']; ?>">Hapus</a></td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td colspan="6">
                            <div id="pagination">
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
    </section>
</div>
<div class="col-lg-8">
    <label>Pemilik</label>
    <div class="table-responsive">
        <a href="?eks=8"><i class="fa fa-plus"></i>Tambah Pemilik</a>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemilik</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $queryP = $db->query("select * from pemilik");
                while ($arrayP = $queryP->fetch()) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $arrayP['NmPemilik'] ?></td>
                        <td><?php echo $arrayP['2']; ?></td>
                        <td><?php echo $arrayP['3']; ?></td>
                        <td><a href="?eks=9&id=<?php echo $arrayP['0']; ?>">Edit</a> | <a href="?eks=2&h=2&id=<?php echo $arrayP['0']; ?>">Hapus</a></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="6">
                        <div id="pagination">
                            <span class="all">Page 1 of 3</span>
                            <span class="current">1</span>
                            <a href="#" class="inactive">2</a>
                            <a href="#" class="inactive">3</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-lg-8">
    <label>Sopir</label>
    <div class="table-responsive">
        <a href="?eks=10"><i class="fa fa-plus"></i>Tambah Sopir</a>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sopir</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>No Sim</th>
                    <th>Tarif PerHari</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $queryS = $db->query("select * from sopir");
                while ($arrayS = $queryS->fetch()) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $arrayS['1'] ?></td>
                        <td><?php echo $arrayS['2']; ?></td>
                        <td><?php echo $arrayS['3']; ?></td>
                        <td><?php echo $arrayS['4']; ?></td>
                        <td><?php echo $arrayS['5']; ?></td>
                        <td><a href="?eks=11&id=<?php echo $arrayS['0']; ?>">Edit</a> | <a href="?eks=2&h=3&id=<?php echo $arrayS['0']; ?>">Hapus</a></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="7">
                        <div id="pagination">
                            <span class="all">Page 1 of 3</span>
                            <span class="current">1</span>
                            <a href="#" class="inactive">2</a>
                            <a href="#" class="inactive">3</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
$h = @$_GET['h'];
$id = @$_GET['id'];
if ($h == 1) {
    $db->query("delete from karyawan where NIK = '$id'");
} else if ($h == 2) {
    $db->query("delete from pemilik where IdPemilik = '$id'");
} else if ($h == 3) {
    $db->query("delete from sopir where IdSopir = '$id'");
} else {

}
?>
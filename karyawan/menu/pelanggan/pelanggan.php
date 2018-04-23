<h1 class="page-header">
    Data Pelanggan
</h1>
<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="?eks=1">Dashboard</a>
    </li>
    <li class="active">
        <i class="fa fa-fw fa-table"></i> Data Pelanggan
    </li>
</ol>
<div class="col-sm-9 col-lg-9">
    <a href="?eks=9"><i class="fa fa-plus"></i>Tambah Pelanggan</a>
	<table class="table table-bordered table-striped" data-effect="fade">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nama User</th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = $db->query("select * from pelanggan");
    $i=1;
    while ($array = $query->fetch()) {
    ?>
    	<tr>
    		<td><?php echo $i++; ?></td>
    		<td><?php echo $array['1']; ?></td>
    		<td><?php echo $array['2']; ?></td>
    		<td><?php echo $array['4']; ?></td>
    		<td><?php echo $array['5']; ?></td>
    	</tr>
    <?php } ?>
    </tbody>
</div>
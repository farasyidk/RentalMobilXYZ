<section id="inner-headline">
	<div class="container" style="padding: 0">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="?eks=1"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Pelanggan</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<h2>Daftar Pelanggan</h2>
<table border="1" cellpadding="0" cellspacing="0" class="pricing-box-alt">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            </tr>
    </thead>
    <tbody>
            <?php
            $query = $db->query("select * from pelanggan"); $no=1;
            while ($array = $query->fetch()) {
            ?>
    	<tr>
        	<td><?php echo $no++; ?></td>
            <td><?php echo $array['NmPelanggan']; ?></td>
            <td><?php echo $array['alamat']; ?></td>
            <td><?php echo $array['telepon']; ?></td>
        </tr>
            <?php } ?>
    </tbody>
</table>
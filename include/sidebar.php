<aside class="right-sidebar">
    <div class="widget">
		<form class="form-search" action="#" method="POST">
			<input name="cari" class="form-control" type="text" placeholder="Search..">
		</form>
		<?php
		if (isset($_POST['cari'])) {
			$nyari = $_POST['cari'];
			echo "<script>location='index.php?eks=1&cari=brio';</script>";
		}
		?>
	</div>
	<div class="widget">
		<h5 class="widgetheading">Categories</h5>
		<ul class="cat">
		<?php
		$query = $db->query("select * from merk");
		while ($array = $query->fetch()) {
		?>
            <li><i class="icon-angle-right"></i><a href="?eks=1&kat=<?php echo $array['NmMerk'];?>"><?php echo $array['NmMerk']; ?></a><span> (20)</span></li>
        <?php } ?>
        </ul>
	</div>
    <div class="widget">
		<h5 class="widgetheading">Mobil Sering Disewa</h5>
        <ul class="recent">
        <?php
        $queryS = $db->query("select type.NmType as nama, merk.NmMerk from kendaraan,type,merk where kendaraan.IdType = type.IdType and kendaraan.KdMerk = merk.KdMerk order by JmlSewa desc");
		while ($arrayS = $queryS->fetch()) {
		?>
            <li>
				<img src="img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="" />
				<h5><a href="?eks=1&type=<?php echo $arrayS['nama'];?>"><?php echo $arrayS['nama']; ?></a></h5>
				<p><?php echo $arrayS['1']; ?></p>
			</li>
		<?php } ?>
        </ul>
    </div>
</aside>
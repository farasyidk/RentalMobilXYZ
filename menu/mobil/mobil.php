<?php
@$hal = $_GET['hal'];
if (!isset($_GET['hal'])) {
    $page = 1;
    $hal=1;
} else {
    $page = $_GET['hal'];
}
$max_result = 6;
$from = (($page * $max_result) - $max_result);
?>
<section id="inner-headline">
    <div class="container" style="padding: 0">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="?eks=1"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                </ul>
            </div>
        </div>
    </div>
</section>
    <ul class="portfolio-categ filter">
        <li class="all active"><a href="#">All</a></li>
        <li class="Toyota"><a href="#" title="">Toyota</a></li>
        <li class="Daihatsu"><a href="#" title="">Daihatsu</a></li>
        <li class="Honda"><a href="#" title="">Honda</a></li>
    </ul>
    <div style="float: right"><a class="btn btn-info btn-flat" target="_blank" href="laporan/coba.php"><i class="glyphicon glyphicon-download-alt"></i> Cetak Data Mobil</a></div>

    <div class="clearfix">
    </div>

    	<section id="projects">
    	<ul id="thumbs" class="portfolio">
    		<!-- Item Project and Filter Name -->
            <?php
            $nyari = ""; $kate = ""; $typ = "";
            if (@$_GET['cari'] != "") {
                $cari = $_GET['cari'];
                $nyari = "and type.NmType like '%$cari%'";
            }
            if (@$_GET['kat'] != "") {
                $kat = $_GET['kat'];
                $kate = "and merk.NmMerk = '$kat'";
            }
            if (@$_GET['type'] != "") {
                $type = $_GET['type'];
                $typ = "and type.NmType = '$type'";
            }
            $query = $db->query("select kendaraan.NoPlat, merk.NmMerk as merk, type.NmType as nama, kendaraan.FotoMobil as foto, kendaraan.NoPlat as plat from kendaraan,type,merk where kendaraan.IdType = type.IdType and kendaraan.KdMerk = merk.KdMerk $nyari $kate $typ limit $from, $max_result");
            while ($dm = $query->fetch()) {
            $i=0; 
            ?>
    		<li class="item-thumbs col-lg-4 design" data-id="id-<?php echo $i++; ?>" data-type="<?php echo $dm['merk']; ?>">
                <h4><a href="?eks=9&plat=<?php echo $dm[0]; ?>"><?php echo substr($dm['nama'],0,15);?></a></h4>
                <div class="item-thumbs">
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo $dm['nama'];?>" href="img/product/<?php echo $dm['foto']; ?>">
                        <span class="overlay-img"></span>
                        <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                <!-- Thumb Image and Description -->
                    <img src="img/product/<?php echo $dm['foto']; ?>" alt="<a class='hover-wrap fancybox' href='?eks=9&plat=<?php echo $dm[0]; ?>'>Detail</a>">
                </div>
    		</li>
            <?php } ?>
    		<!-- End Item Project -->
    	</ul>
    	</section>
    

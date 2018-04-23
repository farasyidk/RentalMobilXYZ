<section id="inner-headline">
    <div class="container" style="padding: 0">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="?eks=1"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li class="active">Profil</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
$id = $_SESSION['id_usr'];
$queryT = $db->query("select * from pelanggan where IdPelanggan = '$id'");
$array = $queryT->fetch();
?>
<form action="menu/usr/sprofil.php" method="POST" class="form-search" onsubmit="return validasi(this)">
    <table cellpadding="0" cellspacing="0"  id="id-form">
            <tr>
              <th align="left">Nama Lengkap</th>
              <td><input class="form-control" type="text" value="<?php echo $array['NmPelanggan']; ?>" name="namaL" /></td>
            </tr>
             <tr>
              <th align="left">Nama User</th>
              <td><input class="form-control" type="text"  value="<?php echo $array['nama_user']; ?>"  name="namaUsr" />
              </td>
            </tr>
            <tr>
              <th align="left">Password</th>
              <td>
              <input class="select" type="checkbox" name="cek" id="cek" /><span> Check, jika ingin ganti password</span>
              <input type="hidden" name="passS" value="<?php echo $array['pass']; ?>">
              <div id="pass">
              <input class="form-control" type="password" id="test" name="passL" placeholder="Password Lama" />
              <input class="form-control" type="password" name="passB" placeholder="Password Baru" />
              </div>
              </td>
            </tr>
            <tr>
              <th align="left">Alamat</th>
              <td><input class="form-control" type="text"  value="<?php echo $array['alamat']; ?>"  name="alamat" /></td>
            </tr>
            <tr>
              <th align="left">No Telepon</th>
              <td><input class="form-control" type="text"   value="<?php echo $array['telepon']; ?>"  name="nomor" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Simpan" class="btn-danger" name="simpan"></td>
            </tr>
    </table>
</form>
<script src="js/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.select').click(function () {
        $("#pass").toggle();
    });    
});
</script>
<script type="text/javascript">
    function validasi(form) {
        if ($("#cek:checked").length == 1) {
            if (form.passL.value == "") {
                alert('Anda Belum Mengisikan Password Lama');
                form.passL.focus();
                return(false);
            }
            if (form.passB.value == "") {
                alert('Anda Belum Mengisikan Password Barus');
                form.passB.focus();
                return(false);
            }
        
        return(true);
        }
    }
</script>
<style type="text/css">
    #pass {
        display: none;
    }

</style>
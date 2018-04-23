<style type="text/css">
	* {
	padding:0;
	margin:0;
	box-sizing:border-box;
}
body {
	background-color: #222;
	font-family: 'Fira Sans',sans-serif;
	font-size: 14px;
	color: #545454;
}
.cont_log {
	background: #ccc;
	border-bottom-left-radius: 10px;
	border-bottom-right-radius: 10px;
	padding: 20px;
}
.lg {
	width: 260px;
	padding: 10px;
	border: 0;
}
.btn {
	width: 260px;
	padding: 10px;
	background: #339966;
	border: 0;
	color: #fff;
}
.btn:hover {
	cursor: pointer;
}
.menu_login {
	float: left;
	padding: 10px;
	margin: 10px;
	text-decoration: none;
	text-align: center;
}
.menu_login a {
	text-decoration: none;
	padding: 5px;
	font-size: 16px
}
.menu_login:hover {
	background: #6ff;
}
.header_log {
	width: 300px;
	border-top-right-radius: 10px;
	border-top-left-radius: 10px;
	background: #339966;
	color: #fff;
	font-size: 16px;
	padding: 15px;
	text-align: center;
	border-bottom: 3px solid #336666;
}
</style>
<section id="inner-headline">
	<div class="container" style="padding: 0">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="?eks=1"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Login</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<form method="POST" action="menu/login/proses_login.php" onsubmit="return validasi(this)">
<div style="width:300px; margin: 1% auto">
<?php if (@$_GET['well'] == 1) { ?>
    <h4>Selamat Anda telah menjadi member kami :)<br>Silahkan Login dengan akun yang baru saja dibuat.</h4>
<?php } ?>
	<div>
		<div class="header_log">Login User</div>
		<div class="cont_log">
			<div><input class="lg" autofocus="autofocus" type="text" name="nama" placeholder="Nama"></div>
			<div style="margin-top:10px"><input class="lg" type="password" name="pass" placeholder="Password"></div>
			<div style="margin-top:10px"><input type="submit" class="btn" value="Login" name="login"></div>
			<span>Belum punya akun? <a href="?eks=5">Daftar</a></span>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
	function validasi(form) {
		if (form.nama.value == "") {
		alert('Anda Belum Mengisikan Nama');
		form.nama.focus();
		return(false);
	}
	if (form.pass.value == "") {
		alert('Anda Belum Mengisikan Password');
		form.pass.focus();
		return(false);
	}
	return(true);
}
</script>
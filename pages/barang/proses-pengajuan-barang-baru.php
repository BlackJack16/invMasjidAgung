<section class="content-header">
    <h1>Input<small>Pengajuan Barang Barang</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pengajuan Barang</li>
    </ol>
</section>
<div class="register-box">
<?php	
	if ($_POST['save'] == "save") {

	$nama_barang =$_POST['nama_barang'];
	$jumlah	 	 =$_POST['jumlah'];
	$id_inventaris	 	 =$_POST['lokasi'];
	$keterangan	 =$_POST['keterangan'];
	$status		 ="Menunggu Konfirmasi";
	
	

	include "dist/koneksi.php";
	// $cekuser	=mysql_num_rows (mysql_query("SELECT id_barang FROM tb_barang WHERE id_barang='$_POST[id_barang]'"));
	
		if (empty($_POST['nama_barang']) || empty($_POST['jumlah']) ) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-barang' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}
		
	
		else{
		$insert = "INSERT INTO `tb_pengajuan_barang`( `nama_barang`, `jumlah`, `keterangan`, `status`, `id_inventaris`) VALUES ('$nama_barang', '$jumlah', '$keterangan', '$status', '$id_inventaris')";
		$query = mysql_query ($insert);
		$last_id = mysql_insert_id();
		
		if($query){


			echo "<div class='register-logo'><b>Input Data</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Input Data Berhasil.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-pegawai.php?page=pengajuan-barang-baru' class='btn btn-danger btn-block btn-flat'>Next >></button>
						</div>
					</div>
				</div>";
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
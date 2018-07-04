<?php
	if (isset($_GET['id_detail_inventaris'])) {
	$id_detail_inventaris = $_GET['id_detail_inventaris'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "dist/koneksi.php";
	$ambilData=mysql_query("SELECT tb_barang.nama_barang, tb_detail_inventaris.tgl_masapakai,tb_detail_inventaris.tgl_diterima, tb_detail_inventaris.id_detail_inventaris FROM tb_detail_inventaris inner join tb_barang on tb_barang.id_barang = tb_detail_inventaris.id_barang WHERE id_detail_inventaris ='$id_detail_inventaris'");
	$hasil=mysql_fetch_array($ambilData);
		$id_detail_inventaris = $hasil['id_detail_inventaris'];
?>
<section class="content-header">
    <!-- <h1>Form<small>Edit Masa pakai <b>#<?=$nip?></b></small></h1> -->
    <!-- <ol class="breadcrumb">
        <li><a href="home-pegawai.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Edit Masa Pakai</li>
    </ol> -->
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form action="home-pegawai.php?page=act-edit-masa-pakai&id_detail_inventaris=<?=$id_detail_inventaris?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label disabled class="col-sm-3 control-label">Nama</label>
							<div class="col-sm-7">
								<input type="text" disabled name="nama" class="form-control" value="<?=$hasil['nama_barang'];?>" maxlength="64">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tanggal Barang Diterima</label>

							<div class="input-group date form_date col-sm-3" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input disabled type="text" name="tgl_diterima" class="form-control" value="<?=$hasil['tgl_diterima'];?>"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Tanggal Masa Pakai</label>

							<div class="input-group date form_date col-sm-3" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input type="text" name="tgl_masapakai" class="form-control" value=""><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								<button type="submit" name="edit" value="edit" class="btn btn-danger">Simpan</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- datepicker -->
<script type="text/javascript" src="plugins/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugins/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugins/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
	 $('.form_date').datetimepicker({
			language:  'id',
			weekStart: 1,
			todayBtn:  1,
	  autoclose: 1,
	  todayHighlight: 1,
	  startView: 2,
	  minView: 2,
	  forceParse: 0
		});
</script>
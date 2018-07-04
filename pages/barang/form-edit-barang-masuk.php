<?php
	if (isset($_GET['id_barang'])) {
	$id_barang = $_GET['id_barang'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "dist/koneksi.php";
	$ambilData=mysql_query("SELECT * from tb_barang  WHERE id_barang ='$id_barang'");
	$hasil=mysql_fetch_array($ambilData);
		$id_barang = $hasil['id_barang'];
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
				<form action="home-admin.php?page=act-edit-barang-masuk&id_barang=<?=$id_barang?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="box-body">
								
					<div class="form-group">
											<label class="col-sm-3 control-label">Nama Barang</label>
											<div class="col-sm-7">
												<input type="text" name="nama_barang" value="<?=$hasil['nama_barang'];?>" class="form-control" maxlength="30">
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Merk/Type</label>
											<div class="col-sm-7">
												<input type="text" name="merk" class="form-control" value="<?=$hasil['merk'];?>">
											</div>
										</div>

                    <div class="form-group">
											<label class="col-sm-3 control-label">Jumlah</label>
											<div class="col-sm-3">
												<input type="number" name="jumlah" class="form-control" value="<?=$hasil['jumlah'];?>">
											</div>
                    </div>

                    <div class="form-group">
											<label class="col-sm-3 control-label">Bahan</label>
											<div class="col-sm-3">
												<input type="text" name="bahan_barang" class="form-control" value="<?=$hasil['bahan_barang'];?>">
											</div>
                    </div>

                    <div class="form-group">
											<label class="col-sm-3 control-label">Asal Barang</label>
											<div class="col-sm-3">
												<input type="text" name="asal_barang" class="form-control" value="<?=$hasil['asal_barang'];?>">
											</div>
                    </div>
                    
										<div class="form-group">
											<label class="col-sm-3 control-label">Tanggal Masuk</label>

											<div style="padding-left:15px" class="input-group date form_date col-sm-3" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
												<input type="text" name="tgl_masuk" class="form-control" value="<?=$hasil['tgl_masuk'];?>"><span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
                    </div>
                    
                    <div class="form-group">
											<label class="col-sm-3 control-label">Harga Barang</label>
											<div class="col-sm-3">
												<input type="number" name="harga_barang" class="form-control" value="<?=$hasil['harga_barang'];?>">
											</div>
                    </div>

                    <div class="form-group">
											<label class="col-sm-3 control-label">Kondisi Barang</label>
											<div class="col-sm-3">
												<input type="text" name="kondisi" class="form-control" value="<?=$hasil['kondisi'];?>">
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
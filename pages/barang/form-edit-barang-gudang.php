<?php
	if (isset($_GET['id_gudang'])) {
	$id_gudang = $_GET['id_gudang'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "dist/koneksi.php";
	$ambilData=mysql_query("SELECT * from tb_gudang  WHERE id_gudang ='$id_gudang'");
	$hasil=mysql_fetch_array($ambilData);
		$id_gudang = $hasil['id_gudang'];
		$id_barang = $hasil['id_barang'];
		
?>
<section class="content-header">

</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form action="home-admin.php?page=act-edit-barang-gudang&id_gudang=<?=$id_gudang?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="box-body">
						<?php 
							$data_barang= mysql_query("SELECT * FROM tb_barang where id_barang = '$id_barang' ");
							$barang=mysql_fetch_array($data_barang);
						?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Barang</label>
											<div class="col-sm-6">
												<input disabled type="text" name="id_barang" class="form-control" maxlength="30" value="<?=$barang['nama_barang'];?>">
											</div>
                    </div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Merk</label>
											<div class="col-sm-6">
												<input disabled type="text" name="id_barang" class="form-control" maxlength="30" value="<?=$barang['merk'];?>">
											</div>
                    </div>



                    <div class="form-group">
											<label class="col-sm-3 control-label">Jumlah</label>
											<div class="col-sm-2">
												<input type="number" name="jumlah" class="form-control" maxlength="30" value="<?=$hasil['jumlah'];?>">
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
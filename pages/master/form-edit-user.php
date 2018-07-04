<?php
	if (isset($_GET['id_user'])) {
	$id_user = $_GET['id_user'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "dist/koneksi.php";
	$ambilData=mysql_query("SELECT * from tb_user WHERE id_user ='$id_user'");
	$hasil=mysql_fetch_array($ambilData);
		$id_user = $hasil['id_user'];
?>
<section class="content-header">
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form action="home-admin.php?page=act-edit-user&id_user=<?=$id_user?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="box-body">
								
					<div class="form-group">
											<label class="col-sm-3 control-label">Username</label>
											<div class="col-sm-7">
												<input type="text" name="username" class="form-control" placeholder="Username" maxlength="64" value="<?=$hasil['username'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Lengkap</label>
											<div class="col-sm-7">
												<input type="text" name="nama_user" class="form-control" placeholder="Nama Lengkap" maxlength="64" value="<?=$hasil['nama_user'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Password</label>
											<div class="col-sm-7">
												<input type="text" name="password" class="form-control" placeholder="Password" maxlength="64" value="<?=$hasil['password'];?>">
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
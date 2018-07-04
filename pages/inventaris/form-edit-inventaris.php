<?php
	if (isset($_GET['id_inventaris'])) {
	$id_inventaris = $_GET['id_inventaris'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "dist/koneksi.php";
	$ambilData=mysql_query("SELECT * from tb_inventaris WHERE id_inventaris ='$id_inventaris'");
	$hasil=mysql_fetch_array($ambilData);
		$id_inventaris = $hasil['id_inventaris'];
		$id_user = $hasil['id_user'];
?>
<section class="content-header">

</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form action="home-admin.php?page=act-edit-inventaris&id_inventaris=<?=$id_inventaris?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="box-body">
					<div class="form-group">
											<label class="col-sm-3 control-label">Lokasi Inventaris</label>
											<div class="col-sm-7">
												<input type="text" name="lokasi" class="form-control" maxlength="60" value="<?=$hasil['lokasi'];?>">
											</div>
										</div>
   
                    <div class="form-group">
											<label class="col-sm-3 control-label">Penangung Jawab</label>
											<div class="col-sm-7">
												<select name="id_user" class="form-control" value="<?=$hasil['id_user'];?>">
													<?php 
													  $optUser=mysql_query("SELECT id_user, nama_user FROM tb_user ");
													
                          while ($row = mysql_fetch_array($optUser))
                          {
															echo "<option ";
															if ($row['id_user'] == $id_user){
																echo "selected ";
															}
															echo "value=".$row['id_user'].">".$row['nama_user']."</option>";
                          }
                          ?>     
												</select>
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
<section class="content-header">
    <h1>Master<small>Data Inventaris</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Data Inventaris</li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
	$tampilPeg=mysql_query("SELECT * FROM tb_inventaris inner join tb_user on tb_user.id_user = tb_inventaris.id_user");
  $optUser=mysql_query("SELECT id_user, nama_user FROM tb_user ")
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								 <h4 class="panel-title"><i class="fa fa-plus"></i> Tambah Data Inventaris<a data-toggle="collapse" data-target="#formpegawai" href="#formpegawai" class="collapsed"></a></h4>
							</div>
							<div id="formpegawai" class="panel-collapse collapse">
								<div class="panel-body">
									<form action="home-admin.php?page=proses-simpan-inventaris" class="form-horizontal" method="POST" enctype="multipart/form-data">
										
                    <div class="form-group">
											<label class="col-sm-3 control-label">Lokasi Inventaris</label>
											<div class="col-sm-7">
												<input type="text" name="lokasi" class="form-control" maxlength="60">
											</div>
										</div>
   
                    <div class="form-group">
											<label class="col-sm-3 control-label">Penangung Jawab</label>
											<div class="col-sm-7">
												<select name="png_jawab" class="form-control">
													<option value="">Pilih</option>
                          <?php 
                          while ($row = mysql_fetch_array($optUser))
                          {
                              echo "<option value=".$row['id_user'].">".$row['nama_user']."</option>";
                          }
                          ?>     
												</select>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-offset-3 col-sm-7">
												<button type="submit" name="save" value="save" class="btn btn-danger">Save</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Inventaris</th>
								<th>Penanggung Jawab</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($peg=mysql_fetch_array($tampilPeg)){
						?>	
							<tr>
								<td><?php echo $peg['lokasi'];?></td>
								<td><?php echo $peg['nama_user'];?></td>
								<td class="tools">
									<a href="home-admin.php?page=form-edit-inventaris&id_inventaris=<?=$peg['id_inventaris'];?>" title="edit"><i class="fa fa-edit"></i></a>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="home-admin.php?page=act-hapus-inventaris&id_inventaris=<?php echo $peg['id_inventaris'];?>" title="delete"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
        </div>
	</div>
</section>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
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
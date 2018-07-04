<?php
include "dist/koneksi.php"; 
?>     
<section class="content-header">
	<h1>Barang<small>Keluar</small></h1>
	<ol class="breadcrumb">
		<li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="active">Data Barang Keluar</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><i class="fa fa-plus"></i> Tambah Data Barang Keluar<a data-toggle="collapse" data-target="#formpegawai" href="#formpegawai" class="collapsed"></a></h4>
							</div>
							<div id="formpegawai" class="panel-collapse collapse">
								<div class="panel-body">
									<form action="home-admin.php?page=proses-barang-keluar" class="form-horizontal" method="POST" enctype="multipart/form-data">
										
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Barang</label>
											<div class="col-sm-7">
												<select onchange="val()" id="select_id" name="id_barang" class="form-control">
													<option value="">Pilih</option>
													<?php 
													$barang= mysql_query("SELECT tb_barang.id_barang, nama_barang, merk, tb_gudang.jumlah FROM tb_barang inner join tb_gudang on tb_barang.id_barang = tb_gudang.id_barang WHERE tb_gudang.jumlah > 0");
													while ($row = mysql_fetch_array($barang)) {
														echo "<option value=".$row['id_barang'].">".$row['nama_barang']." - ".$row['merk']." </option>";
													}
													
													?>   
												</select>
											</div>
										</div>
										
										<script>
											function val() {
												id_barang = document.getElementById("select_id").value;
												// var input = document.getElementById("jumlah");
												// input.setAttribute("max",d);
												$.ajax({
													type:"GET",
													url:"pages/barang/ambilstok.php",
													data:"id="+id_barang,
													success:function(html){
														$("#tampil").html(html);
													}
												});
											}
										</script>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">Jumlah</label>
											
											<div class="col-sm-2" >
												<div id="tampil">
												</div>
												<!-- <input id ="jumlah" type="number" name="jumlah" class="form-control" max="myVar"> -->
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label" >Tanggal Keluar</label>
											
											<div class="input-group date form_date col-sm-3" style="padding-left:15px" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
												<input type="text" name="tgl" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
										</div>
										
										
										<div class="form-group">
											<label class="col-sm-3 control-label">Lokasi</label>
											<div class="col-sm-7">
												<select name="lokasi" class="form-control">
													<option value="">Pilih</option>
													<?php 
													$barang= mysql_query("SELECT id_inventaris, lokasi FROM tb_inventaris ");
													while ($row = mysql_fetch_array($barang))
													{
														echo "<option value=".$row['id_inventaris'].">".$row['lokasi']."</option>";
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
								<th>Nama Barang</th>
								<th>Merk atau type</th>
								<th>Lokasi</th>
								<th>Jumlah</th>
								<th>Tangal Keluar</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php
							$tampil=mysql_query("SELECT tb_detail_inventaris.id_detail_inventaris, tb_barang.nama_barang, tb_barang.merk, tb_inventaris.lokasi, tb_detail_inventaris.jumlah, tgl_diterima FROM `tb_detail_inventaris` inner join tb_barang on tb_barang.id_barang = tb_detail_inventaris.id_barang inner join tb_inventaris on tb_inventaris.id_inventaris = tb_detail_inventaris.id_inventaris ");
							while($peg=mysql_fetch_array($tampil)){
								?>	
								<tr>
									<td><?php echo $peg['nama_barang'];?></td>
									<td><?php echo $peg['merk'];?></td>
									<td><?php echo $peg['lokasi'];?></td>
									<td><?php echo $peg['jumlah'];?></td>
									<td><?php echo $peg['tgl_diterima'];?></td>
									<td class="tools">
										&nbsp;&nbsp;&nbsp;&nbsp;
										<a href="home-admin.php?page=form-edit-barang-keluar&id_detail_inventaris=<?=$peg['id_detail_inventaris'];?>" title="edit"><i class="fa fa-edit"></i></a>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<a href="home-admin.php?page=act-hapus-barang-keluar&id_detail_inventaris=<?=$peg['id_detail_inventaris'];?>" title="delete"><i class="fa fa-trash-o"></i></a>
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
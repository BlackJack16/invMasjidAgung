<section class="content-header">
    <h1>Master<small>Data Barang</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Data Barang</li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								 <h4 class="panel-title"><i class="fa fa-plus"></i> Tambah Data Barang Masuk<a data-toggle="collapse" data-target="#formpegawai" href="#formpegawai" class="collapsed"></a></h4>
							</div>
							<div id="formpegawai" class="panel-collapse collapse">
								<div class="panel-body">
									<form action="home-admin.php?page=proses-simpan-barang" class="form-horizontal" method="POST" enctype="multipart/form-data">
										
                                    <div class="form-group">
											<label class="col-sm-3 control-label">Nama Barang</label>
											<div class="col-sm-7">
												<input type="text" name="nama" class="form-control" maxlength="30">
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Merk/Type</label>
											<div class="col-sm-7">
												<input type="text" name="merk" class="form-control">
											</div>
										</div>

                    <div class="form-group">
											<label class="col-sm-3 control-label">Jumlah</label>
											<div class="col-sm-3">
												<input type="number" name="jumlah" class="form-control">
											</div>
                    </div>

                    <div class="form-group">
											<label class="col-sm-3 control-label">Bahan</label>
											<div class="col-sm-3">
												<input type="text" name="bahan" class="form-control">
											</div>
                    </div>

                    <div class="form-group">
											<label class="col-sm-3 control-label">Asal Barang</label>
											<div class="col-sm-3">
												<input type="text" name="asal" class="form-control">
											</div>
                    </div>
                    
										<div class="form-group">
											<label class="col-sm-3 control-label">Tanggal Masuk</label>

											<div style="padding-left:15px" class="input-group date form_date col-sm-3" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
												<input type="text" name="tgl_masuk" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
                    </div>
                    
                    <div class="form-group">
											<label class="col-sm-3 control-label">Harga Barang</label>
											<div class="col-sm-3">
												<input type="number" name="harga" class="form-control">
											</div>
                    </div>

                    <!-- <div class="form-group">
											<label class="col-sm-3 control-label">Perubahan Mutasi Dari</label>
											<div class="col-sm-7">
												<select name="lokasi" class="form-control">
													<option value="">Pilih</option>
                          <?php 
                          $barang= mysql_query("SELECT id_inventaris, lokasi lokasi FROM tb_inventaris ");
                          while ($row = mysql_fetch_array($barang))
                          {
                              echo "<option value=".$row['id_inventaris'].">".$row['lokasi']."</option>";
                          }
                          ?>     
												</select>
											</div>
                    </div> -->

                    <div class="form-group">
											<label class="col-sm-3 control-label">Kondisi Barang</label>
											<div class="col-sm-3">
												<input type="text" name="kondisi" class="form-control">
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
                <th>Tanggal Masuk</th>
								<th>Nama Barang</th>
								<th>Merk atau type</th>
								<th>Jumlah</th>
								<th>Bahan</th>
                <th>Asal Barang</th>
                <th>Harga</th>
								<!-- <th>Mutasi dari</th> -->
								<th>Kondisi</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
            	$tampilBrg= mysql_query("SELECT * FROM tb_barang ");
							while($peg=mysql_fetch_array($tampilBrg)){
						?>	
							<tr>
              <td><?php echo $peg['tgl_masuk'];?></td>
								<td><?php echo $peg['nama_barang'];?></td>
								<td><?php echo $peg['merk'];?></td>
								<td><?php echo $peg['jumlah'];?></td>
                <td><?php echo $peg['bahan_barang'];?></td>
								<td><?php echo $peg['asal_barang'];?></td>

								<td><?php echo $peg['harga_barang'];?></td>
								<!-- <td><?php echo $peg['mutasi'];?></td> -->
								<td><?php echo $peg['kondisi'];?></td>
								<td class="tools">
									<a href="home-admin.php?page=form-edit-barang-masuk&id_barang=<?=$peg['id_barang'];?>" title="edit"><i class="fa fa-edit"></i></a>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="home-admin.php?page=act-hapus-barang&id_barang=<?php echo $peg['id_barang'];?>" title="delete"><i class="fa fa-trash-o"></i></a>
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
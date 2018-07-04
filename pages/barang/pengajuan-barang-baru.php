<?php
            include "dist/koneksi.php"; 
?>     
<section class="content-header">
    <h1>Inventaris<small>Pengajuan Barang Baru</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Pengajuan Barang Baru</li>
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
								 <h4 class="panel-title"><i class="fa fa-plus"></i> Tambah Data Pengajuan Barang Baru<a data-toggle="collapse" data-target="#formpegawai" href="#formpegawai" class="collapsed"></a></h4>
							</div>
							<div id="formpegawai" class="panel-collapse collapse">
								<div class="panel-body">
									<form action="home-pegawai.php?page=proses-pengajuan-barang-baru" class="form-horizontal" method="POST" enctype="multipart/form-data">
									  
									<div class="form-group">
											<label class="col-sm-3 control-label">Nama Barang</label>
											<div class="col-sm-2">
												<input type="text" name="nama_barang" class="form-control" maxlength="30">
											</div>
                    </div>
                  
                                        									
                    <div class="form-group">
											<label class="col-sm-3 control-label">Jumlah</label>
											<div class="col-sm-2">
												<input type="number" name="jumlah" class="form-control" maxlength="30">
											</div>
                    </div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Lokasi</label>
											<div class="col-sm-7">
												<select name="lokasi" class="form-control">
													<option value="">Pilih</option>
                          <?php 
                          $barang= mysql_query("SELECT id_inventaris, lokasi FROM tb_inventaris  where id_user = '$_SESSION[id_user]' ");
                          while ($row = mysql_fetch_array($barang))
                          {
                              echo "<option value=".$row['id_inventaris'].">".$row['lokasi']."</option>";
                          }
                          ?>     
												</select>
											</div>
                    </div>
		
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Keterangan</label>
                    <div class="col-sm-7">
                      <textarea type="text" name="keterangan" class="form-control" maxlength="512"></textarea>
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
								<th>Jumlah</th>
                <th>Lokasi</th>																
                <th>Keterangan</th>
								<th>Status</th>                
								<!-- <th>Action</th> -->
							</tr>
						</thead>
						<tbody>

            <?php
            $tampil=mysql_query("SELECT * from tb_pengajuan_barang inner join tb_inventaris on tb_inventaris.id_inventaris = tb_pengajuan_barang.id_inventaris where tb_inventaris.id_user = '$_SESSION[id_user]'" );
							while($peg=mysql_fetch_array($tampil)){
						?>	
							<tr>
								<td><?php echo $peg['nama_barang'];?></td>
								<td><?php echo $peg['jumlah'];?></td>
                <td><?php echo $peg['lokasi'];?></td>
                <td><?php echo $peg['keterangan'];?></td>
								<td><?php echo $peg['status'];?></td>
								<!-- <td class="tools"><a href="home-admin.php?page=form-lihat-data-pegawai&nip=<?=$peg['nip'];?>" title="view"><i class="fa fa-folder-open"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="home-admin.php?page=form-edit-data-pegawai&nip=<?=$peg['nip'];?>" title="edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="home-admin.php?page=delete-data-pegawai&nip=<?php echo $peg['nip'];?>" title="delete"><i class="fa fa-trash-o"></i></a></td> -->
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
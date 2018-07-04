<?php
	if (isset($_GET['id_detail_inventaris'])) {
	$id_detail_inventaris = $_GET['id_detail_inventaris'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "dist/koneksi.php";
	$ambilData=mysql_query("SELECT tb_detail_inventaris.id_inventaris, tb_detail_inventaris.id_barang, tb_detail_inventaris.id_detail_inventaris, tb_barang.nama_barang, tb_barang.merk, tb_inventaris.lokasi, tb_detail_inventaris.jumlah, tgl_diterima FROM `tb_detail_inventaris` inner join tb_barang on tb_barang.id_barang = tb_detail_inventaris.id_barang inner join tb_inventaris on tb_inventaris.id_inventaris = tb_detail_inventaris.id_inventaris where tb_detail_inventaris.id_detail_inventaris = '$id_detail_inventaris'");
	$hasil=mysql_fetch_array($ambilData);
		$id_detail_inventaris = $hasil['id_detail_inventaris'];
		$id_barang = $hasil['id_barang'];
		$id_inventaris = $hasil['id_inventaris'];
?>
<section class="content-header">

</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form action="home-admin.php?page=act-edit-barang-keluar&id_detail_inventaris=<?=$id_detail_inventaris?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="box-body">
								
					<div class="form-group">
											<label class="col-sm-3 control-label">Nama Barang</label>
											<div class="col-sm-7">
												<select name="id_barang" class="form-control">
													<option value="">Pilih</option>
                          <?php 
                          $barang= mysql_query("SELECT id_barang, nama_barang, merk FROM tb_barang ");
													while ($row = mysql_fetch_array($barang))
													{
													echo "<option ";
													if ($row['id_barang'] == $id_barang){
														echo "selected ";
													}
                              echo "value=".$row['id_barang'].">".$row['nama_barang']." - ".$row['merk']." </option>";
                          }
                          ?>     
												</select>
											</div>
										</div>
                    
                    <div class="form-group">
											<label class="col-sm-3 control-label">Lokasi</label>
											<div class="col-sm-7">
												<select name="id_inventaris" class="form-control">
													<option value="<?=$hasil['lokasi'];?>">Pilih</option>
                          <?php 
                          $barang= mysql_query("SELECT id_inventaris, lokasi lokasi FROM tb_inventaris ");
                          while ($row = mysql_fetch_array($barang))
                          {
														echo "<option ";
													if ($row['id_inventaris'] == $id_inventaris){
														echo "selected ";
													}
                              echo "value=".$row['id_inventaris'].">".$row['lokasi']."</option>";
                          }
                          ?>     
												</select>
											</div>
                    </div>
                                        									
                    <div class="form-group">
											<label class="col-sm-3 control-label">Jumlah</label>
											<div class="col-sm-2">
												<input type="number" name="jumlah" class="form-control" maxlength="30" value="<?=$hasil['jumlah'];?>">
											</div>
                    </div>
		
										<div class="form-group">
											<label class="col-sm-3 control-label" >Tanggal Keluar</label>

											<div class="input-group date form_date col-sm-3" style="padding-left:15px" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
												<input type="text" name="tgl_diterima" class="form-control" value="<?=$hasil['tgl_diterima'];?>"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
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
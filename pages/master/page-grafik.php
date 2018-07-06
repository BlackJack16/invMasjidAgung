<?php include 'dist/koneksi.php'; ?>
<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-th"></i>Grafik</a></li>
    </ol>
</section>

<section class="content">
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Grafik Inventaris Masjid Agung Palembang Tahun 2018</h3>
    </div>
    <div class="box-body chart-responsive">
      <div class="chart" id="bar-chart" style="height: 300px;"></div>
    </div>
    <!-- /.box-body -->
  </div>
  <script type="text/javascript">
    $(function (){
       var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {m: 'Jan', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=01 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>},
        {m: 'Feb', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=02 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>},
        {m: 'Mar', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=03 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>},
        {m: 'Apr', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=04 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>},
        {m: 'Mei', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=05 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>},
        {m: 'Jun', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=06 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>},
        {m: 'Jul', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=07 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>},
        {m: 'Agu', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=08 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>},
        {m: 'Sep', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=09 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>},
        {m: 'Okt', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=10 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>},
        {m: 'Nov', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=11 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>},
        {m: 'Des', a: <?php $query1=mysql_query('SELECT count(tgl_diterima) as jumlah from tb_detail_inventaris where month(tgl_diterima)=12 and year(tgl_diterima)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                } ?>}
      ],
      barColors: ['#00a65a'],
      xkey: 'm',
      ykeys: ['a'],
      labels: ['Jumlah Inventaris'],
      hideHover: 'auto'
    })
    })  
   
</script>
  </script>
</section>
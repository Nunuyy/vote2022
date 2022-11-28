      <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/adminlte/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/adminlte/dist/css/skins/_all-skins.min.css">
  <!-- ----------------------------------------------------- -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>-</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-pie-chart"></i> Dashboard</a></li>
        <li class="active">-</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
      <?php  
        $all_dpt = $dpt_s->jum_dpt_s + $dpt_g->jum_dpt_g + $dpt_t->jum_dpt_t; 
        $all_aktif = $dpt_s->jum_aktif_s + $dpt_g->jum_aktif_g + $dpt_t->jum_aktif_t; 
        $all_not = $all_dpt-$all_aktif; 
        ?>
      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $all_dpt; ?></h3>

              <p>Daftar Pemilih Tetap</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a  class="small-box-footer text-left">
              <?php echo $dpt_s->jum_dpt_s." (Siswa) ".$dpt_g->jum_dpt_g." (Guru) ".$dpt_t->jum_dpt_t." (Tendik) " ?> 
            </a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $all_aktif; ?></h3>

              <p>Jumlah Suara Digunakan</p>
            </div>
            <div class="icon">
              <i class="fa fa-check"></i>
            </div>
            <a  class="small-box-footer text-left">
              <?php echo $dpt_s->jum_aktif_s." (Siswa) ".$dpt_g->jum_aktif_g." (Guru) ".$dpt_t->jum_aktif_t." (Tendik) " ?> 
            </a>
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $all_not; ?></h3>

              <p>Jumlah Suara Belum Digunakan</p>
            </div>
            <div class="icon">
              <i class="fa fa-check"></i>
            </div>
            <a  class="small-box-footer text-left">
              <?php $siswanot = $dpt_s->jum_dpt_s-$dpt_s->jum_aktif_s;
                    $gurunot = $dpt_g->jum_dpt_g-$dpt_g->jum_aktif_g;
                    $tendiknot = $dpt_t->jum_dpt_t-$dpt_t->jum_aktif_t;
                echo $siswanot." (Siswa) ".$gurunot." (Guru) ".$tendiknot." (Tendik) " ?> 
            </a>
          </div>
          <!-- /.info-box -->
        </div>          
        <!-- /.col -->
      </div>


      <div class="row hide">
        <div class="col-xs-12 col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Perolehan Ketua MPK</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <!-- <th>#</th> -->
                        <th>ID</th>
                        <th>Nama Kandidat</th>
                        <th>Perolehan Suara</th>
                    </tr>
                </thead>
                <tbody>
                <?php $totalM=0; $no=1; foreach ($mpk_s as $row) { ?>
                        <tr>
                            <!-- <td><?php echo $no;?></td> -->
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['nama'];?></td>
                            <td><?php //echo "S:".$row['jumlah_suara_mpk_s'];?>
                              
                                <?php foreach ($mpk_g as $rowg): ?>
                                      <?php if ($row['id'] == $rowg['id'] && $row['nama'] == $rowg['nama']): ?>
                                        <?php //echo "G:".$rowg['jumlah_suara_mpk_g'];?>
                                        <?php $jumsg=$row['jumlah_suara_mpk_s']+$rowg['jumlah_suara_mpk_g']; //echo "  JUM:".$jumsg; ?>

                                        <?php foreach ($mpk_t as $rowt): ?>
                                              <?php if ($row['id'] == $rowg['id'] && $row['nama'] == $rowg['nama'] && $row['id'] == $rowt['id'] && $row['nama'] == $rowt['nama']): ?>
                                                    <?php //echo "T:".$rowt['jumlah_suara_mpk_t'];?>
                                                    <?php $jumsgt=$row['jumlah_suara_mpk_s']+$rowg['jumlah_suara_mpk_g']+$rowt['jumlah_suara_mpk_t']; echo $jumsgt; 
                                                    $totalM = $totalM+$jumsgt; ?>
                                              <?php else: ?>
                                              <?php endif ?>
                                        <?php endforeach ?> 
                                      <?php else: ?>
                                      <?php endif ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                <?php $no++; } ?>
                    <!-- <tr>
                        <td>Total Suara : </td>
                        <td><?php echo $totalM; ?></td>
                    </tr> -->
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-xs-12 col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Perolehan Ketua OSIS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <!-- <th>#</th> -->
                        <th>ID</th>
                        <th>Nama Kandidat</th>
                        <th>Perolehan Suara</th>
                    </tr>
                </thead>
                <tbody>
                <?php $totalO=0; $no=1; foreach ($osis_s as $row) { ?>
                        <tr>
                            <!-- <td><?php echo $no;?></td> -->
                            <td><?php echo $row['id']-7;?></td>
                            <td><?php echo $row['nama'];?></td>
                            <td><?php // echo "S:".$row['jumlah_suara_osis_s'];?>
                              
                              
                                <?php foreach ($osis_g as $rowg): ?>
                                      <?php if ($row['id'] == $rowg['id'] && $row['nama'] == $rowg['nama']): ?>
                                        <?php // echo "G:".$rowg['jumlah_suara_osis_g'];?>
                                        <?php $jumsg=$row['jumlah_suara_osis_s']+$rowg['jumlah_suara_osis_g']; //echo "  JUM:".$jumsg; ?>

                                        <?php foreach ($osis_t as $rowt): ?>
                                              <?php if ($row['id'] == $rowg['id'] && $row['nama'] == $rowg['nama'] && $row['id'] == $rowt['id'] && $row['nama'] == $rowt['nama']): ?>
                                                    <?php // echo "T:".$rowt['jumlah_suara_osis_t'];?>
                                                    <?php $jumsgt=$row['jumlah_suara_osis_s']+$rowg['jumlah_suara_osis_g']+$rowt['jumlah_suara_osis_t']; echo $jumsgt;  
                                                    $totalO = $totalO+$jumsgt;?>
                                              <?php else: ?>
                                              <?php endif ?>
                                        <?php endforeach ?> 
                                      <?php else: ?>
                                      <?php endif ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                <?php $no++; } ?>
                    <!-- <tr>
                        <td>Total Suara : </td>
                        <td><?php echo $totalO; ?></td>
                    </tr> -->
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>



      <div class="hide row">
        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Browser Usage</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                    <li><i class="fa fa-circle-o text-green"></i> IE</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                    <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">United States of America
                  <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                </li>
                <li><a href="#">China
                  <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>
          
        </div>
        
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- ------------------------------ -->
  
<script src="<?php echo base_url();?>resources/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Sparkline -->
<script src="<?php echo base_url();?>resources/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url();?>resources/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>resources/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>resources/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>resources/adminlte/bower_components/chart.js/Chart.js"></script>


<!-- jQuery 3 -->
<script src="<?php echo base_url();?>resources/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>resources/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>resources/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>resources/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>resources/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>resources/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>resources/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>resources/adminlte/dist/js/demo.js"></script>
<!-- page script -->

<script>
  $(function () {
    $('#example1').DataTable()

    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
     // 'autoWidth'   : true,
      'responsive'  : true,
      "columns": [
        /*{ "width": "5%" },*/
        { "width": "5%" },
        { "width": "60%" },
        { "width": "30%" },
      ]
    })

    
    $('#example3').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
     // 'autoWidth'   : true,
      'responsive'  : true,
      "columns": [
        /*{ "width": "5%" },*/
        { "width": "5%" },
        { "width": "60%" },
        { "width": "30%" },
      ]
    })
  })
</script>
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perolehan Suara
        <small>-</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Perolehan Suara</a></li>
        <li class="active">-</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">      
        <!-- ./col -->
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-user"></i>

              <h3 class="box-title">Ketua MPK</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">

                  <?php $x=1; foreach ($mpk_s as $row):
                    $nama = $row['nama'];                          
                    if ($row['org'] == 'mpk') {
                    ?>                   

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-aqua"><?php echo $row['id'] ?></span>

                      <div class="info-box-content">
                        <span class="info-box-text"><?=$row['nama']?></span>
                        <span class="info-box-number">
                            <?php // echo $row['jumlah_suara_mpk_s']?>
                          <?php foreach ($mpk_g as $rowg): ?>
                                <?php if ($row['id'] == $rowg['id'] && $row['nama'] == $rowg['nama']): ?>
                                  <?php //echo "G:".$rowg['jumlah_suara_mpk_g'];?>
                                  <?php $jumsg=$row['jumlah_suara_mpk_s']+$rowg['jumlah_suara_mpk_g']; //echo "  JUM:".$jumsg; ?>

                                  <?php foreach ($mpk_t as $rowt): ?>
                                        <?php if ($row['id'] == $rowg['id'] && $row['nama'] == $rowg['nama'] && $row['id'] == $rowt['id'] && $row['nama'] == $rowt['nama']): ?>
                                              <?php //echo "T:".$rowt['jumlah_suara_mpk_t'];?>
                                              <?php $jumsgt=$row['jumlah_suara_mpk_s']+$rowg['jumlah_suara_mpk_g']+$rowt['jumlah_suara_mpk_t']; echo $jumsgt; ?>
                                        <?php else: ?>
                                        <?php endif ?>
                                  <?php endforeach ?> 
                                <?php else: ?>
                                <?php endif ?>
                          <?php endforeach ?>

                        </span>

                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <?php 
                        }
                    else {
                      /*code...*/
                    } ?>

                    <?php $x++; endforeach ?>
                </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <div class="row">      
        <!-- ./col -->
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-user"></i>

              <h3 class="box-title">Ketua OSIS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">

                  <?php foreach ($osis_s as $row):
                    $nama = $row['nama'];                          
                    if ($row['org'] == 'osis') {
                    ?>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-green"><?php echo $row['id']-7 ?></span>

                      <div class="info-box-content">
                        <span class="info-box-text"><?=$row['nama']?></span>
                        <span class="info-box-number">
                            <?php //echo "S:".$row['jumlah_suara_osis_s']?>
                            
                          

                          <?php foreach ($osis_g as $rowg): ?>
                                <?php if ($row['id'] == $rowg['id'] && $row['nama'] == $rowg['nama']): ?>
                                  <?php //echo "G:".$rowg['jumlah_suara_osis_g'];?>
                                  <?php $jumsg=$row['jumlah_suara_osis_s']+$rowg['jumlah_suara_osis_g']; //echo "  JUM:".$jumsg; ?>

                                  <?php foreach ($osis_t as $rowt): ?>
                                        <?php if ($row['id'] == $rowg['id'] && $row['nama'] == $rowg['nama'] && $row['id'] == $rowt['id'] && $row['nama'] == $rowt['nama']): ?>
                                              <?php //echo "T:".$rowt['jumlah_suara_osis_t'];?>
                                              <?php $jumsgt=$row['jumlah_suara_osis_s']+$rowg['jumlah_suara_osis_g']+$rowt['jumlah_suara_osis_t']; echo $jumsgt; ?>
                                        <?php else: ?>
                                        <?php endif ?>
                                  <?php endforeach ?> 
                                <?php else: ?>
                                <?php endif ?>
                          <?php endforeach ?>


                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <?php 
                        }
                    else {
                      /*code...*/
                    } ?>

                    <?php endforeach ?>
                </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>


      <div class="row">
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
                <?php $no=1; foreach ($mpk_s as $row) { ?>
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
                                                    <?php $jumsgt=$row['jumlah_suara_mpk_s']+$rowg['jumlah_suara_mpk_g']+$rowt['jumlah_suara_mpk_t']; echo $jumsgt; ?>
                                              <?php else: ?>
                                              <?php endif ?>
                                        <?php endforeach ?> 
                                      <?php else: ?>
                                      <?php endif ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                <?php $no++; } ?>
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
                <?php $no=1; foreach ($osis_s as $row) { ?>
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
                                                    <?php $jumsgt=$row['jumlah_suara_osis_s']+$rowg['jumlah_suara_osis_g']+$rowt['jumlah_suara_osis_t']; echo $jumsgt; ?>
                                              <?php else: ?>
                                              <?php endif ?>
                                        <?php endforeach ?> 
                                      <?php else: ?>
                                      <?php endif ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                <?php $no++; } ?>
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <div class="row hide">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Ketua MPK</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                  <div class="row">
                      <?php foreach ($kandidat as $row):

                            $nama = $row['nama'];                          
                              if ($row['org'] == 'mpk') {
                        ?>
                    <div class="col-md-3">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                          <h3 class="widget-user-username"><?=$row['nama']?></h3>
                          <h5 class="widget-user-desc">Calon Ketua <?=$row['org']?>, No Urut <?php echo $row['id'] ?></h5>
                        </div>
                        <div class="widget-user-image">
                          <img class="img-circle" src="<?php echo base_url()."resources/img/kandidat_/"; ?><?=$row['foto']?>" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-4 border-right">
                              <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">SALES</span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                              <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">FOLLOWERS</span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                              <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">PRODUCTS</span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>
                            <?php 
                                  }
                              else {
                                /*code...*/
                              } ?>

                      <?php endforeach ?>
                  </div>
                  <br>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="row hide">      
        <!-- ./col -->
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Ketua OSIS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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
      'paging'      : true,
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
      'paging'      : true,
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
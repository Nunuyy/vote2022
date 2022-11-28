  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --> 
    <section class="content-header">
      <h1>
        Master Data Guru
        <small>Guru yang terdaftar sebagai pemilih</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li class="active">Guru</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pemilih</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Login Time</th>
                        <th>Vote MPK</th>
                        <!-- <th>Pilihan MPK</th> -->
                        <th>Vote MPK Time</th>
                        <th>Vote OSIS</th>
                        <!-- <th>Pilihan OSIS</th> -->
                        <th>Vote OSIS Time</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($guru as $row) { ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['nama'];?></td>
                            <td><?php echo $row['password'];?></td>
                            <td><?php echo $row['status'];?></td>
                            <td><?php echo $row['login_time'];?></td>
                            <td><?php 
                            echo ($row['status_vote_mpk']=='1') ? "<span class='label label-success'>".$row['vote_mpk']."</span>" : "<span class='label label-danger'>".$row['vote_mpk']."</span>" ;
                            //echo "<span class='label label-success'>".$row['status_vote_mpk']."</span>";?></td>
                            <!-- <td><?php echo $row['vote_mpk'];?></td> -->
                            <td><?php echo $row['vote_mpk_time'];?></td>
                            <td><?php 
                            echo ($row['status_vote_osis']=='1') ? "<span class='label label-success'>".$row['vote_osis']."</span>" : "<span class='label label-danger'>".$row['vote_osis']."</span>" ;
                            //echo "<span class='label label-success'>".$row['status_vote_osis']."</span>";?></td>
                            <!-- <td><?php echo $row['vote_osis'];?></td> -->
                            <td><?php echo $row['vote_osis_time'];?></td>
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
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
     // 'autoWidth'   : true,
      'responsive'  : true,
      "columns": [
        { "width": "5%" },
        { "width": "10%" },
        { "width": "20%" },
        null,
        null,
        null,
        null,
        null,
        null,
        null
      ]
    })
  })
</script>
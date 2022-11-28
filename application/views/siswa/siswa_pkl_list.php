<section style="margin-top: 120px;">
    <div class="container">

        <div class="row justify-content-md-center">
            <div class="col-lg-12">


                <div class="row" style="margin-bottom: 0px;">
                    <div class="col-lg-6">
                        <h4 style="margin-bottom: 0px; color: #1a374a;"> Data Daftar PKL</h4>
                    </div>
                    <div class="col-lg-6">
                        <?php 
                            if ($_SESSION['status'] == 1) {
                                ?>
                                <a href="<?=base_url("/user/User/daftar_pkl")?>" style="margin-bottom: 10px;" class="pull-right "><button class="btn btn-primary">Daftar</button></a>
                                <?php
                            }else{

                            }

                        ?>
                    </div>
                </div>
                <hr style="margin-top: 0px;"><br>

                <div class="row">
                    <div class="col-lg-12">
                        <table class="datatablesGeneral table table-responsive-sm table-bordered" cellspacing="0" width="100%">
                            <thead id="bg-dark">
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">NIS</th>
                              <th scope="col">Nama Siswa</th>
                              <th scope="col">Nama Instansi</th>
                              <th scope="col">Pesan</th>
                              <th scope="col">Tanggal</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-hover">
                                <?php $no=1; foreach ($pkl as $row): ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?=$row['nis']?></td>
                                    <td><?=$row['nama_siswa']?></td>
                                    <td><?=$row['nama_instansi']?></td>
                                    <td><?=$row['pesan']?></td>
                                    <td><?=$row['tanggal']?></td>
                                    <td><?=$row['status']?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn" style="cursor: pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">

                                                <?php

                                                if ($_SESSION['status'] == 0) {
                                                    ?>
                                                    <a class="dropdown-item" href="<?=base_url('siswa/SiswaListPkl/edit_data/'.$row['id_pkl'])?>">Manage</a>
                                                    <?php
                                                  }elseif ($_SESSION['status'] == 1) {
                                                  }

                                                ?>
                                                <a onclick="if(!confirm('Are you sure to delete this ID PKL: <?=$row['id_pkl']?> ?')){ return false; }" class="dropdown-item" href="<?=base_url('siswa/SiswaListPkl/do_delete/'.$row['id_pkl'])?>">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php $no++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
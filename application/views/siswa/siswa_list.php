<section style="margin-top: 120px;">
    <div class="container">

        <div class="row justify-content-md-center">
            <div class="col-lg-12">


                <div class="row" style="margin-bottom: 0px;">
                    <div class="col-lg-6">
                        <h4 style="margin-bottom: 0px; color: #1a374a;">Daftar Seluruh Siswa</h4>
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
                              <th scope="col">Kelas</th>
                              <th scope="col">Alamat</th>
                              <th scope="col">No HP</th>
                              <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-hover">
                                <?php $no=1; foreach ($siswa as $row): ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?=$row['nis']?></td>
                                    <td><?=$row['nama_siswa']?></td>
                                    <td><?=$row['kelas']?></td>
                                    <td><?=$row['alamat']?></td>
                                    <td><?=$row['no_hp']?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn" style="cursor: pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?=base_url('siswa/SiswaList/edit_data/'.$row['id_siswa'])?>">Manage</a>
                                                <a onclick="if(!confirm('Are you sure to delete this ID SISWA: <?=$row['id_siswa']?> ?')){ return false; }" class="dropdown-item" href="<?=base_url('siswa/SiswaList/do_delete/'.$row['id_siswa'])?>">Delete</a>
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
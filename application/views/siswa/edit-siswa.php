<section style="margin-top: 120px;">
<body>
	<form method="post" action="<?php echo base_url()."index.php/siswa/Siswalist/do_update"; ?>">
    <div class="container">
            <br><br>
                <br>
                <div class="row justify-content-center">
                    <div class="col-8 col-md-5 col-lg-4 form-control bg-light" style="position:relative;
                             margin-left:auto;
                             margin-right:auto;
                             margin-top:auto;
                             margin-bottom:auto;
                             left:0;
                             right:0;
                             top:0;
                             bottom:0;">
                        	<div class="row justify-content-md-center">
                                <div class="col-auto"><h2>Edit Siswa</h2></div>
                        	</div> <br>
                            <div class="row">
                                <div class="col"><input type="text" name="id_siswa" class="form-control" value="<?php echo $id_siswa;?>" hidden></div>
                            </div> <br>
                            <div class="row">
                                <div class="col-auto"><p>NIS</p></div>
                        	</div>
                            <div class="row">
                                <div class="col"><input type="text" name="nis" class="form-control" value="<?php echo $nis;?>" readonly></div>
                        	</div> <br>
                            <div class="row">
                                <div class="col-auto"><p>Nama Siswa</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><input type="text" name="nama_siswa" class="form-control" value="<?php echo $nama_siswa;?>"></div>
                            </div> <br>
                            <div class="row">
                                <div class="col-auto"><p>No HP</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><input type="text" name="no_hp" class="form-control" value="<?php echo $no_hp;?>"></div>
                            </div> <br>
                            <div class="row">
                                <div class="col-auto"><p>Email</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><input type="text" name="email" class="form-control" value="<?php echo $email;?>"></div>
                            </div> <br>
                            <div class="row">
                                <div class="col-auto"><p>Alamat</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><input type="text" name="alamat" class="form-control" value="<?php echo $alamat;?>"></div>
                            </div> <br>
                            <div class="row">
                                <div class="col-auto"><p>Kelas</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><input type="text" name="kelas" class="form-control" value="<?php echo $kelas;?>"></div>
                            </div> <br>
                            <div class="row">
                                <div class="col-auto"><button type="submit" class="btn btn-primary">Submit</button></div>
                        	</div>
                    </div>
                </div>
    </div>
    </form>
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="garis2"></div>
            </div>
        </div>
    </div>
</body>
</section>
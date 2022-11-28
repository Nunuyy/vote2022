<section style="margin-top: 120px;">
<body>
	<form method="post" action="<?php echo base_url()."index.php/siswa/SiswalistPkl/do_update"; ?>">
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
                                <div class="col-auto"><h2>Edit Daftar PKL</h2></div>
                        	</div> <br>
                            <div class="row">
                                <div class="col"><input type="text" name="id_pkl" class="form-control" value="<?php echo $id_pkl;?>" hidden></div>
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
                                <div class="col"><input type="text" name="nama_siswa" class="form-control" value="<?php echo $nama_siswa;?>" readonly></div>
                            </div> <br>
                            <div class="row">
                                <div class="col-auto"><p>Nama Instansi</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><input type="text" name="nama_instansi" class="form-control" value="<?php echo $nama_instansi;?>"></div>
                            </div> <br>
                            <div class="row">
                                <div class="col-auto"><p>Tanggal</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><input type="date" name="tanggal" class="form-control" value="<?php echo $tanggal;?>"></div>
                            </div> <br>
                            <div class="row">
                                <div class="col-auto"><p>Status</p></div>
                            </div>
                            <div class="row">
                                <div class="col"><input type="radio" name="status" value="pending" <?php if($status=='pending'){echo 'checked';} ?> > pending <input type="radio" name="status" value="diterima" <?php if($status=='diterima'){echo 'checked';} ?>> diterima <input type="radio" name="status" value="ditolak" <?php if($status=='ditolak'){echo 'checked';} ?>> ditolak</div>
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
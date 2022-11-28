<section style="margin-top: 120px;">
<body>
    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
	<form method="post" action="<?=base_url("index.php/user/User/do_daftar")?>">
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
                                <div class="col-auto"><h2>Daftar PKL</h2></div>
                        	</div> <br>
                            <div class="row">
                                <div class="col-auto"><p>Nama Instansi</p></div>
                        	</div>
                            <div class="row">
                                <div class="col">
                                    <select name="id_dudi" class="select2 form-control">
                                        <?php foreach ($dudi as $row) { ?>
                                            <option value="<?=$row['id_dudi']?>"><?=$row['nama']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        	</div> <br>
                            <div class="row">
                                <div class="col-auto"><p>Pesan</p></div>
                            </div>
                            <div class="row">
                                <div class="col"> <div class="form-group">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pesan"></textarea>
                                                  </div>
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col"><input type="text" name="status" class="form-control" value="pending" hidden></div>
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
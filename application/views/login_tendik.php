<body style="background-color: #083c5f;">
<form action="<?=base_url('index.php/Login/ceklogin_tendik')?>" method="post">
    <div class="container">
      <div class="row justify-content-center">
            <div class="notifications" style="position: absolute;z-index: 2;"><?php echo $this->session->flashdata('msg'); ?></div>
        </div>
      <div class="row justify-content-center">
          <div class="col-auto"><br><h1 class="text-light">Selamat Datang di Aplikasi Vote Ketua OSIS dan MPK</h1></div>
        </div>
        <div class="row justify-content-center">
          <div class="col-auto"><h1 class="text-light">SMK Negeri 2 Sumedang</h1></div>
        </div>
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
                                <div class="col-auto text-center"><h5>LOGIN <br> TENAGA KEPENDIDIKAN</h5></div>
                          </div> <br>
                            <div class="row">
                                <div class="col-auto"><p>ID</p></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <select name="id" class="select2 form-control" style="width: 100%;">
                                          <option value=""disabled selected> Ketik ID atau Nama</a></option>
                                      <?php foreach ($tendik as $row) { ?>
                                          <option value="<?=$row['id']?>"><?=$row['id']?> - <?=$row['nama']?></a></option>
                                      <?php } ?>
                                  </select>
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-auto"><p>Password </p></div>
                          </div>
                            <div class="row">
                                <div class="col"><input type="password" name="password" class="form-control"></div>
                          </div> <br>
                            <div class="row">
                                <div class="col-auto"><button type="submit" class="btn btn-primary">Submit</button></div>
                          </div>
                    </div>
                </div>
    </div>
    </div>
</form>
</body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">

<body style="background-color:  #152f38;">
    <style type="text/css">
.buttonlog {
  transition-duration: 0.4s;
  color: #232323;
  border-radius: 30px;
  width: 200px;
  margin: auto;
  background-color: white;
  margin-bottom: 10px;
}

.buttonlog:hover {
  background-color: #ffc920;
  color: #232323;
  border-radius: 30px;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
   width: 200px;
    margin: auto;
     margin-bottom: 10px;
}
</style>
<form action="<?=base_url('index.php/Login/ceklogin')?>" method="post">
    <div class="container">
      <div class="row justify-content-center">
            <div class="notifications" style="position: absolute;z-index: 2;"><?php echo $this->session->flashdata('msg'); ?></div>
        </div>
      <div class="row justify-content-center">
          <div class="col-auto"><br><h1  style="color: #ffc920; font-size: 50px;  font-family: 'Nerko One', cursive;" >Selamat Datang</h1>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-auto"><h1 style="color: #ffffff; font-size: 25px;  font-family: 'Quicksand', sans-serif; text-align: center;">di Vote Ketua OSIS dan MPK</h1>
            <h1 style="text-align: center; color: #ffffff; font-size: 25px;  font-family: 'Quicksand', sans-serif;">SMK Negeri 2 Sumedang</h1>
          </div>
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
                             bottom:0;
                             border-radius: 30px;
                             "
                             >
                          <div class="row justify-content-md-center">
                                <div class="col-auto" style="color: #232323;  font-family: 'Quicksand', sans-serif; margin-top: 20px;"><h2>LOGIN SISWA</h2></div>
                          </div> <br>
                            <div class="row">
                                <div class="col-auto"><p>ID</p></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <select name="id" class="select2 form-control" style="">
                                          <option value=""disabled selected> Ketik ID atau Nama</a></option>
                                      <?php foreach ($siswa as $row) { ?>
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
                                <div class="col-auto"><button type="submit" class="btn" style="background-color:#ffc902; border-radius:15px; margin-bottom: 20px;">Submit</button></div>
                          </div>
                    </div>
                </div>
    </div>
    </div>
</form>
</body>
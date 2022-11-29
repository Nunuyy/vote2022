
<div id="body">
<FORM METHOD="post" ACTION="voting_mpk" onsubmit="return confirm('Apakah anda yakin dengan pilihan anda?');">
  <section style="padding-top: 20px;">
    <div class="container">
      <?php /*

      <div class="row" style="">
        <div class="col-6">
          <H2>Pilih Ketua OSIS Pilihan Anda </H2>
          <?php foreach ($kandidat as $row):
            $nama = $row['nama'];
            ?>
            <input type="radio" required name="kandidat_mpk" id="kandidat_<?=$row['id']?>" VALUE="<?=$row['id']?>"  onclick="document.getElementById('Miez').src='<?php echo base_url()."index.php/Kandidat/kandidat/$nama"; ?>' "/> <label for="kandidat_<?=$row['id']?>"><h4><?=$row['nama']?></h4></label> <br>
            
          <?php endforeach ?>
          <br><br>
          <button type="submit" class="btn btn-primary" >VOTE !</button>
        </div>
        <div class="col-6">
          <div class="form-control"><iframe name="out" style="display:nne" id="Miez" src="" width="100%" height="100%" frameBorder="0"></iframe></div>
        </div>
      </div>
      */ ?>
      <center><H2>Pilih Ketua MPK Pilihan Anda </H2></center>
      <br>
      <div class="row">
          <?php foreach ($kandidat as $row):
            $nama = $row['nama'];
            if($row['id'] == 5 || $row['id'] == 6 || $row['id'] == 7 ) {
                continue;
              }
            ?>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card" style="height: 500px;margin-bottom:25px;">
              <div class="card-header text-center">
                <h3><?php echo $row['id'] ?></h3>
              </div>
              <div class="card-body text-center">
                  <div class="custom-control custom-radio custom-control-inline"> 
                      <input type="radio" required class="custom-control-input " name="kandidat_mpk" id="kandidat_<?=$row['id']?>" VALUE="<?=$row['id']?>"/>
                      <label for="kandidat_<?=$row['id']?>" class="custom-control-label font-weight-bold" for="customRadio2"> <?=$row['nama']?> <br> <br>
                      <img class="card-img-top" width="200px" src="<?php echo base_url()."resources/img/kandidat_/"; ?><?=$row['foto']?>" alt="Card image cap"> </label>
                  </div>
              </div>
            </div>          
        </div>
          <?php endforeach ?>
      </div>
      <br>

      <div class="row">
        <div class="col-1">
        </div>
          <?php foreach ($kandidat as $row):
            $nama = $row['nama'];
            if($row['id'] == 1 || $row['id'] == 2 || $row['id'] == 3 || $row['id'] == 4 ) {
                continue;
              }
            ?>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card" style="height: 500px;margin-bottom:25px;">
              <div class="card-header text-center">
                <h3><?php echo $row['id'] ?></h3>
              </div>
              <div class="card-body text-center">
                  <div class="custom-control custom-radio custom-control-inline"> 
                      <input type="radio" required class="custom-control-input " name="kandidat_mpk" id="kandidat_<?=$row['id']?>" VALUE="<?=$row['id']?>"/>
                      <label for="kandidat_<?=$row['id']?>" class="custom-control-label font-weight-bold" for="customRadio2"> <?=$row['nama']?> <br> <br>
                      <img class="card-img-top" src="<?php echo base_url()."resources/img/kandidat_/"; ?><?=$row['foto']?>" alt="Card image cap"> </label>
                  </div>
              </div>
            </div>          
        </div>
          <?php endforeach ?>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          <center><button type="submit" class="btn btn-primary col-6" style="font-size: 30px;" ><b>VOTE !</b></button></center>
        </div>
      </div>
      <br><br>
    </div>
  </section>
</FORM>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><!-- div#body -->
</body>

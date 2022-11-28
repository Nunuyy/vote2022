<FORM METHOD="post" ACTION="voting_osis">
  <div class="container">
      <div class="row justify-content-center">
        <div class="notifications" style="position: absolute; z-index: 2;"><?php echo $this->session->flashdata('msg'); ?></div>
      </div>
    </div>
  <section style="padding-top: 20px;">
    <div class="container">
      <div class="row" style="">
        <div class="col-6">
          <H2>Pilih Ketua OSIS Pilihan Anda </H2>
          <?php foreach ($kandidat as $row):
            $nama = $row['nama'];
            ?>
            <input type="radio"  name="kandidat_osis" VALUE="<?=$row['id']?>"  onclick="document.getElementById('Miez').src='<?php echo base_url()."index.php/Kandidat/kandidat/$nama"; ?>' "/> <label><h4><?=$row['nama']?></h4></label>
            
          <?php endforeach ?>
          <br><br>
          <button type="submit" class="btn btn-primary" >VOTE !</button>
        </div>
        <div class="col-6">
          <div class="form-control"><iframe name="out" style="display:nne" id="Miez" src="" width="100%" height="100%" frameBorder="0"></iframe></div>
        </div>
      </div>
    </div>
  </section>
</FORM>
</body>
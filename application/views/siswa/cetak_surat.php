<html>
 <head>
  <title>Cetak Surat PKL</title>
 </head>

 <body>
  <img src="<?=base_url()?>resources/img/logo-provinsi.png" class="logokop1">
  <font> <p class="kop1"> PEMERINTAH PROVINSI JAWA BARAT </p></font>
  <font> <p class="kop1"> DINAS PENDIDIKAN </p></font>
  <font> <p class="kop1"> SEKOLAH MENENGAH KEJURUAN NEGERI 2 SUMNEDANG </p></font>
  <font> <p class="kop2"> Jln. Arief Rakhman Hakim No 59 Sumedang </p></font>
  <img src="<?=base_url()?>resources/img/LOGO-SMKN-2-SUMEDANG-BARU.png" class="logokop2">
  <hr color="black">
  
  <p class="style1">Nomer : 1/SMKN2/2018</p>
  <p class="style1">Hal   : Permohonan Praktek Kerja Lapangan</p>
  <p class="style1">Lamp  : -</p>
  <br>
  <p class="style1">Yth:</p>
  <p class="style1">Pimpinan <?php echo $nama; ?></p>
  <p class="style1">Di tempat.</p>

  <p>Dengan Hormat,</p>
  <p>
   Dalam rangka pelaksanaan Pendidikan Sistem Ganda untuk meningkatkan ketermapilan tamatan Sekolah Menegah kejuruan, siswa – siswi SMK Negeri Babadan Kabupaten Ponorogo diwajibkan melaksanakan Praktek kerja Lapangan( PKL ), kami mengajukan permohonan kepada Bapak/Ibu Pimpinan agar dapat menerima siswa kami tersebut di bawah ini :
  </p>
          <table class="table" align="center" cellspacing="0" cellpadding="2">
                                <tr>
                                    <th width="50px">No</th>
                                    <th>Nis</th>
                                    <th>Nama</th>
                                </tr>
                                <?php $no=1; foreach ($pkl as $row) :
                                  ?>
                                <tr>
                                  <td><?php echo "$no"; ?></td>
                                  <td><?=$row['nis']?></td>
                                  <td><?=$row['nama_siswa']?></td>
                                </tr>

                                <?php $no++; endforeach;  ?>
                                
                                
          </table>

    <p>
      Melaksanakan praktek Kerja Lapangan (PKL) pada bagian yang ada dalam <?php echo $nama; ?> yang Bapak/Ibu pimpin.
      Adapun pelasanaan kami rencanakan pada bulan Januari sampai dengan April 2017 atau sesuai dengan waktu yang Bapak / Ibu tentukan.<br>
      Demikian surat permohonan ini kami ajukan, atas perhatiannya kami ucapkan terima kasih.
    </p>
    <p class="ttd">Ponorogo 12 Nopember 2016,</p>
    <p class="ttd">Kepala SMKN 2 Sumedang</p>
    <br><br><br><br>
    <p class="ttd">HADI NUR ABAS</p>
    <p class="ttd">NIP : XXXXXXXXXXXX</p>
 </body>
</html>
<script language="javascript">
window.print();
</script>
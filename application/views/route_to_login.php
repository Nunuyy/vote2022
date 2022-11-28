<html>
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
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
    .login {
        margin: 250px auto;
        width: 900px;
        padding: 10px;
		color:#FF0;

    }
	.h1 {
		font-family: 'Nerko One', cursive;
		color:#FF0;
		
	</style>
</head>
<body style="background-color: #152f38" >
	<div class="row justify-content-center" style="padding-right:15px; padding-left:15px;">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	      <h1 class="display-5" style="color: #ffc920; font-size: 35px;  font-family: 'Nerko One', cursive;" ><strong>APLIKASI VOTING KETUA OSIS & MPK</strong></h1>
	      <h2 class="display-5" style="color: #ffffff; font-size: 20px;  font-family: 'Quicksand', sans-serif;" >Login Sebagai</h2>
	    </div>
    </div>
	<div class='row justify-content-center'  style="padding-right:15px; padding-left:15px;">
		<div class="container">
	      <div class="card-deck mb-3 text-center">
	        <div class="card mb-4 shadow-sm" style="background-color:#232323; border-radius: 45px; ">
	          <div class="card-header">
	            <h4 class="my-0 bold text-white" style="color: #ffffff; font-weight: normal; font-family: 'Quicksand', sans-serif; border-bottom: 2px solid #ffffff; padding-bottom: 10px; padding-top: 20px; margin: 45px; border-width: 3px; border-color: #ffc920;">Siswa</h4>
	          </div>
	          <div class="card-body">
	            <h1 class="card-title pricing-card-title"><img src="<?php echo base_url();?>resources/img/siswa.png" alt="" width="256px"></h1>
	            <a href="login" type="button" class="buttonlog btn btn-lg btn-block">LOGIN</a>
	          </div>
	        </div>
	        <div class="card mb-4 shadow-sm" style="background-color:#232323; border-radius: 45px; ">
	          <div class="card-header">
	            <h4 class="my-0 bold" style="color: #ffffff; font-weight: normal; font-family: 'Quicksand', sans-serif; border-bottom: 2px solid #ffffff; padding-bottom: 10px; padding-top: 20px; margin: 45px; border-width: 3px; border-color: #ffc920;">Guru</h4>
	          </div>
	          <div class="card-body">
	            <h1 class="card-title pricing-card-title"><img src="<?php echo base_url();?>resources/img/guru.png" alt="" width="256px"></h1>
	            <a href="Login/login_guru" type="button" class="buttonlog btn btn-lg btn-block ">LOGIN</a>
	          </div>
	        </div>
	        <div class="card mb-4 shadow-sm" style="background-color:#232323; border-radius: 45px; ">
	          <div class="card-header">
	            <h4 class="my-0 bold" style="color: #ffffff; font-weight: normal; font-family: 'Quicksand', sans-serif; border-bottom: 2px solid #ffffff; padding-bottom: 10px; padding-top: 20px; font-size: 20px; margin: 45px; border-width: 3px; border-color: #ffc920;">Tenaga Kependidikan</h4>
	          </div>
	          <div class="card-body">
	            <h1 class="card-title pricing-card-title"><img src="<?php echo base_url();?>resources/img/tendik.png" alt="" width="256px"></h1>
	            <a href="Login/login_tendik" type="button" class="buttonlog btn btn-lg btn-block " >LOGIN</a>
	          </div>
	        </div>
	      </div>
	    </div>
	</div>
	<br><br><br><br><br><br><br><br>
</body>
</html>
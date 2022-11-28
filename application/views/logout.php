<html>
<head>
<meta http-equiv="refresh" content="5;url=<?php echo base_url();?>sebagai" />
<style type="text/css">
    .login {
        margin: 110px auto;
        width: 900px;
        padding: 10px;
		color:#FF0

    }
	.h {
		font-family:Verdana, Geneva, sans-serif;
		color:#FFc920;
		}
	@media all and (max-width: 450px) {
    .h {
        font-size: 16px;
        font-weight: bold;
    }
	</style>
</head>
<body style="background-color: #083c5f;">
	<div class="row justify-content-center">
            <div class="notifications" style="position: absolute;"><?php echo $this->session->flashdata('msg'); ?></div>
        </div>
	<div class='login'>
		<table><tr><td><h1 class='h' style="color: #ffa826; font-weight: bold;">Terima kasih <br> Telah berpartisipasi pada pemilihan <br> Ketua MPK <br> & <br> Ketua OSIS <br> Periode 2022/2023<h1></td></tr></table>
	</div>";
</body>
</html>
</body>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
<footer id="footer">
     <div class="container-fluid" style="background:#1a374a; margin-top: 50px; padding:10px; color:white;">
        <div class="container">
            <div class="row">
            <div class="col-md-6">
                <br>
                <h5 style="color: #ffffff; font-family: 'Nerko One', cursive; font-size:30px;"> AVKMO </h5>
                <hr class="line mt-0 mx-0">
                <p style="color: #ffffff; font-family: 'Quicksand', sans-serif;">
                    AVKMO adalah aplikasi berbasis online untuk memilih ketua mpk dan osis di SMK Negeri 2 Sumedang.
                </p>
            </div>
            <div class="col-md-6">
                <br>
                <h5 style="color: #ffffff; font-family: 'Nerko One', cursive;  font-size:30px;"> SUPPORT </h5>
                <hr class="line mt-0 mx-0">
                <img class="logo" src="<?=base_url()?>resources/img/logo smk.png">
                <img class="logo" src="<?=base_url()?>resources/img/rpl.png">
                <img class="logo" src="<?=base_url()?>resources/img/logo mpk.png">
                <img class="logo" src="<?=base_url()?>resources/img/logo_osis.png">
            </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background: #152b3a;padding: 10px;color:white;">
            <div class="row justify-content-center">
                <div class="col-11 col-md-5 col-lg-5">
                    <p style="text-align: center; margin: 0px; color:#ffffff;">2021 © Aplikasi Voting Ketua MPK dan OSIS</p>
                </div>
            </div>
    </div>
</footer>

</div><!-- div#containerjuga -->
    <script src="<?=base_url()?>resources/js/jquery-3.2.1.min.js"></script>
    <script src="<?=base_url()?>resources/js/popper.min.js"></script>
    <script src="<?=base_url()?>resources/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>resources/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>resources/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>resources/js/main.js?v=1.53"></script>
    <script src="<?=base_url()?>resources/select2/dist/js/select2.min.js" ></script>
    
    <?php /*
    <script src="<?=base_url()?>resources/bootstrap-confirmation-2/bootstrap-confirmation.js"></script>
    */ ?>

    <script>
        $(document).ready(function() {
                $('.select2').select2();
            });
        $('.notifications').slideDown('slow').delay(3000).slideUp('slow');
    </script>
</html>
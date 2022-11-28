<header>
  <nav class="navbar navbar-expand-lg">

    <h1 class="navbar-brand mr-auto" style="font-size: 16px; color: white;">Aplikasi Voting Ketua MPK dan Osis 2021/2022</h1>

    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
    </button>


    <div class="navbar-collapse collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <p style="color: white; margin: 0px;"><?php echo $_SESSION['id']; ?></p>
          </li>
          <li class="nav-item">
            <p style="color: white; margin: 0px;"><?php echo $_SESSION['nama']; ?></p>
          </li>
      </ul>
    </div>
  </nav>
</header>
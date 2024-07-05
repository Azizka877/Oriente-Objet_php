<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('index.php')?>">Home</a>
        </li>
        <?php if(isset($_SESSION['authentificated'])) : ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['user_fname'] .'   '.$_SESSION['auth_user']['user_lname']?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="my-profile.php">My Profile</a></li>
            <li>
              <form action="" method="POST">
                <button type="submit" class="dropdown_item" name="logout_btn">Logout</button>
              </form>
            </li>
            
            
          </ul>
        </li>
        <?php else:  ?>
          <li class="nav-item">
          <a class="nav-link" href="<?= base_url('login.php')?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('register.php')?>">Register</a>
        </li>
        <?php  endif;  ?>
      </ul>
      
    </div>
  </div>
</nav>
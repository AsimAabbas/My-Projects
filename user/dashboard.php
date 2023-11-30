<?php session_start();

include '../admin/assests/header.php';
require '../admin/database.php';
if (isset($_SESSION['email']) && $_SESSION['loggedin'] === true) { ?>
    
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link btn btn-sm btn-light text-dark text-bold" href="logout.php"><b>Logout</b></a>
          </li>
        </ul>
      </div>
  </div>
</nav>
    </div>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="container mt-5 mb-5">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $_SESSION['message'] ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php } elseif (isset($_SESSION['error'])) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $_SESSION['error'] ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    </div>

  <?php } ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <h3>Welcome <?=  $_SESSION['fname'] .' '. $_SESSION['lname']?></h3>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    
  <?php
    include '../admin/assests/footer.php';

} else {
    header('Location:index.php');
}
    ?>
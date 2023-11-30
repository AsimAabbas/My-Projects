<?php
include '../admin/assests/header.php';
require '../admin/database.php';
$database = new Database;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = addslashes($_POST['fname']);
  $lname = addslashes($_POST['lname']);
  $email = addslashes($_POST['email']);
  $password = addslashes($_POST['password']);
  $cpassword = addslashes($_POST['cpassword']);
  if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($cpassword)) {
    if ($password == $cpassword) {
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      // echo $hashed_password;die;
      $data = array(
        'fname' => $fname,
        'lname' => $lname,
        'email' => $email,
        'password' => $hashed_password
      );

      $result = $database->create('users', $data);

      if ($result) {
        $_SESSION['message'] = "Registered Successfully, Thank for registration";
      } else {
        $_SESSION['error'] = "Registration faild";
      }

    } else {
      $_SESSION['error'] = "Password and Confirm Password does not match";
    }
  }else{
    $_SESSION['error'] = "Please fill all fields";
  }
  
}
?>
<div class="container mt-5">
  <h2>Register Here</h2>
  <?php if (isset($_SESSION['message'])) { ?>
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

  <?php } ?>
  <form action="register.php" method="POST">
    <div class="row">
      <div class="col-lg-6 col-sm-12 col-md-12">
        <div class="mb-3">
          <label class="form-label">First Name</label>
          <input type="text" name="fname" class="form-control" >
        </div>
      </div>

      <div class="col-lg-6 col-sm-12 col-md-12">
        <div class="mb-3">
          <label class="form-label">Last Name</label>
          <input type="text" name="lname" class="form-control" >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-sm-12 col-md-12">
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" >
        </div>
      </div>

      <div class="col-lg-6 col-sm-12 col-md-12">
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" >
        </div>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">Confirm Password</label>
      <input type="password" name="cpassword" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
  <div class="conatiner"> <p>Already Have account ? <a href="index.php">Login Here!</a></p></div>
</div>


<?php
include '../admin/assests/footer.php';
?>
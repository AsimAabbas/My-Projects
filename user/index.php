<?php
session_start();
require '../admin/database.php';

// Check if the user is already logged in
if (isset($_SESSION['email']) && $_SESSION['loggedin'] === true) {
    if($_SESSION['user_type'] == 1){
    header('Location: ../admin/index.php');
    exit;
    }else{
        header('Location: dashboard.php');
        exit;
    }
}

include '../admin/assests/header.php';

$database = new Database;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $getuser = $database->read('users', "email = '$email'", 1);
    if (!empty($getuser)) {
        $userpassword = $getuser[0]['password'];
        $user_type = $getuser[0]['user_type'];
        if (password_verify($password, $userpassword)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['fname'] = $getuser[0]['fname'];
            $_SESSION['lname'] = $getuser[0]['lname'];
            $_SESSION['user_type'] = $user_type;
            $_SESSION['message'] = "Logged in Successfully";
            if ($user_type == 1) {
                header('Location: ../admin/index.php');
                exit;
            } else {
                header('Location: dashboard.php');
                exit;
            }
        } else {
            $message['error'] = "Invalid Credentials";
        }
    } else {
        $message['error'] = "User not found";
    }
}
?>

<div class="container mt-5 mb-5">
    <h2>Login</h2>

    <?php if (isset($message['error'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $message['error'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <form action="index.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="container">
        <p>Don't have an account ? <a href="register.php">Register Here!</a></p>
    </div>
</div>

<?php include '../admin/assests/footer.php'; ?>

<?php

// session_start();
// if (!isset($_SESSION['email']) || $_SESSION['loggedin'] !== true) {
//     header('Location: index.php');
//     exit;
// }
// include '../admin/assests/header.php';
// require '../admin/database.php';
// $database = new Database;
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $email = addslashes($_POST['email']);
//     $password = addslashes($_POST['password']);
//     $getuser = $database->read('users',"email = '$email'",1);
//     $userpassword = $getuser[0]['password'];
//     if (password_verify($password, $userpassword)) {
//         $_SESSION['loggedin'] = true;
//         $_SESSION['email'] = $email;
//         $_SESSION['message'] = "Logged in Successfully";
//         header('Location: dashboard.php');
//     } else {
//         $_SESSION['error'] = "Invalid Credentials";
//     }
// }
?>

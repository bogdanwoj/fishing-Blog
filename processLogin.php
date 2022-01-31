<?php
include "functions.php";

$email = mysqli_real_escape_string($mysql, $_POST['email']);
$password = md5($_POST['password']);
$error = "Email/Parola incorecta";

$userData = query("SELECT * FROM users WHERE email='$email' AND password='$password'");


if (count($userData)>0) {
    $_SESSION['userId']=$userData[0]['id'];
    header('Location: index.php');
} else {
    $_SESSION["error"] = $error;
    header('Location: login.php');
}
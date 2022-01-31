<?php
include "functions.php";

if (count(User::findBy('username', $_POST['username'])) > 0 || count(user::findBy('email', $_POST["email"])) > 0){
    header('Location: newUser.php');
} else {
    $newUser = new User();
    $newUser->password = md5($_POST['password']);
    $newUser->email = $_POST['email'];
    $newUser->role = 'user';
    $newUser->username = $_POST['username'];
    $newUser->save();

    header('Location: index.php');
}
<?php
session_start();

include "classes/Base.php";
include "classes/Article.php";
include "classes/Category.php";
include "classes/Image.php";
include "classes/User.php";
include "classes/Comment.php";
include "classes/Subscriber.php";
include "classes/Product.php";
include "classes/ProductImage.php";


include "dbConnection.php";

function query($sql)
{
    global $mysql;
    $query = mysqli_query($mysql,$sql);
    if ($query===true){
        return true;
    }
    if ($query===false){
        die('Error on:'.$sql);
    }

    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}



function getAuthUser(){
    if (isset($_SESSION['userId'])){
        $user =  new User($_SESSION['userId']);
        return $user;
    } else {
        return false;
    }
}

function getAuthAdmin(){
    $admin = getAuthUser()->role == 'admin';
    return $admin;
}

function formatPrice($price){
    $intPart = intval($price);

    $floatPart = intval(($price-$intPart)*100);

    return "$intPart<sup>$floatPart</sup>";
}

//function getCurrentCart(){
//    if (isset($_SESSION['cartId'])){
//        return new Cart($_SESSION['cartId']);
//    } else {
//        $cart = new Cart();
//        $cart->userId=0;
//        $cart->save();
//        $_SESSION['cartId'] = $cart->getId();
//        return $cart;
//    }
//}

$salt = 'dsakjashdkjkjisdf3244@#$@#$dssdf';

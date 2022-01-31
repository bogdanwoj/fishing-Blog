<?php
include "functions.php";
$files = $_FILES;

copy($files['image']['tmp_name'],'/var/www/html/national02/bogdanw/fishingBlog/images/'.$files['image']['name']);

$articleId = new Article();
$articleId->fromArray($_POST);

$articleId->save();


$image = new Image();
$image->file = $files['image']['name'];
$image->articleId = $articleId->getId();
$image->save();


header('Location: index.php');
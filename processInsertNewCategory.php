<?php
include "functions.php";

$category = new Category();
$category->fromArray($_POST);
$category->save();

header('Location: index.php');
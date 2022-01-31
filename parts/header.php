<?php
include "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Fishing blog</title>
</head>
<body>
    <div class="container ">
        <div class="row">
            <div class="col-8">
                <a class="navbar-brand" href="index.php">
                    <img src="images/fishingstore.jpg" id="logoImg" alt="Fishing Store" class="w-50"/>
                </a>
            </div>
            <div class="col-4">
                <form class="d-flex mt-2" method="get" action="search.php">
                    <input class="form-control me-2" type="search" placeholder="Cauta" aria-label="search" name="search">
                    <button class="btn btn-outline-success" type="submit">Cauta</button>
                </form>
                <div class="col-12 mt-4">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php if (getAuthUser()): ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6">
                                            Salut, <b><?php echo getAuthUser()->getUsername(); ?></b>
                                        </div>

                                        <div class="col-6">
                                            <a href="processLogout.php">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a href="login.php" class="btn btn-success">Login</a>
                                <a href="registerForm.php" class="btn btn-success">
                                    <span>Cont nou</span>
                                </a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 bg-success">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto ">
                            <li class="nav-item ">
                                <a class="nav-link text-white" href="index.php">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categorii
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php $categories = Category::findAll(); ?>
                                    <?php foreach ($categories as $categoryObj): ?>
                                        <a class="dropdown-item" href="category.php?id=<?php echo $categoryObj->getId(); ?>">
                                            <?php echo $categoryObj->name ?><span class="badge badge-secondary">
                                                        <?php echo count($categoryObj->getArticles());?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="product.php">Merch</a>
                            </li>
                            <?php if (getAuthUser() && getAuthAdmin()): ?>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="adminPage.php">Admin Panel</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>



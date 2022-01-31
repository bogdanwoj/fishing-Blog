<?php include "parts/header.php"; ?>

<div class="container mt-5">
    <div class="row">
        <h2> Adauga categorie noua </h2>
        <div class="col-12 mt-5">
            <form method="post" action="processInsertNewCategory.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nume categorie:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Adauga categorie">
                </div>
                <button type="submit" class="btn btn-primary">Adauga categorie</button>
            </form>
        </div>
    </div>

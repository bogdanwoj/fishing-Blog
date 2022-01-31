<?php include "parts/header.php"; ?>

<div class="container mt-5">
    <div class="row">
        <h2> Adauga articol </h2>
        <div class="col-12 mt-5">
            <form method="post" action="processInsertNewArticle.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Titlu articol:</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Adauga titlu articol">
                </div>
                <div class="form-group">
                    <label for="userId">Autor articol: </label>
                    <select class="form-control"   name="userId" id="userId"  placeholder="Select category">
                        <?php foreach (User::findAll() as $user): ?>
                            <option value="<?php echo $user->getId(); ?>"><?php echo $user->username; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Data publicarii articolului:</label>
                    <input type="date" name="date" class="form-control" id="date" placeholder="Adauga data">
                </div>
                <div class="form-group">
                    <label for="category">Categorie articol: </label>
                    <select class="form-control"   name="categoryId" id="category"  placeholder="Select category">
                        <?php foreach (Category::findAll() as $category): ?>
                            <option value="<?php echo $category->getId(); ?>"><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Continut articol:</label>
                    <textarea  name="text" class="form-control" id="text" placeholder="Adauga continut"></textarea>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="image">Imagine articol:</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Adauga articol</button>
            </form>
        </div>
    </div>
    <?php
    include "parts/footer.php"
    ?>

<?php
include "parts/header.php";
$id = intval($_GET['id']);
$category = new Category($id);
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-5">
                <h2>Categoria <?php echo $category->name; ?></h2>
            </div>
            <?php
            foreach ($category->getArticles() as $article){
                $article->card();
            }
            ?>
        </div>
    </div>
<?php
include "parts/footer.php"
?>
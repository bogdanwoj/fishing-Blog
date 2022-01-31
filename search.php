<?php
include "parts/header.php";

$query = "SELECT * FROM articles";

$filters = "";
if (isset($_GET['search'])){
    $search = $_GET['search'];
    $filters=" WHERE name LIKE '%$search%' OR title LIKE '%$search%'";
}
if(isset($filters)){
    $query.=$filters;
}
$searchedArticles = query($query);
$articles = [];
foreach ($searchedArticles as $searchedArticle){
    $articles[] = new Article($searchedArticle['id']);
}
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 mt-5">
            <h2>Cauta "<?php echo $_GET['search']?>"</h2>
        </div>
        <?php
        foreach ($articles as $article){
            $article->cardSample();
        }
        ?>
    </div>
</div>
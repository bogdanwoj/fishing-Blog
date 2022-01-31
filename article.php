
<?php
include "parts/header.php";
$id = $_GET['id'];
$article = new Article($id);
?>;
<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-2 text-right">
                            <div>
                                <h4>
                                    <?php
                                    $date = $article->date;
                                    $timestamp = strtotime ($date);
                                    $newDate = date('d', $timestamp);
                                    echo $newDate;
                                    ?>
                                    <br/>
                                    <?php
                                    $newDate = date('F Y', $timestamp);
                                    echo $newDate;
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-10">
                            <?php
                            $article->card();
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <?php if (getAuthUser()): ?>
                        <form method="post" action="processInsertComment.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="text">Adauga comentariu:</label>
                                <textarea  name="comment" class="form-control" id="<?php echo $id; ?>" placeholder="Adauga comentariu"></textarea>
                                <input type="hidden" name="articleId" id="articleId" value="<?php echo $id; ?>" />
                            </div>
                            <button type="submit" class="btn btn-primary">Comenteaza</button>
                        </form>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-12 mt-5 mb-2">
                        <h4>Cele mai noi comentarii</h4>
                    </div>
                    <?php
                    $newCommentsIds = query('SELECT id FROM comments WHERE articleId = '.$id.'  ORDER BY id DESC LIMIT 10;');
                    foreach ($newCommentsIds as $newCommentsId){
                        $comment = new Comment($newCommentsId['id']);
                        $comment->cardComment();
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5 mb-2">
                    <h3>Stiri similare</h3>
                </div>
                <?php
                foreach ( array_slice($article->getCategory()->getArticles(),0,4) as $similarArticle){
                    if ($similarArticle->getId() != $article->getId()){
                        $similarArticle->cardSample();
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-3">
            <h2>Categorii</h2>
            <ul class="list-group">
                <?php $categories = Category::findAll(); ?>
                <?php foreach ($categories as $category): ?>
                    <li class="list-group-item">
                        <a class="btn btn-primary" href="category.php?id=<?php echo $category->getId(); ?>">
                            <?php echo $category->name ?>
                            <span class="badge badge-light"><?php echo count($category->getArticles());?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?php
include "parts/footer.php";
?>


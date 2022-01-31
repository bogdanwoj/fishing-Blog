<?php
include "parts/header.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-2">
                <h2>Cele mai noi stiri</h2>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-between">
        <div class="justify-content-start col-8">

            <?php
            $newArticleIds = query('SELECT id FROM articles ORDER BY id DESC LIMIT 10;');
            foreach ($newArticleIds as $newArticleId){
                $article = new Article($newArticleId['id']);
                $article->card();
            }
            ?>
        </div>
        <div class="justify-content-end col-4" style="height: 300px">
            <h4>
                Curiozitati
            </h4>
<!--            --><?php
//            $article->cardCarousel();
//            ?>
            <div class="mt-5">
                <h4>
                    Despre Blog
                </h4>
                <p>
                    rient montes, nascetur ridiculus mus.
                    Phasellus nec pretium felis. Phasellus rutrum scelerisque eros non rutrum. Fusce sit amet turpis augue <a href="contact.php">aici.</a>
                </p>
                <form method="post" action="processSubscribe.php">
                    <input type="email" name="email" >
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                </form>
            </div>
<!--            <div>-->
<!--                <h4>Tricou personalizat: </h4>-->
<!--                --><?php //include "textImage.php" ?>
<!--            </div>-->
        </div>
    </div>

<?php
include "parts/footer.php"
?>
</body>
</html>

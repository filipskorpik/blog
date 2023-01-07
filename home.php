<?php

try {
    $results = get_posts();
} catch (PDOException $e) {
    // also handle errors
    $results = [];
}

//  echo "<pre>";
// print_r( $results );
// echo "</pre>";

include_once "_partials/header.php";


?>



<section class="box post-list">
    <h1 class="box-heading text-muted">This is a blog</h1>

    <?php if (count($results)) : foreach ($results as $post) :  ?>

            <article id="post-<?= $post->id ?>" class="post">
                <header class="post-header">
                    <h2>
                        <a href="<?= $post->link ?>">
                            <?= $post->title ?>
                        </a>
                        <time datetime="<?= $post->date ?> ">
                            <small> /&nbsp;<?= $post->time ?></small>
                        </time>
                    </h2>
                </header>

                <?php include '_partials/tag.php' ?>



                <div class="post-content">
                    <p>
                        <?= $post->teaser ?>
                    </p>
                </div>
                <div class="footer post-footer">
                    <a href="<?= $post->link ?>" class="read-more">
                        read more
                    </a>
                </div>
            </article>

        <?php endforeach;
    else : ?>

        <p>
            we got nothing :(
        </p>

    <?php endif ?>
</section>

<?php include_once "_partials/footer.php"; ?>
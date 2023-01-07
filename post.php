<?php


// echo "<pre>";
// print_r( 'id =' . segment(2) );
// echo "</pre>";

$id = segment(2);

// add new post form
if ( $id === 'new' ) {
    include_once 'add.php';
    die();
}

try {
    $post = get_post();
} catch (PDOException $e) {
    $post = false;
}



if ( ! $post) {
    flash()->error("doesn't exist :(");
    redirect('/');
}

$page_title = $post->title;

include_once "_partials/header.php";


?>

<section class="box post-list">
    <h1 class="box-heading text-muted">This is a blog</h1>


    <article id="post-<?= $post->id ?>" class="post">
        <header class="post-header">
            <h2>
                <a href="<?= $post->link ?>">
                    <?= $post->title ?>
                </a>

                <a href="<?= get_edit_link( $post ) ?>" class="btn btn-link">
                    edit
                </a>
                <a href="<?= get_delete_link( $post ) ?>" class="btn btn-link">
                    delete
                </a>
            </h2>
                <time datetime="<?= $post->date ?> ">
                    <small> /&nbsp;<?= $post->time ?></small>
                </time>
        </header>
        
        <div class="post-content">
            <p>
                <?= $post->text ?>
            </p>
        </div>
        <footer>
            <?php
                include '_partials/tag.php'
            ?>
        </footer>

    </article>





    <?php include_once "_partials/footer.php"; ?>
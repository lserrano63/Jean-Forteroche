<?php $title = "Administration des posts" ?>
<?php ob_start(); ?>

<section class="container">
<?php 
    $postManager = new PostManager();
    $req = $postManager->getPosts();
    while ($data = $req->fetch()) 
    {
        ?>
        <article>
            <h2><?= $data['title'];?></h2>
            <p>posté le <?php echo $data['creation_date_fr'];?></p>
            <p><?= substr(nl2br($data['post']),0,400);?></p>   
            <a href="" title="Modifier le post"><i class="far fa-edit"></i></a>
            <a href="" title="Supprimer le post"><i class="far fa-trash-alt"></i></a>
        </article>
        <?php
    }
    $req->closeCursor();
    ?>
</section>

<script src="scripts/tiny.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
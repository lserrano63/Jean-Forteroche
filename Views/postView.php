<?php $title = $post['title']; ?>
<?php ob_start(); ?>
<p><a href="../index.php">Retour à la liste des chapitres</a></p>
<section>
    <article class="news">
        <h3>
            <?= htmlspecialchars($post['title']); ?>
            <em>le <?= $post['creation_date_fr']; ?></em>
        </h3>
                
        <p>
            <?= nl2br(htmlspecialchars($post['post'])); ?>
        </p>
    </article>

    <section id="comments">
        <h3>Commentaires</h3>
            <?php
            while ($comment = $comments->fetch()){
            ?>
                <div class="comment">
                    <p><strong><?= htmlspecialchars($comment['author']); ?></strong> le <?php echo $comment['comment_date_fr']; ?></p>
                    <p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
                    <i class="fas fa-ban"></i>
                </div>
            <?php
            }
        ?>
    </section>
    <section class="container">
        <div class="card card-container">
            <h3 class="card-header">Ajouter votre commentaire</h2>
            <div class="card-body">
                <div class="login-form">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="pseudo">Nom :</label>
                            <input name="name" type="text" id="name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="message">Message :</label>
                            <textarea type="message" name="message" id="message" class="form-control" required></textarea>
                        </div>
                        <input type="submit" name="send_message" class="btn btn-primary" value="Envoyer"/>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
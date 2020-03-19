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
                    <a href="index.php?action=reported&id=<?= $comment['id']?>&post_id=<?= $post['id']?>"><i class="fas fa-ban">Signaler</i></a>
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
                    <form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
                        <div class="form-group">
                            <label for="pseudo">Nom :</label>
                            <input name="author" type="text" id="author" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="message">Message :</label>
                            <textarea type="text" name="comment" id="comment" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="check">Voulez-vous accepter la politique de confidentialité : </label>
                            <input type="checkbox" name="check" id="check" class="form-control" required>
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
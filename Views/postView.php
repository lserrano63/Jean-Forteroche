<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <p><a href="../index.php">Retour à la liste des billets</a></p>

        <article class="news">
            <h3>
                <?= htmlspecialchars($post['title']); ?>
                <em>le <?= $post['creation_date_fr']; ?></em>
            </h3>
            
            <p>
                <?php echo nl2br(htmlspecialchars($post['post'])); ?>
            </p>
        </article>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?php echo htmlspecialchars($comment['author']); ?></strong> le <?php echo $comment['comment_date_fr']; ?></p>
            <p><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
        <?php
        }
        ?>
    </body>
</html>
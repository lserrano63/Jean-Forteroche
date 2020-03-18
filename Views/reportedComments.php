<?php $title = "Administration de commentaires" ?>
<?php ob_start(); ?>

<section>
    <h3>Commentaires signalés</h3>
        <?php
        
        $commentManager = new CommentManager();
        $reportedComment = $commentManager->getReportedComments();
        while ($reportedComments = $reportedComment->fetch()) {
        ?>
            <div>
                <p><strong><?= htmlspecialchars($reportedComments['author']); ?></strong> le <?= $reportedComments['comment_date_fr']; ?></p>
                <p><?= nl2br(htmlspecialchars($reportedComments['comment'])); ?></p>
                <a href="?action=accept&id=<?=$reportedComments['id']; ?>">Accepter commentaire</a>
                <a href="?action=remove&id=<?=$reportedComments['id']; ?>">Supprimer commentaire</a>
            </div>
        <?php
        }
        ?>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
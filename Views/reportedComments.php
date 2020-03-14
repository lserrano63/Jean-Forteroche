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
                <p><strong><?= htmlspecialchars($reportedComments['author']); ?></strong> le <?php echo $reportedComments['comment_date_fr']; ?></p>
                <p><?= nl2br(htmlspecialchars($reportedComments['comment'])); ?></p>
                <a href="?action=Accepter&id=<?=$reportedComments['id']; ?>">Accepter commentaire reporté</a>
            </div>
        <?php
        }
        ?>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
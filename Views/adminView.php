<?php $title = "Administration" ?>
<?php ob_start(); ?>

<section>
    <ul>
        <li><a href="index.php?action=postCreation">Nouveau post</a></li>
        <li><a href="index.php?action=viewReportedPosts">Commentaires Signalés</a></li>
        <li><a href="index.php?action=help">Aide</a></li>
    </ul>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
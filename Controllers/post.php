<?php
$postManager = new PostManager();
$commentManager = new CommentManager();


if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('Views/postView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}
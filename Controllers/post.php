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

    // $addaComment = $commentManager->addComment($postId, $author, $comment);

    // if ($addaComment === false) {
    //     die('Impossible d\'ajouter le commentaire !');
    // } else {
    //     header('Location: index.php?action=ViewPost&id=' . $_GET['id']);
    // }

    function addOneComment($postId, $author, $comment)
    {
        $addaComment = addComment($postId, $author, $comment);
    
        if ($addaComment === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

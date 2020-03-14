<?php

function viewPost(){
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
}
    // $addaComment = $commentManager->addComment($postId, $author, $comment);

    // if ($addaComment === false) {
    //     die('Impossible d\'ajouter le commentaire !');
    // } else {
    //     header('Location: index.php?action=ViewPost&id=' . $_GET['id']);
    // }

    function addOneComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
        $addaComment = $commentManager->addComment($postId, $author, $comment);
    
        if ($addaComment === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=ViewPost&id=' . $postId);
        }
    }
    function report($comment_id)
    {
        $commentManager = new CommentManager();
        $commentManager->report($comment_id);
    }


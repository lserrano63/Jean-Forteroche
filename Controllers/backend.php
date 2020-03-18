<?php 

function addOnePost($title, $post)
{
    $postManager = new PostManager();
    $addaPost = $postManager->addPost($title, $post);
    if ($addaPost === false) {
        die('Impossible d\'ajouter le post !');
    }
    else {
        header('Location: index.php');
    }
}

function acceptComment($comment_id)
{
    $commentManager = new CommentManager();
    $commentManager->acceptComment($comment_id);
}

function removeComment($comment_id)
{
    $commentManager = new CommentManager();
    $commentManager->removeComment($comment_id);
}
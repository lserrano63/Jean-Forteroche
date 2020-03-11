<?php
require ('Models/postManager.php');
require ('Models/commentManager.php');

if (isset($_GET['action']))
{
    if($_GET['action']== 'ViewPost')
    {
        require('Controllers/post.php');
    } elseif ($_GET['action'] == 'addComment') 
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) 
            {
                require('Controllers/post.php');
                addOneComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        } 
    }
} else {
    require('Views/indexView.php');
}
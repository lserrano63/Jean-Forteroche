<?php
require ('Models/postManager.php');
require ('Models/commentManager.php');
session_start();
if (isset($_GET['action']))
{
    $action = $_GET['action'];
    if($action== 'ViewPost')
    {
        require('Controllers/post.php');
        viewPost();
    } elseif ($action == 'AddComment') 
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
    } elseif ($action == 'Disconnect') {
        $_SESSION = array();
        session_destroy();
    } elseif ($action == 'Reported') {
        if (isset($_GET['id']) && $_GET['id'] > 0){
            require('Controllers/post.php');
            report($_GET['id']);
        }
    }
} else {
    require('Views/indexView.php');
}
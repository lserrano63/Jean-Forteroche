<?php
require ('Models/postManager.php');
require ('Models/commentManager.php');
session_start();

if (isset($_GET['action']))
{
    $action = $_GET['action'];

    if($action == 'viewPost')
    {
        require('Controllers/frontend.php');
        viewPost();
    } elseif ($action == 'addComment') 
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) 
            {
                require('Controllers/frontend.php');
                addOneComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        } 
    } elseif ($action == 'reported') {
        if (isset($_GET['id']) && $_GET['id'] > 0){
            require('Controllers/frontend.php');
            report($_GET['id']);
            header('Location: index.php?action=viewPost&id='. $_GET['post_id']);
        }
    }  elseif (isset($_SESSION['connected']) && ($_SESSION['connected'] == true)){
        if ($action == 'disconnect') {
            $_SESSION = array();
            session_destroy();
            header('Location: index.php');
        } elseif ($action == 'admin') {
            require('Views/adminView.php');
        } elseif ($action == 'postCreation') {
            require('Views/adminPostCreation.php');
        } elseif ($action == 'addPost') {
            if (!empty($_POST['title']) && !empty($_POST['post'])) 
            {
                require('Controllers/backend.php');
                addOnePost($_POST['title'], $_POST['post']);
            }
        } elseif ($action == 'viewReportedPosts') {
            require('Views/reportedComments.php');
        } elseif ($action == 'accept') {
            if (isset($_GET['id']) && $_GET['id'] > 0){
                require('Controllers/backend.php');
                acceptComment($_GET['id']);
                header('Location: index.php?action=viewReportedPosts');
            }
        } elseif ($action == 'remove') {
            if (isset($_GET['id']) && $_GET['id'] > 0){
                require('Controllers/backend.php');
                removeComment($_GET['id']);
                header('Location: index.php?action=viewReportedPosts');
            }
        } else {
            echo 'Vous n\'avez pas la permission!';
        } 
        //elseif ($action == 'help') {
            //require('Views/help.php');
        //}
} 
} else {
    require('Views/indexView.php');
}
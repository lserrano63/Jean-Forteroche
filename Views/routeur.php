<?php

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
            header('Location: index.php?action=viewPost&id='. $_GET['id']);
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
        } elseif ($action == 'viewReportedComments') {
            require('Views/reportedComments.php');
        } elseif ($action == 'accept') {
            if (isset($_GET['id']) && $_GET['id'] > 0){
                require('Controllers/backend.php');
                acceptComment($_GET['id']);
                header('Location: index.php?action=viewReportedComments');
            }
        } elseif ($action == 'remove') {
            if (isset($_GET['id']) && $_GET['id'] > 0){
                require('Controllers/backend.php');
                removeComment($_GET['id']);
                header('Location: index.php?action=viewReportedComments');
            }
        }
        elseif ($action == 'adminPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) && ($action == 'adminPost&modify') {
                require('Controllers/backend.php');
                //modifyPost($_POST['title'], $_POST['post']);
                header('Location: index.php?action=adminPost');
            }
            elseif (isset($_GET['id']) && $_GET['id'] > 0) && ($action == 'adminPost&destroy'){
                require('Controllers/backend.php');
                //removePost($_GET['id']);
                header('Location: index.php?action=adminPost');
            }
            else {
                require('Views/adminPostView.php');
            }
        }
} 
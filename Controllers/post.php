<?php
require ('../Models/model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('../Views/postView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}
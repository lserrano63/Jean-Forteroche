<?php
require ('Models/postManager.php');
require ('Models/commentManager.php');

if (isset($_GET['action'])){
    if($_GET['action']== 'ViewPost'){
        require('Controllers/post.php');
    }
} else {
    require ('Views/indexView.php');
}


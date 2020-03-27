<?php
require ('Models/postManager.php');
require ('Models/commentManager.php');
session_start();

if (isset($_GET['action']))
{
    require('Views/router.php');
} else {
    require('Views/indexView.php');
}